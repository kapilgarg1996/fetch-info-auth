<?php
	require_once(__DIR__.'/connect.php' );
	require_once(__DIR__.'/globals.php' );
	require_once(__DIR__.'/authenticate.php' );

	function auth(){
		$result = authCookie() ;
		if(is_integer($result)){
			if(isset($_POST['email'])){
				$email = $_POST['email'] ;
				$pass = $_POST['password'] ;
				$conn = connect() ;
				$query = "Select * from user where email='".$email."' and password='".$pass."'" ;
				$result = mysqli_query($conn, $query) ;
				if(mysqli_num_rows($result)==1){
					
					$uid = mysqli_fetch_row($result)[0] ;
					$new_token = generateRandomString(100) ;
					$new_time = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s'))+86400) ;
					$new_session = generateRandomString(100) ;

					
					$query = "insert into session values('".$new_session."','".$new_token."',".$uid.",'".$new_time."')" ;
					
					if( mysqli_query($conn, $query)){
						return [$new_session, $new_token] ;
					}
					return globals("UNAUTHENTICATED") ;
				}
				return globals("UNAUTHENTICATED") ;
			}
			return globals("UNAUTHENTICATED") ;
		}
		else{
			return $result ;
		}
	}
?>