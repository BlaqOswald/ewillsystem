<?php

namespace App\Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once base_path("vendor/autoload.php");

class MailHelper
{
    /**
     * Send an email using PHPMailer with Gmail SMTP.
     *
     * @param string $to Recipient email address.
     * @param string $subject Email subject.
     * @param string $body Email HTML body.
     * @param string $data data for HTML body.
    //  * @param string $altBody Email plain-text body (optional).
     * @param string $from Sender email address (default: noreply@example.com).
     * @param string $fromName Sender name (default: eWillSystem).
     * @return bool Returns true if the email was sent successfully, otherwise false.
     */

    public static function sendMail(
        string $to,
        string $type,
        array $data,
        string $from = "your-email@gmail.com",
        string $fromName = "eWillSystem"
    ): bool {
        try {
            $mail = new PHPMailer(true);
            \Log::info("Preparing to send email to: $to");

            // SMTP configuration
            $mail->isSMTP();
            $mail->SMTPDebug = SMTP::DEBUG_OFF; // Disable debug logs in production
            $mail->Host = env("MAIL_HOST", "smtp.gmail.com");
            $mail->SMTPAuth = true;
            $mail->Username = env("MAIL_USERNAME");
            $mail->Password = env("MAIL_PASSWORD");
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Sender and recipient
            $mail->setFrom($from, $fromName);
            $mail->addAddress($to);

            // Dynamically determine subject and body
            $mail->Subject = self::getSubject($type);
            $mail->Body = self::getBody($type, $data);
            $mail->isHTML(true);

            return $mail->send();
            \Log::info("Email sent successfully to $to");
            return true;
        } catch (Exception $e) {
            \Log::error("Mail Error: {$e->getMessage()}");
            return false;
        }
    }
    /**
     * Get the subject for the email based on type.
     */
    private static function getSubject(string $type): string
    {
        switch ($type) {
            case "otp":
                return "Your OTP for Verification";
            case "password_reset":
                return "Your OTP for Password Reset";
            case "register":
                return "Welcome to eWillSystem! Password sent to your registered email";
            default:
                return "Notification from eWillSystem";
        }
    }

    /**
     * Get the body for the email based on type and data.
     */
    private static function getBody(string $type, array $data): string
    {
        try {
            switch ($type) {
                case "otp":
                    return view("emails.otp", $data)->render();
                case "password_reset":
                    return view("emails.password_reset", $data)->render();
                case "register":
                    return view("emails.register", $data)->render();
                default:
                    return "<p>No content available.</p>";
            }
        } catch (Exception $e) {
            \Log::error("View Rendering Error: {$e->getMessage()}");
            return "<p>Error generating email content.</p>";
        }
    }
}
