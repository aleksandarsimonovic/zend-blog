<?php

class Application_Form_Users extends Zend_Form {

    public function init() {
        $this->setName('users');

        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');

        $username = new Zend_Form_Element_Text('username');
        $username->class=("form-control");
        $username->setLabel('Username')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty')
                ->addErrorMessage('Enter username!');

        $password = new Zend_Form_Element_Text('password');
        $password->class=("form-control");
        $password->setLabel('Password')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty')
                ->addErrorMessage('Enter password!');

        $first_name = new Zend_Form_Element_Text('first_name');
        $first_name->class=("form-control");
        $first_name->setLabel('First name')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty')
                ->addErrorMessage('Enter first name!');

        $last_name = new Zend_Form_Element_Text('last_name');
        $last_name->class=("form-control");
        $last_name->setLabel('Last name')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty')
                ->addErrorMessage('Enter last name!');

        $email = new Zend_Form_Element_Text('email');
        $email->class=("form-control");
        $email->setLabel('email')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty')
                ->addErrorMessage('Enter email!');

        $phone_number = new Zend_Form_Element_Text('phone_number');
        $phone_number->class=("form-control");
        $phone_number->setLabel('Phone number')
                 
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty')
                ->addErrorMessage('Enter phone number!');

        $options = array();
        $type = new Application_Model_RolesMapper();
        $options[''] = '';
        foreach ($type->fetchAll() as $value) {
            $options[$value->getrole()] = $value->getrole();
        }

        $role = new Zend_Form_Element_Select('role');
        $role->class=("form-control");
        $role->setLabel('Role')
                ->setRequired(true)
                
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setMultiOptions($options)
                ->addValidator('NotEmpty')
                ->addErrorMessage('Choose role!');

        $submit = new Zend_Form_Element_Submit('submit');
          $submit->class=("btn btn-primary");
        $submit->setAttrib('id', 'submitbutton');
      
        $this->addElements(array($id, $username, $password, $first_name, $last_name, $email, $phone_number, $role, $submit));
    }

}
