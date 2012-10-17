<?php
namespace View;

class RemoveBoatView {

	const BOAT_ID = 'boatId';

	public function UserClickedRemove() {
		if (isset($_GET[self::BOAT_ID])) {
			return true;
		} else {
			return false;
		}
	}

	public function GetBoatId() {
		return $_GET[self::BOAT_ID];
	}	
}