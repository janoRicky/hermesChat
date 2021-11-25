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
			<div class="row mb_3">
				<div class="row_1"></div>
				<div class="row_10">
					<h1>ITEMS</h1>
					<form action="items" method="GET">
						<div class="row mt_1">
							<div class="row_10">
								<input class="textbox txt_sm" type="text" name="search" value="<?=(isset($search_val) ? $search_val : "")?>">
							</div>
							<div class="row_2 text_center">
								<input class="button btn_sm" type="submit" value="&#128270; SEARCH">
							</div>
						</div>
					</form>
					<div class="row mt_1">
						<div class="row_8">
							<h4><?=$page_details["desc"]?></h4>
						</div>
						<div class="row_4 text_right">
							<button id="btn_print" class="button btn_md mr_1"><span class="text_md">&#128438;</span> PRINT</button>
							<button id="btn_add" class="button btn_md mr_1"><span class="text_md">&#43;</span> ADD</button>
						</div>
					</div>
					<div id="table_container" class="table_container">
						<table class="table">
							<thead>
								<tr>
									<th>ID</th>
									<th>Lot No.</th>
									<th>Brand</th>
									<th>Name</th>
									<th>Name (Generic)</th>
									<th>Price (Per Unit)</th>
									<th>Amount (Per Unit)</th>
									<th>Total Price</th>
									<th>Qty.</th>
									<th>Purchase Date</th>
									<th>Expiry Date</th>
									<th class="table_exclude">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($table as $key => $val): ?>
								<tr>
									<td><?=$val["id"]?></td>
									<td><?=$val["lot_no"]?></td>
									<td><?=$val["brand"]?></td>
									<td><?=$val["name"]?></td>
									<td><?=$val["name_generic"]?></td>
									<td>PHP <?=$val["unit_price"]?></td>
									<td><?=$val["unit_qty"]?></td>
									<td>PHP <?=$val["qty"] * $val["unit_price"]?></td>
									<td><?=$val["qty"]?></td>
									<td><?=$val["date_purchase"]?></td>
									<td><?=$val["date_expire"]?></td>
									<td class="table_exclude text_center">
										<form action="item_view" method="GET">
											<input type="hidden" name="id" value="<?=$val["id"]?>">
											<input class="button btn_md" type="submit" value="&#128065; View">
										</form>
										<form action="item_update_view" method="GET">
											<input type="hidden" name="id" value="<?=$val["id"]?>">
											<input class="button btn_md" type="submit" value="&#128395; Edit">
										</form>
										<button class="button btn_sm btn_delete" value="<?=$val["id"]?>">&#128465; Delete</button>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<form class="row mt_2" action="items" method="GET">
						<input id="page_no" type="hidden" name="pg">
						<input type="hidden" name="search" value="<?=(isset($search_val) ? $search_val : "")?>">
						<div class="row_6 text_right">
							<button id="pg_prev" class="button btn_sm mr_1" value="<?=($page_details['prev'] != NULL ? $page_details['prev'] : '')?>" <?=($page_details["prev"] != NULL ? "" : "disabled")?>>< PAGE</button>
						</div>
						<div class="row_6 text_left">
							<button id="pg_next" class="button btn_sm mr_1" value="<?=($page_details['next'] != NULL ? $page_details['next'] : '')?>" <?=($page_details["next"] != NULL ? "" : "disabled")?>>PAGE ></button>
						</div>
					</form>
				</div>
				<div class="row_1"></div>
			</div>
		</div>
	</div>
</body>
<div id="win_add" class="window_container">
	<div class="window win_md">
		<form action="item_add" method="POST">
			<div class="win_head">
				ADD NEW ITEM
				<a id="win_add_close" class="win_close">X</a>
			</div>
			<div class="win_body">
				<div class="form">
					<div class="row">
						<div class="row_12 group">
							<div class="label">Lot No.:</div>
							<input class="input" type="text" name="inp_lot_no">
						</div>
					</div>
					<div class="row">
						<div class="row_12 group">
							<div class="label">Brand:</div>
							<input class="input" type="text" name="inp_brand">
						</div>
					</div>
					<div class="row">
						<div class="row_12 group">
							<div class="label">Name:</div>
							<input class="input" type="text" name="inp_name">
						</div>
					</div>
					<div class="row">
						<div class="row_12 group">
							<div class="label">Generic Name:</div>
							<input class="input" type="text" name="inp_name_generic">
						</div>
					</div>
					<div class="row">
						<div class="row_6 group">
							<div class="label">Price (Per Unit):</div>
							<input class="input" type="number" name="inp_unit_price">
						</div>
						<div class="row_6 group">
							<div class="label">Amount (Per Unit):</div>
							<input class="input" type="text" name="inp_unit_qty">
						</div>
					</div>
					<div class="row">
						<div class="row_4 group">
							<div class="label">Qty.:</div>
							<input class="input" type="number" name="inp_qty">
						</div>
						<div class="row_4 group">
							<div class="label">Purchase Date:</div>
							<input class="input" type="date" name="inp_date_purchase" value="<?=date("Y-m-d")?>">
						</div>
						<div class="row_4 group">
							<div class="label">Expiry Date:</div>
							<input class="input" type="date" name="inp_date_expire" value="<?=date("Y-m-d")?>">
						</div>
					</div>
				</div>
			</div>
			<div class="win_foot">
				<input class="button btn_md" type="submit" value="Add">
			</div>
		</form>
	</div>
</div>
<div id="win_delete" class="window_container">
	<div class="window win_sm">
		<form action="item_delete" method="GET">
			<div class="win_head">
				DELETE ITEM
				<a id="win_delete_close" class="win_close">X</a>
			</div>
			<div class="win_body">
				<input id="delete_inp_id" type="hidden" name="inp_id">
				Are you sure you want to delete Item #<span id="delete_id"></span>?
			</div>
			<div class="win_foot">
				<input class="button btn_md" type="submit" value="Yes">
			</div>
		</form>
	</div>
</div>
<script type="text/javascript" src="./assets/js/paging.js"></script>
<script type="text/javascript" src="./assets/js/script.js"></script>
</html>
