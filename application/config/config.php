<?php

session_start();

class config {

	function __construct() {
		$this->page_limit = 15;
		$this->notif_timeout = 5000;

		$this->base_url = "http://". $_SERVER["SERVER_NAME"] . "/hermes_chat/";
		$this->index = "login";
		$this->routes = array(
			"login" => "main/view_login",

			"conversations" => "main/view_conversations",

			"messaging" => "main/view_messaging",

			// FUNCTIONS
			"login_v" => "login/verify_login",
			"logout" => "main/logout",
		);
	}

	public function page_limit() {
		return $this->page_limit;
	}
	public function notif_timeout() {
		return $this->notif_timeout;
	}
	public function base_url() {
		return $this->base_url;
	}
	public function index() {
		return $this->index;
	}
	public function routes() {
		return $this->routes;
	}
}