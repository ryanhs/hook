<?php

namespace Ryanhs\Hook;

class Hook{
	
	private static $hook = array();
	
	public static function on($state, $f){
		if(!isset(self::$hook[$state]))
			self::$hook[$state] = array();
			
		self::$hook[$state][] = $f;
		
		return true;
	}
	
	public static function call_yield($state, $params = array()){
		if(isset(self::$hook[$state])){
			foreach(self::$hook[$state] as $f){
				if(is_callable($f)){
					yield call_user_func($f, array_merge(array(
						'state' => $state,
						'timestamp' => time(),
					), $params));
				}
			}
		}
	}
	
	// call no yield
	public static function call($state, $params = array()){
		$results = array();
		
		if(isset(self::$hook[$state])){
			$return = true;
			foreach(self::$hook[$state] as $f){
				if(is_callable($f)){
					$results[] = call_user_func($f, array_merge(array(
						'state' => $state,
						'timestamp' => time(),
					), $params));
				}
			}
		}
		
		return $results;
	}
	
	public static function clear($state = null){
		if($state == null){
			self::$hook = array();
		}else{
			self::$hook[$state] = array();	
		}
	}
}
