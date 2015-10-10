<?php

namespace PersistentLoginArea;

class Members {
	public static function GetStringError($err){
		switch(strtolower($err)){
			case 'nonauth': return 'You are not authorized. Please login.';
			default: return false;
		}
	}

	public static function AuthenticatedOrLogin(){
		session_start();
		if ($_SESSION['authenticated'] !== 1){
			header('Location: login.php?err=nonauth');
			exit;
		}
	}

	public static function Nav(){
	  ?>
	    <!-- Fixed navbar -->
	    <nav class="navbar navbar-default navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="#">Members Only Area</a>
	          <form class="frmRememberMe navbar-form navbar-left">
	          <label><input type="checkbox" id="cbxRememberMe" name="remember_me" value="1" <?php if (!empty($_COOKIE['username'])){
	          	?>checked<?php 
	          } ?>>Remember <?=isset($_COOKIE['username']) ? $_COOKIE['username'] : 'me'?></label>
	          </form>
	          
	        </div>
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav">
	            <li class="active"><a href="#">Home</a></li>
	            <li><a href="#about">About</a></li>
	            <li><a href="#contact">Contact</a></li>
	            <li class="dropdown">
	              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
	              <ul class="dropdown-menu">
	                <li><a href="#">Action</a></li>
	                <li><a href="#">Another action</a></li>
	                <li><a href="#">Something else here</a></li>
	                <li role="separator" class="divider"></li>
	                <li class="dropdown-header">Nav header</li>
	                <li><a href="#">Separated link</a></li>
	                <li><a href="#">One more separated link</a></li>
	              </ul>
	            </li>
	          </ul>
	          <ul class="nav navbar-nav navbar-right">
	            <li class="active"><a href="logout.php">Logout</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>
	  <?php 
	}

	public static function Head(){
		?><link rel="stylesheet" type="text/css" href="css/members.css" />
		<script src="js/members.js"></script><?php 
	}

	public static function FormAcceptRememberMe($F = null){
		if (is_null($F)){ $F = $_POST; }
		if (!empty($F['remember_me'])){
			setcookie("username",self::Username(),time()+60*60*24*30); //30 days
			return 1;
		}else{
			setcookie("username","", time() - 24*3600*10); //delete cookie
			return 0;
		}
	}

	public static function SessionStart(){
		session_start();
	}

	public static function IsAuthenticated(){
		if (!empty($_SESSION['authenticated'])){
			return true;
		}else{
			return false;
		}
	}

	public static function Username(){
		return $_SESSION['username'];
	}
}
