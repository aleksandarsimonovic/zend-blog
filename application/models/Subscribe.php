<?php

class Application_Model_Subscribe extends Zend_Db_Table_Abstract {

    protected $_name = 'email_subscribers';

    public function getSubscribe($id) {
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Row not found $id");
        }
        return $row->toArray();
    }

    public function addSubscribe($email) {
        $data = array(
            'email' => $email,
            'date' => date('Y-m-d H-i-s'),
        );
        $this->insert($data);
    }

    public function updateSubscribe($id, $email) {
        $data = array(
            'email' => $email,
            'date' => date('Y-m-d H-i-s'),
        );
        $this->update($data, 'id = ' . (int) $id);
    }

    public function deleteSubscribe($id) {
        $this->delete('id =' . (int) $id);
    }

}
