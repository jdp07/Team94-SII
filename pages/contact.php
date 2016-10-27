<?php
require '../inc/header.inc';
?>
<body>
    <div class="container-fluid contact">
		<div class="nav-2">
        <?php //Navigation bar
            require '../inc/nav.inc';
        ?>
		</div>
        <div class="contact-head text-center">
            <h2>Contact Us</h2>
        </div>
        <div class="row"> <!-- Basic static contact information -->
            <div class="col-md-4 contact-information text-center">
                <h3>TheKommunityService</h3>
                <p>Ph: (07) 1298 2810</p>
                <p>Email: info@tks.com.au</p>
                <p>Address: 123 Fake Street, Not Brisbane, 0001</p>
                <br>
                <p>If you wish to access our place via public transport</p>
                <p>you will need to walk 12km from the city. Sorry</p>
            </div>
            <div class="col-md-4 col-md-offset-1 contact-map text-right"> <!-- Map diplay -->
                <img src="../img/map.png">
            </div>
        </div>

        <?php
            //If regular user
            if(!isset($_SESSION['userType'])){
                $_SESSION['userType'] = 'M';    
            }

            //If administrative user
            if ($_SESSION['userType'] == 'A'){
                $query = $pdo->prepare('SELECT * FROM USER_TB');
                $query->execute();

                //Your donations header
                echo('<div class = "col-md-2"></div><div class = "col-md-8">');
                echo('  <div class = "event-list-donation-head"><h1>Our Members</h1></div>');
                echo('  <table class = "table table-striped">');
                echo('      <tr class = "table-heading"><td>First name</td><td>Last name</td><td>User Type</td><td>Email</td></tr>');

                //Find event name, donation amount and donation date
                foreach($query as $result) {
                    $firstName = $result['firstName'];
                    $lastName = $result['lastName'];
                    $userType = $result['userType'];
                    $email = $result['email'];

                    echo('<tr><td>'.$firstName.'</td>');
                    echo('<td>'.$lastName.'</td>');
                    echo('<td>'.$userType.'</td>');
                    echo('<td>'.$email.'</td></tr>');
                }

                //Finish rest of table
                echo('  </table>');
                echo('</div><div class = "col-md-2"></div>');
            }

        ?>
        
    </div>
<?php //Footer
require '../inc/footer.inc';
?>
</body>
