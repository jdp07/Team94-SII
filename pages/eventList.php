<!DOCTYPE html>

<?php 
	require '../inc/header.inc';
?>


<body>
	<div class="container-fluid event">
		<!-- Include home navigation -->
		<?php
			require '../inc/nav.inc';

			//Functions to use in eventList.php

			//creatHeading creates appropriate headings
			function createHeading($heading) {

				if($heading == "Upcoming Events") {
					require '../inc/setPDO.inc';
					//Find number of upcoming events
					try {
						$statement = $pdo->prepare('SELECT COUNT(*) AS numUpcomingEvents FROM EVENTS_TB WHERE eventDate > CURDATE()');
						$statement->execute();
					}
					catch (PDOException $e) {
						echo $e->getMessage();
					}

					foreach($statement as $result) {
						$numEvents = $result['numUpcomingEvents'];
					}
				}

				else {
					require '../inc/setPDO.inc';
					//Find number of past events
					try {
						$statement = $pdo->prepare('SELECT COUNT(*) AS numPastEvents FROM EVENTS_TB WHERE eventDate < CURDATE()');
						$statement->execute();
					}
					catch (PDOException $e) {
						echo $e->getMessage();
					}

					foreach($statement as $result) {
						$numEvents = $result['numPastEvents'];
					}
				}

				echo('<div class = "row">');
				echo('	<div class = "col-md-4">');
				echo('		<div class = "row">');
				echo('			<div class = "col-md-2"></div>');
				echo('			<div class = "col-md-10">');
				echo('				<div class = "event-list-head">');
				if ($heading == "Upcoming Events") {
					echo('				<h1>'.$heading.'<br/><small> '.$numEvents.' coming soon...</small></h1>');
				}
				else {
					echo('				<h1>'.$heading.'<br/><small> '.$numEvents.' events finished!</small></h1>');
				}
				echo('				</div>');
				echo('			</div>');
				echo('		</div>');
				echo('	</div>');
				echo('	<div class = "col-md-8"></div>');
				echo('</div>');
			}

			//createBoxes creates event information boxes for the number of events under the given heading
			function createBoxes($type) {
				require '../inc/setPDO.inc';
				if($type == "upcoming") {
					//Find number of upcoming events
					try {
						$statement = $pdo->prepare('SELECT COUNT(*) AS numUpcomingEvents FROM EVENTS_TB WHERE eventDate > CURDATE()');
						$statement->execute();
					}
					catch (PDOException $e) {
						echo $e->getMessage();
					}

					foreach($statement as $result) {
						$numUpcomingEvents = $result['numUpcomingEvents'];
					}

					//Find information about upcoming events
					try {
						$statement = $pdo->prepare('SELECT * FROM EVENTS_TB where eventDate > CURDATE()');
						$statement->execute();
					}
					catch (PDOException $e) {
						echo $e->getMessage();
					}

					//Counter to know when to make rows
					$boxNum = 1;

					//Fetch results from db
					foreach($statement as $result) {
						$id = $result['eventID'];
						$name = $result['eventName'];
						$when = $result['eventDate'];
						$address = $result['eventAddress'];

						$date = new DateTime($when);
						$date = $date->format('d M Y h:ia');

						if(($boxNum + 2) % 3 == 0) {
							echo('<div class = "row">');
						}

						echo('<div class = "col-md-4">');
						echo('	<div class = "row">');
						echo('		<div class = "col-md-2"></div>');
						echo('		<div class = "col-md-8 event-list-info"><br/>');
						echo('			<div class = "event-list-info-name">'.$name.'</div>');
						echo('			<div class = "event-list-info-heading">Date: </div>');
						echo('			<div id = "event-list-info-date">'.$date.'</div>');
						echo('			<div class = "event-list-info-heading">Location: </div>');
						echo('			<div id = "event-list-info-location">'.$address.'</div><br/>');
						echo('			<center><form action = "individualEvent.php" method = "get"><button type="submit" value = "'.$id.'"class="btn btn-event" name = "eventID">More info</button></form></center><br/>');
						echo('		</div>');
						echo('	<div class = "col-md-2"></div>');
						echo('	</div>');
						echo('</div>');

						if(($boxNum % 3 == 0) || ($boxNum == $numUpcomingEvents)) {
							echo('</div>');
						}

						$boxNum++;
					}
				}

				else if($type == "past") {
					//Find number of past events
					try {
						$statement = $pdo->prepare('SELECT COUNT(*) AS numPastEvents FROM EVENTS_TB WHERE eventDate < CURDATE()');
						$statement->execute();
					}
					catch (PDOException $e) {
						echo $e->getMessage();
					}

					foreach($statement as $result) {
						$numPastEvents = $result['numPastEvents'];
					}

					//Find information about upcoming events
					try {
						$statement = $pdo->prepare('SELECT * FROM EVENTS_TB where eventDate < CURDATE()');
						$statement->execute();
					}
					catch (PDOException $e) {
						echo $e->getMessage();
					}

					//Counter to know when to make rows
					$boxNum = 1;

					//Fetch results from db
					foreach($statement as $result) {
						$id = $result['eventID'];
						$name = $result['eventName'];
						$when = $result['eventDate'];
						$address = $result['eventAddress'];

						$date = new DateTime($when);
						$date = $date->format('d M Y h:ia');

						if(($boxNum + 2) % 3 == 0) {
							echo('<div class = "row">');
						}

						echo('<div class = "col-md-4">');
						echo('	<div class = "row">');
						echo('		<div class = "col-md-2"></div>');
						echo('		<div class = "col-md-8 event-list-info"><br/>');
						echo('			<div class = "event-list-info-name">'.$name.'</div>');
						echo('			<div class = "event-list-info-heading">Date: </div>');
						echo('			<div id = "event-list-info-date">'.$date.'</div>');
						echo('			<div class = "event-list-info-heading">Location: </div>');
						echo('			<div id = "event-list-info-location">'.$address.'</div><br/>');
						echo('			<center><form action = "individualEvent.php" method = "get"><button type="submit" value = "'.$id.'"class="btn btn-event" name = "eventID">More info</button></form></center><br/>');
						echo('		</div>');
						echo('	<div class = "col-md-2"></div>');
						echo('	</div>');
						echo('</div>');

						if(($boxNum % 3 == 0) || ($boxNum == $numPastEvents)) {
							echo('</div>');
						}

						$boxNum++;
					}
				}

				else {
					//Nothing should happen
				}
			}

			//Upcoming Event list header
			createHeading('Upcoming Events');

			//Upcoming Event boxes
			createBoxes('upcoming');

			//Past Event list header
			createHeading('Past Events');

			//Past Event boxes
			createBoxes('past');

			require '../inc/footer.inc';
		?>
	</div>
</body>
