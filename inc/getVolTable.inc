<?php
	$eventID = $_GET["eventID"];

	function getResult(){
		global $eventID;
		require 'setPDO.inc';
		$eventScheduleQuery = 'SELECT * FROM VOLUNTEER_SCHEDULE_TB v, USER_TB u WHERE v.userID=u.userID and v.eventID = :evtID order by v.shiftStart';
		$getScheduleList = $pdo->prepare($eventScheduleQuery);
		$getScheduleList->bindvalue(':evtID', $eventID);
		$getScheduleList->execute();

		$num = 1;

		echo "<p style='text-align: center;'>Volunteers list</p>";

		echo "<table class='vol-Schedule-List-table'>" .
            "<col id='eventId' style='width: 15%;'>" .
            "<col id='volunteerName' style='width: 17%;'>" .
            "<col id='volunteerEmail' style='width: 18%;'>" .
            "<col id='shiftStart' style='width: 25%;'>" .
            "<col id='shiftFinish' style='width: 25%;'>" .
            "<tr>" .
            "<th>No</th>" .
            "<th>Name</th>" .
            "<th>Email</th>" .
            "<th>Shift Start</th>" .
            "<th>Shift Finish</th>" .
            "</tr>";


        if ($getScheduleList->rowCount() == 0) {
            echo "<tr>";
            echo "<td colspan='5'>No result</td>";
            echo "</tr>";
        }

        else {
    		foreach ($getScheduleList as $items) {
                echo "<tr>";
                echo "<td>" . $num . "</td>";
                echo "<td>" . $items['firstName'] . " " . $items['lastName'] . "</td>";
                echo "<td>" . $items['email'] . "</td>";
                echo "<td>" . $items['shiftStart'] . "</td>";
                echo "<td>" . $items['shiftFinish'] . "</td>";
                echo "</tr>";

                $num = $num + 1;
            }
        }

        echo "</table>";

    }

?>
