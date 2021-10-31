<?php
/**
 * General utility functions.
 * @author Mike Cunneen
 * @package feedbackForm
 * @category utils
 * @copyright Copyright (c) 2010 Mike Cunneen
 * @license http://creativecommons.org/licenses/by/3.0/ Creative Commons Attribution License 3.0.
 *          You are free to use this as long as the conditions of the above license are met
 *          and this comment remains intact.
 */
include_once 'includes/settings_inc.php';

/**
 * Prints an error message in a new &lt;div class="error"&gt;
 * @param string $message the error message to print
 */function printError($message) {
    print <<< END_ERROR
        <div class="error">
            $message
        </div>
END_ERROR;
}

/**
 * Prints a message in a new &lt;div class="message"&gt;
 * @param string $message the information to print.
 */
function printMessage($message) {
    print <<< END_ERROR
        <div class="message">
            $message
        </div>
END_ERROR;
}

/**
 * highlights a given HTML form field to be the configured error background colour.
 * @global string $myapp_errorfield_background
 * @param string $fieldname the name of the field to highlight
 */
function highlightField($fieldname) {
    global $myapp_errorfield_background;
    print <<< END_CSS
        <style type="text/css">
            #{$fieldname} { background-color: {$myapp_errorfield_background} ;}
        </style>
END_CSS;
}

/**
 * Checks whether the given field is not empty. If it is, prints an error
 * message and highlights the offending HTML form field.
 * @param string $fieldname the name of the field in the $_POST array
 * @param string $fieldID the ID of the field (for targeting CSS)
 * @param string $fieldDesc a description of the field (for error messages)
 * @return boolean true if the field is not empty, false otherwise.
 */
function assertFieldNotEmpty($fieldname, $fieldID, $fieldDesc) {
    $fieldval = trim($_POST[$fieldname]);
    if (empty($fieldval)) {
        printError($fieldDesc . ' must be entered.');
        highlightField($fieldID);
        return false;
    } else {
        return true;
    }
}

/**
 * Checks whether the given field contains a valid email address. If it doesn't,
 * prints an error message and highlights the offending HTML form field.
 * @param string $fieldname the name of the field in the $_POST array
 * @param string $fieldID the ID of the field (for targeting CSS)
 * @param string $fieldDesc a description of the field (for error messages)
 * @return boolean true if the field contains a valid email address, false otherwise.
 */
function assertValidEmailInField($fieldname, $fieldID, $fieldDesc) {
    $fieldval = trim($_POST[$fieldname]);
    if (!emailAddressIsValid($fieldval)) {
        printError($fieldDesc . ' must contain a valid email address.');
        highlightField($fieldID);
        return false;
    } else {
        return true;
    }
}

/**
 * returns true if the provided email address is valid.
 * @param string $emailAddress the email address to validate
 * @return boolean true if the address is valid, false otherwise.
 */
function emailAddressIsValid($emailAddress) {
    if (preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/', strtoupper($emailAddress)) == 1) {
        return true;
    } else {
        return false;
    }
}

/**
 * Just a proxy for a mail() function, with configured globals for the subject
 * and TO: address.
 * @global string $myapp_mail_feedback_addr
 * @global string $myapp_mail_subject
 * @param string $message
 * @param string $fromEmail
 * @param string $fromFirstname
 * @param string $fromLastname
 * @return <type>
 */
function sendFeedbackEmail($message, $fromEmail, $fromFirstname, $fromLastname) {
    global $myapp_mail_feedback_addr;
    global $myapp_mail_subject;
    global $myapp_mail_host;
    global $myapp_mail_auth;
    global $myapp_mail_username;
    global $myapp_mail_password;

    $headers = array('From' => "$fromFirstname $fromLastname <{$fromEmail}>",
        'To' => $myapp_mail_feedback_addr,
        'Subject' => $myapp_mail_subject);
    $smtp = Mail::factory('smtp',
                    array('host' => $myapp_mail_host,
                        'auth' => $myapp_mail_auth,
                        'username' => $myapp_mail_username,
                        'password' => $myapp_mail_password));

    $mail = $smtp->send($myapp_mail_feedback_addr, $headers, $message);

    return (!PEAR::isError($mail));
}

?>
