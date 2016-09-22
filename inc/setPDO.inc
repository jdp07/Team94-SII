<?php
/*	$pdo = new PDO('mysql:host=team94.czhnhvf64gi4.us-west-2.rds.amazonaws.com:3306;dbname=TEAM94', 'team94', 'stickitin');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/
    
    $pdo = new PDO('mysql:host=localhost;dbname=TEAM94', 'root', 'password');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

