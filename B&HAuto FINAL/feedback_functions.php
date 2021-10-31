<?php

/**
 * Functions for a feedback form.
 * @author Mike Cunneen
 * @package feedbackForm
 * @category utils
 * @copyright Copyright (c) 2010 Mike Cunneen
 * @license http://creativecommons.org/licenses/by/3.0/ Creative Commons Attribution License 3.0.
 *          You are free to use this as long as the conditions of the above license are met
 *          and this comment remains intact.
 */
include_once 'includes/includes_inc.php';

/**
 * Checks to see if the form is valid.
 * @return boolean true if the form is valid 
 */
function formIsValid() {
    // only run checks if data has been POSTed.
    if (!empty($_POST) && (count($_POST) > 0)) {
        $formOK = (
                assertFieldNotEmpty('firstname', 'firstname', 'First name')
                && assertFieldNotEmpty('lastname', 'lastname', 'Last name')
                && assertFieldNotEmpty('email', 'email', 'Email address')
                && assertValidEmailInField('email', 'email', 'Email Address field')
                && assertFieldNotEmpty('feedback', 'feedback', 'Message')
                );
        // check that the feedback text submitted isn't just the default text.
        $formOK = $formOK && assertFeedbackNotDefault();
        return $formOK;
    } else {
        // first visit - no POST data
        return false;
    }
}

/**
 * Returns true if the user has changed the feedback text from the default.
 * Otherwise, an error is printed.
 * @global string $myapp_feedback_default_text
 * @return boolean true if the feedback is NOT the default text.
 */
function assertFeedbackNotDefault() {
    global $myapp_feedback_default_text;
    $feedbackField = trim($_POST['feedback']);
    if ($feedbackField != $myapp_feedback_default_text) {
        return true;
    } else {
        printError('Feedback must be entered.');
        highlightField('feedback');
    }
}

/**
 * Handles the feedback form. Does not check form fields for validity (this
 * should be done prior to calling).
 *
 * Attempts to send a feedback email and print information back to the user.
 */
function handleFeedback() {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    if (sendFeedbackEmail($feedback, $email, $fromFirstname, $fromLastname)) {
        printMessage("Thanks $fromFirstname $fromLastname, your feedback email has been sent!");
    } else {
        printError("Oops! We had a problem sending your message.<br/>Please contact us by telephone.");
    }
}

?>
