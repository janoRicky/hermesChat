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
			<div class="row pt_1 pb_1">
				<div class="row">
					<div class="row_2" style="margin-left: auto;">
						<div class="row">
							<div class="u_img messaging_img">
								<div style="background-image: url('<?=$this->cfg->base_url() . ($receiver_profile != "" ? $receiver_profile : "assets/img/arrow.png")?>');"></div>
							</div>
						</div>
					</div>
					<div class="row_4" style="margin-right: auto; color: #3d413a;">
						<h1><?=$receiver_name?></h1>
					</div>
				</div>
			</div>
			<div class="row greek_pattern" style="height: 2rem;"></div>
			<div class="row chats">
				<div class="row_10 m_auto">
					
					<?php if (sizeof($chats) > 0): ?>
						<?php foreach ($chats as $row): ?>
							<div class="row">
								<?php if ($row["to_id"] == $user_id): ?>
									<div class="row_8 chat chat_received">
										<div>
											<?=$row["message"]?>
										</div>
									</div>
									<div class="row_4 text_center">
										<div class="p_1">
											<?=$row["date_time"]?>
										</div>
									</div>
								<?php else: ?>
									<div class="row_4 text_center">
										<div class="p_1">
											<?=$row["date_time"]?>
										</div>
									</div>
									<div class="row_8 chat chat_sent">
										<div>
											<?=$row["message"]?>
										</div>
									</div>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="row pt_3 pb_3">
							<span class="m_auto">Send a message to start a conversation</span>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="row greek_pattern" style="height: 2rem;"></div>
			<div class="row pt_1 pb_3">
				<div class="row_1"></div>
				<div class="row_10">
					<form class="form" action="message_send" method="POST">
						<input type="hidden" name="inp_receiver_id" value="<?=$chatmate_id?>">
						<div class="row details">
							<div class="row_9 text_left">
								<textarea style=" width: 100%; height: 100%; resize: none; " name="inp_message" maxlength="766"></textarea>
							</div>
							<div class="row_3 text_center">
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
	document.querySelector(".btn_account_update").onclick = function(e) {
		if (document.querySelector("#account_update_div").style.display == "none") {
			document.querySelector("#account_update_div").style.display = "block";
		} else {
			document.querySelector("#account_update_div").style.display = "none";
		}
	};
</script>
</html>
