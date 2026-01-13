<?php include("inc/dbcon.php");
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Your description">
    <meta name="author" content="Your name">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->

    <title>User Page</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!-- Favicon  -->
    <link rel="icon" href="images/intelli_icon.jpeg">
</head>

<body data-spy="scroll" data-target=".fixed-top">

   
    <?php include('main.php') ?>
    <header id="header" class="header" style=" background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('images/illumeni_header_bg.jpeg') center center no-repeat ;
    background-size:cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container">
                        <h1 style="color:white; margin-top:50px; margin-left:200px; font-size:80px; font-family:'Times New Roman', Times, serif;"> Intelli Parkings</h1>

                    </div>

                </div>
                <!-- end of col -->
                <div class="col-lg-6">
                    <div class="text-container">
                        <h3 style="color:white; font-size:50px; font-family:'Times New Roman', Times, serif;">Book and Park<br>Its that Easy</h3>
                        <a class="btn-solid-lg page-scroll" href="reserve.php">Reserve Spot</a>
                    </div>
                    <!-- end of text-container -->
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
        <div class="services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <!-- Card -->
                        <div class="card">
                            <div class="card-image">

                                <i class="fas fa-laptop"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Online Booking</h5>
                                <div class="card-text">Do it at the comfort of wherever you are!</div>
                            </div>
                        </div>
                        <!-- end of card -->

                        <!-- Card -->
                        <div class="card">
                            <div class="card-image">
                                <i class="fas fa-wallet"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Payment Methods</h5>
                                <div class="card-text">Credit Cards, Mpesa and Paypal are among our top payment methods.</div>
                            </div>
                        </div>
                        <!-- end of card -->

                        <!-- Card -->
                        <div class="card">
                            <div class="card-image">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Safe and Secure</h5>
                                <div class="card-text">Do you want your car back in as good a shape it came in with? We have you covered! </div>
                            </div>
                        </div>


                    </div>

                </div>

            </div>

        </div>

    </header>



    <!-- Details 1 -->
    <div id="online_booking" class="basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-5">
                    <div class="text-container">
                        <h2>Online Booking</h2>
                        <hr class="hr-heading">
                        <p>Two Easy Steps:</p>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Click Reserve</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Set the dates and make payment</div>
                            </li>

                        </ul>
                    </div>
                    <!-- end of text-container -->
                </div>
                <!-- end of col -->
                <div class="col-lg-6 col-xl-7">
                    <div class="image-container">
                        <img class="img-fluid" src="images/illumeni_booking.jpeg" alt="alternative">
                    </div>
                    <!-- end of image-container -->
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </div>
    <!-- end of basic-1 -->
    <!-- end of details 1 -->


    <!-- Details 2 -->
    <div id="payment" class="basic-2">
        <div class="container-fluid">
            <div class="row">
                <div class="image-area">
                    <div class="image-container">
                        <img class="img-fluid" src="images/illumeni_payment.jpeg" alt="alternative">
                    </div>
                    <!-- end of image-container -->
                </div>
                <!-- end of image-area -->
                <div class="text-area">
                    <div class="text-container">
                        <h2>Payment Methods</h2>
                        <hr class="hr-heading">
                        <p>We work with liquid Cash as it provides our customers peace of mind by protecting their financial and personal data through end-to-end Triple Data Encryption (TDES) and layered in-app security</p>
                        <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox">Curious?</a>
                    </div>
                    <!-- end of text-container -->
                </div>
                <!-- end of text-area -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </div>
    <!-- end of basic-1 -->
    <!-- end of details 2 -->


    <!-- Details Lightbox -->
    <!-- Lightbox -->
    <div id="details-lightbox" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button"></button>
            <div class="col-lg-8">
                <div class="image-container">
                    <img class="img-fluid" src="images/smartphone.jpg" alt="alternative">
                </div>
                <!-- end of image-container -->
            </div>
            <!-- end of col -->
            <div class="col-lg-4">
                <h3>Payment Methods</h3>
                <hr>
                <p>Familiar with the three below?</p>

                <ul class="list-unstyled li-space-lg">
                    <li class="media">
                        <i class="fas fa-wallet"></i>
                        <div class="media-body">Visa</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-wallet"></i>
                        <div class="media-body">Paypal</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-wallet"></i>
                        <div class="media-body">Mpesa</div>
                    </li>

                </ul>
                <a class="btn-solid-reg mfp-close page-scroll" href="#contact">Contact Us</a> <button class="btn-outline-reg mfp-close as-button" type="button">Back</button>
            </div>
            <!-- end of col -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of lightbox-basic -->
    <!-- end of lightbox -->
    <!-- end of details lightbox -->


    <!-- Details 3 -->
    <div id="security" class="basic-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-5">
                    <div class="text-container">
                        <h2>Safe and Secure</h2>
                        <hr class="hr-heading">
                        <p>Employed are trained parking attendants to guide you to your parking spot and 24-Hour Surveillance using security cameras installed evenly round the parking lot, your safety and security is nothing to worry about.</p>

                    </div>
                    <!-- end of text-container -->
                </div>
                <!-- end of col -->
                <div class="col-lg-6 col-xl-7">
                    <div class="image-container">
                        <img class="img-fluid" src="images/illumeni_safe.jpeg" alt="alternative">
                    </div>
                    <!-- end of image-container -->
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </div>
    <!-- end of basic-3 -->
    <!-- end of details 3 -->


    <!-- Mission -->

    <div class="basic-4" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('images/illumeni_mission.jpeg') center center no-repeat;">
        <div class="container">
            <div class="row">
                <div class="text-container">
                    <h4>Our mission is to make you comfortable by relieving unnecessary worry of taking too much time looking for a parking spot</h4>
                </div>
                <!-- end of text-container -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </div>
    <!-- end of basic-4 -->
    <!-- end of mission -->


    <!-- Strengths -->
    <div id="strengths" class="basic-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <div class="bullet">1</div>
                            <div class="media-body">
                                <h4>Specialized expertise</h4>
                                <p>We've been deploying successful online parking reservations for about 10 years and we've made it our mission to provide the best parking reservation services in the industry.
                                </p>
                            </div>
                        </li>
                        <li class="media">
                            <div class="bullet">2</div>
                            <div class="media-body">
                                <h4>Affordable Rates</h4>
                                <p>Our partnership with various hotels, shopping malls and even estates you live in has enable us to establish a base, good enough to offer reservation services at affordable prices</p>
                            </div>
                        </li>
                        <li class="media">
                            <div class="bullet">3</div>
                            <div class="media-body">
                                <h4>Flexible Reservation Time</h4>
                                <p>We can reserve for you your favourite spot for upto a week's duration, therefore you can book as early as now!</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- end of col-lg-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </div>
    <!-- end of basic-5 -->
    <!-- end of strengths -->


    <!-- Projects -->
    <div id="projects" class="slider-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <!-- Text Slider -->
                    <div class="slider-container">
                        <div class="swiper-container text-slider">
                            <div class="swiper-wrapper">

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="image-container">
                                                <img class="img-fluid" src="images/testimonial1.jpg" style="height:650px; width:800px;" alt="alternative">
                                            </div>
                                            <!-- end of image-container -->
                                        </div>
                                        <!-- end of col -->
                                        <div class="col-lg-6">
                                            <div class="text-container">
                                                <h4>Intelli Parking System</h4>
                                                <p>We were proud to partner with high-end hotels.</p>
                                                <p class="testimonial-text">"I am happy to have chosen Intelli Parkings for our parking reservation implementation. Their specialized experience has been commended by both our customers and employees"</p>
                                                <div class="testimonial-author">Michelle Obama - General Manager</div>
                                            </div>
                                            <!-- end of text-container -->
                                        </div>
                                        <!-- end of col -->
                                    </div>
                                    <!-- end of row -->
                                </div>
                                <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="image-container">
                                                <img class="img-fluid" src="images/testimonial3.jpeg" style="height:500px; width:800px;" alt="alternative">
                                            </div>
                                            <!-- end of image-container -->
                                        </div>
                                        <!-- end of col -->
                                        <div class="col-lg-6">
                                            <div class="text-container">
                                                <h4>Intelli Parking System</h4>
                                                <p>We were proud to partner with various Shopping malls</p>
                                                <p class="testimonial-text">"I am happy to have chosen Intelli Parkings for our parking reservation implementation. Their specialized experience has been commended by both our customers and employees"</p>
                                                <div class="testimonial-author">Ronnie Blake - Sales Manager</div>
                                            </div>
                                            <!-- end of text-container -->
                                        </div>
                                        <!-- end of col -->
                                    </div>
                                    <!-- end of row -->
                                </div>
                                <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="image-container">
                                                <img class="img-fluid" src="images/testimonial2.jpeg" alt="alternative">
                                            </div>
                                            <!-- end of image-container -->
                                        </div>
                                        <!-- end of col -->
                                        <div class="col-lg-6">
                                            <div class="text-container">
                                                <h4>Intelli Parking System</h4>
                                                <p>We were proud to partner with varous big Offices.</p>
                                                <p class="testimonial-text">"I am happy to have chosen Intelli Parkings for our parking reservation implementation. Their specialized experience has been commended by both our customers and employees"</p>
                                                <div class="testimonial-author">Nicole Richter - Development Manager</div>
                                            </div>
                                            <!-- end of text-container -->
                                        </div>
                                        <!-- end of col -->
                                    </div>
                                    <!-- end of row -->
                                </div>
                                <!-- end of swiper-slide -->
                                <!-- end of slide -->

                            </div>
                            <!-- end of swiper-wrapper -->

                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- end of add arrows -->

                        </div>

                    </div>


                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </div>
    <!-- end of slider-1 -->
    <!-- end of projects -->


    <!-- About -->
    <div id="about" class="basic-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container bg-gray">
                        <h2>About our team</h2>
                        <p>Trained,experienced and reliable. We've been in business for 10 years</p>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">We love what we do and have a lot of passion</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">We highly regard your trust in us with your vehicles.</div>
                            </li>

                        </ul>
                    </div>
                    <!-- end of text-container -->
                    <div class="image-container">
                        <img class="img-fluid" src="images/about_team.jpg" alt="alternative">
                    </div>
                    <!-- end of image-container -->
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </div>
    <!-- end of basic-6 -->
    <!-- end of about -->


    <!-- Invitation -->
    <div class="basic-7">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4>Book your next favourite parking spot. Stay with us😊</h4>
                    <h1>🚗+👉🏼=😊</h1>
                    <a class="btn-solid-lg page-scroll" href="reserve.php">Ready to book?🤔</a>
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </div>
    <!-- end of basic-7 -->
    <!-- end of invitation -->


    <!-- Contact -->

    <div id="contact" class="form-1" style="background: url('images/illumeni_header_bg.jpeg') center center no-repeat;
      background-size:cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Reach Out</h2>
                    <p class="p-heading">Don't hesitate to give us a call or just use the contact form below, in case of any queries</p>
                    <ul class="list-unstyled li-space-lg">
                        <li><i class="fas fa-map-marker-alt"></i> &nbsp;Westlands,Nairobi, 65165, Kenya</li>
                        <li><i class="fas fa-phone"></i> &nbsp;<a href="tel:00817202212">+254110273829</a></li>
                        <li><i class="fas fa-envelope"></i> &nbsp;<a href="mailto:contact@site.com">intelliparkings@gmail.com</a></li>
                    </ul>
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Contact Form -->
                    <form id="contactForm" method="post" action="feedback.php">
                        <div class="form-group">
                            <input type="text" name="cname" class="form-control-input" required>
                            <label class="label-control" for="cname">Name</label>
                        </div>
                        <div class="form-group">
                            <input type="email" name="cemail" class="form-control-input" required>
                            <label class="label-control" for="cemail">Email</label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="comment" class="form-control-input" required>
                            <label class="label-control" for="cemail">Comment</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="okay" class="form-control-submit-button">Submit</button>
                        </div>
                    </form>
                    <!-- end of contact form -->

                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </div>
    <!-- end of form-1 -->
    <!-- end of contact -->


    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-col first">
                        <h6>About Intelli Parkings</h6>
                        <p class="p-small">Intelli Parkings is a online parking reservation website.</p>
                    </div>
                    <!-- end of footer-col -->
                    <div class="footer-col second">
                        <h6>Links</h6>
                        <ul class="list-unstyled li-space-lg p-small">
                            <li>Online Booking: <a href="#online_booking">Online Booking</a></li>
                            <li>Payment Methods: <a href="#payment">Payment</a></li>
                            <li>About Us: <a class="page-scroll" href="#about">Our Team</a>, <a class="page-scroll" href="#contact">Contact</a></li>
                        </ul>
                    </div>
                    <!-- end of footer-col -->
                    <div class="footer-col third">
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-pinterest-p fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <p class="p-small">We would love to hear from you <a href="mailto:abby.muso@gmail.com"><strong>intelliparkings@gmail.com</strong></a></p>
                    </div>
                    <!-- end of footer-col -->
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </div>
    <!-- end of footer -->
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © <a href="#your-link">Group 3</a></p>
                </div>
                <!-- end of col -->
            </div>
            <!-- enf of row -->
        </div>
        <!-- end of container -->




        <!-- Scripts -->
        <script src="js/jquery.min.js"></script>
        <!-- jQuery for Bootstrap's JavaScript plugins -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Bootstrap framework -->
        <script src="js/jquery.easing.min.js"></script>
        <!-- jQuery Easing for smooth scrolling between anchors -->
        <script src="js/swiper.min.js"></script>
        <!-- Swiper for image and text sliders -->
        <script src="js/jquery.magnific-popup.js"></script>
        <!-- Magnific Popup for lightboxes -->
        <script src="js/scripts.js"></script>
        <!-- Custom scripts -->
</body>

</html>