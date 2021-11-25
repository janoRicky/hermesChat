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
			<div class="row">
				<div class="row_2">
				</div>
				<div class="row_8">
					<img src="<?=$this->cfg->base_url()?>assets/img/greek_circle.png" style="width: 8rem;">
				</div>
				<div class="row_2">
				</div>
			</div>
			<div class="row greek_pattern" style="height: 2rem;"></div>
			<div class="row">
				<div class="row_1"></div>
				<div class="row_10">
					<form class="form" action="message_send" method="POST">
						<div class="row details">
							<div class="row_8 text_left">
								<input class="input" type="name" name="inp_name" value="">
							</div>
							<div class="row_4">
								<button>
									<img src="<?=$this->cfg->base_url()?>assets/img/arrow_button.png" style="height: 5rem;">
								</button>
							</div>
						</div>
					</form>
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
</script>
</html>
