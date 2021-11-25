<?php if (isset($_SESSION["alert"])): ?>
	<div id="notif_container" class="notif_container">
		<div id="notif" class="notif">
			<?=$_SESSION["alert"]?>
		</div>
	</div>
	<script type="text/javascript">
		document.getElementById("notif_container").onclick = function() {
			document.getElementById("notif_container").style.display = "none";
		};
		var ctr = <?=$this->cfg->notif_timeout()?>;
		var ctr_max = ctr;
		window.setTimeout(document.getElementById("notif_container").onclick, ctr);
		var alpha = setInterval(function() {
			if (ctr < 0) {
				clearInterval(alpha);
			}
			document.getElementById("notif_container").style.background = "rgba(0,0,0," + (1 * (ctr / ctr_max)) + ")";
			ctr -= 50;
			console.log(ctr / ctr_max);
		}, 50);
	</script>
<?php endif; ?>