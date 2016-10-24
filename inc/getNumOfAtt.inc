<?php

	$eventID = $_GET["eventID"];
	//echo "eventId : " + $eventId;
	$getCountOfPeople = getNumberOfPeople($eventID);
	//echo "!!!!!!getCountOfPeople: " . $getCountOfPeople['TOTAL'];

	$pInfoHtml = makePersonHtml($getCountOfPeople['TOTAL'], $eventID);
	echo $pInfoHtml;
	function getNumberOfPeople ($_eventId){
        require 'setPDO.inc';
		$getNumberOfPeopleQuery = 'SELECT (ADDCNT + ROWCNT) AS TOTAL FROM (SELECT sum(additionalAttendees) as ADDCNT, count(*) as ROWCNT FROM TEAM94.EVENT_ATTENDEES_TB WHERE eventID = :evtID) p;';
		$getNumberOfPeople = $pdo->prepare($getNumberOfPeopleQuery);
		$getNumberOfPeople->bindvalue(':evtID', $_eventId);
		$getNumberOfPeople->execute();

		return $getNumberOfPeople->fetch();
	}

	function makePersonHtml ($_personCnt, $_eventId){
	    require 'setPDO.inc';
		$_tmpHtml = "<p>";
		$_tmpHtml .= "<b>" . $_personCnt . " </b>";



		try {
		    $pastQuery = 'SELECT COUNT(*) AS isPastEvent FROM EVENTS_TB WHERE eventID = :id AND eventDate > CURDATE()';
		    $pastQuery = $pdo->prepare($pastQuery);
//    		$query11 = $pdo->prepare('SELECT COUNT(*) AS isPastEvent FROM EVENTS_TB WHERE eventID = :id AND eventDate > CURDATE()');
	    	$pastQuery->bindvalue(':id', $_eventId);
		    $pastQuery->execute();
		}
		catch (PDOException $e) {
		    echo $e->getMessage();
		}

		foreach($pastQuery as $result) {
	        $isPastEvent = $result['isPastEvent'];
		}

		if($isPastEvent > 0) { // this is a upcoming event
		    $_tmpHtml .= "people have RSVP'd to this event. Click the button below to RSVP now!";
		}
		else {
		    $_tmpHtml .= "people have RSVP'd to this event.";
		}

		$_tmpHtml .= "</p>";
		$_tmpHtml .= "</p><br>";
		return $_tmpHtml;

	}
?>
