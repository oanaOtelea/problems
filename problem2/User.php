<?php
require 'DB.php';

class User extends DB {
    private $_tableName = 'users';
    
    public function insertUser($fields) {
        $this->insertRow($this->_tableName, array_keys($fields), ':name, :age, :job_title, :inserted_on, :last_updated', $fields);
    }

    public function findUserById($userId) {
        $this->findByUserId($userId, $_tableName);
    }

}