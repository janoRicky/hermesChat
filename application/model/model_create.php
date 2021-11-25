<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/system/core/core_model.php";

class model_create extends core_model {

	public function user_add($data) {
		return $this->add("users", $data);
	}
}