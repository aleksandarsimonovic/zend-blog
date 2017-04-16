<?php

abstract class BaseController extends Zend_Controller_Action {

    public function preDispatch() {
        $this->view->render('index/_menu.phtml');
    }

    public function postDispatch() {
        $this->view->render('index/_footer.phtml');
    }

}

