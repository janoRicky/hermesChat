<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/system/core/core_controller.php";

class controller_delete extends core_controller {

	function __construct() {
		$this->load = new core_loader();
		$this->model("delete");
	}

	function delete_account() {
		$id = $this->get("inp_id");

		if ($id != NULL) {
			if ($this->delete->admin_delete($id)) {
				$_SESSION["alert"] = "Successfully deleted Account #" . $id . ".";
			} else {
				$_SESSION["alert"] = "Something went wrong. Please try again later.";
			}
		} else {
			$_SESSION["alert"] = "Something went wrong. Please try again later.";
		}
		header("Location: accounts");
		exit();
	}
}