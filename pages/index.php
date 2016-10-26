<!DOCTYPE html>

<?php require '../inc/header.inc'; ?>



<body>
    <div class="container-fluid index-body">
        <!-- HOME NAVIGATION -->
        <?php
            require '../inc/nav.inc';
        ?>
        <!-- END HOME NAVIGATION -->
        <div class="jumbotron text-center main-statement">
            <h1>Come and Join Your Local Community Events<br><small>You'll get a lot out of it</small></h1>
        </div>
        <div class="centerBlock text-center"> <!-- Event button -->
			<button type="button" class="btn btn-event" onclick="location.href='eventList.php';">View Events</button>
        </div>
        <?php
        require '../inc/footer.inc';
        ?>
    </div>
</body>

