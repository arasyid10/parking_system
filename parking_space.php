<?php 
use SecurityService\securityService;
session_start();
include_once('func/securityService.php');
$hash = new securityService;
$_SESSION['token'] =$hash->getCSRFToken();
$_SESSION['pesan']='aman';
if(!isset($_SESSION['token']) || !$hash->validateCSRFToken($_SESSION['token'])){
    $_SESSION['pesan'] = 'CSRF ATTACK';
}
?>
<!DOCTYPE html>
<?php include('inc/dbcon.php');
?>

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
    <title>Intelli Parking</title>

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
                <form action="process-book-2.php" method="post">
                    <h4>Parking Details</h4>
                    <hr>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Recommended Region For You - as per your vehicles body size</label><br>
                        <select name="floor" class="form-select" aria-label="Default select example">
                            <option value="FIRSTFLOOR" selected>FirstFloor</option>
                            <option value="SECONDFLOOR">SecondFloor</option>
                            <option value="THIRDFLOOR">ThirdFloor</option>
                        </select><br>
                        <select name="spot" class="form-select" aria-label="Default select example">
                            <option value="A1" selected>A1</option>
                            <option value="A2">A2</option>
                            <option value="A3">A3</option>
                            <option value="A4">A4</option>
                            <option value="B1">B1</option>
                            <option value="B2">B2</option>
                            <option value="B3">B3</option>
                            <option value="B4">B4</option>
                            <option value="C1">C1</option>
                            <option value="C2">C2</option>
                            <option value="C3">C3</option>
                            <option value="C4">C4</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="E1">E1</option>
                            <option value="E2">E2</option>
                            <option value="E3">E3</option>
                            <option value="E4">E4</option>
                            <option value="F1">F1</option>
                            <option value="F2">F2</option>
                            <option value="F3">F3</option>
                            <option value="F4">F4</option>
                        </select><br>
                        <label for="exampleInputEmail1" class="form-label">Plate Number</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"name="plateno" aria-describedby="emailHelp" placeholder="eg. KBV 844K">
                    </div>
                    <?php echo $_SESSION['pesan']. ",cookie:". $_COOKIE["PHPSESSID"]; ?> 
                    <?php echo $hash->insertHiddenToken(); ?> 
                    <button type="submit" class="btn btn-primary" value="proceed">Payment</button>
                </form>
                
            </div>
        </div>
    </div>


    </div>
    </div>

    <script src=" " async defer></script>
</body>

</html>