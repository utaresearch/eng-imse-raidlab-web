<?php /*

    CHFEEDBACK.PHP Feedback Form PHP Script Ver 2.16.2
    Generated by thesitewizard.com's Feedback Form Wizard 2.16.2.
    Copyright 2000-2011 by Christopher Heng. All rights reserved.
    thesitewizard is a trademark of Christopher Heng.

    Get the latest version, free, from:
        http://www.thesitewizard.com/wizards/feedbackform.shtml

    You can read the Frequently Asked Questions (FAQ) at:
        http://www.thesitewizard.com/wizards/faq.shtml

    I can be contacted at:
        http://www.thesitewizard.com/feedback.php
    Note that I do not normally respond to questions that have
    already been answered in the FAQ, so *please* read the FAQ.

    LICENCE TERMS

    1. You may use this script on your website, with or
    without modifications, free of charge.

    2. You may NOT distribute or republish this script,
    whether modified or not. The script can only be
    distributed by the author, Christopher Heng.

    3. THE SCRIPT AND ITS DOCUMENTATION ARE PROVIDED
    "AS IS", WITHOUT WARRANTY OF ANY KIND, NOT EVEN THE
    IMPLIED WARRANTY OF MERCHANTABILITY OR FITNESS FOR A
    PARTICULAR PURPOSE. YOU AGREE TO BEAR ALL RISKS AND
    LIABILITIES ARISING FROM THE USE OF THE SCRIPT,
    ITS DOCUMENTATION AND THE INFORMATION PROVIDED BY THE
    SCRIPTS AND THE DOCUMENTATION.

    If you cannot agree to any of the above conditions, you
    may not use the script. 

    Although it is not required, I would be most grateful
    if you could also link to thesitewizard.com at:

        http://www.thesitewizard.com/

	Please do not remove any of the above. Don't worry.
	If your web host has installed PHP correctly on their
	system, neither this notice nor anything you see below
	will be displayed in your visitor's web browser. */

// ------------- CONFIGURABLE SECTION ------------------------

$mailto = 'Harrison.arms@gmail.com' ;
$subject = "Feedback Form" ;
$formurl = "http://www.uta.edu/rfid/DLform4.html" ;
$thankyouurl = "http://www.uta.edu/rfid/index.html" ;
$errorurl = "http://www.uta.edu/rfid/DLform4.html" ;

$email_is_required = 1;
$name_is_required = 1;
$comments_is_required = 1;
$uself = 0;
$forcelf = 0;
$use_envsender = 0;
$use_sendmailfrom = 0;
$smtp_server_win = '' ;
$use_webmaster_email_for_from = 0;
$use_utf8 = 1;
$my_recaptcha_private_key = '' ;

// -------------------- END OF CONFIGURABLE SECTION ---------------

define( 'MAX_LINE_LENGTH', 998 );
$headersep = $uself ? "\n" : "\r\n" ;
$content_nl = $forcelf ? "\n" : (defined('PHP_EOL') ? PHP_EOL : "\n") ;
$content_type = $use_utf8 ? 'Content-Type: text/plain; charset="utf-8"' : 'Content-Type: text/plain; charset="iso-8859-1"' ;
if ($use_sendmailfrom) {
	ini_set( 'sendmail_from', $mailto );
}
if (strlen($smtp_server_win)) {
	ini_set( 'SMTP', $smtp_server_win );
}
$envsender = "-f$mailto" ;
$fullname = isset($_POST['fullname']) ? $_POST['fullname'] : $_POST['name'] ;
$email = $_POST['email'] ;
$comments = $_POST['comments'] ;
$http_referrer = getenv( "HTTP_REFERER" );

if (!isset($_POST['email'])) {
	header( "Location: $formurl" );
	exit ;
}
if (($email_is_required && (empty($email) || !preg_match('/@/', $email))) || ($name_is_required && empty($fullname)) || ($comments_is_required && empty($comments))) {
	header( "Location: $errorurl" );
	exit ;
}
if ( preg_match( "/[\r\n]/", $fullname ) || preg_match( "/[\r\n]/", $email ) ) {
	header( "Location: $errorurl" );
	exit ;
}
if (strlen( $my_recaptcha_private_key )) {
	require_once( 'recaptchalib.php' );
	$resp = recaptcha_check_answer ( $my_recaptcha_private_key, $_SERVER['REMOTE_ADDR'], $_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field'] );
	if (!$resp->is_valid) {
		header( "Location: $errorurl" );
		exit ;
	}
}
if (empty($email)) {
	$email = $mailto ;
}
$fromemail = $use_webmaster_email_for_from ? $mailto : $email ;

if (function_exists( 'get_magic_quotes_gpc' ) && get_magic_quotes_gpc()) {
	$comments = stripslashes( $comments );
}

$messageproper =
	"This message was sent from:" . $content_nl .
	"$http_referrer" . $content_nl .
	"------------------------------------------------------------" . $content_nl .
	"Name of sender: $fullname" . $content_nl .
	"Email of sender: $email" . $content_nl .
	"------------------------- COMMENTS -------------------------" . $content_nl . $content_nl .
	wordwrap( $comments, MAX_LINE_LENGTH, $content_nl, true ) . $content_nl . $content_nl .
	"------------------------------------------------------------" . $content_nl ;

$headers =
	"From: \"$fullname\" <$fromemail>" . $headersep . "Reply-To: \"$fullname\" <$email>" . $headersep . "X-Mailer: chfeedback.php 2.16.2" .
	$headersep . 'MIME-Version: 1.0' . $headersep . $content_type ;

if ($use_envsender) {
	mail($mailto, $subject, $messageproper, $headers, $envsender );
}
else {
	mail($mailto, $subject, $messageproper, $headers );
}
header( "Location: $thankyouurl" );
exit ;

?>