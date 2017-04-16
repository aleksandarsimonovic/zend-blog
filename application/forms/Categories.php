<?php

class Application_Form_Categories extends Zend_Form {

    public function init() {
        $this->setName('categories');

        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');

        $category = new Zend_Form_Element_Text('category');
        $category->setLabel('Category')
                        ->setRequired(true)
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                ->class = ("form-control");

        $cat_desc = new Zend_Form_Element_CKEditor('cat_desc');
        $cat_desc->setLabel('Category description');
        $cat_desc->setRequired(true)
                ->addValidator('NotEmpty')
                ->addErrorMessage('Enter category description !');


        $category_tags = new Zend_Form_Element_Text('category_tags');
        $category_tags->setRequired(false)
                        ->setLabel('Tags with , between')
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addErrorMessage('Tags with , in between !')
                ->class = "form-control";



        $file = new Zend_Form_Element_File('file');
        $file->class = "btn btn-default";
        $file->setDestination('./images/category-images')
                ->setMaxFileSize(2097152)
                ->setDescription('Add category cover picture !');

        //$file->addValidator('Count', false, 1);
        $file->addValidator('Size', false, 10240000);
        $file->addValidator('Extension', false, 'jpg,jpeg,png,gif');

        $submit = new Zend_Form_Element_Submit('Submit');
        $submit->class = ("btn btn-default");
        $submit->setAttrib('id', 'submitbutton');

        $this->addElements(array($id, $category, $cat_desc, $category_tags, $file, $submit));
    }

}
