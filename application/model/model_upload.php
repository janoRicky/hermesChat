<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/system/core/core_model.php";

class model_upload extends core_model {

	public function ul_image_user($file) {
		$ul_config = array(
			"path" => "uploads/img/user_". $this->get_rows("users") + 1,
			"file" => $file,
			"file_name" => "profile",
			"types" => "jpg|jpeg|png|gif",
		);
		return $this->image_upload($ul_config);
	}
}