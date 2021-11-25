<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/application/config/config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/application/controller/controller_login.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/application/controller/controller_main.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/application/controller/controller_add.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/application/controller/controller_edit.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/application/controller/controller_delete.php";

class core_main {

 	function __construct() {
		$this->cfg = new config();
		$this->login = new controller_login();
		$this->main = new controller_main();
		$this->add = new controller_add();
		$this->edit = new controller_edit();
		$this->delete = new controller_delete();
	}

	public function move($dest) {
		header("Location: " . $dest);
	}
	public function route($rt) {
		if ($rt == "index") {
			$func_name = $this->cfg->routes()[$rt];
			$this->main->$func_name();
		} elseif ($rt == "login") {
			$this->main->view_login();
		} elseif ($rt == "login_v") {
			$this->login->verify_login();
		} else {
			if (isset($_SESSION["user_in"]) && $_SESSION["user_in"] == TRUE) {
				if (!array_key_exists($rt, $this->cfg->routes())) {
					header("Location: 404.html");
				} else {
					$route = explode("/", $this->cfg->routes()[$rt]);
					$ctrl = $route[0];
					$func = $route[1];
					$this->$ctrl->$func();
				}
			} else {
				$this->move("login");
			}
		}
	}
}
