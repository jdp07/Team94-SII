<?php

function donateAmountDisplayRegi($_minCost) {

    $do_cost = 50;

    echo "<option value='" . $_minCost . "'>" . $_minCost . "</option>";

	if($_minCost < 10) {
        echo "<option value='10'>10</option>";
    }
    if($_minCost < 20) {
        echo "<option value='20'>20</option>";
    }
    if($_minCost < 30) {
        echo "<option value='30'>30</option>";
    }
    if($_minCost < 50) {
        echo "<option value='50'>50</option>";
    }
    if($_minCost < 75) {
        echo "<option value='75'>75</option>";
    }

    for($i = 2; $i < 11; $i++) {
            echo "<option value='" . ($do_cost * $i) . "'>" . ($do_cost * $i) . "</option>";
    }

}

function amount($_donatedAmount, $_amount) {

    if($_donatedAmount + $_amount < 500) {
        echo "<option value='" . ($_donatedAmount + $_amount) . "'>" . $_amount . "</option>";
        return 1;
    }
    else {
        return 0;
    }

}

function donateAmountDisplayReDo($_donatedAmount) {

    $flag = 0;
    $dona = (int)$_donatedAmount;

    $flag = amount($dona, 10);

	if($flag == 1) {
    	$flag = amount($dona, 20);
    }
    if($flag == 1) {
    	$flag = amount($dona, 30);
    }
    if($flag == 1) {
        $flag = amount($dona, 50);
    }
    if($flag == 1) {
        $flag = amount($dona, 70);
    }
    if($flag == 1) {
        $flag = amount($dona, 100);
    }

    if($flag == 0) {
    	echo "<option value='" . (500 - $dona) . "'>" . (500 - $dona) . "</option>";
	}
}


