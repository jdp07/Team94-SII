<?php
	$eventID = $_GET["eventID"];
	//echo "eventId : " + $eventId;
	$getCountOfPeople = getNumberOfPeople($eventID);
	//echo "!!!!!!getCountOfPeople: " . $getCountOfPeople['TOTAL'];

	$pInfoHtml = makePersonHtml($getCountOfPeople['TOTAL']);
	echo $pInfoHtml;
	function getNumberOfPeople ($_eventId){
		require 'setPDO.inc';
		$getNumberOfPeopleQuery = 'SELECT (ADDCNT + ROWCNT) AS TOTAL FROM (SELECT sum(additionalAttendees) as ADDCNT, count(*) as ROWCNT FROM TEAM94.EVENT_ATTENDEES_TB WHERE eventID = :evtID) p;';
		$getNumberOfPeople = $pdo->prepare($getNumberOfPeopleQuery);
		$getNumberOfPeople->bindvalue(':evtID', $_eventId);
		$getNumberOfPeople->execute();

		return $getNumberOfPeople->fetch();
	}

	function makePersonHtml ($_personCnt){
		$_tmpHtml = "<p>";
		$_tmpHtml .= "<b>" . $_personCnt . " </b>";
		$_tmpHtml .= "people have RSVP'd to this event. Click the button below to RSVP now!";
		$_tmpHtml .= "</p>";
		$_tmpHtml .= "</p><br>";
		return $_tmpHtml;

	}
?>
