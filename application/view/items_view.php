<!DOCTYPE html>
<html>
<?php
$this->view("template/head", array("title" => $head_title));
$this->view("template/notifications");
?>
<body>
	<div class="wrapping">
		<?php $this->view("template/sidebar", array("active" => "items")); ?>
		<div class="content">
			<?php $this->view("template/navbar", array("nav_link" => $nav_link, "nav_text" => $nav_text)); ?>
			<div class="row">
				<div class="row_1"></div>
				<div class="row_10">
					<?php $item_info = $table->fetch_array(); ?>
					<h1>ITEM #<?=$item_info["id"]?> DETAILS</h1>
					<div class="row details">
						<div class="row_6 text_right label mr_1">
							Lot No.:
						</div>
						<div class="row_6 text_left">
							<?=$item_info["lot_no"]?>
						</div>
					</div>
					<div class="row details">
						<div class="row_6 text_right label mr_1">
							Brand:
						</div>
						<div class="row_6 text_left">
							<?=$item_info["brand"]?>
						</div>
					</div>
					<div class="row details">
						<div class="row_6 text_right label mr_1">
							Name:
						</div>
						<div class="row_6 text_left">
							<?=$item_info["name"]?>
						</div>
					</div>
					<div class="row details">
						<div class="row_6 text_right label mr_1">
							Generic Name:
						</div>
						<div class="row_6 text_left">
							<?=$item_info["name_generic"]?>
						</div>
					</div>
					<div class="row details">
						<div class="row_6 text_right label mr_1">
							Price (Per Unit):
						</div>
						<div class="row_6 text_left">
							PHP <?=$item_info["unit_price"]?>
						</div>
					</div>
					<div class="row details">
						<div class="row_6 text_right label mr_1">
							Amount (Per Unit):
						</div>
						<div class="row_6 text_left">
							<?=$item_info["unit_qty"]?>
						</div>
					</div>
					<div class="row details">
						<div class="row_6 text_right label mr_1">
							Total Price:
						</div>
						<div class="row_6 text_left">
							PHP <?=$item_info["qty"] * $item_info["unit_price"]?>
						</div>
					</div>
					<div class="row details">
						<div class="row_6 text_right label mr_1">
							Qty.:
						</div>
						<div class="row_6 text_left">
							<?=$item_info["qty"]?>
						</div>
					</div>
					<div class="row details">
						<div class="row_6 text_right label mr_1">
							Purchase Date:
						</div>
						<div class="row_6 text_left">
							<?=$item_info["date_purchase"]?>
						</div>
					</div>
					<div class="row details">
						<div class="row_6 text_right label mr_1">
							Expiry Date:
						</div>
						<div class="row_6 text_left">
							<?=$item_info["date_expire"]?>
						</div>
					</div>
					<div class="row mt_1">
						<div class="row_12 text_center">
							<button class="button btn_md btn_delete" value="<?=$item_info["id"]?>">Delete</button>
						</div>
					</div>
					<div class="row mt_1">
						<div class="row_12 text_center">
							<form action="item_update_view" method="GET">
								<input type="hidden" name="id" value="<?=$item_info["id"]?>">
								<input class="button btn_md" type="submit" value="Edit">
							</form>
						</div>
					</div>
				</div>
				<div class="row_1"></div>
			</div>
		</div>
	</div>
</body>
<div id="win_delete" class="window_container">
	<div class="window win_sm">
		<form action="item_delete" method="GET">
			<div class="win_head">
				DELETE ITEM
				<a id="win_delete_close" class="win_close">X</a>
			</div>
			<div class="win_body">
				<input id="delete_inp_id" type="hidden" name="inp_id">
				Are you sure you want to delete Account #<span id="delete_id"></span>?
			</div>
			<div class="win_foot">
				<input class="button btn_md" type="submit" value="Yes">
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	var del_buttons = document.querySelectorAll(".btn_delete");
	for (var i = del_buttons.length - 1; i >= 0; i--) {
		del_buttons[i].onclick = function() {
			document.querySelector("#win_delete").style.display = "block";
			document.querySelector("#delete_id").textContent = this.value;
			document.querySelector("#delete_inp_id").value = this.value;
		};
	}
	document.querySelector("#win_delete_close").onclick = function() {
		document.querySelector("#win_delete").style.display = "none";
	};
</script>
<script type="text/javascript" src="./assets/js/script.js"></script>
</html>
