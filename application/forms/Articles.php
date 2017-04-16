<?php

class Application_Form_Articles extends Zend_Form {

    public function init() {
        $this->setName('articles');

        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');

        $subject = new Zend_Form_Element_Text('subject');
        $subject->setRequired(true)
                        ->setLabel('Subject')
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addErrorMessage('Enter subject of the article!')
                ->class = "form-control";


        $body = new Zend_Form_Element_CKEditor('body');
        $body->setLabel('Body');
        $body->setRequired(true)
                ->addValidator('NotEmpty')
                ->addErrorMessage('Enter article body!');



        $options = array();
        $type = new Application_Model_CategoryMapper();
        $options[''] = '';
        foreach ($type->fetchAll() as $value) {
            $options[$value->getcategory()] = $value->getcategory();
        }

        $category = new Zend_Form_Element_Select('category');
        $category->class = "form-control";
        $category->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setMultiOptions($options)
                ->addValidator('NotEmpty')
                ->setDescription('Chose article category')
                ->addErrorMessage('Please select category!');

        $tags = new Zend_Form_Element_Text('tags');
        $tags->setRequired(false)
                        ->setLabel('Tags with , between')
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addErrorMessage('Tags with , in between !')
                ->class = "form-control";



        $file = new Zend_Form_Element_File('file');
        $file->class = "btn btn-default";
        $file->setDestination('./images/article-images')
                ->setRequired(true)
                ->setMaxFileSize(2097152)
                ->setDescription('Add article cover picture !');

        //$file->addValidator('Count', false, 1);
        $file->addValidator('Size', false, 10240000);
        $file->setAttrib('multiple', 'multiple');
        $file->addValidator('Extension', false, 'jpg,jpeg,png,gif');


        $submit = new Zend_Form_Element_Submit('submit');
        $submit->class = "btn btn-primary";
        $submit->setAttrib('id', 'submitbutton');

        $this->addElements(array($id, $subject, $body, $category, $tags, $file, $submit));
    }

}
