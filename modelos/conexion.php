<?php

class Conexion{

	static public function conectar(){

		//$link = new PDO("mysql:host=localhost:3306;dbname=ret_db",
		$link = new PDO("mysql:host=localhost:33065;dbname=ret_db",
			            "root",
			            "");

		$link->exec("set names utf8");

		return $link;

	}

}