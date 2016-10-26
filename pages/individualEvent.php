<!DOCTYPE html>

<?php
	require '../inc/header.inc';
	require '../inc/setPDO.inc';
?>

<body>
    <div class="container-fluid event">
        <!-- HOME NAVIGATION -->
        <?php
            require '../inc/nav.inc';
        ?>
        <!-- END HOME NAVIGATION -->

		<?php
			if(!isset($_GET['eventID'])){
				header("Location: http://{$_SERVER['HTTP_HOST']}/Team94-SII/pages/404.php");
			}

			require '../inc/setPDO.inc';

			$result = $pdo->prepare('SELECT * FROM EVENTS_TB WHERE EVENTS_TB.eventID = :id');
			$result->bindvalue(':id', $_GET['eventID']);
			$result->execute();

			//If there isn't any results for that
			if($result->rowCount() < 1) {
				header("Location: http://{$_SERVER['HTTP_HOST']}/Team94-SII/pages/404.php");
			}

			//Check amount donated for this event
			$query = $pdo->prepare('SELECT SUM(donationAmount) as donationAmount FROM DONATION_TB WHERE eventID = :id');
			$query->bindvalue(':id', $_GET['eventID']);
			$query->execute();

			foreach($query as $row) {
				$totalDonated = $row['donationAmount'];
				if($totalDonated == "") {
					$totalDonated = '0';
				}
			}
			
			
		
			foreach($result as $row) {
				$eventName = $row['eventName'];
				$details = $row['eventDetail'];
				$address = $row['eventAddress'];
				$startTime = $row['eventDate'];
				$finishTime = $row['eventFinish'];
				$donationGoal = $row['donationGoal'];
				$minCost = $row['minCost'];
		?>
		<?php
			if ($_SESSION['userType'] == 'A'){ 
		?>
		<form method="post" action="updateEvent.php">
		<div class="event-head">
			<input type="text" id="eventName" name="eventName" class="headUpdateEvent" value='<?php echo $eventName ?>'>
		</div>

		<div class = "event-donations">
			<h3>Donation Goal: <b><input type="number" name="donationGoal" id="donationGoal" value='<?php echo $donationGoal ?>'></b></h3>
			<h3>Amounted Donated: <b>$<?php echo $totalDonated ?></b></h3>
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
							<td>Address</td><td><input class="event-update" type="text" name="address" id="address" value='<?php echo $address ?>'></td>
						</tr>
						<tr>
							<td>Start Time</td><td><input class="event-update" type="datetime-local" id="start" name="start" value='<?php echo $startTime ?>'></td>
						</tr>
						<tr>
							<td>Finish</td><td><input class="event-update" type="datetime-local" id="finish" value='<?php echo $finishTime ?>'></td>
						</tr>
						<tr>
							<td>Cost</td><td><input class="event-update" type="number" name="cost" id="cost" value='<?php echo $minCost ?>'></td>
						</tr>
					<input type="hidden" id="eventID" name="eventID" value="<?php echo $_GET['eventID']?>">
				</table>
					
			</div>
			<div class = "col-md-4 event-description">
				<h3>What it's about</h3>
				<textarea rows="5" name="details" class="event-details" id="details" value='<?php echo $details ?>'><?php echo $details ?></textarea>
			</div>
			<div class = "col-md-2"></div>
		</div>
			<button type="submit" class="saveEvent">Save Details</button>
		</form>

		<?php	} else {	?>
		<div class = "event-head">
			<h1><?php echo $eventName ?></h1>
		</div>

		<div class = "event-donations">
			<h3>Donation Goal: <b>$<?php echo $donationGoal ?></b></h3>
			<h3>Amounted Donated: <b>$<?php echo $totalDonated ?></b></h3>
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
						<td>Address</td><td id="address"><span><?php echo $address ?></span></td>
					</tr>
					<tr>
						<td>Date</td><td id="start"><?php echo $startTime ?></td>
					</tr>
					<tr>
						<td>Finish</td><td id="finish"><?php echo $finishTime ?></td>
					</tr>
					<tr>
						<td>Cost</td><td id="cost"><?php echo $minCost ?></td>
					</tr>

				</table>
			</div>
			<div class = "col-md-4 event-description">
				<h3>What it's about</h3>
				<p><?php echo $details ?></p>
			</div>
			<div class = "col-md-2"></div>
		</div>
		<?php
			}
			}

						
			//END While loop for database data
		?>
		<!-- # people going and button row -->
		<div class = "row">
			<div class = "col-md-4"></div>
			<div class = "col-md-4 event-rsvp">
