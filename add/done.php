<?php
session_start();
if(!isset($_SESSION['signedin'])){
	header("location: ../player.php");
}

$_SESSION["playlist"]=0;
header("location: ../index.php");
?>