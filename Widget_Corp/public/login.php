<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php
$username = "";

	if(isset($_POST['submit'])){
	
		//validations
		$required_fields = array("username","password");
		validate_presences($required_fields);

		if(empty($errors)){
		
			//Attempt login
			
			$username = $_POST["username"];
			$password = $_POST["password"];
			
			$found_admin = attempt_login($username, $password);
		
		if($found_admin){
			redirect_to("admin.php");
		} else{
			$_SESSION["message"]="Username/password not found";
		}
	}
		}else{
		} //end: if(isset($_POST['submit']))
?>

<?php $layout_context="admin"; ?>
<?php include("../includes/layouts/header.php");?>
<div id="main">
	<div id="navigation">
	&nbsp;
	</div>
	<div id="page">
		<?php echo message();?>
		<?php echo form_errors($errors);?>
		
		<h2>Login</h2>
		<form action="login.php" method="POST">
			<p>Username:
				<input type="text" name="username" value="<?php echo htmlentities ($username); ?>"/>
			</p>
			<p>Password:
				<input name="password" name="password" value="">
			</p>
			<input type="submit" name="submit" value="Submit" />
		</form>
	</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
