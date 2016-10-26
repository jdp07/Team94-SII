<?php



// function insertRSVPinfo($eventID, $userID, $donationAmount, $dietaryReqs, $additionalAttendees) {



// echo "safsdfsfsadfwqr23532523523dsfsqr342wef2134wefasdf23rsefa";

// echo "<br><br>".$_GET['eventID']."<br>".$_GET['userID']."<br>".$_GET['do-amount']."<br>".$_GET['dietaryReqs']."<br>".$_GET['additionalAttendees'];



//     echo "<br>eventID: ".$eventID."<br>userID: ".$userID."<br>donationAmount: ".$donationAmount."<br>dietaryReqs: ".$dietaryReqs."<br>additionalAttendees: ".$additionalAttendees;

        // get date of today to store registration date in database

//        $today = date('Y-m-d');


    require '../inc/setPDO.inc';
    date_default_timezone_set('Australia/Brisbane');

    if($_GET['type'] == 1) { // update

        try {
            $stmt = $pdo->prepare('UPDATE TEAM94.DONATION_TB SET donationAmount = :donationAmount WHERE userID = :userID AND eventID = :eventID');

            $stmt->bindParam(':donationAmount', $_GET['do-amount'], PDO::PARAM_STR);
            $stmt->bindParam(':userID', $_GET['userID'], PDO::PARAM_STR);
            $stmt->bindParam(':eventID', $_GET['eventID'], PDO::PARAM_STR);

            $stmt->execute();


            echo "<script>location.href='http://{$_SERVER['HTTP_HOST']}/Team94-SII/pages/individualEvent.php?eventID=".$_GET['eventID']."'</script>";

        }

        // fail to update
        catch (Exception $e) {
            echo "error<br>code: 0<br>";
            echo $e->getMessage();
        }


        try {

            $stmt = $pdo->prepare('UPDATE TEAM94.EVENT_ATTENDEES_TB SET donationAmount = :donationAmount WHERE userID = :userID AND eventID = :eventID');

            $stmt->bindParam(':donationAmount', $_GET['do-amount'], PDO::PARAM_STR);
            $stmt->bindParam(':userID', $_GET['userID'], PDO::PARAM_STR);
            $stmt->bindParam(':eventID', $_GET['eventID'], PDO::PARAM_STR);

            $stmt->execute();


            echo "<script>location.href='http://{$_SERVER['HTTP_HOST']}/Team94-SII/pages/individualEvent.php?eventID=".$_GET['eventID']."'</script>";

        }

        // fail to update
        catch (Exception $e) {
            echo "error<br>code: 1<br>";
            echo $e->getMessage();
        }

    }

    if($_GET['type'] == 2) { // insert

        try {
            // insert
            $stmt = $pdo->prepare('INSERT INTO TEAM94.EVENT_ATTENDEES_TB (eventID, userID, donationAmount, additionalAttendees, dietaryReqs) '.
                'VALUES(:eventID, :userID, :donationAmount, :additionalAttendees, :dietaryReqs)');

            $stmt->bindParam(':eventID', $_GET['eventID'], PDO::PARAM_STR);
            $stmt->bindParam(':userID', $_GET['userID'], PDO::PARAM_STR);
            $stmt->bindParam(':donationAmount', $_GET['do-amount'], PDO::PARAM_STR);
            $stmt->bindParam(':additionalAttendees', $_GET['additionalAttendees'], PDO::PARAM_STR);
            $stmt->bindParam(':dietaryReqs', $_GET['dietaryReqs'], PDO::PARAM_STR);

            $stmt->execute();

        }

        // fail to insert
        catch (Exception $e) {
            echo "error<br>code: 2<br>";
            echo $e->getMessage();
        }


        try {
            $stmt = $pdo->prepare('INSERT INTO TEAM94.DONATION_TB (userID, eventID, donationAmount, date) '.
                'VALUES(:userID, :eventID, :donationAmount, NOW())');

            $stmt->bindParam(':userID', $_GET['userID'], PDO::PARAM_STR);
            $stmt->bindParam(':eventID', $_GET['eventID'], PDO::PARAM_STR);
            $stmt->bindParam(':donationAmount', $_GET['do-amount'], PDO::PARAM_STR);

            $stmt->execute();

            echo "<script>location.href='http://{$_SERVER['HTTP_HOST']}/Team94-SII/pages/individualEvent.php?eventID=".$_GET['eventID']."'</script>";

        }


        // fail to insert
        catch (Exception $e) {
            echo "error<br>code: 3<br>";
            echo $e->getMessage();
        }
    }

?>
