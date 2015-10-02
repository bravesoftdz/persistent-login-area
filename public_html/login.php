<?php
	namespace PersistentLoginArea;

    require_once(__DIR__.'/../lib/inc.php');    
	
	session_start();
	$ERROR = isset($_REQUEST['err']) ? Members::GetStringError($_REQUEST['err']) : false;

	$u = isset($_REQUEST['username']) ? $_REQUEST['username'] : '';
	$p = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';

	//if already authenticated 
	if (!empty($_SESSION['authenticated'])){
		header('Location: members.php');
		exit;
	}

	
	if (isset($_POST['username'])){
		if (\db::checkLogin($_POST['username'], $_POST['password'])){
			$_SESSION['authenticated'] = 1;
			$_SESSION['username'] = $_POST['username'];
			header('Location: members.php');
			exit;
		}else{
			$ERROR = 'Invalid username or password';
			$_SESSION['authenticated'] = 0;
			$_SESSION['username'] = false;
		}
	}
?>
<!doctype html>
<html>
<head>
    <?php 
    	Site::Head();
    ?>
	<title>Login</title>
</head>
<body>
<div class="container">
    <div class="row">
	    <div class="col-md-12">
	    <?php
	        Login::DisplayError($ERROR);
	    ?>
	    </div>
    </div>
    <div class="row">
    	<div class="col-md-2 col-md-offset-5">
		    <div class="center-block">
			<h2>Login</h2>
		    <?php 
		    	Login::Form($u, $p);
		    ?>
		    </div>
	    </div>
    </div>
</div>
</body>
</html>
