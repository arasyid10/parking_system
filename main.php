<?php @session_start();?>

<nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">

            <!-- Image Logo -->
           
            <a class="navbar-brand logo-text page-scroll" href="sucess_login.php">Intelli Parkings</a>

            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="sucess_login.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="index.php" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Our Services and Personnel</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item page-scroll" href="#online_booking">Online Booking</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item page-scroll" id="payment1" href="#payment">Payment Methods</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item page-scroll" href="#about">Our Team</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item page-scroll" href="#security">Security</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="index.php" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Parking Zones</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item page-scroll" href="firstfloor1.php">First Floor</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item page-scroll" href="secondfloor1.php">Second Floor</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item page-scroll" href="thirdfloor1.php">Third Floor</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="reserve.php">Reserve</a>
                    </li>
                    <li class="nav-item">
                    <p style="color:antiquewhite; margin-top:4px; font-family:cursive; font-size:x-large;"><?php echo "Hi"." ".$_SESSION['name']."!";?></p>
                 
                    </li>
                    <li class="nav-item">
                    <a class="nav-link page-scroll" href="process-log-out.php">Log Out</a>
                 
                    </li>

                </ul>
               
            </div>
            <!-- end of navbar-collapse -->
        </div>
        <!-- end of container -->
    </nav>
    <!-- end of navbar -->
    <!-- end of navigation -->