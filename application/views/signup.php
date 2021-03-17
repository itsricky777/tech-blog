<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="<?=base_url('signup/save');?>" method="post">
		<table border="1">
			<tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" name="password"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit"></td>
			</tr>
		</table>
	</form>
</body>
</html>