<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/system/core/core_controller.php";

class controller_edit extends core_controller {

	function __construct() {
		$this->load = new core_loader();
		$this->model("update");
	}
	
	function edit_account() {
		$id = $this->post("inp_id");
		$name = $this->post("inp_name");
		$email = $this->post("inp_email");
		$password = $this->post("inp_password");

		if ($id != NULL && $name != NULL && $email != NULL && $password != NULL) {
			if (strlen($name) <= 60 || strlen($email) <= 60 || strlen($password) <= 60) {
				$data = array(
					"name" => $name,
					"email" => $email,
					"password" => password_hash($password, PASSWORD_DEFAULT)
				);
				if ($this->update->admin_update($id, $data)) {
					$_SESSION["alert"] = "Successfully updated Account.";
				} else {
					$_SESSION["alert"] = "Something went wrong. Please try again later.";
				}
			} else {
				$_SESSION["alert"] = "Input cannot be longer than 60.";
			}
		} else {
			$_SESSION["alert"] = "All inputs must be filled.";
		}
		header("Location: accounts");
		exit();
	}
}