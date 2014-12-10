<?php
	//1. Create a databse connection
	define("DB_SERVER", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "widget_corp");
	
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	/*
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "widget_corp";*/
	
	//$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	// Test if connection succeeded
	if(mysqli_connect_errno()){
		die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
	}
?>