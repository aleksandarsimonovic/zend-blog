<?php

require_once 'BaseController.php';

class ArticlesController extends BaseController {

    public function init() {
        
    }

    public function indexAction() {
        $adapter = Zend_Db_Table::getDefaultAdapter();
        $select = $adapter->select()->from('articles')
                ->order("id DESC");
        $result = $adapter->query($select);
        $articles = array();
        foreach ($result->fetchAll() as $row) {
            $articles[] = array('id' => $row['id'], 'subject' => $row['subject'], 'body' => $row['body'], 'image_name' => $row['image_name'], 'category' => $row['category'], 'tags' => $row['tags'], 'date' => $row['date']);
        }
        $this->view->articles = $articles;

        $paginator = new Zend_Paginator(new Zend_Paginator_Adapter_Array($articles));
        $paginator->setItemCountPerPage(3)
                ->setCurrentPageNumber($this->_getParam('page', 1));
        $this->view->paginator = $paginator;


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
                $poruka = "Nothing has been found !";
                $this->view->poruka = $poruka;
                $pretragaform->populate($formData);
            }
        } $this->view->pretragaform = $pretragaform;




        $select2 = $adapter->select()
                ->from('articles')
                ->order("id DESC")
                ->limit(4);
        $result2 = $adapter->query($select2);
        $articles2 = array();
        foreach ($result2->fetchAll() as $row2) {
            $articles2[] = array(
                'id' => $row2['id'],
                'subject' => $row2['subject'],
                'body' => $row2['body'],
                'category' => $row2['category'],
                'image_name' => $row2['image_name'],
                'date' => $row2['date']);
        }
        $this->view->articles2 = $articles2;
    }

    public function detailsAction() {
        $id = $this->_getParam('id', 0);
        $articles = new Application_Model_Articles();
        $this->view->articles = $articles->getArticles($id);


//        $form = new Application_Form_Comments();
//        if ($this->getRequest()->isPost()) {
//            $formData = $this->getRequest()->getPost();
//            if ($form->isValid($formData)) {
//                $logged = Zend_Auth::getInstance();
//                $user = $logged->getIdentity();
//                $name = $user->username;
//                $comment = $form->getValue('comment');
//                $id_article = $id;
//                $comments = new Application_Model_Comments();
//                $comments->addComments($name, $comment, $id_article);
//                $form->reset();
//                $this->view->message = "You have succesfully submited comment!";
//            } else {
//                $form->populate($formData);
//            }
//        } $this->view->form = $form;
//
//
//
        $adapter = Zend_Db_Table::getDefaultAdapter();
//        $select = $adapter->select()
//                ->from('comments')
//                ->join('articles', 'comments.id_article=articles.id')
//                ->where('comments.id_article=?', $id);
//
//
//        $result = $adapter->query($select);
//        $comments = array();
//        foreach ($result->fetchAll() as $row) {
//            $comments[] = array('name' => $row['name'], 'comment' => $row['comment'], 'submited_on' => $row['submited_on'], 'status' => $row['status']);
//        }
//        $this->view->comments = $comments;


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
                $poruka = "Nothing has been found !";
                $this->view->poruka = $poruka;
                $pretragaform->populate($formData);
            }
        } $this->view->pretragaform = $pretragaform;




        $select2 = $adapter->select()
                ->from('articles')
                ->order("id DESC")
                ->limit(4);
        $result2 = $adapter->query($select2);
        $articles2 = array();
        foreach ($result2->fetchAll() as $row2) {
            $articles2[] = array(
                'id' => $row2['id'],
                'subject' => $row2['subject'],
                'body' => $row2['body'],
                'category' => $row2['category'],
                'image_name' => $row2['image_name'],
                'date' => $row2['date']);
        }
        $this->view->articles2 = $articles2;
    }

}
