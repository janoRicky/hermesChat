<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/application/config/config.php";

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'hermes_db');


class db {

	function __construct() {
		$this->server = DB_SERVER;
		$this->username = DB_USERNAME;
		$this->password = DB_PASSWORD;
		$this->name = DB_NAME;

		$this->cfg = new config();
	}

	protected function server() {
		return $this->server;
	}
	protected function username() {
		return $this->username;
	}
	protected function password() {
		return $this->password;
	}
	protected function name() {
		return $this->name;
	}
}