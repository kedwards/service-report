<!doctype html>
<?php require(dirname(__FILE__) . '/res/inc/dt.php'); ?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Openlink Services</title>
	<meta name="description" content="Openlink Endur Service Report">
	<meta name="author" content="MRM_TEAM">
	<link rel="icon" type="image/vnd.microsoft.icon" href="res/img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="res/css/app.css">
</head>
<body>
	<div class="utility">&nbsp;</div>
	<div class="header">
		<div class="headerRow">
			<div class="column">
				<div class="logo">
					<a href="/"><img src="res/img/enb-logo-reversed.png" alt="Enbridge logo"></a>
				</div>
			</div>
		</div>
	</div>
	<div class="main">
		<div class="frame ">
			<div class="breadcrumb">
				<a href="http://mrmwebp.enbridge.com/">MRM Home</a> &raquo; Openlink Service Report
			</div>
			<div class="clearfix"></div>
			<div id="content" class="content-sub clearfix">
				<div id="contentNavigation" class="sidenav">
					<img src="res/img/ol.jpg" alt="Openlink logo" height="100" width="100">
				</div>
				<div id="contentMain" class="maincontent">
					<h1>Openlink Service Report</h1>
					<div class="content-boundaries">
						<p style="float: left;"><em><?php echo $messg; ?></em></p>
						<em style="float: right;">Services Last Verified <b><?php echo $today->diffForHumans(); ?></b></em>
						<div class="clearfix"></div>
						<p>
							<ul>
								<li><button class="filter" id="edm" type="button">Edmonton</button></li>
								<li><button class="filter" id="tor" type="button">Toronto</button></li>
								<li><button class="filter" id="err" type="button">Error State</button></li>
                                <li><button class="filter" id="mis" type="button">Svc Mismatch</button></li>
								<li><button class="filter" id="clr" type="button">Clear Filter</button></li>
							</ul>
						</p>
						<div id="report_data"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="footerRow">
			<div class="column footer-copyright-wrap">
				<div class="copyright">
					&COPY; Enbridge Inc. All Rights Reserved
				</div>
			</div>
		</div>
	</div>
	<script data-main="res/js/main" src="res/lib/require.js"></script>
</body>
</html>