<html>
	<head>
		<title>KALBIS System</title>
		<link type="text/css" rel="stylesheet" href="Css/css_login.css" />
		<link rel="icon" type="image/ico" href="Images/favicon.ico">
	</head>
	<body>
		<table>
			<tr>
				<td>
					<div id="main_logo">
						<img src="Images/logo_login.png" />
					</div>
				</td>
				<td>
					<form action="Module/index.php" method="POST">
						<div id="outter_form_login">
							<table>
								<tr>
									<td>
										<img  id="logo_sign" src="Images/sign.png" />
									</td>
								</tr>
								<tr>
									<td>
										<div class="inputan" >
											<input type="text" placeholder="Username" maxlength="10">
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="inputan">
											<input type="password" placeholder="Password">
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="inputan" id="tb_sign">
											<input type="submit" value="SIGN IN">
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<p style="color:red;">Invalid Username and Password</p>
									</td>
								</tr>
							</table>
						</div>
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>