<?php
namespace Model;

class RegisterBoatHandler {

	private $m_db = null;

	public function __construct(\Database\Database $db) {
		$this->m_db = $db;
	}

	public function DoRegisterBoat($memberId, $type, $length) {

        $query = "INSERT INTO boat (boatTypeId, length, memberId) VALUES (?, ?, ?)";
        $stmt = $this->m_db->Prepare($query);
    	$stmt->bind_param('iii', $type, $length, $memberId);
        $this->m_db->ExecuteQuery($stmt);
        $stmt->Close();
	}
}