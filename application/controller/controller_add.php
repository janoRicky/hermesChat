<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/system/core/core_controller.php";

class controller_add extends core_controller {

	function __construct() {
		$this->load = new core_loader();
		$this->model("create");
	}

	function add_account() {
		// $name = $this->post("inp_name");
		// $email = $this->post("inp_email");
		// $password = $this->post("inp_password");
		$name = "tester";
		$email = "test@email.com";
		$password = "1234";

		if ($name != NULL && $email != NULL && $password != NULL) {
			if (strlen($name) <= 64 || strlen($email) <= 64 || strlen($password) <= 64) {
				$data = array(
					"name" => $name,
					"email" => $email,
					"password" => password_hash($password, PASSWORD_DEFAULT)
				);
				if ($this->create->user_add($data)) {
					$_SESSION["alert"] = "Successfully added Account.";
				} else {
					$_SESSION["alert"] = "Something went wrong. Please try again later.";
				}
			} else {
				$_SESSION["alert"] = "Input cannot be longer than 64 characters.";
			}
		} else {
			$_SESSION["alert"] = "All inputs must be filled.";
		}
		header("Location: accounts");
		exit();
	}
}