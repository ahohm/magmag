<?php
  // Init session
  session_start();

  // Include db config
  require_once './phploginapp-master/db.php';

  // Validate login
  if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
    header('location: ./phploginapp-master/login.php');
    exit;
  }
  

  
?>
<!doctype html>
<html lang="en">
  
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../fonts.googleapis.com/cssd54f.css?family=Fira+Sans">

    <link rel="stylesheet" href="../dist/css/vendor.min.css">

    <link rel="stylesheet" href="../plugins/swiper/swiper.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

    <!-- main css  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">
  

    <title>Home - MagMag</title>
  </head>
  <body>

    <!--Header -->
    <header class="navbar navbar-expand navbar-light fixed-top">

      <!-- Toggle Menu -->
      <span class="toggle-menu"><i class="fa fa-bars fa-lg"></i></span>

      <!-- Logo -->
      <a class="navbar-brand" href="index-2.php"><img src="../img/logo.svg" alt="MagMag">MagMag</a>

      <!-- Search Form -->
      <form class="form-inline form-search d-none d-sm-inline">
        <div class="input-group">
          <button class="btn btn-light btn-search-back" type="button"><i class="fa fa-arrow-left"></i></button>
          <input type="text" class="form-control" placeholder="Search ..." aria-label="Search ...">
          <button class="btn btn-light" type="submit"><i class="fa fa-search"></i></button>
        </div>
      </form>
      <!-- /Search Form -->

      <!-- navbar-nav -->
      <ul class="navbar-nav ml-auto">

        <!-- Currency Dropdown -->
        <li class="nav-item dropdown d-none d-md-flex">
          <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownCurrency" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            TND <i class="fa fa-caret-down fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownCurrency">
            <button class="dropdown-item" type="button">TND</button>
            <button class="dropdown-item" type="button">EUR</button>
          </div>
        </li>
        <!-- /Currency Dropdown -->

        <!-- Language Dropdown -->
        <li class="nav-item dropdown d-none d-md-flex">
          <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            English <i class="fa fa-caret-down fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownLanguage">
            <button class="dropdown-item" type="button">English</button>
            <button class="dropdown-item" type="button">عربي</button>
          </div>
        </li>
        <!-- /Language Dropdown -->

        <!-- Search Toggle -->
        <li class="nav-item d-sm-none">
          <a href="#" class="nav-link" id="search-toggle"><i class="fa fa-search fa-lg"></i></a>
        </li>
        <!-- /Search Toggle -->

        <!-- Shopping Cart Toggle -->
        <li class="nav-item dropdown ml-1 ml-sm-3">
          <a href="#" class="nav-link" data-toggle="modal" data-target="#cartModal">
            <i class="fa fa-shopping-cart fa-lg"></i>
            <span class="badge badge-pink badge-count">4</span>
          </a>
        </li>
        <!-- /Shopping Cart Toggle -->

        

        <!-- Login Button -->
        <!-- <li class="nav-item ml-4">
          <a href="login.php" class="nav-link btn btn-light btn-sm"><i class="fa fa-sign-in"></i> Login</a>
        </li> -->
        <!-- /Login Button -->

      </ul>
      <!-- /navbar-nav -->

      <!-- User Dropdown -->
      <div class="dropdown dropdown-user">
        <a class="dropdown-toggle" href="#" role="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        
        
        <?php
          $ps = $pdo->query("SELECT * FROM `users`");
          while($row = $ps->fetch(PDO::FETCH_BOTH)){
          ?> <img src="<?php echo $row['image'];?>"> 
          <?php } ?>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item has-icon" href="account-order.php"><i class="fa fa-shopping-bag fa-fw"></i> My Orders</a>
          <a class="dropdown-item has-icon has-badge" href="account-wishlist.php"><i class="fa fa-heart fa-fw"></i> Wishlist <span class="badge badge-secondary">3</span></a>
          <a class="dropdown-item has-icon" href="account-profile.php"><i class="fa fa-cog fa-fw"></i> <?php echo $_SESSION['email']; ?> Account Setting</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item has-icon" href="./phploginapp-master/logout.php"><i class="fas fa-sign-out-alt"></i> Sign out</a>
        </div>
      </div>
      <!-- /User Dropdown -->

    </header>
    <!-- /Header -->

    <div class="container-fluid" id="main-container">
      <div class="row">

        <!-- Sidebar -->
        <div class="col" id="main-sidebar">
          <div class="list-group list-group-flush">
            <a href="index-2.php" class="list-group-item list-group-item-action active"><i class="fa fa-home fa-lg fa-fw"></i> Home</a>
            <a href="grid.php" class="list-group-item list-group-item-action"><i class="fa fa-star fa-lg fa-fw text-warning"></i> Editor's Choice</a>
            <a href="categories.php" class="list-group-item list-group-item-action"><i class="fa fa-th fa-lg fa-fw"></i> Categories</a>
            <a href="grid.php" class="list-group-item list-group-item-action sub">Computers</a>
            <a href="grid.php" class="list-group-item list-group-item-action sub">Cell Phones</a>
            <a href="grid.php" class="list-group-item list-group-item-action sub">Photography</a>
            <a href="grid.php" class="list-group-item list-group-item-action sub">Home Entertainment</a>
            <a href="grid.php" class="list-group-item list-group-item-action sub">Video Games</a>
            <div class="collapse" id="categories">
              <a href="grid.php" class="list-group-item list-group-item-action sub">Headphones</a>
              <a href="grid.php" class="list-group-item list-group-item-action sub">Office Electronics</a>
              <a href="grid.php" class="list-group-item list-group-item-action sub">Office Supplies</a>
              <a href="grid.php" class="list-group-item list-group-item-action sub">Musical Instruments</a>
            </div>
            <a href="#categories" class="list-group-item list-group-item-action sub toggle" data-toggle="collapse" aria-expanded="false">MORE &#9662;</a>
            <a href="about.php" class="list-group-item list-group-item-action"><i class="fa fa-list fa-lg fa-fw"></i> Other Pages</a>
            <a href="about.php" class="list-group-item list-group-item-action sub">About Us</a>
            <a href="cart.php" class="list-group-item list-group-item-action sub">Cart</a>
            <a href="checkout.php" class="list-group-item list-group-item-action sub">Checkout</a>
            <a href="compare.php" class="list-group-item list-group-item-action sub">Compare</a>
            <a href="contact.php" class="list-group-item list-group-item-action sub">Contact Us</a>
            <a href="404.php" class="list-group-item list-group-item-action sub">Error 404</a>
            <a href="faq.php" class="list-group-item list-group-item-action sub">FAQ</a>
            <a href="login.php" class="list-group-item list-group-item-action sub">Login / Register</a>
                        <div class="collapse" id="pages">
                          <a href="account-profile.php" class="list-group-item list-group-item-action sub">My Profile</a>
              <a href="account-order.php" class="list-group-item list-group-item-action sub">My Orders</a>
              <a href="account-order-detail.php" class="list-group-item list-group-item-action sub">Order Detail</a>
              <a href="account-address.php" class="list-group-item list-group-item-action sub">My Address</a>
              <a href="account-wishlist.php" class="list-group-item list-group-item-action sub">My Wishlist</a>
              <a href="detail-tab.php" class="list-group-item list-group-item-action sub">Product Detail with Tab</a>
            </div>
                        <a href="#pages" class="list-group-item list-group-item-action sub toggle" data-toggle="collapse" aria-expanded="false">MORE &#9662;</a>
                        <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-question-circle fa-lg fa-fw"></i> Help</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-plus-circle fa-lg fa-fw"></i> Start Selling</a>
          </div>
          <div class="small p-3">Copyright © 2019 MagMag All right reserved</div>
        </div>
        <!-- /Sidebar -->


        <div class="col" id="main-content">

          <!-- Home Slider -->
          <div class="swiper-container" id="home-slider">
            <div class="swiper-wrapper">
              <a href="grid.php" class="swiper-slide" data-cover="../img/slider/slider1.png" data-xs-height="150px" data-sm-height="265px" data-md-height="300px" data-lg-height="300px" data-xl-height="300px"></a>
              <a href="grid.php" class="swiper-slide" data-cover="../img/slider/slider2.jpg" data-xs-height="150px" data-sm-height="265px" data-md-height="300px" data-lg-height="300px" data-xl-height="300px"></a>
              <a href="grid.php" class="swiper-slide" data-cover="../img/slider/slider3.jpg" data-xs-height="150px" data-sm-height="265px" data-md-height="300px" data-lg-height="300px" data-xl-height="300px"></a>
            </div>
            <a href="#" role="button" class="carousel-control-prev d-none d-sm-flex" id="home-slider-prev"><i class="fa fa-angle-left fa-lg"></i></a>
            <a href="#" role="button" class="carousel-control-next d-none d-sm-flex" id="home-slider-next"><i class="fa fa-angle-right fa-lg"></i></a>
          </div>
          <!-- /Home Slider -->

          <!-- Services -->
          <div class="row services-box">
            <div class="col-6 col-md-3">
              <div class="media">
                <i class="fa fa-truck"></i>
                <div class="media-body">
                  <h6>FREE SHIPPING</h6>
                  <span class="text-muted d-none d-md-block">Get free shipping for all orders $99 or more</span>
                </div>
              </div>
            </div>
            <div class="col-6 col-md-3">
              <div class="media">
                <i class="fa fa-refresh"></i>
                <div class="media-body">
                  <h6>MONEY BACK GUARANTEE</h6>
                  <span class="text-muted d-none d-md-block">Get the item you ordered, or your money back</span>
                </div>
              </div>
            </div>
            <div class="col-6 col-md-3">
              <div class="media">
              <i class="fas fa fa-shield-alt"></i>
                <div class="media-body">
                  <h6>100% SECURE PAYMENT</h6>
                  <span class="text-muted d-none d-md-block">Your transaction are secure with SSL Encryption</span>
                </div>
              </div>
            </div>
            <div class="col-6 col-md-3">
              <div class="media">
                <i class="fa fa-phone"></i>
                <div class="media-body">
                  <h6>ONLINE SUPPORT 24/7</h6>
                  <span class="text-muted d-none d-md-block">Chat with experts or have us call you right away</span>
                </div>
              </div>
            </div>
          </div>
          <!-- /Services -->

          <!-- Categories Slider -->
          <h3 class="title mt-4">Shop by Categories</h3>
          <div class="content-slider">
            <div class="swiper-container categories-slider" id="categories-slider">
              <div class="swiper-wrapper">

                <div class="swiper-slide">
                  <div class="row no-gutters gutters-1">
                    <div class="col-6 col-md-3 mb-1">
                      <a href="grid.php" class="card">
                        <img src="../img/categories/1.jpg" alt="" class="card-img-top">
                        <div class="card-img-overlay card-img-overlay-bottom p-2 pink">
                          <h5>Computers &amp; Accessories</h5>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-3 mb-1">
                      <a href="grid.php" class="card">
                        <img src="../img/categories/2.jpg" alt="" class="card-img-top">
                        <div class="card-img-overlay card-img-overlay-bottom p-2 primary">
                          <h5>Cell Phones &amp; Accessories</h5>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-3 mb-1">
                      <a href="grid.php" class="card">
                        <img src="../img/categories/3.jpg" alt="" class="card-img-top">
                        <div class="card-img-overlay card-img-overlay-bottom p-2 purple">
                          <h5>Photography &amp; Videography</h5>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-3 mb-1">
                      <a href="grid.php" class="card">
                        <img src="../img/categories/4.jpg" alt="" class="card-img-top">
                        <div class="card-img-overlay card-img-overlay-bottom p-2 info">
                          <h5>Home Entertainment</h5>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="row no-gutters gutters-1">
                    <div class="col-6 col-md-3 mb-1">
                      <a href="grid.php" class="card">
                        <img src="../img/categories/5.jpg" alt="" class="card-img-top">
                        <div class="card-img-overlay card-img-overlay-bottom p-2 success">
                          <h5>Video Games</h5>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-3 mb-1">
                      <a href="grid.php" class="card">
                        <img src="../img/categories/6.jpg" alt="" class="card-img-top">
                        <div class="card-img-overlay card-img-overlay-bottom p-2 warning">
                          <h5>Headphones</h5>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-3 mb-1">
                      <a href="grid.php" class="card">
                        <img src="../img/categories/8.jpg" alt="" class="card-img-top">
                        <div class="card-img-overlay card-img-overlay-bottom p-2 danger">
                          <h5>Office Supplies</h5>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-3 mb-1">
                      <a href="categories.php" class="card">
                        <img src="../img/more.svg" alt="" class="card-img-top">
                      </a>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <a href="#" role="button" class="carousel-control-prev" id="categories-slider-prev"><i class="fa fa-angle-left fa-lg"></i></a>
            <a href="#" role="button" class="carousel-control-next" id="categories-slider-next"><i class="fa fa-angle-right fa-lg"></i></a>
          </div>
          <!-- /Categories Slider -->
          
          <!-- Hot new releases -->
          <h3 class="title mt-4">Hot New Releases</h3>
          <div class="row no-gutters gutters-2">
            <?php 
            $server = "localhost";
            $username = "root";
            $password = "";
            $database = "phploginapp";
            
            try{
              $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);

              $sql = "SELECT * FROM users";
              $result = $conn->query($sql);
              $count = 0;
            
                foreach($result as $k)
                {
                  if($count <=3){
                    
                    
                     echo' <div class="col-6 col-md-3 mb-2">
                      <div class="card card-product">
                        <div class="ribbon"><span class="bg-info text-white">New</span></div>
                        <button class="wishlist" title="Add to wishlist"><i class="fa fa-heart"></i></button>
                        <a href="detail.php"><img src="../img/product/1.jpg" alt="NEW Microsoft Surface Go" class="card-img-top"></a>
                        <div class="card-body">
                          <span class="price">$549.00</span>
                          <a href="detail.php" class="card-title h6">NEW Microsoft Surface Go</a>
                          <div class="d-flex justify-content-between align-items-center">
                            <button type="button" class="btn btn-outline-info btn-sm btn-block add-to-cart">Add to cart</button>
                          </div>
                        </div>
                      </div>
                    </div>';
                    $count++;
                    
                  }
                }
                
              
            } catch(PDOException $e){
              die( "Connection failed: " . $e->getMessage());
            }

            
            ?>
            

          </div>
          <!-- /Hot new releases -->
          <!-- Hot new releases -->
          <h3 class="title mt-4">Hot New Releases</h3>
          <div class="row no-gutters gutters-2">
            <?php 
            $server = "localhost";
            $username = "root";
            $password = "";
            $database = "phploginapp";
            
            try{
              $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);

              $sql = "SELECT * FROM product";
              $result = $conn->query($sql);
              $count = 0;
            
                foreach($result as $k)
                {
                  if($count <=3){
                    
                   ?> 
                      <div class="col-6 col-md-3 mb-2">
                      <div class="card card-product">
                      <div class="ribbon"><span class="bg-info text-white">New</span></div>
                        <button class="wishlist" title="Add to wishlist"><i class="fa fa-heart"></i></button>
                        <a href="detail.php"><img src="<?php echo $k['image'];?>" alt="..." class="card-img-top"></a>
                        <div class="card-body">
                          <span class="price"><?php echo $k['price'];?></span>
                          <a href="detail.php" class="card-title h6"><?php echo $k['name'];?></a>
                          <div class="d-flex justify-content-between align-items-center">
                            <button type="button" class="btn btn-outline-info btn-sm btn-block add-to-cart">Add to cart</button>
                          </div>
                        </div>
                      </div>
                    </div>';
                    <?php
                    $count++;
                    
                  }
                }
                
              
            } catch(PDOException $e){
              die( "Connection failed: " . $e->getMessage());
            }

            
            ?>
            

          </div>
          <!-- /Hot new releases -->

          <!-- Popular Brands -->
          <h3 class="title mt-4">Popular Brands</h3>
          <div class="content-slider">
            <div class="swiper-container brands-slider" id="brands-slider">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="row no-gutters gutters-2">
                    <div class="col-6 col-sm-4 col-md-2 mb-2">
                      <a href="grid.php" class="card">
                        <img src="../img/brands/samsung.svg" alt="" class="card-img-top">
                      </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2 mb-2">
                      <a href="grid.php" class="card">
                        <img src="../img/brands/lenovo.svg" alt="" class="card-img-top">
                      </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2 mb-2">
                      <a href="grid.php" class="card">
                        <img src="../img/brands/sony.svg" alt="" class="card-img-top">
                      </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2 mb-2">
                      <a href="grid.php" class="card">
                        <img src="../img/brands/canon.svg" alt="" class="card-img-top">
                      </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2 mb-2">
                      <a href="grid.php" class="card">
                        <img src="../img/brands/xerox.svg" alt="" class="card-img-top">
                      </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2 mb-2">
                      <a href="grid.php" class="card">
                        <img src="../img/brands/lg.svg" alt="" class="card-img-top">
                      </a>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="row no-gutters gutters-2">
                    <div class="col-6 col-sm-4 col-md-2 mb-2">
                      <a href="grid.php" class="card">
                        <img src="../img/brands/xbox.svg" alt="" class="card-img-top">
                      </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2 mb-2">
                      <a href="grid.php" class="card">
                        <img src="../img/brands/dell.svg" alt="" class="card-img-top">
                      </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2 mb-2">
                      <a href="grid.php" class="card">
                        <img src="../img/brands/nikon.svg" alt="" class="card-img-top">
                      </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2 mb-2">
                      <a href="grid.php" class="card">
                        <img src="../img/brands/sandisk.svg" alt="" class="card-img-top">
                      </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2 mb-2">
                      <a href="grid.php" class="card">
                        <img src="../img/brands/gopro.svg" alt="" class="card-img-top">
                      </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2 mb-2">
                      <a href="grid.php" class="card">
                        <img src="../img/brands/logitech.svg" alt="" class="card-img-top">
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <a href="#" role="button" class="carousel-control-prev" id="brands-slider-prev"><i class="fa fa-angle-left fa-lg"></i></a>
            <a href="#" role="button" class="carousel-control-next" id="brands-slider-next"><i class="fa fa-angle-right fa-lg"></i></a>
          </div>
          <!-- /Popular Brands -->

          <!-- Popular -->
          <h3 class="title mt-4">Popular this week</h3>
          <div class="content-slider">
            <div class="swiper-container" id="popular-slider">
              <div class="swiper-wrapper">
                
                <div class="swiper-slide">
                  <div class="row no-gutters gutters-2">
                  <?php 
            $server = "localhost";
            $username = "root";
            $password = "";
            $database = "phploginapp";
            
            try{
              $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);

              $sql = "SELECT * FROM users";
              $result = $conn->query($sql);
              $count = 0;
            
                foreach($result as $k)
                {
                  if($count <=1){
                    
                    
                     echo'<div class="col-6 col-md-3 mb-2">
                     <div class="card card-product">
                       <div class="badge badge-success badge-pill">save $89.01</div>
                       <button class="wishlist" title="Add tot wishlist"><i class="fa fa-heart"></i></button>
                       <a href="detail.php"><img src="../img/product/9.jpg" alt="ASUS VivoBook F510UA FHD Laptop" class="card-img-top"></a>
                       <div class="card-body">
                         <span class="price"><del class="small text-muted">$599.00</del> $509.99</span>
                         <a href="detail.php" class="card-title h6">ASUS VivoBook F510UA FHD Laptop</a>
                         <div class="d-flex justify-content-between align-items-center">
                           <span class="rating" data-value="4"></span>
                           <button type="button" class="btn btn-outline-info btn-sm add-to-cart" >Add to cart</button>
                         </div>
                       </div>
                     </div>
                   </div>';
                    $count++;
                    
                  }
                }
                
              
            } catch(PDOException $e){
              die( "Connection failed: " . $e->getMessage());
            }

            
            ?>

                    
                  </div>
                </div>
                
                <div class="swiper-slide">
                  <div class="row no-gutters gutters-2">
                    <div class="col-6 col-md-3 mb-2">
                      <div class="card card-product">
                        <div class="badge badge-success badge-pill">save $89.01</div>
                        <button class="wishlist" title="Add tot wishlist"><i class="fa fa-heart"></i></button>
                        <a href="detail.php"><img src="../img/product/9.jpg" alt="ASUS VivoBook F510UA FHD Laptop" class="card-img-top"></a>
                        <div class="card-body">
                          <span class="price"><del class="small text-muted">$599.00</del> $509.99</span>
                          <a href="detail.php" class="card-title h6">ASUS VivoBook F510UA FHD Laptop</a>
                          <div class="d-flex justify-content-between align-items-center">
                            <span class="rating" data-value="4"></span>
                            <button type="button" class="btn btn-outline-info btn-sm">Add to cart</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 col-md-3 mb-2">
                      <div class="card card-product">
                        <div class="ribbon"><span class="bg-pink text-white">Hot</span></div>
                        <button class="wishlist" title="Add tot wishlist"><i class="fa fa-heart"></i></button>
                        <a href="detail.php"><img src="../img/product/10.jpg" alt="Nikon D7200 DX-format DSLR Body (Black)" class="card-img-top"></a>
                        <div class="card-body">
                          <span class="price">$996.95</span>
                          <a href="detail.php" class="card-title h6">Nikon D7200 DX-format DSLR Body (Black)</a>
                          <div class="d-flex justify-content-between align-items-center">
                            <span class="rating" data-value="5"></span>
                            <button type="button" class="btn btn-outline-info btn-sm">Add to cart</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 col-md-3 mb-2">
                      <div class="card card-product">
                        <button class="wishlist" title="Add tot wishlist"><i class="fa fa-heart"></i></button>
                        <a href="detail.php"><img src="../img/product/11.jpg" alt="Polk Audio PSW10 10-Inch Powered Subwoofer" class="card-img-top"></a>
                        <div class="card-body">
                          <span class="price">$99.99</span>
                          <a href="detail.php" class="card-title h6">Polk Audio PSW10 10-Inch Powered Subwoofer</a>
                          <div class="d-flex justify-content-between align-items-center">
                            <span class="rating" data-value="4"></span>
                            <button type="button" class="btn btn-outline-info btn-sm">Add to cart</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 col-md-3 mb-2">
                      <div class="card card-product">
                        <div class="badge badge-danger badge-pill">Only 1 left in stock</div>
                        <button class="wishlist" title="Add tot wishlist"><i class="fa fa-heart"></i></button>
                        <a href="detail.php"><img src="../img/product/12.jpg" alt="Essential Phone in Halo Gray – 128 GB Unlocked" class="card-img-top"></a>
                        <div class="card-body">
                          <span class="price"><del class="small text-muted">$499.99</del> $435.00</span>
                          <a href="detail.php" class="card-title h6">Essential Phone in Halo Gray – 128 GB Unlocked</a>
                          <div class="d-flex justify-content-between align-items-center">
                            <span class="rating" data-value="4"></span>
                            <button type="button" class="btn btn-outline-info btn-sm">Add to cart</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            <a href="#" role="button" class="carousel-control-prev" id="popular-slider-prev"><i class="fa fa-angle-left fa-lg"></i></a>
            <a href="#" role="button" class="carousel-control-next" id="popular-slider-next"><i class="fa fa-angle-right fa-lg"></i></a>
          </div>
          <!-- /Popular -->

          <!-- Footer -->
          <div class="navbar navbar-expand navbar-light navbar-footer">
            <a class="navbar-brand" href="index-2.php">MagMag</a>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Privacy</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Terms</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-question-circle"></i> Help</a>
              </li>
            </ul>
          </div>
          <!-- /Footer -->

        </div>
      </div>
    </div>

    <!-- Modal Cart -->
    <div class="modal fade modal-cart" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="cartModalLabel">Items in your bag</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
             <div class="media">
              <a href="detail.php"><img src="../img/product/1.jpg" width="50" height="50" alt="NEW Microsoft Surface Go"></a>
              <div class="media-body">
                <a href="detail.php" title="NEW Microsoft Surface Go">NEW Microsoft Surface Go</a>
                <div class="input-spinner input-spinner-sm">
                  <input type="number" class="form-control form-control-sm calc" value="1" min="1" max="999">
                  <div class="btn-group-vertical">
                    <button type="button" class="btn btn-light"><i class="fa fa-chevron-up"></i></button>
                    <button type="button" class="btn btn-light"><i class="fa fa-chevron-down"></i></button>
                  </div>
                </div>
                x <span class="price">$549.00</span>
                <button type="button" class="close" aria-label="Close"><i class="fas fa-trash"></i></button>
              </div>
            </div> 
            
            
            
          </div>
          <div class="modal-footer">
            <div class="box-total">
              <h4>Subotal: <span class="price">$1,297.48</span></h4>
              <a href="cart.php" class="btn btn-success">VIEW CART</a>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- REQUIRED JS  -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <!-- PLUGINS FOR CURRENT PAGE -->
    <script src="../plugins/swiper/swiper.min.js"></script>

    <!-- MagMag JS  -->
    <script src="../dist/js/script.min.js"></script>

    <script>
  $(document).ready(function(){
    var inputs1 = $(".calc");
    for(var i = 0; i < inputs1.length; i++){
    console.log($(inputs1[i]).val());
    }
    inputs2 = $(".media-body  span.price");
    for(var i = 0; i < inputs2.length; i++){
    console.log($(inputs2[i]).text().substr(1));
    }


    var s = 0;
    for(var i = 0; i < inputs1.length; i++){
      var v = parseFloat($(inputs2[i]).text().substr(1));
      s += $(inputs1[i]).val()*v;
    
    }
    console.log(s);
    $(".modal-footer .price").text("$"+s);

    $(".btn-group-vertical .btn").click(function(){
      var inputs1 = $(".calc");
    for(var i = 0; i < inputs1.length; i++){
    console.log($(inputs1[i]).val());
    }
    var inputs2 = $(".media-body  span.price");
    for(var i = 0; i < inputs2.length; i++){
    console.log($(inputs2[i]).text().substr(1));
    }


    var s = 0;
    for(var i = 0; i < inputs1.length; i++){
      var v = parseFloat($(inputs2[i]).text().substr(1));
      s += $(inputs1[i]).val()*v;
    
    }
    console.log(s);
    $(".modal-footer .price").text("$"+s);
  });


  $(".close").click(function(){
    $(this).parent().parent().remove();
    $(".close").click(function(){
      var inputs1 = $(".calc");
    for(var i = 0; i < inputs1.length; i++){
    console.log($(inputs1[i]).val());
    }
    var inputs2 = $(".media-body  span.price");
    for(var i = 0; i < inputs2.length; i++){
    console.log($(inputs2[i]).text().substr(1));
    }


    var s = 0;
    for(var i = 0; i < inputs1.length; i++){
      var v = parseFloat($(inputs2[i]).text().substr(1));
      s += $(inputs1[i]).val()*v;
    
    }
    console.log(s);
    $(".modal-footer .price").text("$"+s);
  });
  });

  $(".add-to-cart").click(function(){
    console.log("ok");
    var htmlcode = '<div class="media"><a href="detail.php"><img src="../img/product/1.jpg" width="50" height="50" alt="NEW Microsoft Surface Go"></a><div class="media-body"><a href="detail.php" title="NEW Microsoft Surface Go">NEW Microsoft Surface Go</a><div class="input-spinner input-spinner-sm"><input type="number" class="form-control form-control-sm calc" value="1" min="1" max="999"><div class="btn-group-vertical"><button type="button" class="btn btn-light"><i class="fa fa-chevron-up"></i></button><button type="button" class="btn btn-light"><i class="fa fa-chevron-down"></i></button></div></div>x <span class="price">$549.00</span><button type="button" class="close" aria-label="Close"><i class="fas fa-trash"></i></button></div></div>';
    $(".modal-body").append(htmlcode);
    var inputs1 = $(".calc");
    for(var i = 0; i < inputs1.length; i++){
    console.log($(inputs1[i]).val());
    }
    var inputs2 = $(".media-body  span.price");
    for(var i = 0; i < inputs2.length; i++){
    console.log($(inputs2[i]).text().substr(1));
    }


    var s = 0;
    for(var i = 0; i < inputs1.length; i++){
      var v = parseFloat($(inputs2[i]).text().substr(1));
      s += $(inputs1[i]).val()*v;
    
    }
    console.log(s);
    $(".modal-footer .price").text("$"+s);
    $(".close").click(function(){
    $(this).parent().parent().remove();
    $(".close").click(function(){
      var inputs1 = $(".calc");
    for(var i = 0; i < inputs1.length; i++){
    console.log($(inputs1[i]).val());
    }
    var inputs2 = $(".media-body  span.price");
    for(var i = 0; i < inputs2.length; i++){
    console.log($(inputs2[i]).text().substr(1));
    }


    var s = 0;
    for(var i = 0; i < inputs1.length; i++){
      var v = parseFloat($(inputs2[i]).text().substr(1));
      s += $(inputs1[i]).val()*v;
    
    }
    console.log(s);
    $(".modal-footer .price").text("$"+s);
  });
  });

});
  });

  
  </script>

  </body>

</html>