<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/system/core/core_model.php";

class model_read extends core_model {

	function get_user_by_email($email) {
		return $this->select("users", array("email" => $email));
	}
	function get_user_by_id($id) {
		return $this->select("users", array("ID" => $id));
	}
	function get_user_by_user_id($id) {
		return $this->select("users", array("user_id" => $id));
	}

	function get_messages($id_from, $id_to) {
		return $this->select("messages", array("from_id" => $id_from, "to_id" => $id_to));
	}
	function get_conversations($user_id) {
		$selector = "MAX(date_time), from_id, to_id, message, seen, ID";
		$conditions = "GROUP BY to_id, from_id";
		return $this->select("messages", array("from_id" => $user_id, "to_id" => $user_id), 1, NULL, $selector, $conditions);
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