<?php
	require 'vendor/autoload.php';
	use Carbon\Carbon;

	$messg = 'Below are the results for Openlink Application Server Services.';
	$file = dirname(dirname(__FILE__)) . '\data\services_status.json';

	$stat = stat($file);
	$today = Carbon::createFromTimestamp($stat['mtime']);	