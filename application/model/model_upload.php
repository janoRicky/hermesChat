<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/system/core/core_model.php";

class model_upload extends core_model {

	public function ul_image_user($file,$user_id) {
		$ul_config = array(
			"path" => "uploads/img/user_". $user_id,
			"file" => $file,
			"file_name" => "profile",
			"types" => "jpg|jpeg|png|gif",
		);
		return $this->image_upload($ul_config);
	}
}