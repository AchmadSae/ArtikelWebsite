<?php
namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use App\Controllers\BaseController;
class FeedbackController extends BaseController
{
    public function sendComment()
    {
        session();
        $mail = new PHPMailer(true);

        $username = $this->request->getPost('username');
        $comments = $this->request->getPost('comments');
        $toEmail = $this->request->getPost('toMail');
        // return $username . $comments . $toEmail;
        try {
            // server settings
            $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER for debugging
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sssnerv@gmail.com';
            $mail->Password = 'pzro tseu avle nvfy';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // set email parameters
            $mail->setFrom('sssnerv@gmail.com', 'Mailer');
            $mail->addAddress($toEmail, 'Article Feedback - Support'); //add recepients

            $mail->isHTML(true);
            $mail->Subject = 'Comments from ' . $username;
            $mail->Body = '
                <p><strong>Hai I am:</strong> ' . $username . '</p>
                <p><strong>Comment:</strong><br>' . nl2br($comments) . '</p>';
            if ($mail->send()) {
                session()->setFlashdata('message', "Feedback sent successfully");
                session()->setFlashdata('iconMsg', 'info');
                session()->setFlashdata('isAlert', true);
                return redirect()->back();
            } else {
                throw new \Exception('Email failed to send');
            }
        } catch (\Exception $e) {
            session()->setFlashdata('message', "Feedback failed to send due to miss configurations: " . $e->getMessage());
            session()->setFlashdata('iconMsg', 'error');
            session()->setFlashdata('isAlert', true);
            return redirect()->back();
        }
    }
}