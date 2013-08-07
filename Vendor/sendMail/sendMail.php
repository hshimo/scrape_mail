<?php
/**
 * @name                    : sendMail
 * @author Taslim Mazumder Sohel
 * @mailsohel62@yahoo.com
 * Function for sending email
 * with Japanese Email Body, Subject, Sender Name.
 *
 * @param String $to               : Receiver mail address.
 * @param String $subject          : email subject.
 * @param int    $body            : mail body text.
 * @param array  $from_email    : Sender mail address.
 * @param array  $from_name      : Sender Name.
 *
 */
function sendMail($to, $subject, $body, $from_email,$from_name)
{
    $headers  = "MIME-Version: 1.0 \n" ;
    $headers .= "From: " . "".mb_encode_mimeheader(mb_convert_encoding($from_name,"ISO-2022-JP","AUTO")) ."" .
        "<".$from_email."> \n";
    $headers .= "Reply-To: " .
        "".mb_encode_mimeheader (mb_convert_encoding($from_name,"ISO-2022-JP","AUTO")) ."" .
        "<".$from_email."> \n";

    $headers .= "Content-Type: text/plain;charset=ISO-2022-JP \n";

    /* Convert body to same encoding as stated
       in Content-Type header above */

    $body = mb_convert_encoding($body, "ISO-2022-JP","AUTO");

    /* Mail, optional paramiters. */
    $sendmail_params  = "-f$from_email";
    mb_language("ja");
    $subject = mb_convert_encoding($subject, "ISO-2022-JP","AUTO");
    $subject = mb_encode_mimeheader($subject);
    $result = mail($to, $subject, $body, $headers, $sendmail_params);

    return $result;
}