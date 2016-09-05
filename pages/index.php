<!DOCTYPE html>

<?php require '../inc/header.inc'; ?>



<body>
    <div class="container-fluid index-body">
        <!-- HOME NAVIGATION -->
        <div class="col-md-12">
            <div class=".col-md-6 .col-md-offset-3">
                <div class="row">
                    <div id="navigation">
                        <ul>
                            <div class="col-md-4 col-md-offset-4">
                                <li class="active"><a href="index.php">Home</a></li>
                                <li class="active"><a href="#">Events</a></li>
                                <li class=""><a href="#">Contact</a></li>
                                <li class="active"><a href="about.php">About</a></li>
                            </div>
                            <div class="col-md-2 col-md-offset-2">
                                <li class="active"><a href="#">Login</a></li>
                                <li class="active"><a href="#">Register</a></li>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- END HOME NAVIGATION -->
        <div class="jumbotron text-center main-statement">
            <h1>Come and Join Your Local Community Events<br><small>You'll get a lot out of it</small></h1>
        </div>
        <div class="centerBlock text-center">
            <button type="button" class="btn btn-event">View Events</button>
        </div>
    </div>
</body>

<?php
require '../inc/footer.inc';
?>