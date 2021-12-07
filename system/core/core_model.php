<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hermes_chat/application/config/db.php";

class core_model extends db {

	function connect() {
		$conn = new mysqli($this->server(), $this->username(), $this->password(), $this->name());

		if ($conn->connect_error) {
			return false;
		} else {
			return $conn;
		}
	}
	function param_binder($stmt, $data) {
		$arr_count = 0;
		$arr_size = count($data);
		$param_var = "";

		foreach ($data as $val) {
			$arr_count++;
			if ($arr_size > 1) {
				$var_ref_name = "binder" . $arr_count;
				$$var_ref_name = $val;
				$param_arr[] = &$$var_ref_name;
			} else {
				$param_arr[] = $val;
			}
			$param_var .= "s";
		}
		if ($arr_size > 1) {
			array_unshift($param_arr, $param_var);
			call_user_func_array(array($stmt, "bind_param"), $param_arr);
		} else {
			$stmt->bind_param($param_var, $param_arr[0]);
		}

		return $stmt;
	}
	function get_rows($table, $search=NULL) {
		if ($search != NULL) {
			$columns = $this->get_columns($table);
			foreach ($columns as $key => $val) {
				$conditions[$val] = "%" . $search . "%";
			}
			$c_operator = 1;
		} else {
			$conditions = NULL;
			$c_operator = NULL;
		}
		return $this->select($table, $conditions, $c_operator, NULL, "COUNT(*)")->fetch_row()[0];
	}
	function get_columns($table) {
		if ($conn = $this->connect()){
			$sql = "SHOW COLUMNS FROM $table";
			$stmt = $conn->prepare($sql);
			
			if ($stmt->execute()) {
				$result = $stmt->get_result();
			}
			$stmt->close();
			$conn->close();
		}
		foreach ($result as $val) {
			$columns[] = $val["Field"];
		}
		return $columns;
	}
	function general_search($table, $search=NULL, $page=NULL) {
		$columns = $this->get_columns($table);
		foreach ($columns as $key => $val) {
			$search_param[$val] = "%" . $search . "%";
		}
		return $this->select($table, $search_param, 1, $page);
	}

