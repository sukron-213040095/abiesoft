<?php

namespace AbieSoft\Package;

use AbieSoft\Utilities\Config;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Email {
    public static function kirim(string $tujuan, string $judul, string $isi)
    {
        $mail = new PHPMailer(true);
        try {
            /*
                Konfigurasi Email lihat di file .env
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            */
            $mail->isSMTP();
            $mail->Host       = Config::envReader('EMAIL_SMTP');
            $mail->SMTPAuth   = true;
            $mail->Username   = Config::envReader('EMAIL_AKUN');
            $mail->Password   = Config::envReader('EMAIL_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = Config::envReader('EMAIL_PORT');

            /*
                Email seting
            */
            $mail->setFrom(Config::envReader('EMAIL_PENGIRIM'), Config::envReader('EMAIL_NAMA_PENGIRIM'));
            $mail->addAddress($tujuan);     // Penerima Email
            //---$mail->addAddress('ellen@example.com');               //Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //---$mail->addCC('cc@example.com');
            //---$mail->addBCC('bcc@example.com');

            //Attachments
            //---$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //---$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            /*
                Konten
            */
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $judul;
            $mail->Body    = $isi;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Email Terkirim';
        } catch (Exception $e) {
            echo "Email Tidak Terkirim: {$mail->ErrorInfo}";
        }
    }
}