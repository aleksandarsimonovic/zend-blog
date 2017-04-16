<?php

class Application_Form_Subscribe extends Zend_Form {

    public function init() {
        $this->setName('email_subscribers');

        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');

        $email = new Zend_Form_Element_Text('email');
        $email->setAttrib('placeholder', 'Your email adrres');
        $email->setLabel('Subscribe for blog updates')
                        ->setRequired(true)
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addValidator('EmailAddress')
                ->class = ("form-control");
        $email->addValidator('Db_NoRecordExists', true, array
            ('table' => 'email_subscribers', 'field' => 'email'));
        $email->getValidator('Db_NoRecordExists')
                ->setMessage('You are already subscribed.');


        $submit = new Zend_Form_Element_Submit('Subscribe');
        $submit->class = ("btn btn-default");
       

        $this->addElements(array($id, $email, $submit));
    }

}
