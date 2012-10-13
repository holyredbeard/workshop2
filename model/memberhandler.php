<?php

namespace Model;

class MemberHandler {
    
    private $m_db = null;
    
    public function __construct(\Database\Database $db) {
        $this->m_db = $db;
    }
    
    public function GetMembers() {
        $members = array();
        
        $query = "SELECT * FROM member";
        $stmt = $this->m_db->Prepare($query);
        $members = $this->m_db->GetAllMembers($stmt);
        
        return $members;
    }
    
    public function DeleteMember($member) {
        $query = "DELETE FROM member WHERE id=?";
        
        $stmt = $this->m_db->Prepare($query);
        $stmt->bind_param("i", $member);
        
        $this->m_db->DeleteQuery($stmt);
        
        $stmt->Close();
    }

    public function ChangeInfo($id) {
        echo 'change';
    }
}