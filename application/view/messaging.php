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
					<div class="row_2 row_sm" style="margin-left: auto;">
						<div class="row">
							<div class="u_img messaging_img">
								<div style="background-image: url('<?=$this->cfg->base_url() . ($receiver_profile != "" ? $receiver_profile : "assets/img/arrow.png")?>');"></div>
							</div>
						</div>
					</div>
					<div class="row_4 row_sm" style="margin-right: auto; color: #3d413a;">
						<h1><?=$receiver_name?></h1>
						<i>[<?=$receiver_id?>]</i>
					</div>
				</div>
			</div>
			<div class="row greek_pattern" style="height: 2rem;"></div>
			<div class="row chats">
				<div class="row_10 m_auto">
					<?php if (isset($offset) && $offset > 1):?>
						<div class="row pt_1 pb_1">
							<div class="row_12 text_center">
								<a href="messaging?cm=<?=$receiver_id?>&os=<?=$offset - 1?>" style="color: blue;">[ Older Messages ]</a>
							</div>
						</div>
					<?php endif; ?>
					
					<?php if (isset($chats) && $chats->num_rows > 0):
						$current_date = 0;
						?>
						<?php foreach ($chats as $row):
							$datetime = strtotime($row["date_time"]);
							$date = date("Y-m-d", $datetime);
							$time = date("h:iA", $datetime);
							if ($current_date != $date): ?>
								<div class="row">
									<div class="row_12 text_center">
										<i style="color: #888;">
											<?=$date?>
										</i>
									</div>
								</div>
							<?php $current_date = $date; endif; ?>
							<div class="row">
								<?php if ($row["to_id"] == $user_id): ?>
									<div class="row_8 chat chat_received">
										<div>
											<?=nl2br($row["message"])?>
										</div>
									</div>
									<div class="row_4 text_center">
										<div class="p_1">
											<?=$time?>
										</div>
									</div>
								<?php else: ?>
									<div class="row_4 text_center">
										<div class="p_1">
											<?=$time?>
										</div>
									</div>
									<div class="row_8 chat chat_sent">
										<div>
											<?=nl2br($row["message"])?>
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

					<?php if (isset($offset_max) && $offset_max != $offset):?>
						<div class="row pt_2 pb_2">
							<div class="row_12 text_center">
								<a href="messaging?cm=<?=$receiver_id?>&os=<?=$offset + 1?>" style="color: blue;">[ Newer Messages ]</a>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="row greek_pattern" style="height: 2rem;"></div>
			<div class="row pt_1 pb_3">
				<div class="row_1"></div>
				<div class="row_10">
					<form id="frm_message" class="form" action="message_send" method="POST">
						<input type="hidden" name="inp_receiver_id" value="<?=$chatmate_id?>">
						<div class="row details">
							<div class="row_9 text_left">
								<textarea id="inp_message" style=" width: 100%; height: 100%; resize: none; " name="inp_message" maxlength="766"></textarea>
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


    document.querySelector("#inp_message").onkeydown  = function(e) {
        var key = (e.keyCode ? e.keyCode : e.which);
        if (key == 13 && e.ctrlKey) {
        	document.querySelector("#inp_message").value += "\n";
        } else if (key == 13) {
            document.querySelector("#frm_message").submit();
            return false;
        }
	};
</script>
</html>
