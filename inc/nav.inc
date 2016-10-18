<div class="navBar">
    <div class="col-md-12 navigation nav-background">
        <div class=".col-md-6 .col-md-offset-3">
            <div class="row">
                <ul>
                    <div class="col-md-4 col-md-offset-4">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li class="active"><a href="eventList.php">Events</a></li>
                        <li class="active"><a href="contact.php">Contact</a></li>
                        <li class="active"><a href="about.php">About</a></li>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                        <li class="active"><a href="login.php">
                        <?php
                        session_start();
                        if(!isset($_SESSION['loggedIn'])){
                            echo "Login";
                        } else {
                            echo "Logout";
                        } 
                          
                            ?>
                        </a></li>
                        <li class="active">
                                <?php
                                if(!isset($_SESSION['loggedIn'])){
                                    echo "<a href='register.php'>";
                                    echo "Register";
                                    echo "</a>";
                                } else {
                                    //Calculate amount donated
                                    require '../inc/setPDO.inc';

                                    $query = $pdo->prepare('SELECT sum(donationAmount) as moneyDonated FROM TEAM94.DONATION_TB where userID = :id');
                                    $query->bindvalue(':id', $_SESSION['id']);
                                    $query->execute();

                                    echo('<div class = "moneyDonated">Amount donated: $');

                                    foreach($query as $result) {
                                        if($result['moneyDonated'] == '') {
                                            echo('0');
                                        }
                                        else {
                                            echo($result['moneyDonated']);
                                        }
                                    }
                                    echo('</div>');
                                } 
                              
                                ?>
                            </li>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
