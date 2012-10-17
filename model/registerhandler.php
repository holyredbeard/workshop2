<?php

namespace Model;

class RegisterHandler {
    
    private $m_db = null;
    
    public function __construct(\Database\Database $db) {
        $this->m_db = $db;
    }
        
    public function DoRegister($fName, $lName, $SSN) {
        
        $query = "INSERT INTO member (fName, lName, ssn) VALUES (?, ?, ?)";
        
        $stmt = $this->m_db->Prepare($query);
        
        $stmt->bind_param('ssi', $fName, $lName, $SSN);
        
        $this->m_db->ExecuteQuery($stmt);
        
        $stmt->Close();
    }
}