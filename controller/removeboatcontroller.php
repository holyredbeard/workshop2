<?php
namespace Controller;

require_once('Model/removeboathandler.php');
require_once('View/removeboatview.php');

class RemoveBoatController {

	public function DoControl(\Database\Database $db) {

		$removeBoatHandler = new \Model\RemoveBoatHandler($db);
		$removeBoatView = new \View\RemoveBoatView();
		$outputHTML = '';

		// clicked remove button to remove boat
		if ($removeBoatView->UserClickedRemove()) {
			// get id of boat to remove
			$boatId = $removeBoatView->GetBoatId();
			// remove boat
			$removeBoatHandler->RemoveBoat($boatId);
		}
	}

}