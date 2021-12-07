<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/system/core/core_controller.php";

class controller_add extends core_controller {

	function __construct() {
		$this->load = new core_loader();
		$this->model("read");
		$this->model("create");
		$this->model("update");
		$this->model("upload");
	}

	function add_account() {
		$name = $this->post("inp_name");
		$email = $this->post("inp_email");
		$password = $this->post("inp_password");

		if ($name != NULL && $email != NULL && $password != NULL) {
			$email_check = $this->read->get_user_by_email($email);

			if ($email_check->num_rows < 1) {
				if (strlen($name) <= 64 || strlen($email) <= 64 || strlen($password) <= 64) {
					$data = array(
						"name" => $name,
						"email" => $email,
						"password" => password_hash($password, PASSWORD_DEFAULT),
						"profile_img" => $this->upload->ul_image_user($_FILES["inp_image"])
					);
					if ($this->create->user_add($data)) {
						$_SESSION["alert"] = "Successfully registered Account.";
						header("Location: login");
						exit();
					} else {
						$_SESSION["alert"] = "Something went wrong. Please try again later.";
					}
				} else {
					$_SESSION["alert"] = "Input cannot be longer than 64 characters.";
				}
			} else {
				$_SESSION["alert"] = "Email already in use.";
			}
		} else {
			$_SESSION["alert"] = "All inputs must be filled.";
		}
		header("Location: registration");
		exit();
	}

	function add_message() {
		$receiver_id = $this->post("inp_receiver_id");
		$message = $this->post("inp_message");
		$date = date("Y-m-d h:i:s");

		if (isset($_SESSION["user_id"])) {
			$from_id = $this->read->get_user_by_user_id($_SESSION["user_id"])->fetch_array()["ID"];
			$to_id = $this->read->get_user_by_user_id($receiver_id)->fetch_array()["ID"];

			if ($from_id != NULL && $to_id != NULL && $message != NULL) {
				if (strlen($message) < 767) {

					$conversation = $this->read->get_conversations_by_converser_id($from_id, $to_id);
					if ($conversation->num_rows < 1) {
						$data = array(
							"converser_1_id" => $from_id,
							"converser_2_id" => $to_id,
							"last_message_id" => $this->read->get_rows("messages"),
							"last_converser_id" => $from_id,
							"seen" => 0
						);
						if (!$this->create->conversation_add($data)) {
							$_SESSION["alert"] = "Something went wrong. Please try again later. wat";
						}
						$conversation_id = $this->read->get_rows("conversations");
					} else {
						$c_details = $conversation->fetch_array();
						$data = array(
							"converser_1_id" => $from_id,
							"converser_2_id" => $to_id,
							"last_message_id" => $this->read->get_rows("messages") + 1,
							"last_converser_id" => $from_id,
							"seen" => 0
						);
						if (!$this->update->conversation_update($c_details["ID"], $data)) {
							$_SESSION["alert"] = "Something went wrong. Please try again later.";
						}
						$conversation_id = $c_details["ID"];
					}

					if ($conversation_id != NULL) {
						$data = array(
							"conversation_id" => $conversation_id,
							"from_id" => $from_id,
							"to_id" => $to_id,
							"message" => $message,
							"date_time" => date("Y-m-d H:i:s")
						);
						if (!$this->create->message_add($data)) {
							$_SESSION["alert"] = "Something went wrong. Please try again later.";
						}
					}
				} else {
					$_SESSION["alert"] = "Message is too long (< 767).";
				}
			} else {
				$_SESSION["alert"] = "All inputs must be filled.";
			}
		} else {
			$_SESSION["alert"] = "Something went wrong. Please try again later.";
		}
		header("Location: messaging?cm=". $receiver_id);
		exit();
	}
}