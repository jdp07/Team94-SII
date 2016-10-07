<!DOCTYPE html>

<?php 
	require '../inc/header.inc';
	require '../inc/setPDO.inc';
?>


<body>
	<div class="container-fluid event">
		<!-- Include home navigation -->
		<?php
			require '../inc/nav.inc';

			//Functions to use in eventList.php

			//creatHeading creates appropriate headings
			function createHeading($heading) {
				echo('<div class = "row">');
				echo('	<div class = "col-md-4">');
				echo('		<div class = "row">');
				echo('			<div class = "col-md-2"></div>');
				echo('			<div class = "col-md-10">');
				echo('				<div class = "event-list-head"');
				echo('					<h1>'.$heading.'</h1>');
				echo('				</div>');
				echo('			</div>');
				echo('		</div>');
				echo('	</div>');
				echo('	<div class = "col-md-8"></div>');
				echo('</div>');
			}

			//createBoxes creates event information boxes for the number of events under the given heading
			function createBoxes($type) {
				if($type == "upcoming") {
					//Find number of upcoming events
					
				}

				else if($type == "past") {

				}

				else {
					//Nothing should happen
				}
			}
		?>
		
		<!-- Event list header -->
		<div class = "row">
			<div class = "col-md-4">
				<div class = "row">
					<div class = "col-md-2"></div>
					<div class = "col-md-10">
						<div class = "event-list-head">
							<h1>Upcoming Events</h1>
						</div>
					</div>
				</div>
			</div>
			<div class = "col-md-8"></div>
		</div>
	
		<!-- Rows of boxes -->
		<div class = "row">

			<!-- Col 1-->
			<div class = "col-md-4">
				<div class = "row">
					<div class = "col-md-2"></div>
					<div class = "col-md-8 event-list-info">
						<br/>
						<div class = "event-list-info-name">Event name</div>
						<div class = "event-list-info-heading">Date: </div>
						<div id = "event-list-info-date">Tuesday 1st November 2016</div>
						<div class = "event-list-info-heading">Time: </div>
						<div id = "event-list-info-time">1:00pm</div>
						<div class = "event-list-info-heading">Location: </div>
						<div id = "event-list-info-location">80 Albert Street, Brisbane 4000</div>
						<br/>
						<center><button type="button" class="btn btn-event">More info</button></center>
						<br/>
					</div>
					<div class = "col-md-2"></div>
				</div>
			</div>
			
			<!-- Col 2 -->
			<div class = "col-md-4">
				<div class = "row">
					<div class = "col-md-2"></div>
					<div class = "col-md-8 event-list-info">
						<br/>
						<div class = "event-list-info-name">Event name</div>
						<div class = "event-list-info-heading">Date: </div>
						<div id = "event-list-info-date">Tuesday 1st November 2016</div>
						<div class = "event-list-info-heading">Time: </div>
						<div id = "event-list-info-time">1:00pm</div>
						<div class = "event-list-info-heading">Location: </div>
						<div id = "event-list-info-location">80 Albert Street, Brisbane 4000</div>
						<br/>
						<center><button type="button" class="btn btn-event">More info</button></center>
						<br/>
					</div>
					<div class = "col-md-2"></div>
				</div>
			</div>

			<!-- Col 3 -->
			<div class = "col-md-4">
				<div class = "row">
					<div class = "col-md-2"></div>
					<div class = "col-md-8 event-list-info">
						<br/>
						<div class = "event-list-info-name">Event name</div>
						<div class = "event-list-info-heading">Date: </div>
						<div id = "event-list-info-date">Tuesday 1st November 2016</div>
						<div class = "event-list-info-heading">Time: </div>
						<div id = "event-list-info-time">1:00pm</div>
						<div class = "event-list-info-heading">Location: </div>
						<div id = "event-list-info-location">80 Albert Street, Brisbane 4000</div>
						<br/>
						<center><button type="button" class="btn btn-event">More info</button></center>
						<br/>
					</div>
					<div class = "col-md-2"></div>
				</div>
			</div>
		</div>

		<!-- Past event list header -->
		<div class = "row">
			<div class = "col-md-4">
				<div class = "row">
					<div class = "col-md-2"></div>
					<div class = "col-md-10">
						<div class = "event-list-head">
							<h1>Past Events</h1>
						</div>
					</div>
				</div>
			</div>

			<div class = "col-md-8">
			</div>
		</div>

		<!-- Rows of boxes -->
		<div class = "row">

			<!-- Col 1-->
			<div class = "col-md-4">
				<div class = "row">
					<div class = "col-md-2"></div>
					<div class = "col-md-8 event-list-info">
						<br/>
						<div class = "event-list-info-name">Event name</div>
						<div class = "event-list-info-heading">Date: </div>
						<div id = "event-list-info-date">Tuesday 1st November 2016</div>
						<div class = "event-list-info-heading">Time: </div>
						<div id = "event-list-info-time">1:00pm</div>
						<div class = "event-list-info-heading">Location: </div>
						<div id = "event-list-info-location">80 Albert Street, Brisbane 4000</div>
						<br/>
						<center><button type="button" class="btn btn-event">More info</button></center>
						<br/>
					</div>
					<div class = "col-md-2"></div>
				</div>
			</div>
			
			<!-- Col 2 -->
			<div class = "col-md-4">
				<div class = "row">
					<div class = "col-md-2"></div>
					<div class = "col-md-8 event-list-info">
						<br/>
						<div class = "event-list-info-name">Event name</div>
						<div class = "event-list-info-heading">Date: </div>
						<div id = "event-list-info-date">Tuesday 1st November 2016</div>
						<div class = "event-list-info-heading">Time: </div>
						<div id = "event-list-info-time">1:00pm</div>
						<div class = "event-list-info-heading">Location: </div>
						<div id = "event-list-info-location">80 Albert Street, Brisbane 4000</div>
						<br/>
						<center><button type="button" class="btn btn-event">More info</button></center>
						<br/>
					</div>
					<div class = "col-md-2"></div>
				</div>
			</div>

		<!-- Include footer -->
		<?php
			require '../inc/footer.inc';
		?>
	</div>
</body>
