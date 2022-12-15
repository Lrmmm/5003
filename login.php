<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>表单</title>
		<style>
			.a{
				display: flex;
				flex-direction: column;
				align-items: center;
			}
			table {
				border:1px solid #000000;
		        text-align: center;
			}
			table th{
				background-color: darkgray;
				border:1px solid #000000;
			}  
			table td{
				border:1px solid #000000;
				text-align: center;
			}

		</style>
	</head>
	<body>
		<div class="a">
			<form action="verify.php" method="post">
				<table>
					<tr><th colspan="2">Olympic User Login</th></tr>
					<tr>
						<td>Username:</td>
						<td><input type="text" name="username" required></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" name="password" required></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" name="submit" value="Login"/><input type="button" onclick='location.href=("register.php")' value = "register"/></td>
					</tr>
				</table>
			</from>
		</div>
	</body>
</html>