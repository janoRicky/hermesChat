<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/system/core/core_model.php";

class model_create extends core_model {

	public function user_add($data) {
		return $this->add("users", $data);
	}
	public function user_login_add($user_id) {
		return $this->add("users_login", array("user_id" => $user_id));
	}

	public function message_add($data) {
		return $this->add("messages", $data);
	}
	public function conversation_add($data) {
		return $this->add("conversations", $data);
	}
}