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
					<h1>UPDATE ITEM #<?=$item_info["id"]?></h1>
					<form class="form" action="item_edit" method="POST">
						<input type="hidden" name="inp_id" value="<?=$item_info["id"]?>">
						<div class="row details">
							<div class="row_3 text_right label mr_1">
								Lot No.:
							</div>
							<div class="row_7 text_left">
								<input class="input" type="text" name="inp_lot_no" value="<?=$item_info["lot_no"]?>">
							</div>
							<div class="row_2"></div>
						</div>
						<div class="row details">
							<div class="row_3 text_right label mr_1">
								Brand:
							</div>
							<div class="row_7 text_left">
								<input class="input" type="text" name="inp_brand" value="<?=$item_info["brand"]?>">
							</div>
							<div class="row_2"></div>
						</div>
						<div class="row details">
							<div class="row_3 text_right label mr_1">
								Name:
							</div>
							<div class="row_7 text_left">
								<input class="input" type="text" name="inp_name" value="<?=$item_info["name"]?>">
							</div>
							<div class="row_2"></div>
						</div>
						<div class="row details">
							<div class="row_3 text_right label mr_1">
								Generic Name:
							</div>
							<div class="row_7 text_left">
								<input class="input" type="text" name="inp_name_generic" value="<?=$item_info["name_generic"]?>">
							</div>
							<div class="row_2"></div>
						</div>
						<div class="row details">
							<div class="row_3 text_right label mr_1">
								Price (Per Unit):
							</div>
							<div class="row_7 text_left">
								<input class="input" type="number" name="inp_unit_price" value="<?=$item_info["unit_price"]?>">
							</div>
							<div class="row_2"></div>
						</div>
						<div class="row details">
							<div class="row_3 text_right label mr_1">
								Amount (Per Unit):
							</div>
							<div class="row_7 text_left">
								<input class="input" type="text" name="inp_unit_qty" value="<?=$item_info["unit_qty"]?>">
							</div>
							<div class="row_2"></div>
						</div>
						<div class="row details">
							<div class="row_3 text_right label mr_1">
								Qty.:
							</div>
							<div class="row_7 text_left">
								<input class="input" type="number" name="inp_qty" value="<?=$item_info["qty"]?>">
							</div>
							<div class="row_2"></div>
						</div>
						<div class="row details">
							<div class="row_3 text_right label mr_1">
								Purchase Date:
							</div>
							<div class="row_7 text_left">
								<input class="input" type="date" name="inp_date_purchase" value="<?=date("Y-m-d", strtotime($item_info["date_purchase"]))?>">
							</div>
							<div class="row_2"></div>
						</div>
						<div class="row details">
							<div class="row_3 text_right label mr_1">
								Expiry Date:
							</div>
							<div class="row_7 text_left">
								<input class="input" type="date" name="inp_date_expire" value="<?=date("Y-m-d", strtotime($item_info["date_expire"]))?>">
							</div>
							<div class="row_2"></div>
						</div>
						<div class="row mt_1">
							<div class="row_12 text_center">
								<input class="button btn_md" type="submit" value="Save Changes">
							</div>
						</div>
					</form>
				</div>
				<div class="row_1"></div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="./assets/js/script.js"></script>
</html>
