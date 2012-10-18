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
                3 => array(),
                4 => array()
            );
        
        $stmt->execute();
        
        $stmt->bind_result($id, $fname, $lname, $ssn, $boats);
        
        while ($stmt->fetch()) {
            array_push($members[0], $id);
            array_push($members[1], $fname);
            array_push($members[2], $lname);
            array_push($members[3], $ssn);
            array_push($members[4], $boats);
        }
        
        $stmt->Close();
        
        return $members;
    }

    public function GetBoats($stmt) {
    $boats = array(
            0 => array(),
            1 => array(),
            2 => array()
        );
    
    $stmt->execute();
    
    //Bind the $ret parameter so when we call fetch it gets its value
    if ($stmt->bind_result($boatId, $length, $type) == FALSE) {
        throw new \Exception($this->mysqli->error);
    }

    while ($stmt->fetch()) {
        array_push($boats[0], $boatId);
        array_push($boats[1], $length);
        array_push($boats[2], $type);
    }
    
    $stmt->Close();
    
    return $boats;
}

    public function ExecuteQuery($stmt) {
    	
        //execute the statement
        if ($stmt->execute() == FALSE) {
            throw new \Exception($this->mysqli->error);
        }
    }

    public function GetMemberInfo($stmt) {

        $userInfo = array();
        
        if ($stmt->execute() == false) {
            throw new \Exception($this->mysqli->error);
        }  
        
        //Bind the $ret parameter so when we call fetch it gets its value
        if ($stmt->bind_result($id, $fName, $lName, $SSN) == FALSE) {
            throw new \Exception($this->mysqli->error);
        }

        while ($stmt->fetch()) {
            $userInfo[] = $id;
            $userInfo[] = $fName;
            $userInfo[] = $lName;
            $userInfo[] = $SSN;
        }

        return $userInfo;
    }

    public function GetBoatInfo($stmt) {

        $boatInfo = array();
        
        if ($stmt->execute() == false) {
            throw new \Exception($this->mysqli->error);
        }  
        
        //Bind the $ret parameter so when we call fetch it gets its value
        if ($stmt->bind_result($length, $type) == FALSE) {
            throw new \Exception($this->mysqli->error);
        }

        while ($stmt->fetch()) {
            $boatInfo[] = $length;
            $boatInfo[] = $type;
        }

        return $boatInfo;
    }

    public function Close() {
        return $this->mysqli->close();
    }
}