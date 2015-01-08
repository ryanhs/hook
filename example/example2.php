<?php

require __DIR__ . '/../vendor/autoload.php';

use \Ryanhs\Hook\Hook;

Hook::on('test', function(){
	echo 'hook 1!' . PHP_EOL;
});

Hook::on('test', function(){
	echo 'hook 2!' . PHP_EOL;
});


Hook::call('test');
