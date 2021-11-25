<!DOCTYPE html>
<html>
<?php
$this->view("template/head", array("title" => $head_title));
$this->view("template/notifications");
?>
<body>
	<div class="wrapping">
		<?php $this->view("template/sidebar", array("active" => "accounts")); ?>
		<div class="content">
			<?php $this->view("template/navbar", array("nav_link" => $nav_link, "nav_text" => $nav_text)); ?>
			<div class="row">
				<div class="row_1"></div>
				<div class="row_10">
					<?php $admin_info = $table->fetch_array(); ?>
					<h1>UPDATE ACCOUNT #<?=$admin_info["id"]?></h1>
					<form class="form" action="account_edit" method="POST">
						<input type="hidden" name="inp_id" value="<?=$admin_info["id"]?>">
						<div class="row details">
							<div class="row_3 text_right label mr_1">
								Name:
							</div>
							<div class="row_7 text_left">
								<input class="input" type="name" name="inp_name" value="<?=$admin_info["name"]?>">
							</div>
							<div class="row_2"></div>
						</div>
						<div class="row details">
							<div class="row_3 text_right label mr_1">
								Email:
							</div>
							<div class="row_7 text_left">
								<input class="input" type="email" name="inp_email" value="<?=$admin_info["email"]?>">
							</div>
							<div class="row_2"></div>
						</div>
						<div class="row details">
							<div class="row_3 text_right label mr_1">
								Password:
							</div>
							<div class="row_7 text_left">
								<input class="input" type="password" name="inp_password">
							</div>
							<div class="row_2"></div>
						</div>
						<div class="row mt_1">
							<div class="row_12 text_center">
								<input class="button btn_md" type="submit" value="Save Changes">
							</div>
						</div>
					</form>
				</div>
				<div class="row_1"></div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="./assets/js/script.js"></script>
</html>
