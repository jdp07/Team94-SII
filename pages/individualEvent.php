<!DOCTYPE html>

<?php require '../inc/header.inc'; ?>



<body>
    <div class="container-fluid event">
        <!-- HOME NAVIGATION -->
        <?php
            require '../inc/nav.inc';
        ?>
        <!-- END HOME NAVIGATION -->

		<?php
			if(!isset($_POST['eventID'])){
				echo "Error loading webpage";
				die();
			}
			
		
			$result = $pdo->prepare('SELECT * FROM EVENTS_TB WHERE EVENTS_TB.eventID = :id');
			$result->bindvalue(':id', $_POST['eventID']);
			$result->execute();
		
			while ($row = $result->fetch(PDO::FETCH_ASSOC)){
				$eventName = $row['eventName'];
				$details = $row['eventDetail'];
				$address = $row['eventAddress'];
				$startTime = $row['eventDate'];
				$finishTime = $row['eventFinish'];
				$donationGoal = $row['donationGoal'];
				$minCost = $row['minCost'];
		?>
		
		<div class = "event-head">
			<h1><?php $eventName ?></h1>
		</div>

		<div class = "event-donations">
			<h3>Donation Goal: <b><?php $donationGoal ?></b></h3>
			<h3>Amounted Donated: <b>$</b></h3>
		</div>

		<div class = "event-sponsors">
			<h2>Sponsors</h2>
			<h4>Coca-Cola</h4>
			<h4>Queensland University of Technology</h4>
		</div>

		<!-- Event information and description row -->

		<div class = "row">
			<div class = "col-md-2"></div>
			<div class = "col-md-4 event-information">
				<h3>Details</h3>
				<table class = "table table-bordered">
					<tr>
						<td>Address</td><td><?php $address ?></td>
					</tr>
					<tr>
						<td>Date</td><td><?php $startTime ?></td>
					</tr>
					<tr>
						<td>Finish</td><td><?php $finishTime ?></td>
					</tr>
					<tr>
						<td>Cost</td><td><?php $minCost ?></td>
					</tr>
				</table>
			</div>
			<div class = "col-md-4 event-description">
				<h3>What it's about</h3>
				<p><?php $details ?></p>
			</div>
			<div class = "col-md-2"></div>
		</div>
		<?php 
			} //END While loop for database data 
		?> 
		<!-- # people going and button row -->
		<div class = "row">
			<div class = "col-md-4"></div>
			<div class = "col-md-4 event-rsvp">
				<p><b>23</b> people have RSVP'd to this event. Click the button below to RSVP now!</p>
				<button type="button" class="btn btn-event">RSVP</button>
			</div>
			<div class = "col-md-4"></div>
		</div>

        <?php
        require '../inc/footer.inc';
        ?>
    </div>
</body>

