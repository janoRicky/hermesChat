<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/system/core/core_controller.php";

class controller_login extends core_controller {

	function __construct() {
		$this->load = new core_loader();
		$this->model("read");
	}

	function verify_login() {
		$email = $this->post("inp_email");
		$password = $this->post("inp_password");

		if ($email != NULL && $password != NULL) {
			$user_info = $this->read->user_verify($email)->fetch_array();
			if ($user_info != NULL) {
				if (password_verify($password, $user_info["password"])) {
					$_SESSION["user_id"] = $user_info["id"];
					$_SESSION["user_name"] = $user_info["name"];
					$_SESSION["user_in"] = TRUE;
				} else {
					$_SESSION["alert"] = "Incorrect Password.";
					header("Location: login");
					exit();
				}
			} else {
				$_SESSION["alert"] = "Email does not exist.";
				header("Location: login");
				exit();
			}
		} else {
			$_SESSION["alert"] = "All inputs must be filled.";
			header("Location: login");
			exit();
		}
		header("Location: conversations");
		exit();
	}
}