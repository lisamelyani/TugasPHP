		<div id="footer">Copyright <?php echo("Y");?>, Widget Corp</div>
	</body>
</html>

<?php
	//5. Close database conncetion
	if(isset($connection)){
	mysqli_close($connection);
	}
?>