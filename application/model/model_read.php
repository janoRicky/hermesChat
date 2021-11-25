<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/system/core/core_model.php";

class model_read extends core_model {

	function user_verify($email) {
		return $this->select("users", array("email" => $email));
	}
	
	// function item_count() {
	// 	return $this->get_rows("p_items");
	// }
	// function item_get($page) {
	// 	return $this->select("p_items", NULL, NULL, $page);
	// }
	// function item_search_count($search) {
	// 	return $this->get_rows("p_items", $search);
	// }
	// function item_search($search, $page) {
	// 	return $this->general_search("p_items", $search, $page);
	// }
	// function item_det_get($id) {
	// 	return $this->select("p_items", array("id" => $id));
	// }
}