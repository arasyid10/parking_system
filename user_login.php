<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>User Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="images/intelli_icon.jpeg">
    <style>
        .error {
            color: red;
            font-style: italic;
        }
    </style>
</head>

<body>
<div class="hi" style="background-image: url(images/intelli.jpeg);
background-position:center;">
    <nav>
        <img src="images/intelli_home.jpeg" width="100px" height="100px" alt="logo" class="nav">
    </nav>
    <center>
        <div class="form">

            <table style="text-align: center;">


                <form id="login" method="post" action="process-log-in.php">
                    <!-- <legend>Registration form</legend> -->
                    <br><br>
                    <h2 class="title">Login</h2> <br>

                    <!--<input type="text"  placeholder="Number Plate" name="Numbe_Plate" class= "input">  <br><br>-->

                    <input type="text" placeholder="Username" name="email" class="input"> <br><br>

                    <input type="Password" placeholder="Password" name="pass" class="input"> <br><br>

                    <!--<input type="Password" placeholder="Confirm Password" name="confirm_pass" class= "input"> <br><br>-->



                    <button type="submit" id="btn" name="login">Login</button>
                    <br><br>
                    <a class="link" href="registration.php">Don't have an account</a>
                    <br><br>
                    <a class="link" href="index.php">Back</a>
                    <br><br>
                </form>

        </div>
    </center>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="register.js"></script>
    </div>
</body>

</html>