<?php
require_once 'BaseController.php';
class IndexController extends BaseController {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {

        $form = new Application_Form_Subscribe();
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $email = $form->getValue('email');
                $date = time('d.m.Y H:i:s');
                $subscribe = new Application_Model_Subscribe();
                $subscribe->addSubscribe($email, $date);
                $form->reset();
                $this->view->message = "U have succesfully subscribed to our email campaign";
            } else {
                $form->populate($formData);
            }
        } $this->view->form = $form;

    }
    

}
