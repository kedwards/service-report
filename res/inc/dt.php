<?php
	require 'vendor/autoload.php';
	use Carbon\Carbon;
	use JsonStreamingParser\Listener\InMemoryListener;
	use JsonStreamingParser\Parser;
	
	$messg = 'Below are the results for Openlink Application Server Services.'; 
	
	$today = Carbon::now();
	if ($today->hour > 0 && $today->hour < 4) {
		$today->hour = 0;
		$today->minute = 0;
	} else if ($today->hour > 4 && $today->hour < 8) {
		$today->hour = 4;
		$today->minute = 0;
	} else if ($today->hour > 8 && $today->hour < 12) {
		$today->hour = 8;
		$today->minute = 0;
	} else if ($today->hour > 12 && $today->hour < 16) {
		$today->hour = 12;
		$today->minute = 0;
	} else if ($today->hour > 12 && $today->hour < 16) {
		$today->hour = 16;
	} else if ($today->hour > 16 && $today->hour < 20) {
		$today->hour = 20;
	} else if ($today->hour > 20 && $today->hour < 24) {
		$today->hour = 24;
	}
	
	
	$file = dirname(dirname(__FILE__)) . '../data/services_status.json';
	
	$listener = new InMemoryListener();
	$stream = fopen($file, 'r');
	try {
		$parser = new Parser($stream, $listener);
		$parser->parse();
		fclose($stream);
	} catch (Exception $e) {
		fclose($stream);
		throw $e;
	}

	//exit(d($today, $listener->getJson()));
	