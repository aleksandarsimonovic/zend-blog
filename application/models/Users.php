<?php

class Application_Model_Users extends Zend_Db_Table_Abstract {

    protected $_name = 'users';

    public function getUsers($id) {
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }
 public function addUsers($username, $salt, $password, $first_name, $last_name, $email,$phone_number, $role) {
        $data = array(
            'username' => $username,
            'salt' => $salt,
            'password' => $password,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone_number' => $phone_number,
            'role' => $role,
            'registration_date' => date('Y-m-d H-i-s'),
            'last_access' => date('Y-m-d H-i-s'),
        );
        $this->insert($data);
    }
    public function updateUsers($id, $username, $salt, $password, $first_name, $last_name, $email,$phone_number, $role) {
        $data = array(
            'username' => $username,
            'salt' => $salt,
            'password' => $password,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone_number' => $phone_number,
            'role' => $role,
            'registration_date' => date('Y-m-d H-i-s'),
            'last_access' => date('Y-m-d H-i-s'),
        );
        $this->update($data, 'id = ' . (int) $id);
    }

    public function deleteUsers($id) {
        $this->delete('id =' . (int) $id);
    }

}
