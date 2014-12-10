<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/functions.php");?>
<?php require_once("../includes/validation_functions.php");?>

<?php find_selected_page(); ?>

<?php
	// Unlike new_page.php, we don't need a subjcet_id to be sent
	// We already have it stored in pages.subject_id
	if (!$current_page){
		// Page ID was missing or invalid orr
		// page couldn't be found in database
		redirect_to("manage_content.php");
	}
?>

<?php
	if (isset($_POST['submit'])){
		// Process the form
		
		$id = $current_page["id"];
		$menu_name = mysql_perp($_POST["menu_name"]);
		$position = (int) $_POST["position"];
		$visible = (int) $_POST["visible"];
		$content = mysql_perp($_POST["content"]);
		
		// vallidations
		$required_fields = array("menu_name", "position", "visible", "content");
		validate_presences($required_fields);
		
		$fields_with_mas_lengths = array("menu_name" => 30);
		validate_max_lengths($fields_with_mas_lengths);
		
		if (empty($errors)){
			// perform update
			
			$query = "UPDATE pages SET ";
			$query .= "menu_name = '{$menu_name}', ";
			$query .= "position = {$position}, ";
			$query .= "visible = {$visible}, ";
			$query .= "content = '{$content}' ";
			$query .= "WHERE id = {$id} ";
			$query .= "LIMIT 1";
			
			$result = mysqli_query($connection, $query);
			
			if ($result && mysqli_affected_rows($connection) == 1){
				// success
				$_SESSION["message"] = "Page updated.";
				redirect_to("manage_content.php?page={$id}");
			}
			else{
				// failure
				$message = "Page update failed.";
			}
		}
	}
	else{
		redirect_to("new_page.php");		
	}
?>
<?php $layout_context = "admin";?>
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
	<div id="navigation">
		<?php echo navigation($current_subject, $current_page); ?>
	</div>
	<div id="page">
		<?php echo message(); ?>
		<?php echo form_errors($errors); ?>
		
		<h2>Edit Page: <?php echo htmlentities($current_page["menu_name"]); ?></h2>
		<form action="edit_page.php?page=<?php echo urldecode($current_page["id"]);?>" method="POST">
			<p>Menu name:
				<input type="text" name="menu_name" value="<?php echo htmlentities($current_page["menu_name"]); ?>" />
			</p>
			<p>Position:
				<select name="position">
					<?php
						$page_set = find_pages_for_subject($current_subject["id"]);
						$page_count = mysqli_num_rows($page_set);
						for ($count=1; $count <= $page_count; $count++){
							echo "<option value=\"{$cout}\"";
							if ($current_page["position"] == $count){
								echo " selected";
							}
							echo ">{$count}</option>";
						}
					?>
				</select>
			</p>
			<p>
				Visible:
				<input type="radio" name="visible" value="0" <?php if ($current_page["visible"] == 0) { echo "checked"; } ?>/> No
				&nbsp;
				<input type="radio" name="visible" value="1" <?php if ($current_page["visible"] == 1) { echo "checked"; } ?>/> Yes
			</p>
			<p>Content:<br />
				<textarea name="content" row="20" cols="80"><?php echo htmlentities($current_page["content"]); ?></textarea>
			</p>
			<input type="submit" name="submit" value="Edit Page"/>
		</form>
		<br />
		<a href="manage_content.php?page=<?php echo htmlentities($current_page["id"]); ?>">Cancel</a>
		&nbsp;
		&nbsp;
		<a href="delete_page.php?page=<?php echo urldecode( $current_page["id"]); ?>" onclick="return confirm('Are you sure?');">Delete</a>
	</div>
</div>
<?php include("../includes/layouts/footer.php");?>