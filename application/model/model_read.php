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

	function get_messages($c_id, $pg=NULL) {
		// return $this->select("messages", array("from_id" => $id_from, "to_id" => $id_to), NULL, $pg);
		return $this->select("messages", array("conversation_id" => $c_id), NULL, $pg);
	}
	function get_messages_count($c_id) {
		return $this->select("messages", array("conversation_id" => $c_id), NULL, NULL, "ID")->num_rows;
	}
	function get_message_by_id($id) {
		return $this->select("messages", array("ID" => $id));
	}
}