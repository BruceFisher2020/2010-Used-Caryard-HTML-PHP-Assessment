<?php
/**
 * Settings for a PHP Feedback Form application.
 * @author Mike Cunneen
 * @package feedbackForm
 * @category settings
 * @copyright Copyright (c) 2010 Mike Cunneen
 * @license http://creativecommons.org/licenses/by/3.0/ Creative Commons Attribution License 3.0.
 *          You are free to use this as long as the conditions of the above license are met
 *          and this comment remains intact.
 */
// The domain name of the website
$myapp_domain_name = 'bhautos.com.au';
// The address to which website feedback should be sent (i.e. website owner's email address)
$myapp_mail_feedback_addr = 'sendMailToMe@example.com'; // ENTER B&H Auto's Email address once created //
// The Subject: line to use in feedback emails
$myapp_mail_subject = 'Feedback from '.$myapp_domain_name.' website';

// These variables will need changing to reflect the outbound MAIL SMTP server

// set to true if the mail server uses authentication, false otherwise.
$myapp_mail_auth = true;
$myapp_mail_host = "mail.example.com";  // SMTP B&H Autos MAIL HOST //
$myapp_mail_username = "smtp_username"; // SMTP B&H Autos MAIL HOST username //
$myapp_mail_password = "smtp_password"; // SMTP B&H Autos MAIL HOST password //

// default message in the feedback field.
$myapp_feedback_default_text = 'Type in your feedback here';
// background colour for form fields that need attention.
$myapp_errorfield_background = "#FFD800";

?>
