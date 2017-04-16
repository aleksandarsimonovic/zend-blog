<?php

class Application_Model_Comments extends Zend_Db_Table_Abstract {

    protected $_name = 'comments';

    public function getComments($id) {
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }

    public function addComments($name, $comment, $id_article, $status) {
        $data = array(
            'name' => $name,
            'comment' => $comment,
            'id_article' => $id_article,
            'submited_on' => date('Y/m/d H:i:s'),
            'status' => $status,
        );
        $this->insert($data);
    }

    public function updateComments($id, $name, $comment, $id_article, $status) {
        $data = array(
            'id' => $id,
            'name' => $name,
            'comment' => $comment,
            'id_article' => $id_article,
            'submited_on' => date('Y/m/d H:i:s'),
            'status' => $status,
        );
        $this->update($data, 'id = ' . (int) $id);
    }

    public function deleteComments($id) {
        $this->delete('id =' . (int) $id);
    }

}
