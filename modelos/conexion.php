<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=ret_db",
			            "root",
			            "");

		$link->exec("set names utf8");

		return $link;

	}

}