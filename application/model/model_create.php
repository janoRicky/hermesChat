<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/system/core/core_model.php";

class model_create extends core_model {

	public function user_add($data) {
		$data["user_id"] = "USR". str_pad($this->get_rows("users") + 1, 7, '0', STR_PAD_LEFT);
		return $this->add("users", $data);
	}

	public function message_add($data) {
		return $this->add("messages", $data);
	}
}