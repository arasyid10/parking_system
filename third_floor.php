<!DOCTYPE html>
<?php include('inc/dbcon.php'); ?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Third Floor Parking Slots</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/home1.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <!-- Webpage Title -->
    <title>Third Floor Parking Slots</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!-- Favicon  -->
    <link rel="icon" href="images/intelli.jpeg">
</head>

<body data-spy="scroll" data-target=".fixed-top">
    <div class="nav">
        <?php include('page_header.php') ?>
    </div>
    <!-- SIDEBAR -->
    <div class="major">
        <div class="sidebar">
            <div class="time">
                <h1>Hello</h1>
            </div>
            <div class="logo">
                <h5 style="font-size:25px;font-family: cursive;">Red marks the reserved and white unreserved spots</h5>
            </div>
            <div class="profile">
                <img src="images/intelli_home.jpeg" width="70px" height="80px" alt="logo">
              
                <h2>User</h2>
                <h4><a style="text-decoration:none;"href="user_login.php">Book Now</a></h4>
            </div>
            <div class="location">
                <h3>Two Rivers Mall</h3>
            </div>
        </div>

        <!-- THE REST OF THE CODE OR DATA -->



    </div>

    <div class="parking">
        <div class="part">
            <div class="inner">
                <ul>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='A1'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>A1</li>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='A2'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>A2</li>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='A3'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>A3</li>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='A4'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>A4</li>
               
                </ul>
            </div>
            <div class=" inner ">
                <ul>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='B1'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>B1</li>
                    <li<?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='B2'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>B2</li>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='B3'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>B3</li>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='B4'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>B4</li>
                 
                </ul>
            </div>
        </div>

        <div class="part ">
            <div class="inner ">
                <ul>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='C1'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>C1</li>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='C2'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>C2</li>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='C3'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>C3</li>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='C4'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>C4</li>
                    
                </ul>
            </div>
            <div class="inner ">
                <ul>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='D1'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>D1</li>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='D2'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>D2</li>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='D3'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>D3</li>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='D4'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>D4</li>
                    >
                </ul>
            </div>
        </div>

        <div class="part ">
            <div class="inner ">
                <ul>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='E1'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>E1</li>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='E2'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>E2</li>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='E3'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>E3</li>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='E4'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>E4</li>
                    
                </ul>
            </div>
            <div class="inner ">
                <ul>
                    <li<?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='F1'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>F1</li>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='F2'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>F2</li>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='F3'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>F3</li>
                    <li <?php
                        $street = "THIRDFLOOR";
                        $conn = connect();
                        $sql = "SELECT * FROM reserved_spots WHERE floor='$street' and spot='F4'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            echo "style=\"background: red;\"";
                        }
                        ?>>F4</li>
                    
                </ul>
            </div>
        </div>
    </div>


    </div>
    </div>

    <script src=" " async defer></script>
</body>

</html>