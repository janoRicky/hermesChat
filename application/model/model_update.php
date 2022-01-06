<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/system/core/core_model.php";

class model_update extends core_model {

	public function user_update($id, $data) {
		return $this->update("users", $data, array("ID" => $id));
	}
	public function user_login_update($user_id, $data) {
		return $this->update("users_login", $data, array("user_id" => $user_id));
	}
	public function conversation_update($id, $data) {
		return $this->update("conversations", $data, array("ID" => $id));
	}
}