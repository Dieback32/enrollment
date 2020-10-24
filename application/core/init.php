<?php
session_start();

$GLOBALS['config'] = [
	'mysql'	   => [
		'host' => '127.0.0.1',
		'username'  => 'root',
		'password'  => '',
		'db' 		=> 'enrollment'
		],
	'sessions' => [
		'session_name' => 'user',
		'token_name'   => 'token'
		],
	];

spl_autoload_register(function($class){
 		require_once 'classes/' . $class . '.php';
});
