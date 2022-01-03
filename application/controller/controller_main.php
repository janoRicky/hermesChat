<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/system/core/core_controller.php";

class controller_main extends core_controller {

	function __construct() {
		$this->load = new core_loader();
 		$this->cfg = new config();
		$this->model("read");
		$this->model("update");

		date_default_timezone_set("Asia/Manila");
	}

	function login_check() {
		if (!isset($_SESSION["user_in"]) || $_SESSION["user_in"] != TRUE) {
			$this->logout();
		}
	}
	function logout() {
		session_destroy();
		header("Location: login");
	}
	function view_login() {
		if (isset($_SESSION["user_in"])) {
			header("Location: conversations");
		}

		$data["head_title"] = "Hermes Chat";

		$this->load->view("login", $data);
	}
	function view_registration() {
		if (isset($_SESSION["user_in"])) {
			header("Location: conversations");
		}

		$data["head_title"] = "Hermes Chat - Registration";

		$this->load->view("registration", $data);
	}

	function view_conversations() {
		$this->login_check();
		$data["head_title"] = "Conversations - Hermes Chat";

		if (isset($_SESSION["user_id"])) {
			$logged_in_id = $this->read->get_user_by_user_id($_SESSION["user_id"])->fetch_array()["ID"];
			$conversations = $this->read->get_conversations_by_user_id($logged_in_id);
			$data["conversations"] = array();

			foreach ($conversations as $row) {
				if ($logged_in_id != $row["converser_1_id"]) {
					$row["converser_id"] = $row["converser_1_id"];
				} else {
					$row["converser_id"] = $row["converser_2_id"];
				}
				$row["c_details"] = $this->read->get_user_by_id($row["converser_id"])->fetch_array();
				$row["m_details"] = $this->read->get_message_by_id($row["last_message_id"])->fetch_array();

				array_push($data["conversations"], $row);
			}
		}
		
		$this->load->view("conversations", $data);
	}
	function view_messaging() {
		$this->login_check();
		$data["head_title"] = "Messaging - Hermes Chat";

		$os = $this->get("os");
		$cmid = $this->get("cm");
		if ($cmid != NULL && ($cmid != $_SESSION["user_id"])) {
			$chatmate = $this->read->get_user_by_user_id($cmid);

			if ($chatmate->num_rows > 0) {
				$user_id = $this->read->get_user_by_user_id($_SESSION["user_id"])->fetch_array()["ID"];
				$chatmate_details = $chatmate->fetch_array();
				$chatmate_id = $chatmate_details["ID"];
				$conversation = $this->read->get_conversations_by_converser_id($user_id, $chatmate_id);

				$data["user_id"] = $user_id;
				$data["chatmate_id"] = $cmid;

				$data["receiver_profile"] = $chatmate_details["profile_img"];
				$data["receiver_name"] = $chatmate_details["name"];
				$data["receiver_id"] = $chatmate_details["user_id"];

				// function cmp($a, $b) { return strcmp($a["date_time"], $b["date_time"]); } // sort by date_time
				// uasort($data["chats"], "cmp");

				if ($conversation->num_rows > 0) {
					$conversation_details = $conversation->fetch_array();

					$m_count = $this->read->get_messages_count($conversation_details["ID"]);
					$os_max = $m_count / $this->cfg->page_limit();
					if ($os_max > 1) {
						if ($this->cfg->page_limit() % $os_max > 0) {
							$os_max += 1;
						}
					}
					$os_max = floor($os_max);
					if ($os == NULL) {
						$os = $os_max;
					}
					$data["offset"] = $os;
					$data["offset_max"] = $os_max;
					$data["chats"] = $this->read->get_messages($conversation_details["ID"], $os);

					if ($conversation_details["last_converser_id"] != $user_id && $conversation_details["seen"] == 0) {
						$data_upd = array(
							"seen" => 1
						);
						$this->update->conversation_update($conversation_details["ID"], $data_upd);
					}
				}

				$this->load->view("messaging", $data);
			} else {
				$_SESSION["alert"] = "User <i>". $cmid ."</i> does not exist.";
				header("Location: conversations");
			}
		} else {
			header("Location: conversations");
		}
		exit();
	}
}