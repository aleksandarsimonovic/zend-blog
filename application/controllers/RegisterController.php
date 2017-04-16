<?php

class RegisterController extends Zend_Controller_Action
{

    public function init()
    {
          $this->_helper->layout->setLayout('login_layout');
    }

  public function indexAction() {
        $form = new Application_Form_Register();

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $username = $form->getValue('username');
                $salt = substr(SHA1(mt_rand()), 0, 40);
                $password = sha1($form->getValue('password') . $salt); 
                $first_name = $form->getValue('first_name');
                $last_name = $form->getValue('last_name');
                $email = $form->getValue('email');
                $phone_number = $form->getValue('phone_number');
                $role = 'user';
                $registration_date = time('d.m.Y H:i:s');
                $last_access = time('d.m.Y H:i:s');
                $register = new Application_Model_Users();
                $register->addUsers($username, $salt, $password, $first_name, $last_name, $email, $phone_number, $role, $registration_date,$last_access);
                $form->reset();
                $this->view->message = "You have been successfully registred!";
            } else {
                $form->populate($formData);
            }
        } $this->view->form = $form;
    }

}

