<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<?php
	require_once(__DIR__.'/../../script/auth/auth.php') ;
		$result = auth() ;
		if(!is_integer($result)){
			setcookie('login', $result[1], time()+86400, "/", "", false, true) ;
			setcookie('session_id', $result[0], time()+86400, "/", "", false, true) ;
			header('Location: home.php');
		}
?>
<form action="" method="post">
	<input type="text" name="email" maxlength="30" placeholder="username">
	<input type="password" name="password" maxlength="30" placeholder="password">
	<input type="submit" value="Submit">
</form>
</body>
</html>