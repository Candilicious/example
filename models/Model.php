<?php

class Model
{
	//подключение БД
	protected $db;
	public function __construct () {
		$params=array
		(
			'host'     => $_ENV['DBHOST'],
			'username' => $_ENV['DBLOGIN'],
			'password' => $_ENV['DBPASSWORD'],
			'dbname'   => $_ENV['DBNAME'],
			'charset'  => 'utf8',
			'_debug'   => false
		);
		$this->db=go\DB\DB::create($params, 'mysql');
	}
}