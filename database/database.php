<?php

namespace Database;

class Database {
    
    private $mysqli = NULL;

    public function Connect(DBConfig $config) {
            $this->mysqli = new \mysqli(
            $config->m_host,
            $config->m_user,
            $config->m_pass,
            $config->m_db
        );

        if ($this->mysqli->connect_error) {
            throw new Exception($this->mysqli->connect_error);
        }

        $this->mysqli->set_charset("utf8");

        return true;
    }
    
    public function Prepare($query) {
        $ret = $this->mysqli->prepare($query);
        
        if ($ret === false) {
            throw new \Exception($this->mysqli->error);
        }
        
        return $ret;
    }
    
    public function GetAllMembers($stmt) {
        $members = array(
                0 => array(),
                1 => array(),
                2 => array(),
                3 => array()
            );
        
        $stmt->execute();
        
        $stmt->bind_result($id, $fname, $lname, $ssn);
        
        while ($stmt->fetch()) {
            array_push($members[0], $id);
            array_push($members[1], $fname);
            array_push($members[2], $lname);
            array_push($members[3], $ssn);
        }
        
        $stmt->Close();
        
        return $members;
    }

    public function DeleteQuery($stmt) {
    	
        //execute the statement
        if ($stmt->execute() == FALSE) {
            throw new \Exception($this->mysqli->error);
            echo $this->mysqli->error;
        }
    }
        
    public function InsertQuery($stmt) {
        $stmt->execute();
        
        $stmt->insert_id;
    }
        
    public function ChangeQuery() {
        // ...
    }
    
    public function GetMemberInfo() {
        //...
    }
    
    public function Close() {
        return $this->mysqli->close();
    }
}