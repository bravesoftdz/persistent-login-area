<?php
include_once(__DIR__.'/../config/db.config.inc.php');

try{
	$db = new PDO('mysql:host='.$config['db_host'].';dbname='.$config['db_name'], $config['db_username'], $config['db_password']);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db_error = false;
}catch(PDOException $e){
	$db_error = $e->getMessage();
}
