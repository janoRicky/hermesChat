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
					<div class="row_12 title text_center dis_none_xs">
						<span class="m_auto">HERMES CHAT</span><br>
						<div class="row">
							<span class="m_auto" style="font-size: 1.5rem; color: white;">Account Registration</span>

						</div>
					</div>
					<div class="row_12 text_center ">
						<form action="account_register" method="POST" enctype="multipart/form-data">
							<label class="login_label">Profile Image: <input type="file" name="inp_image"></label><br>
							
							<label class="login_label">Name:</label><br>
							<input class="textbox txt_md text_center mb_1" type="text" name="inp_name" maxlength="64" required>
							<label class="login_label">Email:</label><br>
							<input class="textbox txt_md text_center mb_1" type="email" name="inp_email" maxlength="64" required>
							<label class="login_label">Password:</label><br>
							<input class="textbox txt_md text_center mb_1" type="password" name="inp_password" maxlength="64" required>

							<button class="button mt_1">
								<div>REGISTER</div>
							</button>
						</form>
						<div class="row mt_1">
							<div class="row_12 text_center login_links">
								<a href="login" style="color: #fbf3ce !important;">Already have an account? Click here to login</a>
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