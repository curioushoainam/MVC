<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST['logout']) && $_POST['logout']){

		if(isset($_COOKIE['user']))
			setcookie("user", NULL, -1, '/', DOMAIN);

		if(isset($_COOKIE['password']))
        	setcookie("password", NULL,  -1, '/', DOMAIN);
		
		if(isset($_SESSION["user_login"]))
			unset($_SESSION["user_login"]);			
		
		if(isset($_SESSION["user"]))
        	unset($_SESSION["user"]);

        echo 'Bạn đã logout thành công';
	}
}

?>
