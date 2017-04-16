<?php

class Application_Model_RolesMapper {

    protected $_dbTable;

    public function setDbTable($dbTable) {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid data table!');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable() {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Roles');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_Roles $roles) {
        $data = array(
            'role' => $roles->getRole()
        );
        if (null === ($id = $roles->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    public function find($id, Application_Model_Roles $roles) {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $roles->setId($row->id)
                ->setrole($row->roles);
    }

    public function fetch($id) {
        $table = $this->getDbTable();
        $select = $table->select();
        $select->from($table)
                ->where("id = " . $id);
        $result = $this->processResultSet($table->fetchAll($select));
        foreach ($result as $r) {
            return $r;
        }
    }

    public function fetchAll($query = null) {
        if ($query == null) {
            $resultSet = $this->getDbTable()->fetchAll();
        } else {
            $resultSet = $this->getDbTable()->fetchAll($query);
        }
        return $this->processResultSet($resultSet);
    }

    private function processResultSet($resultSet) {
        $entries = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Roles();
            $entry->setId($row->id);
            $entry->setrole($row->role);
            $entries[] = $entry;
        }
        return $entries;
    }

    public function delete($id) {
        $table = $this->getDbTable();
        $table->delete("id = $id");
    }

}
