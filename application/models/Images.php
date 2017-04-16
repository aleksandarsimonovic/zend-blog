<?php

class Application_Model_Images extends Zend_Db_Table_Abstract {

    protected $_name = 'images';

    public function getImages($id) {
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Row not found $id");
        }
        return $row->toArray();
    }

    public function addImages($id_article, $image_name, $image_path) {
        $data = array(
            'id_article' => $id_article,
            'image_name' => $image_name,
            'image_path' => $image_path,
        );
        $this->insert($data);
    }

    public function deleteImages($id) {
        $this->delete('id =' . (int) $id);
    }

}
