<!DOCTYPE html>
<html>
<?php
$this->view("template/head", array("title" => $head_title));
$this->view("template/notifications");
?>
<body>
	<div class="wrapping">
		<?php $this->view("template/sidebar", array("active" => "about_me")); ?>
		<div class="content">
			<?php $this->view("template/navbar", array("nav_link" => $nav_link, "nav_text" => $nav_text)); ?>
			<div class="row">
				<div class="row_1"></div>
				<div class="row_10">
					<h1>ABOUT ME!</h1>
					<p class="text_center">
						Hi! I'm Ricky John Jano, I'm a college student studying Computer Science. I like things Tech Stuff, I'm interested in Programming, Development, Coding, and Games.
					</p>
					<h3 class="mt_3">CONTACT INFORMATION</h3>
					<table style="text-align: left;">
						<tbody>
							<tr>
								<td class="pr_3"> <b style="font-weight: bold;"> EMAIL: </b> </td>
								<td> janorickyjohn@gmail.com </td>
							</tr>
							<tr>
								<td class="pr_3"> <b style="font-weight: bold;"> LOCATION: </b> </td>
								<td> Rizal, Philippines </td>
							</tr>
							<tr>
								<td class="pr_3"> <b style="font-weight: bold;"> PHONE: </b> </td>
								<td> 09177884190 </td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="row_1"></div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="./assets/js/script.js"></script>
</html>
