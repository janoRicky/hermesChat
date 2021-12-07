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
			<div class="row pt_2">
				<div class="row_1"></div>
				<div class="row_10">
					<?php if (sizeof($conversations) > 0): ?>
						<?php foreach ($conversations as $row): ?>
							<a class="row mb_1" href="messaging?cm=<?=$row['c_details']['user_id']?>">
								<div class="row_2">
									<div class="row">
										<div class="u_img messaging_img">
											<div style="background-image: url('<?=$this->cfg->base_url() . ($row['c_details']['profile_img'] != '' ? $row['c_details']['profile_img'] : 'assets/img/arrow.png')?>');"></div>
										</div>
									</div>
								</div>
								<div class="row_8">
									<h4><?=$row["c_details"]["name"]?> <i>[<?=$row["c_details"]["user_id"]?>]</i></h4>
									<?php if ($row["converser_id"] != $row["last_converser_id"]): ?>
										YOU: 
									<?php endif; ?>
									<?=substr($row["m_details"]["message"], 0,20)?>
									<i><?=date("h:iA", strtotime($row["m_details"]["date_time"]))?></i>
								</div>
								
								<div class="row_2">
									<?php if ($row["seen"] == "0" && $row["converser_id"] == $row["last_converser_id"]): ?>
										<img src="<?=$this->cfg->base_url()?>assets/img/greek_fire.gif" style="height: 5rem;">
									<?php endif; ?>
								</div>
							</a>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="row pt_3 pb_3">
							<span class="m_auto">Start a new conversation</span>
						</div>
					<?php endif; ?>
				</div>
				<div class="row_1"></div>
			</div>
			<div class="row pt_1 pb_1">
				<form action="messaging" method="GET" class="m_auto">
					<div class="row">
						<div class="row_8">
							<input class="textbox" type="text" name="cm" placeholder="ENTER USER ID HERE">
						</div>
						<div class="row_4">
							<button class="button window_button">
								<div>CONVERSE</div>
							</button>
						</div>
					</div>
				</form>
			</div>
			<div class="row greek_pattern" style="height: 2rem;"></div>
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
