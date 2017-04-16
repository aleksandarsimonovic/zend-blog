<?php

class Application_Form_Comments extends Zend_Form {

    public function init() {
        $this->setName('comments');

        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');

        $comment = new Zend_Form_Element_Textarea('comment');
        $comment->setLabel('Your comment')
                        ->setAttrib('cols', '30')
                        ->setAttrib('rows', '4')
                        ->setRequired(true)
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                ->class = ("form-control");

           
        $submit = new Zend_Form_Element_Submit('Submit');
        $submit->class = ("btn btn-default");
        $submit->setAttrib('id', 'submitbutton');

        $this->addElements(array($id, $comment, $submit));
    }

}
