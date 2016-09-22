<?php
	function checkLogin($email, $password){
		require 'setPDO.inc';
		
		$query = $pdo->prepare('SELECT *
								FROM USER_TB
								WHERE email = :email
                                AND password = SHA2(CONCAT(:password, salt), 0)');

        $query->bindvalue(':password', $password);
		$query->bindvalue(':email', $email);
		$query->execute();
		return $query->rowCount() > 0;	
	}
?>