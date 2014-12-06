<?php
	//1. Create a database Connection
	$dbhost = "localhost";
	$dbuser = "widget_cms";
	$dbpass = "scretpassword";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	//Test if connection succeded
	if(mysqli_connect_errno()){
		die("Database Connection failed: "
			mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
	}
?>

<ul>
	<?php
		// 3. Use returned data (if any)
		while($subject = mysqli_fetch_assoc($result)){
			//output data from each row
	?>
		<li><?php echo $subject["menu_name"]. " (" . $subject["id"] . ")"; ?></li>
	<?php
		}
	?>
</ul>
<?php require_once("../includes/functions.php"); ?>
<?
	// 2. Perform database query
	$query = "SELECT * ";
	$query = "FROM subjects ";
	$query = "WHERE visible = 1";
	$query = "ORDER BY position ASC";
	$result = mysqli_query($connection, $query);
	// Test if there was a query error
	if($result){
		die("Database query failed");
	}
?>
<?php include("../includes/layouts/header.php"); ?>
<div id="main">
	<div id="navigaton">
		&nbsp;
	</div>
	<div id="page">
		<h2>Manage Content</h2>
				
	</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>

