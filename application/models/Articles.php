<?php

class Application_Model_Articles extends Zend_Db_Table_Abstract {

    protected $_name = 'articles';

    public function getArticles($id) {
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Not found row $id");
        }
        return $row->toArray();
    }

    public function addArticles($subject, $body, $category, $tags, $image_name) {
        $data = array(
            'subject' => $subject,
            'body' => $body,
            'category' => $category,
            'tags' => $tags,
            'image_name' => $image_name,
            'date' => date('Y-m-d H-i-s'),
        );
        $this->insert($data);
    }

    public function updateArticles($id, $subject, $body, $category, $tags, $image_name) {
        $data = array(
            'subject' => $subject,
            'body' => $body,
            'category' => $category,
            'tags' => $tags,
            'image_name' => $image_name,
            'date' => date('Y-m-d H-i-s'),
        );
        $this->update($data, 'id = ' . (int) $id);
    }

    public function deleteArticles($id) {
        $this->delete('id =' . (int) $id);
    }

}
