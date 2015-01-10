<?php

require 'vendor/autoload.php';

use \Ryanhs\Hook\Hook;

Hook::on('test', function(){
	return 1;
});

Hook::on('test', function(){
	return '3';
});

Hook::on('test', function(){
	return 5;
});

echo 'call_yield:' . PHP_EOL . PHP_EOL;
foreach(Hook::call_yield('test') as $return){
	echo $return . PHP_EOL;
}

echo PHP_EOL . str_repeat('=', 10) . PHP_EOL;

echo 'call: (return as array)' . PHP_EOL . PHP_EOL;
var_dump(Hook::call('test'));
