<?php
	if(isset($_POST['logout'])){
		setcookie('login', "", time()-1000000, "/", "", false, true) ;
		setcookie('session_id', "", time()-1000000, "/", "", false, true) ;
		header('Location: http://fetchinfo.com/fetch-info-auth/public/html/login.php');
	}
?>