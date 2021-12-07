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

	function get_conversations_by_user_id($id) {
		return $this->select("conversations", array("converser_1_id" => $id, "converser_2_id" => $id), 1);
	}
	function get_conversations_by_converser_id($c1_id, $c2_id) {
		$custom_condition = array("custom_condition" => array(
			"sql" => "(converser_1_id = '$c1_id' AND converser_2_id = '$c2_id') OR (converser_1_id = '$c2_id' AND converser_2_id = '$c1_id')"
		));
		return $this->select("conversations", $custom_condition, 3);
	}

	function get_messages($id_from, $id_to, $pg=NULL) {
		return $this->select("messages", array("from_id" => $id_from, "to_id" => $id_to), NULL, $pg);
	}
	function get_message_by_id($id) {
		return $this->select("messages", array("ID" => $id));
	}
	// function get_conversations($user_id, $pg=NULL) {
	// 	$selector = "ID, from_id, to_id, message, seen, date_time";
	// 	$conditions = "GROUP BY to_id, from_id ORDER BY ID ASC";
	// 	$custom_condition = array("custom_condition" => array(
	// 		0 => "ID IN (SELECT MAX(ID) FROM messages WHERE ",
	// 		"filters" => array("from_id" => $user_id, "to_id" => $user_id),
	// 		// "filter_operators" => array("OR"),
	// 		1 => " GROUP BY to_id, from_id)"
	// 	));
	// 	return $this->select("messages", $custom_condition, 3, $pg, $selector, $conditions);
	// }
	
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