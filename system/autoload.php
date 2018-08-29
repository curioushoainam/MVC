<?php 
ob_start();
session_start();
include "system/define/define.php";
include "system/libs/funcs.php";
include "system/libs/ckeditor_funcs.php";

login();

spl_autoload_register(function($classname){
	// $classname : tên class khi thực hiện lệnh new để sử dụng trong hệ thống,
	// chương trình sẽ tự động phát hiện và trả về tên ở đây.
	// Khi đó, dùng tên này kiểm tra vị trí của file và load thư viện đó vào
	if (file_exists("system/config/$classname.php"))
		include "system/config/$classname.php";
	if (file_exists("system/core/$classname.php"))
		include "system/core/$classname.php";
	if (file_exists("system/libs/$classname.php"))
		include "system/libs/$classname.php";

	if (file_exists("controller/$classname.php"))
		include "controller/$classname.php";

	if (file_exists("model/$classname.php"))
		include "model/$classname.php"; 
	
});

?>