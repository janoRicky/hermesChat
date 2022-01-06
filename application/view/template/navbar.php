<div class="navbar">
	<div class="row h_100" >
		<div class="row_6 h_100 navbar_title">
			<a href="conversations">
				<div class="row h_100">
						<img class="navbar_logo pr_1" src="./assets/img/hermes_chat_logo.png">
						<span>HERMES CHAT</span>
				</div>
			</a>
		</div>
		<div class="row_6">
			<a href="logout" style="float: right; color: white; padding: 0.5rem;">
				Logout
			</a>
			<span id="account_menu" class="navbar_user pr_1" style="float: right;">
				<?=(isset($_SESSION["user_name"]) ? $_SESSION["user_name"] : "")?>
			</span>
		</div>
	</div>
</div>