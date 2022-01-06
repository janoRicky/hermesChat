
<head>
	<title><?=$title?></title>
	<link rel="stylesheet" type="text/css" href="./assets/css/main.css">
	<script type="text/javascript">
		udlogin = () => {
		    var xmlhttp = new XMLHttpRequest();
		    xmlhttp.open("GET", "<?=$this->cfg->base_url()?>ajax_user_log_in_check", true);
		    xmlhttp.send();
		}
		udlogin();
		setInterval(function() {
			udlogin();
		}, 30000);
	</script>
</head>