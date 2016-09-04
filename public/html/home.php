<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
<?php
	require_once(__DIR__.'/../../script/auth/auth.php') ;
	$result = auth() ;
	if(is_integer($result)){
		header('Location: login.php');
	}
	else{
		setcookie('login', $result[1], time()+86400, "/", "", false, true) ;
		setcookie('session_id', $result[0], time()+86400, "/", "", false, true) ;
	}
?>
<h1>Hello</h1>
<form action="../../script/auth/logout.php" method="post">
	<input type="submit" value="logout" name="logout">
</form>
</body>
</html>