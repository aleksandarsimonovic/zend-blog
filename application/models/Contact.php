<?php

class Application_Model_Contact extends Zend_Db_Table_Abstract {

    protected $_name = 'messages';

    public function getContact($id) {
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Row not found $id");
        }
        return $row->toArray();
    }

    public function addContact($name, $subject, $message) {
        $data = array(
            'name' => $name,
            'subject' => $subject,
            'message' => $message,
            'date' => date('Y-m-d H-i-s'),
        );
        $this->insert($data);
    }

    public function updateContact($id, $name, $subject, $message) {
        $data = array(
            'name' => $name,
            'subject' => $subject,
            'message' => $message,
            'date' => date('Y-m-d H-i-s'),
        );
        $this->update($data, 'id = ' . (int) $id);
    }

    public function deleteContact($id) {
        $this->delete('id =' . (int) $id);
    }

}
