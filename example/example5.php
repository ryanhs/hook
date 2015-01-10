<?php

require 'vendor/autoload.php';

use \Ryanhs\Hook\Hook;

Hook::on('finish', function(){
	echo 'job done!' . PHP_EOL;
});

Hook::on('process', function(){
	echo 'in progress!' . PHP_EOL;
});

Hook::on('init', function(){
	echo 'job retrieved!' . PHP_EOL;
});


class Job{
	public function __construct(){
		Hook::call('init');
	}
	
	public function start(){
		Hook::call('process');
		
		// some logic here
		// some logic here
		// some logic here
		
		Hook::call('finish');
	}
}


$job = new Job();
$job->start();
