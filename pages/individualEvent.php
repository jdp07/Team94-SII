<!DOCTYPE html>

<?php require '../inc/header.inc'; ?>



<body>
    <div class="container-fluid event">
        <!-- HOME NAVIGATION -->
        <?php
            require '../inc/nav.inc';
        ?>
        <!-- END HOME NAVIGATION -->


		<div class = "event-head">
			<h1>City Meetup at Domino's Pizza!</h1>
		</div>
		<div class = "event-sponsors">
			<h2>Sponsors</h2>
			<h4>Coca-Cola</h4>
			<h4>Queensland University of Technology</h4>
		</div>
		<div class = "row">
			<div class = "col-md-6 event-information">
				Details
				<table class = "table table-bordered">
					<tr>
						<td>Address</td><td>105 Albert Street, BRISBANE QLD 4000</td>
					</tr>
					<tr>
						<td>Date</td><td>25th September 2016 7:00pm</td>
					</tr>
					<tr>
						<td>Finish</td><td>25th September 2016 9:00pm</td>
					</tr>
					<tr>
						<td>Cost</td><td>To be decided...</td>
					</tr>
				</table>
			</div>
			<div class = "col-md-6 event-description">
				meme
			</div>
		</div>

        <?php
        require '../inc/footer.inc';
        ?>
    </div>
</body>

