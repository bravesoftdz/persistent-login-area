<?php
session_start();
$_SESSION['authenticated'] = 0;
$_SESSION['username'] = false;

header('Location: login.php');
exit;