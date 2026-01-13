<?php 
use SecurityService\securityService;
session_start();
include_once('inc/dbcon.php');
include_once('func/securityService.php');
$hash = new securityService;
$_SESSION['token'] =$hash->getCSRFToken();
$_SESSION['pesan']='aman';
if(!isset($_SESSION['token']) || !$hash->validateCSRFToken( $_SESSION['token'])){
    $_SESSION['pesan'] = 'CSRF ATTACK';
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reserve Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/home2.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Your description">
    <meta name="author" content="Your name">


    <!-- Webpage Title -->
    <title>Reservation Page</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Favicon  -->
    <link rel="icon" href="images/intelli_icon.jpeg">
    <style>
    </style>
</head>

<body data-spy="scroll" data-target=".fixed-top">
    <div class="nav">
        <?php include('main2.php') ?>
    </div>
    <!-- SIDEBAR -->
    <div class="major">
        <div class="sidebar">
            <div class="time">
                <h1>Hi again🤗</h1>
            </div>
           
            <div class="profile">
            <img src="images/intelli_home.jpeg" style="margin-left:0px;"width="70px" height="80px" alt="logo">
                <h2 style="font-family:cursive;"><?php echo $_SESSION['name']; ?></h2>
                <h4><a style="text-decoration:none;" href="reserve.php">Book Now</a></h4>
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
                <form action="process-book-1.php" method="post">
                    <h4>Describe your Vehicle</h4>
                    <hr>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Model</label>
                        <input type="text" name="model" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="eg. BMW10">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Vehicle Type</label><br>
                        <select name="vehicle"class="form-select" aria-label="Default select example">
                            <option selected>Choose your vehicle Type</option>
                            <option value="Car">Car</option>
                            <option value="Lorry">Lorry</option>
                            <option value="Trailer">Trailer</option>
                        </select>
                    </div>
                    <input type="hidden" name="token" value="<?php $_SESSION['token'] ?>">
                    <button type="submit" class="btn btn-primary" value="proceed">Proceed</button>
                    <?php echo $_SESSION['pesan']; ?> 
                </form>
            </div>
        </div>
    </div>


    </div>
    </div>

    <script src=" " async defer></script>
</body>

</html>