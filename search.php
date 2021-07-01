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
$found= false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search</title>

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
                    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
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

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Search</span></p>
                    <h1 class="mb-0 bread">Search Results</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-10 order-md-last">
                    <div class="row">
                        <?php
                    if (isset($_GET['searchInput'])) {
                        if (preg_match('/^[0-9]*$/', $_GET['searchInput'])){

                        $query = "Select * from categroy where id=".$_GET['searchInput'];
                        if($result = $conn->query($query)){
                            $found= true;
                            while ($row = $result->fetch_row()){
                                ?>
                        <div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
                            <div class="product">
                                <a href="products.php?category=<?php echo $row[1];?>&id=<?php echo $row[0];?>" class="img-prod"><img class="img-fluid" src="images/<?php echo $row[3]?>" alt="Colorlib Template">
                                    <!--                                    <span class="status">--><?php //echo $row[2];?>
                                    <!--</span>-->
                                    <div class="overlay"><span class="status"><?php echo $row[2];?></span></div>
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
                        }else{

                        $query = "Select * from product where name='".$_GET['searchInput']."'";
                        if($result = $conn->query($query)){
                            $found= true;
                            $discountPrice = 0;
                            while ($row = $result->fetch_row()){

                                ?>
                        <div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
                            <div class="product">
                                <a href="#" class="img-prod"><img class="img-fluid" src="images/<?php echo $row[4];?>" alt="Colorlib Template">
                                    <?php if ($row[2]=='discount'){
                                    $discountPercentage = ($row[3]*$row[6]);
                                    $Percentage = $row[3]/$discountPercentage;
                                    $discountPrice = $row[3]-$discountPercentage;
                                    ?>
                                    <span class="status"><?php echo $Percentage;?>%</span>
                                    <?php

                                }
                                ?>
                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 px-3">
                                    <h3><a href="#"><?php echo $row[1];?></a></h3>
                                    <h3><a href="#"><?php echo $row[5];?></a></h3>
                                    <h3><a href="#"><?php echo $row[2];?></a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <?php if ($row[2]=='discount'){ ?>
                                            <p class="price"><span class="mr-2 price-dc">$<?php echo $row[3] ;?></span> <span class="price-sale">$<?php echo $discountPrice; ?></span></p>
                                            <?php }else{
                                            ?>
                                            <p class="price"><span class="price-sale">$<?php echo $row[3]; ?></span></p>
                                            <?php
                                        }?>
                                        </div>
                                    </div>
                                    <p class="bottom-area d-flex px-3">
                                        <a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
                                        <a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    }
                        }
                    }
                    ?>
                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <div class="block-27">
                                <ul>
                                    <li><a href="#">&lt;</a></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&gt;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin: 50px"></div>

            </div>
        </div>
    </section>

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
                        <h2 class="ftco-heading-2">MH Shop</h2>
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
