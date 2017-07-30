<?php ob_start();  ?>
<?php session_start(); //labar away kar lagal user akayn pewsytman ba session abe bamash session ishy pe akre ?>
<?php

$_SESSION['username']=null; // batal krdnaway session yan cancel krdny session
$_SESSION['user_id']=null;
$_SESSION['user_role']=null;

header("Location: ../includes/header.php?destroy=session");

?>