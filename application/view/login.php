<!DOCTYPE html>
<html>
<head>
	<title>Hermes Chat</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/main.css">

</head>
<?php
$this->view("template/notifications");
?>
<body>
	<div class="cont">
		<div class="row login_container mt_3">
			<div class="row_12">
				<div class="row greek_pattern_alt mt_1 mb_1" style="height: 3rem;"></div>
				<div class="row login_content" style="justify-content: center;">
					<div class="row_3 text_center row_md">
						<img class="login_logo" src="./assets/img/hermes_chat_logo.png">
					</div>
					<div class="row_2 title text_center dis_none_md">
						<span style="margin: auto;">HERMES CHAT</span>
					</div>
					<div class="row_4 text_center row_md">
						<form action="login_v" method="POST">
							<label class="login_label">Email:</label><br>
							<input class="textbox txt_md text_center mb_1" type="text" name="inp_email">
							<label class="login_label">Password:</label><br>
							<input class="textbox txt_md text_center mb_1" type="password" name="inp_password">

							<button class="button mt_1">
								<div>LOGIN</div>
							</button>
						</form>
						<div class="row mt_1">
							<div class="row_12 text_center login_links">
								<a href="registration" style="color: #fbf3ce !important;">No account? Click here to register</a>
							</div>
						</div>
					</div>
				</div>
				<div class="row greek_pattern_alt mt_1 mb_1" style="height: 3rem;"></div>
			</div>
		</div>
	</div>
</body>
</html>