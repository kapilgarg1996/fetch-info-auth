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
		header('Location: http://fetchinfo.com/fetch-info-auth/public/html/login.php');
	}
	else{
		setcookie('login', $result[1], time()+86400, "", "", false, true) ;
		setcookie('session_id', $result[0], time()+86400, "", "", false, true) ;
	}
?>
<h1>Hello</h1>
</body>
</html>