<?php

class Application_Form_Login extends Zend_Form {

    public function init() {

        $username = new Zend_Form_Element_Text('username');
        $username->setRequired(true)
                  ->class = "form-control";
   
        $username->addValidator('Db_RecordExists', true, array
            ('table' => 'users', 'field' => 'username'));
        $username->getValidator('Db_RecordExists')
                ->setMessage('Entered username dont match database records!');
        $username->setAttrib('placeholder', 'Username');

        $password = new Zend_Form_Element_Password('password');
        $password->setRequired(true)
                ->addErrorMessage('Enter password!');
       
        $password->setAttrib('placeholder', 'Password')
                 ->class = "form-control";

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Login')
                 ->class = "btn btn-primary";
        

        $this->addElements(array($username, $password, $submit));

        $this->setMethod('post');
        $this->setAction('/user');
    }

}
