<?php
$file = file_get_contents('./services_status_raw.json');
$newfile = './services_status.json';

$regexp = '@(?<=\[)[^\]]+(?=\])@';
preg_match_all($regexp, $file, $keys);
$keys = array_unique($keys);

$str = '[';

/*
for($i = 0; $i < count($keys[0]); $i++) {
	$str .= $keys[0][$i] . ',';
}
*/
$str .= implode(',', $keys[0]);

$str .= ']';
file_put_contents($newfile, $str);