<!DOCTYPE html>
<html>
<?php
$this->view("template/head", array("title" => $head_title));
$this->view("template/notifications");
?>
<body>
	<div class="wrapping">
		<?php $this->view("template/navbar"); ?>
		<div class="content">
			<div class="row text_center pt_1 " style="justify-content: center;">
				<div class="row_1">
					<img class="page_laurel" src="<?=$this->cfg->base_url()?>assets/img/laurel_left.png" style="margin:auto;">
				</div>
				<div class="row_4">
					<span class="page_label text_center">CONVERSATIONS</span>
				</div>
				<div class="row_1">
					<img class="page_laurel" src="<?=$this->cfg->base_url()?>assets/img/laurel_right.png" style="margin:auto;">
				</div>
			</div>
			<div class="row greek_pattern" style="height: 2rem;"></div>
			<div class="row">
				<div class="row_1"></div>
				<div class="row_10">
					<a class="row" href="messaging">
						<div class="row_2">
							<img src="<?=$this->cfg->base_url()?>assets/img/greek_circle.png" style="width:100%;">
						</div>
						<div class="row_8">
							
						</div>
						<div class="row_2">
							<img src="<?=$this->cfg->base_url()?>assets/img/greek_fire.gif" style="height: 7rem;">
						</div>
					</a>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					t<br>
					t<br>
					t<br>
					t<br>
					t<br>
					t<br>
					t<br>
					t<br>
					t<br>
					t<br>
					t<br>
					t<br>
					t<br>
				</div>
				<div class="row_1"></div>
			</div>
		</div>
	</div>
</body>
<?php $this->view("windows/account_menu"); ?>
<script type="text/javascript" src="<?=$this->cfg->base_url()?>assets/js/script.js"></script>
<script type="text/javascript">

	document.querySelector("#account_menu").onclick = function() {
		document.querySelector("#win_account_menu").style.display = "block";
	};
	document.querySelector("#win_account_menu").onclick = function(e) {
		if (e.target === this) {
			document.querySelector("#win_account_menu").style.display = "none";
		}
	};
	document.querySelector(".btn_account_update").onclick = function(e) {
		if (document.querySelector("#account_update_div").style.display == "none") {
			document.querySelector("#account_update_div").style.display = "block";
		} else {
			document.querySelector("#account_update_div").style.display = "none";
		}
	};
</script>
</html>
