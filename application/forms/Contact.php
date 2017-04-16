<?php

class Application_Form_Contact extends Zend_Form {

    public function init() {
        $this->setName('contact');

        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');

        $name = new Zend_Form_Element_Text('name');

        $name->setAttrib('placeholder', 'Name');
        $name->setLabel('Name')
                        ->setRequired(true)
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                ->class = ("form-control");


        $subject = new Zend_Form_Element_Text('subject');
        $subject->setAttrib('placeholder', 'Subject');
        $subject->setLabel('Subject')
                        ->setRequired(true)
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                ->class = ("form-control");


        $message = new Zend_Form_Element_Textarea('message');
        $message->setAttrib('placeholder', 'Message');
        $message->setLabel('Your message')
                        ->setAttrib('cols', '38')
                        ->setAttrib('rows', '12')
                        ->setRequired(true)
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                ->class = ("form-control");

        $captcha = new Zend_Form_Element_Captcha(
                'captcha', array('label' => 'Write the chars to the field',
            'captcha' => array(
                'captcha' => 'Image',
                'wordLen' => 6,
                'timeout' => 300,
                'font' => './fonts/OpenSans-Regular.ttf',
                'imgDir' => './images/',
                'imgUrl' => './images/',
                'width' => 300,
                'height' => 100,
                'dotNoiseLevel' => 40,
                'lineNoiseLevel' => 3
        )));
        $captcha->class = ("form-control");
        $captcha->setAttrib('placeholder', 'Write the chars to the field');
        $captcha->addErrorMessage("Wrong captcha.");


        $submit = new Zend_Form_Element_Submit('submit');
        $submit->class = ("btn btn-default");


        $this->addElements(array($id, $name, $subject, $message, $captcha, $submit));
    }

}
