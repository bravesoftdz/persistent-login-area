<?php
require(__DIR__.'/db.inc.php');

if (!empty($db_error)){
   throw new Exception($db_error);	
}

class db{
	public static function pdo(){
		global $db;
		return $db;
	}	

	public static function checkLogin($username, $password){
		global $db;
		$prep = $db->prepare('SELECT COUNT(*) FROM users WHERE username = :username AND pwd = PASSWORD(:password)');
		$prep->execute(['username'=>$username, 'password'=>$password]);
		$row = $prep->fetch(PDO::FETCH_ASSOC);
		return $row['COUNT(*)'] == 1;
	}
}
