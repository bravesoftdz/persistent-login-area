<?php

namespace PersistentLoginArea;

class Login{
	public static function Form($u = '', $p = ''){
	  ?>
	  	<form class="frmLogin" method="POST" action="login.php">
		<label>Username: <input type="text" name="username" value="<?=htmlentities($u)?>" autofocus placeholder="Username"></label>
		<label>Password: <input type="password" name="password" value="<?=htmlentities($p)?>" placeholder="Password"></label>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
	    </form>
	  <?php 
	}

	public static function DisplayError($ERROR = ''){
	    if (!empty($ERROR)){
    	?>
    	<h2>Error</h2>
    	<div class="error bg-danger">
    	<?=$ERROR?>
    	</div>
	    <?php 
	    }
	}
}