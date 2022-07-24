<?php
	session_start();
	if(isset($_SESSION['user_id'])){
		unset($_SESSION['user_id']);
		session_destroy();
	}
	if(isset($_SESSION['ins_id'])){
		unset($_SESSION['ins_id']);
		session_destroy();
	}
	header('Location: landing.php');
?>