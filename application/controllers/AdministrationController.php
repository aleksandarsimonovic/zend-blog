<?php

class AdministrationController extends Zend_Controller_Action {

    public function preDispatch() {
        $this->view->render('administration/_menu.phtml');
    }

    public function postDispatch() {
        $this->view->render('administration/_footer.phtml');
    }

    public function init() {
        $this->_helper->layout->setLayout('administration_layout');
        $logged = Zend_Auth::getInstance();
        $user = $logged->getIdentity();
        if (!$logged->hasIdentity() || $user->role != "administrator") {
            $this->_redirect('/user');
        }
    }

    public function indexAction() {
        $pretragaform = new Application_Form_Search();
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($pretragaform->isValid($formData)) {
                $search = $pretragaform->getValue('search');

                $adapter = Zend_Db_Table::getDefaultAdapter();
                $select = $adapter->select()
                        ->from('articles')
                        ->where("subject LIKE '%$search%'");

                $result = $adapter->query($select);
                $results = array();
                foreach ($result->fetchAll() as $row) {
                    $results[] = array(
                        'id' => $row['id'],
                        'subject' => $row['subject'],
                        'body' => $row['body'],
                        'category' => $row['category'],
                        'image_name' => $row['image_name'],
                        'date' => $row['date']);
                }
                $this->view->results = $results;
            } else {
                $poruka = "Nema rezultata pretrage !";
                $this->view->poruka = $poruka;
                $pretragaform->populate($formData);
            }
        } $this->view->pretragaform = $pretragaform;
    }

    //Users

    public function listusersAction() {
        $users = new Application_Model_Users();
        $paginator = Zend_Paginator::factory($users->fetchAll());
        $paginator->setItemCountPerPage(2)
                ->setCurrentPageNumber($this->_getParam('page', 1));
        $this->view->paginator = $paginator;
    }

    public function listmessagesAction() {
        $messages = new Application_Model_Contact();
        $paginator = Zend_Paginator::factory($messages->fetchAll());
        $paginator->setItemCountPerPage(2)
                ->setCurrentPageNumber($this->_getParam('page', 1));
        $this->view->paginator = $paginator;
    }

    public function editusersAction() {
        $form = new Application_Form_Users();
        $form->submit->setLabel('Edit users');
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = (int) $form->getValue('id');
                $username = $form->getValue('username');
                $salt = substr(SHA1(mt_rand()), 0, 40);
                $password = sha1($form->getValue('password') . $salt);
                $first_name = $form->getValue('first_name');
                $last_name = $form->getValue('last_name');
                $email = $form->getValue('email');
                $phone_number = $form->getValue('phone_number');
                $role = $form->getValue('role');
                $users = new Application_Model_Users();
                $users->updateUsers($id, $username, $salt, $password, $first_name, $last_name, $email, $phone_number, $role);
                $this->_helper->redirector('listusers');
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                $users = new Application_Model_Users();
                $form->populate($users->getUsers($id));
            }
        }
    }

    public function deleteusersAction() {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Yes') {
                $id = $this->getRequest()->getPost('id');

                if ($id === 1) {

                    $this->_helper->redirector('listusers');
                } else {
                    $users = new Application_Model_Users();
                    $users->deleteUsers($id);
                }
            }
            $this->_helper->redirector('listusers');
        } else {
            $id = $this->_getParam('id', 0);
            $users = new Application_Model_Users();
            $this->view->users = $users->getUsers($id);
        }
    }

    public function deletemessagesAction() {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Yes') {
                $id = $this->getRequest()->getPost('id');
                $messages = new Application_Model_Contact();
                $messages->deleteContact($id);
            }
            $this->_helper->redirector('listmessages');
        } else {
            $id = $this->_getParam('id', 0);
            $messages = new Application_Model_Contact();
            $this->view->messages = $messages->getContact($id);
        }
    }

    public function listcommentsAction() {
          $comments = new Application_Model_Comments();
        $paginator = Zend_Paginator::factory($comments->fetchAll());
        $paginator->setItemCountPerPage(2)
                ->setCurrentPageNumber($this->_getParam('page', 1));
        $this->view->paginator = $paginator;
    }

    public function deletecommentsAction() {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Yes') {
                $id = $this->getRequest()->getPost('id');
                $comments = new Application_Model_Comments();
                $comments->deleteComments($id);
            }
            $this->_helper->redirector('listcomments');
        } else {
            $id = $this->_getParam('id', 0);
            $comments = new Application_Model_Comments();
            $this->view->comments = $comments->getComments($id);
        }
    }

    //Articles

    public function listarticlesAction() {
        $articles = new Application_Model_Articles();
        $paginator = Zend_Paginator::factory($articles->fetchAll());
        $paginator->setItemCountPerPage(4)
                ->setCurrentPageNumber($this->_getParam('page', 1));
        $this->view->paginator = $paginator;
    }

    public function addcategoriesAction() {

        $formcategories = new Application_Form_Categories();
        $this->view->formcategories = $formcategories;
        $adapter = Zend_Db_Table::getDefaultAdapter();
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($formcategories->isValid($formData)) {
                $id = (int) $formcategories->getValue('id');
                $category = $formcategories->getValue('category');
                $cat_desc = $formcategories->getValue('cat_desc');
                $category_tags = $formcategories->getValue('category_tags');
                $data = array('id' => $id, 'category' => $category, 'cat_desc' => $cat_desc, 'category_tags' => $category_tags);
                $adapter->insert('article_category', $data);
            }
        }
    }

    public function addarticlesAction() {

        $form = new Application_Form_Articles();
        $form->submit->setLabel('Add article');
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $subject = $form->getValue('subject');
                $body = $form->getValue('body');
                $category = $form->getValue('category');
                $tags = $form->getValue('tags');

                $upload = new Zend_File_Transfer_Adapter_Http();
                $files = $upload->getFileInfo();
                foreach ($files as $file => $fileInfo) {
                    if ($upload->isUploaded($file)) {
                        if ($upload->isValid($file)) {
                            if ($upload->receive($file)) {
                                $image_info = $upload->getFileInfo($file);
                                $image_path = $image_info[$file]['tmp_name'];
                                $image_name = basename($image_path);
                                $id_article = $form->getValue('id');
                                $images = new Application_Model_Images();
                                $images->addImages($id_article, $image_name, $image_path);




                                $upload->receive($file);
                            }
                        }
                    }
                }


                $date = time('d.m.Y H:i:s');
                $articles = new Application_Model_Articles();
                $articles->addArticles($subject, $body, $category, $tags, $image_name, $date);


                $this->_helper->redirector('listarticles');
            } else {
                $form->populate($formData);
            }
        }
    }

    public function editarticlesAction() {
        $form = new Application_Form_Articles();
        $form->submit->setLabel('Edit articles');
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = (int) $form->getValue('id');
                $subject = $form->getValue('subject');
                $body = $form->getValue('body');
                $category = $form->getValue('category');
                $tags = $form->getValue('tags');
                $form->file->receive();
                $image_path = $form->file->getFileName();
                $image_name = basename($image_path);
                $date = time('d.m.Y H:i:s');
                $articles = new Application_Model_Articles();
                $articles->updateArticles($id, $subject, $body, $category, $tags, $image_name, $date);

                $this->_helper->redirector('listarticles');
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                $articles = new Application_Model_Articles();
                $form->populate($articles->getArticles($id));
            }
        }
    }

    function deletearticlesAction() {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Yes') {
                $id = $this->getRequest()->getPost('id');
                $articles = new Application_Model_Articles();
                $articles->deleteArticles($id);
            }
            $this->_helper->redirector('listarticles');
        } else {
            $id = $this->_getParam('id', 0);
            $articles = new Application_Model_Articles();
            $this->view->articles = $articles->getArticles($id);
        }
    }

}
