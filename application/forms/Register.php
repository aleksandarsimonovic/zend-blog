<?php

class Application_Form_Register extends Zend_Form {

    public function init() {

        $username = new Zend_Form_Element_Text('username');
        $username->setLabel('Username')
                ->setRequired(TRUE)
                ->class = "form-control";
        
        $username_stringlength_validate = new Zend_Validate_StringLength(5, 15);
        $username->addValidator($username_stringlength_validate);
        $username->getValidator('Zend_Validate_StringLength')
                ->setMessage('Username must be betweem 5 and 15 characters!');
        $username->addValidator('Db_NoRecordExists', true, array
            ('table' => 'users', 'field' => 'username'));
        $username->getValidator('Db_NoRecordExists')
                ->setMessage('Username already exists in database!');


        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Password')
                ->setRequired(TRUE)
                ->class = "form-control";
        
        $password_stringlength_validate = new Zend_Validate_StringLength(5, 15);
        $password->addValidator($password_stringlength_validate);
        $password->getValidator('Zend_Validate_StringLength')
                ->setMessage('Password must be between 5 and 15 characters!');
        $password->addValidator('Db_NoRecordExists', true, array
            ('table' => 'users', 'field' => 'password'));
        $password->getValidator('Db_NoRecordExists')
                ->setMessage('User with this password already exists in database records.');


        $password_check = new Zend_Form_Element_Password('password_check');
        $password_check->setLabel('Confirm password')
                ->class = "form-control";
        $password_check->setRequired(true);
        $password_check->addValidator('Identical', false, array('token' => 'password'));
        $password_check->addErrorMessage('Entered passwords are not the same. Please try again!');


        $first_name = new Zend_Form_Element_Text('first_name');
        $first_name->setLabel('First name')
                ->setRequired(TRUE)
                ->addErrorMessage('Enter your first name!')
                ->class = "form-control";

        $last_name = new Zend_Form_Element_Text('last_name');
        $last_name->setLabel('Last name')
                ->setRequired(TRUE)
                ->addErrorMessage('Enter your last name!')
                ->class = "form-control";

        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email address')
                ->addValidator('EmailAddress')
                ->setRequired(TRUE)
                ->addErrorMessage('Please enter valid email address!')
                ->class = "form-control";
        $email->addValidator('Db_NoRecordExists', true, array
            ('table' => 'users', 'field' => 'email'));
        $email->getValidator('Db_NoRecordExists')
                ->setMessage('Email already exists in database records.');

        $phone_number = new Zend_Form_Element_Text('phone_number');
        $phone_number->setLabel('Phone number')
                ->setRequired(TRUE)
                ->addErrorMessage('Please enter your phone number!')
                ->class = "form-control";

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Register')
                ->class = "btn btn-primary";
       

        $this->addElements(array($username, $password, $password_check, $first_name, $last_name, $email, $phone_number, $submit));

        $this->setMethod('post');
        $this->setAction('/register');
    }

}
