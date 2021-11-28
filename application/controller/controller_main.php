<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/system/core/core_controller.php";

class controller_main extends core_controller {

	function __construct() {
		$this->load = new core_loader();
		$this->model("read");

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
	// function page_details($page_no, $table_size, $page_limit) {
	// 	$desc = "Showing " . ((($page_no - 1) * $page_limit) + 1) . "-" . ($page_no * $page_limit < $table_size ? $page_no * $page_limit : $table_size) . " results of " . $table_size . " rows.";
	// 	$prev = NULL;
	// 	$next = NULL;
	// 	if ($page_no > 1) {
	// 		$prev = ($page_no - 1);
	// 	}
	// 	if ($table_size > ($page_no * $page_limit)) {
	// 		$next = ($page_no + 1);
	// 	}
	// 	$details = array(
	// 		"desc" => $desc,
	// 		"prev" => $prev,
	// 		"next" => $next
	// 	);
	// 	return $details;
	// }

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
		
		$this->load->view("conversations", $data);
	}
	function view_messaging() {
		$this->login_check();
		$data["head_title"] = "Messaging - Hermes Chat";
		
		$this->load->view("messaging", $data);
	}

	// function view_accounts() {
	// 	$page = (int)$this->get("pg");
	// 	$search = $this->get("search");

	// 	$data["head_title"] = "Accounts - hermes_chat";
	// 	$data["nav_link"] = "accounts";
	// 	$data["nav_text"] = "Accounts";

	// 	if ($page == NULL) {
	// 		$page = 1;
	// 	}
	// 	if ($search != NULL) {
	// 		$data["search_val"] = $search;
	// 		$table_size = $this->read->admin_search_count($data["search_val"]);
	// 		$data["table"] = $this->read->admin_search($data["search_val"], $page);
	// 	} else {
	// 		$data["search_val"] = NULL;
	// 		$table_size = $this->read->admin_count();
	// 		$data["table"] = $this->read->admin_get($page);
	// 	}

	// 	$page_limit = $this->load->cfg->page_limit();
	// 	$data["page_details"] = $this->page_details($page, $table_size, $page_limit);

	// 	$this->load->view("accounts", $data);
	// }
	// function view_account() {
	// 	$id = $this->get("id");

	// 	$data["head_title"] = "Account View - hermes_chat";
	// 	$data["nav_link"] = "accounts";
	// 	$data["nav_text"] = "Accounts > View";

	// 	if ($id != NULL) {
	// 		$data["table"] = $this->read->admin_acc_get($id);
	// 		$this->load->view("accounts_view", $data);
	// 	} else {
	// 		header("Location: accounts");
	// 	}
	// }
	// function view_account_update() {
	// 	$id = $this->get("id");

	// 	$data["head_title"] = "Account View - hermes_chat";
	// 	$data["nav_link"] = "accounts";
	// 	$data["nav_text"] = "Accounts > Edit";

	// 	if ($id != NULL) {
	// 		$data["table"] = $this->read->admin_acc_get($id);
	// 		$this->load->view("accounts_edit", $data);
	// 	} else {
	// 		header("Location: accounts");
	// 	}
	// }
}