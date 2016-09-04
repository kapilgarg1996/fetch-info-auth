<?php
	require_once(__DIR__.'/connect.php' );
	require_once(__DIR__.'/globals.php' );

	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	function authCookie(){
		$conn = connect() ;
		if(isset($_COOKIE['session_id'])){
			$session_id = $_COOKIE['session_id'] ;
			$query = "select * from session where session_id='".$session_id."'" ;
			$result = mysqli_query($conn, $query) ;
			if(mysqli_num_rows($result) == 1){
				$token = mysqli_fetch_row($result)[1] ;
				if(isset($_COOKIE['login'])){
					$login = $_COOKIE['login'] ;
					echo "Session: ".$session_id."\n Token: ".$token."\n Cookie: ".$login ;
					if($token == $login){
						$new_token = generateRandomString(100) ;
						$new_time = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s'))+86400000) ;
						$query = "update session set token='".$new_token."', expire_time='".$new_time."' where session_id='".$session_id."'" ;
						$result = mysqli_query($conn, $query) ;
						return [$session_id, $new_token] ;
					}
					else{
							return globals("THEFT") ;
					}
				}
				else{
					return globals("UNAUTHENTICATED") ;
				}
			}
			return globals("UNAUTHENTICATED") ;
		}
		return globals("UNAUTHENTICATED") ;
	}

?>