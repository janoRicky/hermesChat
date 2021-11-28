<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/system/core/core_model.php";

class model_update extends core_model {

	public function user_update($id, $data) {
		return $this->update("users", $data, array("ID" => $id));
	}
}