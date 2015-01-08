<?php

require __DIR__ . '/../vendor/autoload.php';

use \Ryanhs\Hook\Hook;

Hook::on('foo', function(){
	return 1;
});

Hook::on('bar', function(){
	return '3';
});

Hook::on('foo', function(){
	return 5;
});


// clear hook "bar"
Hook::clear('bar');


echo PHP_EOL . 'hook "bar":' . PHP_EOL;
var_dump(Hook::call('bar'));

echo PHP_EOL . 'hook "foo":' . PHP_EOL;
var_dump(Hook::call('foo'));
