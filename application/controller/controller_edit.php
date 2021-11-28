<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/system/core/core_controller.php";

class controller_edit extends core_controller {

	function __construct() {
		$this->load = new core_loader();
		$this->model("read");
		$this->model("update");
		$this->model("upload");
	}
	
	function edit_account() {
		if (isset($_SESSION["user_id"])) {
			$id = $_SESSION["user_id"];
			$name = $this->post("inp_name");
			$email = $this->post("inp_email");
			$password = $this->post("inp_password");

			if ($id != NULL && $name != NULL && $email != NULL) {
				$email_check = $this->read->user_verify($email);
				if ($email_check->num_rows < 1 || $email == $_SESSION["user_email"]) {
					if (strlen($name) <= 60 || strlen($email) <= 60) {
						$data = array(
							"name" => $name,
							"email" => $email
						);
						if ($_FILES["inp_image"]["size"] > 0) {
							$data["profile_img"] = $this->upload->ul_image_user($_FILES["inp_image"]);
						}
						if ($password != NULL && strlen($password) <= 60) {
							$data["password"] = password_hash($password, PASSWORD_DEFAULT);
						}
						if ($this->update->user_update($id, $data)) {
							$_SESSION["alert"] = "Successfully updated Account details.";

							$user_info = $this->read->get_user_by_id($id)->fetch_array();
							$_SESSION["user_name"] = $user_info["name"];
							$_SESSION["user_email"] = $user_info["email"];
							$_SESSION["user_img"] = $user_info["profile_img"];
						} else {
							$_SESSION["alert"] = "Something went wrong. Please try again later.";
						}
					} else {
						$_SESSION["alert"] = "Input cannot be longer than 60.";
					}
				} else {
					$_SESSION["alert"] = "Email already in use.";
				}
			} else {
				$_SESSION["alert"] = "All inputs must be filled.";
			}
		} else {
			$_SESSION["alert"] = "Something went wrong. Please try again later.";
		}
		header("Location: conversations");
		exit();
	}
}