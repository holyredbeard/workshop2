<?php
namespace View;

class RegisterBoatView {

	const BOAT_TYPE = 'boatTypeForm';
	const BOAT_LENGTH = 'boatLengthForm';
	const BOAT_SUBMIT = 'boatSubmitForm';
	const USER_ID = 'id';

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
}