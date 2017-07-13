<?php
	require 'vendor/autoload.php';
	use Carbon\Carbon;
	use JsonStreamingParser\Listener\InMemoryListener;
	use JsonStreamingParser\Parser;
	
	$messg = 'Below are the results for Openlink Application Server Services.'; 
	$file = dirname(dirname(__FILE__)) . '\data\services_status.json';

	$stat = stat($file);
	$today = Carbon::createFromTimestamp($stat['mtime']);
	
	/*
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
    */
    
	//exit(d($today, $listener->getJson()));
	