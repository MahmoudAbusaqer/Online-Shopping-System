<?php
session_start();
if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    setcookie("name" , 1,time()-100);
    setcookie("pass" , 1,time()-100);
}
if(!isset($_SESSION['user'])){
    header('REFRESH:0; URL=login_page.php');
}
$conn = new mysqli("localhost", "root", "", "mhshop");

if ($conn -> connect_error){
     die("Connection failed: ".$conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Style the search box inside the navigation bar */
        .topnav input[type=text] {
            padding: 6px;
            border-style: none none solid none;
            margin-top: 8px;
            margin-right: 1px;
            margin-left: 80px;
            margin-bottom: 5px;
            font-size: 17px;
        }
        #logout{
            position: absolute;
            margin-left: 10px;
            background-color: #6a737b;
        }
        #logout:hover{
            background-color: #f3f4f7;
        }

    </style>
</head>

<body class="goto-here">
    <div class="py-1 bg-black">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                            <span class="text">+ 1235 2355 98</span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                            <span class="text">mhshop@email.com</span>
                        </div>
                        <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                            <span class="text">3-5 Business days delivery &amp; Free Returns</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">MH Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <form method="GET" action="search.php">
                <div class="topnav">
                    <input type="text" placeholder="Search.." name="searchInput">
                    <input type="image" src="images/search.png" alt="Submit">
                </div>
            </form>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="shop.php">Shop By Category</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>
                </ul>
            </div>
            <form method="post" class="form-inline">
                <button class="btn btn-sm btn-light" name="logout" type="submit" id="logout" >Logout</button>
            </form>
        </div>
    </nav>
    <!-- END nav -->

    <section id="home-section" class="hero">
        <div class="home-slider js-fullheight owl-carousel">
            <div class="slider-item js-fullheight">
                <div class="overlay"></div>
                <div class="container-fluid p-0">
                    <div class="row d-md-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
                        <div class="one-third order-md-last img js-fullheight" style="background-image:url(images/bg_1.jpg);">
                        </div>
                        <div class="one-forth d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text">
                                <span class="subheading">MH Shop</span>
                                <div class="horizontal">
                                    <h3 class="vr">Stablished Since 2000</h3>
                                    <h1 class="mb-4 mt-3">Catch Your Own <br><span>Stylish &amp; Look</span></h1>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country.</p>

                                    <p><a href="shop.php" class="btn btn-primary px-5 py-3 mt-3">Discover Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-item js-fullheight">
                <div class="overlay"></div>
                <div class="container-fluid p-0">
                    <div class="row d-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
                        <div class="one-third order-md-last img js-fullheight" style="background-image:url(images/bg_2.jpg);">
                        </div>
                        <div class="one-forth d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text">
                                <span class="subheading">MH Shop</span>
                                <div class="horizontal">
                                    <h3 class="vr">Best eCommerce Online Shop</h3>
                                    <br>
                                    <h1 class="mb-4 mt-3">A Thouroughly <span>Modern</span> Woman</h1>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country.</p>

                                    <p><a href="shop.php" class="btn btn-primary px-5 py-3 mt-3">Shop Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/about.jpg);">
                    <a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
                        <span class="icon-play"></span>
                    </a>
                </div>
                <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
                    <div class="heading-section-bold mb-4 mt-md-5">
                        <div class="ml-md-0">
                            <h2 class="mb-4">Better Way to Ship Your Products</h2>
                        </div>
                    </div>
                    <div class="pb-md-5">
                        <p>But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
                        <div class="row ftco-services">
                            <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services">
                                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                                        <span class="flaticon-002-recommended"></span>
                                    </div>
                                    <div class="media-body">
                                        <h3 class="heading">Refund Policy</h3>
                                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services">
                                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                                        <span class="flaticon-001-box"></span>
                                    </div>
                                    <div class="media-body">
                                        <h3 class="heading">Premium Packaging</h3>
                                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services">
                                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                                        <span class="flaticon-003-medal"></span>
                                    </div>
                                    <div class="media-body">
                                        <h3 class="heading">Superior Quality</h3>
                                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <br><br>
    <section class="ftco-section ftco-choose ftco-no-pb ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-8 d-flex align-items-stretch">
                    <div class="img" style="background-image: url(images/about-1.jpg);"></div>
                </div>
                <div class="col-md-4 py-md-5 ftco-animate">
                    <div class="text py-3 py-md-5">
                        <h2 class="mb-4">New Women's Clothing Summer Collection 2019</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                        <p><a href="shop.php" class="btn btn-white px-4 py-3">Shop now</a></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 order-md-last d-flex align-items-stretch">
                    <div class="img img-2" style="background-image: url(images/about-2.jpg);"></div>
                </div>
                <div class="col-md-7 py-3 py-md-5 ftco-animate">
                    <div class="text text-2 py-md-5">
                        <h2 class="mb-4">New Men's Clothing Summer Collection 2019</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                        <p><a href="shop.php" class="btn btn-white px-4 py-3">Shop now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Categories</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                $query = "Select * from categroy LIMIT 3";

                if($result = $conn->query($query)){
                while ($row = $result->fetch_row()){
                ?>
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="product">
                        <a href="products.php?category=<?php echo $row[1];?>&id=<?php echo $row[0];?>" class="img-prod"><img class="img-fluid" src="images/<?php echo $row[3]?>" alt="Colorlib Template">
                            <div class="overlay"><span class="status" style="font-weight: bolder"><?php echo $row[2];?></span></div>
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="products.php?category=<?php echo $row[1];?>&&id=<?php echo $row[0];?>"><?php echo $row[1];?></a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span class="price-sale"><?php echo $row[0];?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                }
                ?>
                <div class="col-sm col-md-6 col-lg ftco-animate" style="margin-top: 70px">
                    <div class="product">
                        <a href="shop.php" class="img-prod"><img class="img-fluid" src="images/arrow3.png" alt="Colorlib Template">
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="shop.php">Click here to check all the categories</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);">
        <div class="container">
            <div class="row justify-content-center py-5">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="10000">0</strong>
                                    <span>Happy Customers</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="100">0</strong>
                                    <span>Branches</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="1000">0</strong>
                                    <span>Partner</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="100">0</strong>
                                    <span>Awards</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate">
                    <h2 class="mb-4">Our satisfied customer says</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Marketing Manager</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(images/person_2.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Interface Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(images/person_3.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">UI Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(images/person_4.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Web Developer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">System Analyst</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>

    <footer class="ftco-footer bg-light ftco-section">
        <div class="container">
            <div class="row">
                <div class="mouse">
                    <a href="#" class="mouse-icon">
                        <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                    </a>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">MH shop</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Menu</h2>
                        <ul class="list-unstyled">
                            <li><a href="index.php" class="py-2 d-block">Home</a></li>
                            <li><a href="shop.php" class="py-2 d-block">Shop</a></li>
                            <li><a href="contact.php" class="py-2 d-block">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());

                        </script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
