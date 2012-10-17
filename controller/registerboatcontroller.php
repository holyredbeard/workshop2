<?php
namespace Controller;

require_once('Model/registerboathandler.php');
require_once('View/registerboatview.php');

class RegisterBoatController {

	public function DoControl(\Database\Database $db) {

		$regBoatHandler = new \Model\RegisterBoatHandler($db);
		$regBoatView = new \View\RegisterBoatView();
		$outputHTML = '';

		// register form
		$outputHTML .= $regBoatView->DoRegisterBox();

		if ($regBoatView->UserClickedRegister()) {
			// get userId, boatType, boatLength
			$userId = $regBoatView->GetUserId();
			$type = $regBoatView->GetBoatType();
			$length = $regBoatView->GetBoatLength();
			// register boat
			echo $regBoatHandler->DoRegisterBoat($userId, $type, $length);
		}

		return $outputHTML;

	}
}