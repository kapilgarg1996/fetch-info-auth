<?php
	function globals($name){
		$OK = 0 ;
		$THEFT = 1 ;
		$UNAUTHENTICATED = 2 ;
		
		return ${$name} ;
	}
?>