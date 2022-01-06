
<div id="win_account_menu" class="window_container">
	<div class="window win_md win_85_sm mb_3">
		<?php
		$user_id = (isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : "");
		$user_name = (isset($_SESSION["user_name"]) ? $_SESSION["user_name"] : "");
		$user_email = (isset($_SESSION["user_email"]) ? $_SESSION["user_email"] : "");
		?>
		<div class="win_body" style="background-image: url('<?=$this->cfg->base_url() ."assets/img/olympus.png"?>');">
			<div class="row">
				<img src="<?=$this->cfg->base_url()?>assets/img/zeus.png" style="margin:auto;">
			</div>
			<div class="row pt_1">
				<div class="u_img window_img">
					<div style="background-image: url('<?=$this->cfg->base_url() . ($_SESSION["user_img"] != "" ? $_SESSION["user_img"] : "assets/img/arrow.png")?>');"></div>
				</div>
			</div>
			<div class="row window_label pt_2">
				<span class="m_auto">USER ID</span>
			</div>
			<div class="row">
				<span class="m_auto"><?=$user_id?></span>
			</div>
			<div class="row window_label pt_2">
				<span class="m_auto">NAME</span>
			</div>
			<div class="row">
				<span class="m_auto"><?=$user_name?></span>
			</div>
			<div class="row window_label pt_1">
				<span class="m_auto">EMAIL</span>
			</div>
			<div class="row">
				<span class="m_auto"><?=$user_email?></span>
			</div>
			<div class="row pb_1 pt_2">
				<img src="<?=$this->cfg->base_url()?>assets/img/poseidon.png" style="margin:auto;">
				<button class="button window_button btn_account_update m_auto">
					<div>EDIT ACCOUNT DETAILS</div>
				</button>
				<img src="<?=$this->cfg->base_url()?>assets/img/hades.png" style="margin:auto;">
			</div>
		</div>

		<div id="account_update_div" style="display: none;">
			<div class="row greek_pattern mt_1 mb_1" style="height: 2rem;"></div>
			<form action="account_update" method="POST" enctype="multipart/form-data">
				<div class="row mb_1">
					<label class="window_label m_auto">Profile Image: <input type="file" name="inp_image"></label>
				</div>
				<div class="row">
					<label class="window_label m_auto">Name:</label>
				</div>
				<div class="row">
					<input class="textbox txt_md text_center m_auto" type="text" name="inp_name" value="<?=$user_name?>" maxlength="64">
				</div>
				<div class="row">
					<label class="window_label m_auto">Email:</label>
				</div>
				<div class="row">
					<input class="textbox txt_md text_center m_auto" type="email" name="inp_email" value="<?=$user_email?>" maxlength="64">
				</div>
				<div class="row">
					<label class="window_label m_auto">Password:</label>
				</div>
				<div class="row">
					<input class="textbox txt_md text_center m_auto" type="password" name="inp_password" maxlength="64">
				</div>
				<div class="row pb_1 pt_1">
					<button class="button window_button btn_account_update m_auto">
						<div>UPDATE</div>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>