<?php

require_once 'BaseController.php';

class ContactController extends BaseController {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $form = new Application_Form_Contact();
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $name = $form->getValue('name');
                $subject = $form->getValue('subject');
                $message = $form->getValue('message');
                $date = time('d.m.Y H:i:s');
                $contact = new Application_Model_Contact();
                $contact->addContact($name, $subject, $message, $date);
                $this->view->message = 'Message sent, thanks for reaching me.';
                require 'PHPMailerAutoload.php';
                $mail = new PHPMailer;
                $mail->isSMTP();
                $mail->Host = 'host';
                $mail->SMTPDebug = 1;
                $mail->SMTPAuth = true;
                $mail->Username = 'admin@admin.com';
                $mail->Password = 'pass';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 25;
                $mail->CharSet = 'UTF-8';
                $mail->setFrom('from@example.com', 'First Last');
                $mail->addAddress('to@example.rs', 'First Last');
                $mail->addReplyTo('replyto@example.com', 'First Last');
                $mail->isHTML(true);
                $mail->Subject = 'contact form - clean blog';
                $mail->Body = '' . $message . '';
                if (!$mail->send()) {
                    $this->view->errmessage = 'Message not sent' . $mail->ErrorInfo;
                }
                $form->reset();
            } else {
                $form->populate($formData);
            }
        }
    }

}
