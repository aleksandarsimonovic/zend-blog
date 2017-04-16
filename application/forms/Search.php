<?php

class Application_Form_Search extends Zend_Form {

    public function init() {


        $search = new Zend_Form_Element_Text('search');
        $search->setRequired(true)
                ->class = "form-control";
        $search->setAttrib('placeholder', 'Search posts');
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Search')
                ->class = "btn btn-default";

        $this->addElements(array($search, $submit));

        $this->setMethod('post');
    }

}
