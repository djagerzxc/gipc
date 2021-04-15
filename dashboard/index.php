<?php
function get_result($ip) {
	return json_decode(file_get_contents('http://ip-api.com/json/' . $ip),true);
}
$ip = json_decode(fread(fopen('ip.json','r'),filesize('ip.json')),1)['ip'];
$result = get_result($ip);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Dashbaord</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<style>
			* {
				margin: 0;
				padding: 0;
				font-family: sans-serif;
			}
			main {
				position: relative;
				padding: 10px;
				color: royalblue;
			}
			main .card {
				box-shadow: 1px 1px 1px 1px rgb(235,235,235);
				background: none;
				padding: 10px;
				width: 85%;
				margin: 0 auto;
				border-left: 5px solid royalblue;
				border-radius: 10px;
				position: relative;
				overflow: hidden;
			}
			.buble .one, .buble .two, .buble .three {
				display: block;
				background: royalblue;
			}
			.buble .one, .buble .two, .buble .three {
				width: 80px;
				height: 80px;
				background: rgba(64,105,255,0.1);
				border-radius: 50%;
				position: absolute;
				right: 0;
				top: 5px;
			}
			.buble .two {
				width: 40px;
				height: 40px;
				right: 60px;
			}
			.buble .three {
				width: 70px;
				height: 70px;
				top: 60px;
				right: 55px;
			}
			main .info-ip {
				margin: 10px;
				padding: 10px;
			}
			.info-ip span {
				display: block;
				margin-top: 15px;
			}
			main .list-info {
				margin: 10px;
				text-align: left;
			}
			.list-info > b {
				padding: 0 10px;
				font-size: 20px;
			}
			.list-info b {
				padding: 0 10px;
			}
			.list-info span {
				display: block;
				color: royalblue;
				border-radius: 5px;
				box-shadow: 1px 1px 1px 1px rgb(245,245,245);
				border-left: 1px solid royalblue;
				margin: 5px 0;
				padding: 10px 0;
				word-wrap: break-word;
				font-size: 13px;
			}
			.footer {
				background: none;
				padding: 10px;
				/*border-radius: 5px;*/
				border-left: 3px dotted royalblue;
				border-right: 3px dotted royalblue;
				text-align: center;
				font-size: 12px;
			}
		</style>
	</head>
	<body>
		<main>
			<div class="card">
				<div class="buble">
					<span class="one"></span>
					<span class="two"></span>
					<span class="three"></span>
				</div>
				<div class="info-ip">
					<h1>IP Target</h1>
					<span><?= $ip ?></span>
				</div>
				<div class="list-info">
					<b>IP Lookup</b>
					<? foreach($result as $key => $rs) : ?>
					<span><b><?= $key ?></b>: <?= $rs ?></span>
					<? endforeach ?>
				</div>
				<div class="footer">
					<span>Copyright © Djagerz <?= date('Y') ?></span>
				</div>
			</div>
		</main>
	</body>
</html>