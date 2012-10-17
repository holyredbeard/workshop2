<?php
namespace Controller;

require_once('Model/boathandler.php');
require_once('View/boatview.php');

class BoatController {

	private $m_db = null;
	private $m_boatHandler = null;
	private $m_boatView = null;

	public function __construct(\Database\Database $db) {
		$this->m_db = $db;
		$this->m_boatHandler = new \Model\BoatHandler($db);
		$this->m_boatView = new \View\BoatView();
	}

	public function DoControlRegister() {
		// REGISTER
		$outputHTML = '';
		$outputHTML .= $this->m_boatView->DoRegisterBox();

		if ($this->m_boatView->UserClickedRegister()) {
			// get userId, boatType, boatLength
			$userId = $this->m_boatView->GetUserId();
			$type = $this->m_boatView->GetBoatType();
			$length = $this->m_boatView->GetBoatLength();
			// register boat
			$this->m_boatHandler->DoRegisterBoat($userId, $type, $length);
		}

		return $outputHTML;

	}

	public function DoControlRemove() {
		// REMOVE 
		// clicked remove button to remove boat
		if ($this->m_boatView->UserClickedRemove()) {
			// get id of boat to remove
			$boatId = $this->m_boatView->GetBoatId();
			// remove boat
			$this->m_boatHandler->RemoveBoat($boatId);
		}

	}

}