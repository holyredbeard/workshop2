<?php
namespace Model;

class RemoveBoatHandler {

	private $m_db = null;

	public function __construct(\Database\Database $db) {
		$this->m_db = $db;
	}

	public function RemoveBoat($boatId) {
		$query = "DELETE FROM boat WHERE boatId = ?";
        $stmt = $this->m_db->Prepare($query);
    	$stmt->bind_param('i', $boatId);
    	$stmt->execute();
        $stmt->Close();
	}
}