<!-- 				<p><b>23</b> people have RSVP'd to this event. Click the button below to RSVP now!</p> -->
				<?php
					require '../inc/getNumOfAtt.inc';
					

					
					

				try {
					    	$query11 = $pdo->prepare('SELECT COUNT(*) AS isPastEvent FROM EVENTS_TB WHERE eventID = :id AND eventDate > CURDATE()');
						    $query11->bindvalue(':id', $_GET['eventID']);
						    $query11->execute();
					    }
					    catch (PDOException $e) {
						    echo $e->getMessage();
					    }

					    foreach($query11 as $result) {
						    $isPastEvent = $result['isPastEvent'];
				    	}

				    	if($isPastEvent > 0) { // this is a upcoming event

            				echo "<div id=\"rsvp-buttons\">";
			            	echo "<input type=\"button\" id=\"hide\" class=\"btn btn-event\" value=\"Hide\">";
            				echo "<input type=\"button\" id=\"show\" class=\"btn btn-event\" value=\"RSVP\">";
            				echo "</div>";
            				echo "<div id=\"rsvp-content\"><br><br>";






                            if(!isset($_SESSION['loggedIn'])) { // not loggedin
                                echo "<p style=\"font-weight: 400; color: red; font-size: 15pt\">Please login to RSVP now!</p>";
                            }
                            else { // loggedin
                                $query = "SELECT * FROM TEAM94.EVENT_ATTENDEES_TB WHERE userID = :userID AND eventID = :eventID";
                                $query = $pdo->prepare($query);

                                $query->bindvalue(':userID', $_SESSION['id']);
                                $query->bindvalue(':eventID', $_GET['eventID']);
                                $query->execute();

                                if($query->rowCount() > 0) { // registed for the event

                                    foreach($query as $row) {
                        				$donatedAmountByUser = $row['donationAmount'];
                        			}

                                    echo "<p style=\"font-weight: 400; color: blue; font-size: 15pt\">You register for the event already!</p>";
                                    echo "<p style=\"margin-top: -5pt\">You donated <b>$" . $donatedAmountByUser . "</b></p>";
                                }

                                else { // registed for the event yet
                                	if (!isset($_GET['do-amount'])) {

                                	    $do_cost_min = (int)$minCost;
                                        $do_cost_5 = $do_cost_min+5;
                                        $do_cost_10 = $do_cost_min+10;
                                        $do_cost_20 = $do_cost_min+20;
                                        $do_cost_50 = $do_cost_min+50;
                                        $do_cost_75 = $do_cost_min+75;

                                        echo "<form id=\"rsvpInputForm\" name=\"rsvpInputForm1\" method=\"get\" action=\"../js/script.js\">";
                                        echo "<input type=\"hidden\" id=\"eventID\" name=\"eventID\" value=\"" . $_GET['eventID'] ."\">";
                                        echo "<input type=\"hidden\" id=\"userID\" name=\"userID\" value=\"" . $_SESSION['id'] ."\">";
                                        echo "<p>Donation $";

                                        echo "<select id=\"do-amount\" name=\"do-amount\">";
                                        echo "<option value='" . $do_cost_min . "'>" . $do_cost_min . "</option>";
                                        echo "<option value='" . $do_cost_5 . "'>" . $do_cost_5 . "</option>";
                                        echo "<option value='" . $do_cost_10 . "'>" . $do_cost_10 . "</option>";
                                        echo "<option value='" . $do_cost_20 . "'>" . $do_cost_20 . "</option>";
                                        echo "<option value='" . $do_cost_50 . "'>" . $do_cost_50 . "</option>";
                                        echo "<option value='" . $do_cost_75 . "'>" . $do_cost_75 . "</option>";
                                        echo "<option value='1000000'>1000000</option>";
                                        echo "</select>";

                                        echo "</p>";

                                        echo "<input type=\"hidden\" id=\"dietaryReqs\" name=\"dietaryReqs\" value=\"\">";
                                        echo "<input type=\"hidden\" id=\"additionalAttendees\" name=\"additionalAttendees\" value=\"\">";

                                        echo "<input type=\"button\" id=\"rsvpSubmitBtn\" name=\"rsvpSubmit\" class=\"btn btn-event\" value=\"RSVP\" onclick=\"rsvpSubmitFnc('". $_GET['eventID'] . "', 'rsvpInputForm')\">";

                                        echo "</form>";
//                                         <input type=\"button\" id=\"searchBtn\" name=\"searchForm\" value=\" \"  onclick=\"searchDo()\">
                                    }

                                    else { // when submitted RSVP

//                                         echo "sdfsafasfdsafdsadfsadfsadfsda";

                                	    require '../inc/insertRSVP.php';

//                                 	    echo insertRSVPinfo($_GET['eventID'], $_SESSION['id'], $_GET['do-amount'], $_GET['dietaryReqs'], $_GET['additionalAttendees']);
//                                         require '../inc/setPDO.inc';



//                                 	    insertRSVPinfo($_GET['eventID'], $_SESSION['id'], $_GET['do-amount'], $_GET['dietaryReqs'], 0);
                                    }
                                }

                            }
                        }

                        else {
                            echo "<div>";
                            echo "<p style=\"font-weight: 400; color: red; font-size: 15pt\">This is a past event</p>";
                        }

                        ?>

<!--                 <p>ddddd</p> -->
				</div> <!-- end of div: rsvp-content -->


			</div>
		</div>
		<div id='vol-Schedule-List'>
			<?php // get table
                require '../inc/getVolTable.inc';
                getResult();
            ?>
        </div>
        <?php
        	require '../inc/footer.inc';
        ?>
</body>
   