	function select($table, $conditions=NULL, $c_operator=NULL, $page=NULL, $selector=NULL, $other_conditions=NULL) {
		if ($conn = $this->connect()){
			if ($selector != NULL) {
				$sql = "SELECT $selector FROM $table";
			} else {
				$sql = "SELECT * FROM $table";
			}
			$bind_data = array();

			if ($conditions != NULL) {
				$sql .= " WHERE ";

				$arr_count = 0;
				$arr_size = count($conditions);
				if ($c_operator != 3) {
					foreach ($conditions as $key => $val) {
						$arr_count++;
						if ($c_operator == 2) { // search
							$sql .= "$key LIKE ?";
						} elseif ($c_operator == 3) { // custom
	
						} else {
							$sql .= "$key = ?";
						}
						if ($arr_size > 1 && $arr_count != $arr_size && $c_operator != 3) {
							if ($c_operator == 1 || $c_operator == 2) {
								$sql .= " OR ";
							} else {
								$sql .= " AND ";
							}
						}
					}
					$bind_data = array_merge($bind_data, $conditions);
				} else {
					$sql .= $conditions["custom_condition"]["sql"];
					if (isset($conditions["custom_condition"]["filters"])) {
						$conditions = $conditions["custom_condition"]["filters"];
						$bind_data = array_merge($bind_data, $conditions);
					}
				}
			}

			if ($other_conditions != NULL) {
				$sql .= " ". $other_conditions;
			}

			if ($page != NULL) {
				$limit = $this->cfg->page_limit();
				$offset = ($page - 1) * $limit;
				$other = array("LIMIT" => $limit, "OFFSET" => $offset);
				foreach ($other as $key => $val) {
					$sql .= " $key ?";
					$temp_arr = array($key => $val);
					$bind_data = array_merge($bind_data, $temp_arr);
				}
			}

			$stmt = $conn->prepare($sql);
			if (!empty($bind_data)) {
				$stmt = $this->param_binder($stmt, $bind_data);
			}
			
			if ($stmt->execute()) {
				$result = $stmt->get_result();
			}
			$stmt->close();
			$conn->close();
		}
		return $result;
	}
	function add($table, $data) {
		if ($conn = $this->connect()){
			$sql = "INSERT INTO $table (";

			$arr_count = 0;
			$arr_size = count($data);
			$param_var = "";
			$sql1 = "";
			foreach ($data as $key => $val) {
				$arr_count++;
				$sql .= "$key";
				$sql1 .= "?";
				if ($arr_size > 1 && $arr_count != $arr_size) {
					$sql .= ", ";
					$sql1 .= ", ";
				}
			}

			$sql .= ") VALUES (" . $sql1 . ")";

			$stmt = $conn->prepare($sql);
			$stmt = $this->param_binder($stmt, $data);
			
			$result = $stmt->execute();

			$stmt->close();
			$conn->close();
		}
		return $result;
	}
	function update($table, $data, $conditions) {
		if ($conn = $this->connect()){
			$sql = "UPDATE $table SET ";

			$arr_count = 0;
			$arr_size = count($data);
			$param_var = "";
			foreach ($data as $key => $val) {
				$arr_count++;
				$sql .= "$key = ?";
				if ($arr_size > 1 && $arr_count != $arr_size) {
					$sql .= ", ";
				}
			}

			$sql .= " WHERE ";

			$arr_count = 0;
			$arr_size = count($conditions);
			$param_var = "";
			foreach ($conditions as $key => $val) {
				$arr_count++;
				$sql .= "$key = ?";
				if ($arr_size > 1 && $arr_count != $arr_size) {
					$sql .= " AND ";
				}
			}

			$bind_data = array_merge($data, $conditions);

			$stmt = $conn->prepare($sql);
			$stmt = $this->param_binder($stmt, $bind_data);
			
			$result = $stmt->execute();

			$stmt->close();
			$conn->close();
		}
		return $result;
	}
	function delete($table, $conditions) {
		if ($conn = $this->connect()){
			$sql = "DELETE FROM $table WHERE ";

			$arr_count = 0;
			$arr_size = count($conditions);
			$param_var = "";
			foreach ($conditions as $key => $val) {
				$arr_count++;
				$sql .= "$key = ?";
				if ($arr_size > 1 && $arr_count != $arr_size) {
					$sql .= " AND ";
				}
			}

			$stmt = $conn->prepare($sql);
			$stmt = $this->param_binder($stmt, $conditions);
			
			$result = $stmt->execute();
			
			$stmt->close();
			$conn->close();
		}
		return $result;
	}

	function image_upload($ul_config) {
		$path_location = "../". $ul_config["path"];
		$image_type = strtolower(pathinfo(basename($path_location ."/". $ul_config["file"]["name"]), PATHINFO_EXTENSION));
		$path_full = $path_location ."/". $ul_config["file_name"] .".". $image_type;


		if (!is_dir($path_location)) {
			mkdir($path_location, 0777, true);
		}

		if(getimagesize($ul_config["file"]["tmp_name"]) == false) {
			return false;
		}

		if (file_exists($path_full)) {
			unlink($path_full);
		}

		if ($ul_config["file"]["size"] > 5000000) {
			return false;
		}

		$allowed_type = false;
		foreach (explode("|", $ul_config["types"]) as $type) {
			if ($image_type == $type) {
				$allowed_type = true;
				break;
			}
		}
		if (!$allowed_type) {
			return false;
		}

		if (move_uploaded_file($ul_config["file"]["tmp_name"], $path_full)) {
			return substr($path_full, 3);
		} else {
			return false;
		}
	}
}

?>