<?php
	require '../inc/setPDO.inc';
// function insertRSVPinfo($eventID, $userID, $donationAmount, $dietaryReqs, $additionalAttendees) {

    try {

// echo "safsdfsfsadfwqr23532523523dsfsqr342wef2134wefasdf23rsefa";

// echo "<br><br>".$_GET['eventID']."<br>".$_GET['userID']."<br>".$_GET['do-amount']."<br>".$_GET['dietaryReqs']."<br>".$_GET['additionalAttendees'];



//     echo "<br>eventID: ".$eventID."<br>userID: ".$userID."<br>donationAmount: ".$donationAmount."<br>dietaryReqs: ".$dietaryReqs."<br>additionalAttendees: ".$additionalAttendees;

        // get date of today to store registration date in database
        date_default_timezone_set('Australia/Brisbane');
        $today = date('Y-m-d');



        // insert. salt and encrypt password
        $stmt = $pdo->prepare('INSERT INTO TEAM94.EVENT_ATTENDEES_TB (eventID, userID, donationAmount, additionalAttendees, dietaryReqs) '.
            'VALUES(:eventID, :userID, :donationAmount, :additionalAttendees, :dietaryReqs)');

        $stmt->bindParam(':eventID', $_GET['eventID'], PDO::PARAM_STR);
        $stmt->bindParam(':userID', $_GET['userID'], PDO::PARAM_STR);
        $stmt->bindParam(':donationAmount', $_GET['do-amount'], PDO::PARAM_STR);
        $stmt->bindParam(':additionalAttendees', $_GET['additionalAttendees'], PDO::PARAM_STR);
        $stmt->bindParam(':dietaryReqs', $_GET['dietaryReqs'], PDO::PARAM_STR);

        $stmt->execute();


		$stmt = $pdo->prepare('INSERT INTO TEAM94.DONATION_TB (userID, eventID, donationAmount, date) '.
            'VALUES(:userID, :eventID, :donationAmount, NOW())');

		$stmt->bindParam(':userID', $_GET['userID'], PDO::PARAM_STR);
		$stmt->bindParam(':eventID', $_GET['eventID'], PDO::PARAM_STR);
		$stmt->bindParam(':donationAmount', $_GET['do-amount'], PDO::PARAM_STR);

		$stmt->execute();

        // success
//         echo "<script>alert('Registered successfully!!\\r\\nIt will be moved to main page automatically');</script>";

		echo "<script>location.href='http://{$_SERVER['HTTP_HOST']}/Team94-SII/pages/individualEvent.php?eventID=".$_GET['eventID']."'</script>";

    }

//     // fail to insert
    catch (Exception $e) {
        echo "errorrrrrrrrrrrrrrrrrr<br>";
        echo $e->getMessage();
    }


?>
