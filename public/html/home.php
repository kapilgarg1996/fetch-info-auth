<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
<?php
	require_once(__DIR__.'/../../script/auth/auth.php') ;
	if(isset($_POST['logout'])){
		setcookie('login', "", time()-10000000, "/", "", false, true) ;
		setcookie('session_id', "", time()-1000000, "/", "", false, true) ;
		header('Location: http://fetchinfo.com/fetch-info-auth/public/html/login.php');
	}
	$result = auth() ;
	if(is_integer($result)){
		header('Location: http://fetchinfo.com/fetch-info-auth/public/html/login.php');
	}
	else{
		setcookie('login', $result[1], time()+86400, "/", "", false, true) ;
		setcookie('session_id', $result[0], time()+86400, "/", "", false, true) ;
	}
?>
<h1>Hello</h1>
<form action="" method="post">
	<input type="hidden" name="logout" value="<?php echo $result[1] ?>">
	<input type="submit" value="logout">
</form>
</body>
</html>