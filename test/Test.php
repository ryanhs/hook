<?php

require __DIR__ . "/../vendor/autoload.php";

use \Ryanhs\Hook\Hook;

class Test extends PHPUnit_Framework_TestCase{
	
	
	public function test_on(){
		$return = Hook::on('init', function(){
			return 1;
		});
		
		$this->assertTrue($return);
	}
	
	public function test_clear(){
		Hook::clear();
	}
	
	public function test_clear_one(){
		Hook::clear('init');
	}
	
	public function test_call_yield(){
		Hook::clear();
		
		Hook::on('init', function(){
			return 'init 1';
		});
		
		Hook::on('init', function(){
			return 'init 2';
		});
		
		foreach(Hook::call_yield('init') as $result){
			$this->assertContains('init', $result);
		}
	}
	
	public function test_call_no_yield(){
		Hook::clear();
		
		Hook::on('init', function(){
			return 'init 1';
		});
		
		Hook::on('init', function(){
			return 'init 2';
		});
		
		$results = Hook::call('init');
		$this->assertCount(2, $results);
	}
}
