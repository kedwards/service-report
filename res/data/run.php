<?php
$file = file_get_contents(realpath(dirname(__FILE__)) . '/services_status_raw.json');
$newfile = realpath(dirname(__FILE__)) . '/services_status.json';

$regexp = '@(?<=\[)[^\]]+(?=\])@';
preg_match_all($regexp, $file, $keys);
$keys = array_unique($keys);

$str = '[' . implode(',', $keys[0]) . ']';
file_put_contents($newfile, $str);