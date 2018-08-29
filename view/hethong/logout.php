<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST['logout']) && $_POST['logout']){

		if(isset($_COOKIE['account']))
			setcookie("account", NULL, -1, '/', DOMAIN);

		if(isset($_COOKIE['password']))
        	setcookie("password", NULL,  -1, '/', DOMAIN);
		
		if(isset($_SESSION["login"]))
			unset($_SESSION["login"]);			
		
		if(isset($_SESSION["account"]))
        	unset($_SESSION["account"]);

        echo 'Bạn đã logout thành công';
	}
}

?>
