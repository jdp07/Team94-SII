<?php
/*
	// $pdo = new PDO('mysql:host=team94.cte25mh2xbhe.ap-southeast-2.rds.amazonaws.com:3306;dbname=TEAM94', 'team94', 'stickitin');
	// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
*/	
	$pdo = new PDO('mysql:host=localhost;dbname=TEAM94', 'root', 'root');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 


/*


//This is the one that works on the server, needs to be uncommented //before pulled from the server
    $pdo = new PDO('mysql:host=localhost;dbname=TEAM94', 'root', 'password');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
*/


/*
	$pdo = new PDO('mysql:host=localhost;dbname=TEAM94', 'root', 'password123');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
*/
?>
