<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/system/core/core_model.php";

class model_delete extends core_model {

// ITEM
	public function item_delete($id) {
		return $this->delete("p_items", array("id" => $id));
	}
// ADMIN
	public function admin_delete($id) {
		return $this->delete("adm_accounts", array("id" => $id));
	}
}