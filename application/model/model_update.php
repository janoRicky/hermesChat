<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/system/core/core_model.php";

class model_update extends core_model {

// ITEM
	public function item_update($id, $data) {
		return $this->update("p_items", $data, array("id" => $id));
	}
// ADMIN
	public function admin_update($id, $data) {
		return $this->update("adm_accounts", $data, array("id" => $id));
	}
}