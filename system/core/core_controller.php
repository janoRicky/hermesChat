<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/system/core/core_loader.php";

class core_controller {

	public function model($model) {
		require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/application/model/model_" . $model . ".php";
		$class_name = "model_" . $model;
		$this->$model = new $class_name();
	}

	function get($var_name) {
		if (isset($_GET[$var_name]) && $_GET[$var_name] != NULL) {
			$var = $_GET[$var_name];
		} else {
			$var = NULL;
		}
		return $var;
	}
	function post($var_name) {
		if (isset($_POST[$var_name]) && $_POST[$var_name] != NULL) {
			$var = $_POST[$var_name];
		} else {
			$var = NULL;
		}
		return $var;
	}
}