<?php

class UserController extends Zend_Controller_Action {

    public function init() {
       $this->_helper->layout->setLayout('login_layout');
    }

    public function indexAction() {
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $this->_redirect('index');
        }
        $request = $this->getRequest();
        $form = new Application_Form_Login();
        if ($request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $authAdapter = $this->getAuthAdapter();
                $username = $form->getValue('username');
                $password = $form->getValue('password');
                $authAdapter->setIdentity($username)
                        ->setCredential($password);
                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);
                if ($result->isValid()) {
                    $identity = $authAdapter->getResultRowObject();
                    $authStorage = $auth->getStorage();
                    $authStorage->write($identity);
                    $logged = Zend_Auth::getInstance();
                    $user = $logged->getIdentity();
                
                    if (!$logged->hasIdentity() || $user->role == "administrator") {
                        $this->_redirect('administration');
                    } else {
                        $this->_redirect('index');
                        
                    }
                } else {
                    $this->view->login_error = 'Wrong username or password !';
                }
            }
        }
        $this->view->form = $form;
    }

    public function logoutAction() {
        $adapter = Zend_Db_Table::getDefaultAdapter();
        $logged = Zend_Auth::getInstance();
        $user = $logged->getIdentity();
        $id_user_sesion = $user->id;
        $data = array('last_access' => date('Y-m-d H-i-s'));
        $adapter->update('users', $data, "id = $id_user_sesion");
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('index');
    }

    private function getAuthAdapter() {
        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $authAdapter->setTableName('users')
                ->setIdentityColumn('username')
                ->setCredentialColumn('password')
                ->setCredentialTreatment('SHA1(CONCAT(?,salt))');
        return $authAdapter;
    }

}
