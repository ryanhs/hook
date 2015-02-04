<?php

require 'vendor/autoload.php';

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
	
	public function test_pass_param(){
		Hook::clear();
		
		$return = null;
		Hook::on('param_test', function($params) use (&$return){
			$return = $params['return'];
		});
		
		
		Hook::call('param_test', array(
			'return' => 'test param'
		));
		
		$this->assertEquals('test param', $return);
	}
}
