<?php
    namespace PersistentLoginArea;
	
	include_once(__DIR__.'/../lib/inc.php');

	Members::AuthenticatedOrLogin();
?>
<!doctype html>
<html>
<head>
	<?php
		Site::Head();
		Members::Head();
	?>
	<title>Members Area</title>
</head>
<body>
<?php Members::Nav(); ?>
<div class="row">
	<div class="col-md-11">
	   Welcome to Member's Only Area <?=$_SESSION['username']?>
	</div>
</div>

</body>
</html>
