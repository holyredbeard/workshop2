<?php
namespace Model;

class BoatHandler {

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

	public function RemoveBoat($boatId) {
		$query = "DELETE FROM boat WHERE boatId = ?";
        $stmt = $this->m_db->Prepare($query);
    	$stmt->bind_param('i', $boatId);
    	$stmt->execute();
        $stmt->Close();
	}

	public function GetInfoOnBoat($boatId) {
		$boatInfo = array();
        $query = "SELECT b.length, bt.type 
        			FROM boat AS b 
        			INNER JOIN boatType AS bt
        			ON b.boatTypeId = bt.boatTypeId
        			WHERE b.boatId = ?";

        $stmt = $this->m_db->Prepare($query);
        $stmt->bind_param("i", $boatId);

        $boatInfo = $this->m_db->GetBoatInfo($stmt);

        return $boatInfo;
	}
}