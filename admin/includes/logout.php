<?php session_start(); ?>
<?php

$_SESSION['member_name'] = null;
$_SESSION['mem_email'] = null;
$_SESSION['mem_pass'] = null;
$_SESSION['mid'] = null;

header('Location: ../../login.php');


?>