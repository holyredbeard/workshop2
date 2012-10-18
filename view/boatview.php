<?php
namespace View;

class BoatView {

	const BOAT_TYPE = 'boatTypeForm';
	const BOAT_LENGTH = 'boatLengthForm';
	const BOAT_SUBMIT = 'boatSubmitForm';
	const BOAT_EDIT_SUBMIT = 'boatEditSubmitForm';

	const USER_ID = 'id';
	const BOAT_ID = 'boatId';
	const BOAT_ID_REMOVE = 'boatIdRemove';


	public function DoRegisterBox() {
		$html = "
				<h2>Registrera båt</h2>
				<form method='post'>
					<p>Typ</p>
					<input type='radio' name='".self::BOAT_TYPE."' value='1'> Segelbåt<br />
					<input type='radio' name='".self::BOAT_TYPE."' value='2'> Motorseglare<br />
					<input type='radio' name='".self::BOAT_TYPE."' value='3'> Motorbåt<br />
					<input type='radio' name='".self::BOAT_TYPE."' value='4'> Kajak/Kanot<br />
					<input type='radio' name='".self::BOAT_TYPE."' value='5'> Övriga<br />
					<p>Längd</p>
					<input type='text' name='".self::BOAT_LENGTH."' />
					<input type='submit' name='".self::BOAT_SUBMIT."' value='Registrera båt' />
				</form>";

		return $html;
	}

	public function DoEditBox($boatInfo) {
		$length = $boatInfo[0];
		$type = $boatInfo[1];

		$html = "
				<h2>Ändra båt</h2>
				<form method='post'>
					<p>Typ</p>
					<input type='radio' name='".self::BOAT_TYPE."' value='1'> Segelbåt<br />
					<input type='radio' name='".self::BOAT_TYPE."' value='2'> Motorseglare<br />
					<input type='radio' name='".self::BOAT_TYPE."' value='3'> Motorbåt<br />
					<input type='radio' name='".self::BOAT_TYPE."' value='4'> Kajak/Kanot<br />
					<input type='radio' name='".self::BOAT_TYPE."' value='5'> Övriga<br />
					<p>Längd</p>
					<input type='text' name='".self::BOAT_LENGTH."' value='$length' />
					<input type='submit' name='".self::BOAT_EDIT_SUBMIT."' value='Registrera båt' />
				</form>";

		return $html;
	}

	public function UserClickedRegister() {
		if (isset($_POST[self::BOAT_SUBMIT])) {
			return true;
		} else {
			return false;
		}
	}

	public function GetBoatType() {
		return $_POST[self::BOAT_TYPE];
	}

	public function GetBoatLength() {
		return $_POST[self::BOAT_LENGTH];
	}

	public function GetUserId() {
		return $_GET[self::USER_ID];
	}

	public function UserClickedEdit() {
		if (isset($_POST[self::BOAT_EDIT_SUBMIT])) {
			return true;
		} else {
			return false;
		}		
	}

	public function UserClickedRemove() {
		if (isset($_GET[self::BOAT_ID_REMOVE])) {
			return true;
		} else {
			return false;
		}
	}

	public function GetBoatId() {
		return $_GET[self::BOAT_ID];
	}	
}