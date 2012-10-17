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

    public function GetMember($id) {
        $memberInfo = array();

        $query = "SELECT * FROM member WHERE id=?";

        $stmt = $this->m_db->Prepare($query);
        $stmt->bind_param("i", $id);

        $memberInfo = $this->m_db->GetMemberInfo($stmt);

        return $memberInfo;
    }
    
    public function DeleteMember($member) {
        $query = "DELETE FROM member WHERE id=?";
        
        $stmt = $this->m_db->Prepare($query);
        $stmt->bind_param("i", $member);
        
        $this->m_db->ExecuteQuery($stmt);
    }

    public function ChangeInfo($userInfo) {
        $id = $userInfo[0];
        $fName = $userInfo[1];
        $lName = $userInfo[2];
        $SSN = $userInfo[3];

        $query = "UPDATE member SET fname=?, lname=?, ssn=? WHERE id=?";
        
        $stmt = $this->m_db->Prepare($query);
        $stmt->bind_param("ssii", $fName, $lName, $SSN, $id);
        
        $this->m_db->ChangeQuery($stmt);
    }
}