<?php 
	require_once('Classes/Dotenv.php');
	require_once('Classes/Loader.php');
	require_once('Classes/Validator.php');
	$env = new Dotenv\Dotenv(__DIR__, ".env-".$department);
	$env->load();
?>