<!DOCTYPE html>

<?php require '../inc/header.inc'; ?>



<body>
	<div class="container-fluid event">
		<!-- Include home navigation -->
		<?php
			require '../inc/nav.inc';
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