function donationAndRSVP($eventID, $minCost) {
	require 'setPDO.inc';

    try {
            $query11 = $pdo->prepare('SELECT COUNT(*) AS isPastEvent FROM EVENTS_TB WHERE eventID = :id AND eventDate > CURDATE()');
            $query11->bindvalue(':id', $eventID);
            $query11->execute();
    }

    catch (PDOException $e) {
        echo $e->getMessage();
    }

    foreach($query11 as $result) {
        $isPastEvent = $result['isPastEvent'];
    }

    if($isPastEvent > 0) { // this is a upcoming event



        if(!isset($_SESSION['loggedIn'])) { // not loggedin


            echo "<div id=\"rsvp-buttons\">";
            echo "<input type=\"button\" id=\"hide\" class=\"btn btn-event\" value=\"Hide\">";
            echo "<input type=\"button\" id=\"show\" class=\"btn btn-event\" value=\"RSVP\">";
            echo "</div>";
            echo "<div id=\"rsvp-content\"><br>";


            echo "<p style=\"font-weight: 400; color: red; font-size: 15pt\">Please login to RSVP now!</p>";
        }

        else { // loggedin



			if (!isset($_GET['do-amount'])) {

				$query = "SELECT * FROM TEAM94.EVENT_ATTENDEES_TB WHERE userID = :userID AND eventID = :eventID";
				$query = $pdo->prepare($query);

				$query->bindvalue(':userID', $_SESSION['id']);
				$query->bindvalue(':eventID', $eventID);
				$query->execute();

				if($query->rowCount() > 0) { // loggedin, registed for the event

					foreach($query as $row) {
						$donatedAmountByUser = $row['donationAmount'];
					}


					echo "<div id=\"rsvp-buttons\">";
                    echo "<input type=\"button\" id=\"hide\" class=\"btn btn-event\" value=\"Hide\">";
                    echo "<input type=\"button\" id=\"show\" class=\"btn btn-event\" value=\"RSVP\">";
                    echo "</div>";
                    echo "<div id=\"rsvp-content\"><br>";

					echo "<p style=\"font-weight: 400; color: blue; font-size: 15pt\">You have registered for the event already!</p>";
					echo "<p style=\"margin-top: -5pt\">You donated <b>$ " . $donatedAmountByUser . "</b></p>";
					echo "<p style=\"margin-top: -5pt\">You can donate more</b></p>";

					if($donatedAmountByUser < 500) { // loggedin, registed, can donate more

						echo "<form id=\"rsvpInputForm\" name=\"rsvpInputForm1\" method=\"get\" action=\"../js/script.js\">";
						echo "<input type=\"hidden\" id=\"eventID\" name=\"eventID\" value=\"" . $eventID ."\">";
						echo "<input type=\"hidden\" id=\"userID\" name=\"userID\" value=\"" . $_SESSION['id'] ."\">";
						echo "<input type=\"hidden\" id=\"type\" name=\"type\" value=\"1\">";
						echo "Cardholder's name <input type=\"text\" name=\"ch\" id=\"ch\" required><br>";
						echo "Card number <input type=\"text\" name=\"cn\" id=\"cn\" required><br>";
						echo "Expiry date <input type=\"text\" name=\"ed\" id=\"ed\" required><br>";
						echo "Security code <input type=\"text\" name=\"sn\" id=\"sn\" required><br>";
						echo "<p>Donation $ ";

						echo "<select id=\"do-amount\" name=\"do-amount\">";

						donateAmountDisplayReDo($donatedAmountByUser);

						echo "</select>";

						echo "</p>";

						echo "<input type=\"hidden\" id=\"dietaryReqs\" name=\"dietaryReqs\" value=\"\">";
						echo "<input type=\"hidden\" id=\"additionalAttendees\" name=\"additionalAttendees\" value=\"\">";

						echo "<input type=\"button\" id=\"rsvpSubmitBtn\" name=\"rsvpSubmit\" class=\"btn btn-event\" value=\"Donate\" onclick=\"rsvpSubmitFnc('". $eventID . "', 'rsvpInputForm')\">";

						echo "</form>";

					} // if($donatedAmountByUser < 500) { // can donate more

				} // if($query->rowCount() > 0) { // registed for the event


				else { // loggedin, not registed for the event yet

				        echo "<div id=\"rsvp-buttons\">";
                        echo "<input type=\"button\" id=\"hide\" class=\"btn btn-event\" value=\"Hide\">";
                        echo "<input type=\"button\" id=\"show\" class=\"btn btn-event\" value=\"RSVP\">";
                        echo "</div>";
                        echo "<div id=\"rsvp-content\"><br>";


						echo "<form id=\"rsvpInputForm\" name=\"rsvpInputForm1\" method=\"get\" action=\"../js/script.js\">";
						echo "<input type=\"hidden\" id=\"eventID\" name=\"eventID\" value=\"" . $_GET['eventID'] ."\">";
						echo "<input type=\"hidden\" id=\"userID\" name=\"userID\" value=\"" . $_SESSION['id'] ."\">";
						echo "<input type=\"hidden\" id=\"type\" name=\"type\" value=\"2\">";
						echo "Cardholder's name <input type=\"text\" name=\"ch\" id=\"ch\" required><br>";
						echo "Card number <input type=\"text\" name=\"cn\" id=\"cn\" required><br>";
						echo "Expiry date <input type=\"text\" name=\"ed\" id=\"ed\" required><br>";
						echo "Security code <input type=\"text\" name=\"sn\" id=\"sn\" required><br>";
						echo "<p>Donation $ ";

						echo "<select id=\"do-amount\" name=\"do-amount\">";

						echo donateAmountDisplayRegi((int)$minCost);

						echo "</select>";

						echo "</p>";

						echo "<input type=\"hidden\" id=\"dietaryReqs\" name=\"dietaryReqs\" value=\"\">";
						echo "<input type=\"hidden\" id=\"additionalAttendees\" name=\"additionalAttendees\" value=\"\">";

						echo "<input type=\"button\" id=\"rsvpSubmitBtn\" name=\"rsvpSubmit\" class=\"btn btn-event\" value=\"RSVP\" onclick=\"rsvpSubmitFnc('". $_GET['eventID'] . "', 'rsvpInputForm')\">";

						echo "</form>";

				} // else { // not registed for the event yet or donate more

			} // if (!isset($_GET['do-amount'])) {

			else { // when submitted RSVP


				require '../inc/insertRSVP.php';

	//          echo insertRSVPinfo($_GET['eventID'], $_SESSION['id'], $_GET['do-amount'], $_GET['dietaryReqs'], $_GET['additionalAttendees']);
	//          require '../inc/setPDO.inc';

	//          insertRSVPinfo($_GET['eventID'], $_SESSION['id'], $_GET['do-amount'], $_GET['dietaryReqs'], 0);
			} // submit

        } // if-logged in

    } // upcomming event


    else {
        echo "<div>";
        echo "<p style=\"font-weight: 400; color: red; font-size: 15pt\">This is a past event</p>";
    }
}


?>
