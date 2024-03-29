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
  
<!-- Mirrored from MagMag-electronics16.netlify.com/html/detail-tab.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 May 2019 21:58:05 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- FONT  -->
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="../../fonts.googleapis.com/cssd54f.css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- PLUGINS FOR CURRENT PAGE -->
    <link rel="stylesheet" href="../plugins/swiper/swiper.min.css">
    <link rel="stylesheet" href="../plugins/photoswipe/photoswipe.min.css">
    <link rel="stylesheet" href="../plugins/photoswipe/photoswipe-default-skin/default-skin.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

    <!-- MagMag CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">


    <title>Shop Detail - MagMag</title>
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

        <!-- Notification Dropdown -->
        <li class="nav-item dropdown ml-1 ml-sm-3">
          <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownNotif" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bell fa-lg"></i>
            <span class="badge badge-info badge-count">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownNotif">
            <a class="dropdown-item has-icon" href="#"><i class="fa fa-envelope"></i> 1 New Message</a>
            <a class="dropdown-item has-icon" href="#"><i class="fa fa-comment"></i> 2 New Comments</a>
          </div>
        </li>
        <!-- /Notification Dropdown -->

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
          <img src="../img/user.svg" alt="User">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item has-icon" href="account-order.php"><i class="fa fa-shopping-bag fa-fw"></i> My Orders</a>
          <a class="dropdown-item has-icon has-badge" href="account-wishlist.php"><i class="fa fa-heart fa-fw"></i> Wishlist <span class="badge badge-secondary">3</span></a>
          <a class="dropdown-item has-icon" href="account-profile.php"><i class="fa fa-cog fa-fw"></i> Account Setting</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item has-icon" href="./phploginapp-master/login.php"><i class="fas fa-sign-out-alt"></i>           <?php echo $_SESSION['email']; ?>
</a>

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
            <a href="index-2.php" class="list-group-item list-group-item-action"><i class="fa fa-home fa-lg fa-fw"></i> Home</a>
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
                        <div class="collapse show" id="pages">
                          <a href="account-profile.php" class="list-group-item list-group-item-action sub">My Profile</a>
              <a href="account-order.php" class="list-group-item list-group-item-action sub">My Orders</a>
              <a href="account-order-detail.php" class="list-group-item list-group-item-action sub">Order Detail</a>
              <a href="account-address.php" class="list-group-item list-group-item-action sub">My Address</a>
              <a href="account-wishlist.php" class="list-group-item list-group-item-action sub">My Wishlist</a>
              <a href="detail-tab.php" class="list-group-item list-group-item-action sub active">Product Detail with Tab</a>
            </div>
                        <a href="#pages" class="list-group-item list-group-item-action sub toggle" data-toggle="collapse" aria-expanded="true">LESS &#9662;</a>
                        <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-question-circle fa-lg fa-fw"></i> Help</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-plus-circle fa-lg fa-fw"></i> Start Selling</a>
          </div>
          <div class="small p-3">Copyright © 2019 MagMag All right reserved</div>
        </div>
        <!-- /Sidebar -->


        <div class="col" id="main-content">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index-2.php" class="text-info">Home</a></li>
              <li class="breadcrumb-item"><a href="grid.php" class="text-info">Computers &amp; Accessories</a></li>
              <li class="breadcrumb-item active" aria-current="page">Laptops</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->

          <div class="row">
            <div class="col-md-7">
              <div class="img-detail-wrapper">
                <img src="../img/product/detail/1.jpg" class="img-fluid px-5" id="img-detail" alt="Responsive image" data-index="0">
                <div class="img-detail-list">
                  <a href="#" class="active"><img src="../img/product/detail/1_small.jpg" data-large-src="../img/product/detail/1.jpg" alt="Product" data-index="0"></a>
                  <a href="#"><img src="../img/product/detail/2_small.jpg" data-large-src="../img/product/detail/2.jpg" alt="Product" data-index="1"></a>
                  <a href="#"><img src="../img/product/detail/3_small.jpg" data-large-src="../img/product/detail/3.jpg" alt="Product" data-index="2"></a>
                  <a href="#"><img src="../img/product/detail/4_small.jpg" data-large-src="../img/product/detail/4.jpg" alt="Product" data-index="3"></a>
                  <a href="#"><img src="../img/product/detail/5_small.jpg" data-large-src="../img/product/detail/5.jpg" alt="Product" data-index="4"></a>
                  <a href="#"><img src="../img/product/detail/6_small.jpg" data-large-src="../img/product/detail/6.jpg" alt="Product" data-index="5"></a>
                  <a href="#"><img src="../img/product/detail/7_small.jpg" data-large-src="../img/product/detail/7.jpg" alt="Product" data-index="6"></a>
                  <a href="#"><img src="../img/product/detail/8_small.jpg" data-large-src="../img/product/detail/8.jpg" alt="Product" data-index="7"></a>
                  <a href="#"><img src="../img/product/detail/9_small.jpg" data-large-src="../img/product/detail/9.jpg" alt="Product" data-index="8"></a>
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="detail-header">
                <h3>NEW Microsoft Surface Go</h3>
                <h6><span class="rating" data-value="4.5"></span> <a class="ml-1" href="#reviews">2 reviews</a></h6>
                <h3 class="price">$ 549.00</h3>
              </div>
              <form>
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <div class="input-spinner">
                    <input type="number" class="form-control" id="quantity" value="1" min="1" max="999">
                    <div class="btn-group-vertical">
                      <button type="button" class="btn btn-light"><i class="fa fa-chevron-up"></i></button>
                      <button type="button" class="btn btn-light"><i class="fa fa-chevron-down"></i></button>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="d-block">RAM</label>
                  <div class="btn-group btn-group-sm btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-outline-success active">
                      <input type="radio" name="ram" checked>4GB
                    </label>
                    <label class="btn btn-outline-success">
                      <input type="radio" name="ram">8GB
                    </label>
                  </div>
                </div>
                <div class="form-group mb-4">
                  <label class="d-block">Storage</label>
                  <div class="btn-group btn-group-sm btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-outline-dark active">
                      <input type="radio" name="storage" checked>64GB
                    </label>
                    <label class="btn btn-outline-dark">
                      <input type="radio" name="storage">128GB
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-info btn-block">ADD TO CART</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link text-body active" id="desc-tab" data-toggle="tab" href="#desc" role="tab" aria-controls="desc" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-body" id="spec-tab" data-toggle="tab" href="#spec" role="tab" aria-controls="spec" aria-selected="false">Tech Specs</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-body" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews (2)</a>
                </li>
              </ul>
              <div class="tab-content mb-4">
                <div class="tab-pane border border-top-0 p-3 fade show active" id="desc" role="tabpanel" aria-labelledby="desc-tab">
                  <p>New 10” Surface Go is perfect for all your daily tasks, giving you laptop performance with tablet portability, a stunning touchscreen, and the Windows and Office experience you know. From email, browsing, and home projects to unwinding with a favorite TV show, Surface Lingo is by your side wherever you are — with up to 9 hours1 of battery life, built-in HD cameras, hassle-free connectivity, and all the ports you need, including multi-tasking USB-C.</p>
                  <p>Disclaimers:</p>
                  <ul>
                    <li>
                      Battery
                      <p>life: Up to 9 hours of video playback. Testing conducted by Microsoft in June 2018] using preproduction Intel Pentium Gold 4415Y Processor, 128GB, 8GB RAM device. Testing consisted of full battery discharge during video playback. All settings were default except: Wi-Fi was associated with a network and Auto-Brightness disabled. Battery life varies significantly with settings, usage, and other factors.</p>
                    </li>
                    <li>
                      Windows
                      <p>10 in S Mode works exclusively with apps from the Microsoft Store within Windows. Certain default settings, features, and apps cannot be changed. Some accessories and apps compatible with Windows 10 may not work (including some antivirus and accessibility apps), and performance may vary. If you switch to Windows 10 Pro configuration (fee may apply), you can’t switch back to Windows 10 in S Mode. Learn more at Windows.com/Windows10SFAQ.</p>
                    </li>
                  </ul>
                </div>
                <div class="tab-pane border border-top-0 p-3 fade" id="spec" role="tabpanel" aria-labelledby="spec-tab">
                  <ul>
                    <li>10” PixelSense Display</li>
                    <li>Intel Pentium Gold</li>
                    <li>4GB or 8GB RAM</li>
                    <li>64GB or 128GB Storage</li>
                    <li>Weight starting at 1.15 lbs</li>
                    <li>Up to 9 hours battery life</li>
                  </ul>
                </div>
                <div class="tab-pane border border-top-0 p-3 fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                  <div class="media align-items-center mb-3">
                    <h1 class="mb-0">4.5</h1>
                    <div class="media-body ml-2">
                      <div class="rating" data-value="4.5"></div>
                      <div>(2 reviews)</div>
                    </div>
                  </div>
                  <div class="media">
                    <img src="../img/user.svg" width="50" height="50" alt="John Thor" class="rounded-circle">
                    <div class="media-body ml-3">
                      <h5 class="mb-0">John Thor</h5>
                      <span class="rating text-secondary" data-value="4"></span>
                      <small class="ml-2">15/07/2018</small>
                      <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi</p>
                    </div>
                  </div>
                  <div class="media">
                    <img src="../img/user2.svg" width="50" height="50" alt="Michael Lelep" class="rounded-circle">
                    <div class="media-body ml-3">
                      <h5 class="mb-0">Michael Lelep</h5>
                      <span class="rating text-secondary" data-value="5"></span>
                      <small class="ml-2">15/07/2018</small>
                      <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi</p>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#reviewFormModal">Write a review</button>
                  </div>
                </div>
              </div>

              <!-- Similar Items -->
              <h3>Similar Items</h3>
              <div class="content-slider">
            <div class="swiper-container" id="popular-slider">
              <div class="swiper-wrapper">
                
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
              <!-- /Similar Items -->

            </div>
          </div>

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
            <h5 class="modal-title" id="cartModalLabel">You have 4 items in your bag</h5>
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
                  <input type="number" class="form-control form-control-sm" value="1" min="1" max="999">
                  <div class="btn-group-vertical">
                    <button type="button" class="btn btn-light"><i class="fa fa-chevron-up"></i></button>
                    <button type="button" class="btn btn-light"><i class="fa fa-chevron-down"></i></button>
                  </div>
                </div>
                x <span class="price">$549.00</span>
                <button type="button" class="close" aria-label="Close"><i class="fa fa-trash-o"></i></button>
              </div>
            </div>
            
            <div class="media">
              <a href="detail.php"><img src="../img/product/3.jpg" width="50" height="50" alt="SanDisk Cruzer CZ36 64GB USB 2.0 Flash Drive"></a>
              <div class="media-body">
                <a href="detail.php" title="SanDisk Cruzer CZ36 64GB USB 2.0 Flash Drive">SanDisk Cruzer CZ36 64GB USB 2.0 Flash Drive</a>
                <div class="input-spinner input-spinner-sm">
                  <input type="number" class="form-control form-control-sm" value="1" min="1" max="999">
                  <div class="btn-group-vertical">
                    <button type="button" class="btn btn-light"><i class="fa fa-chevron-up"></i></button>
                    <button type="button" class="btn btn-light"><i class="fa fa-chevron-down"></i></button>
                  </div>
                </div>
                x <span class="price">$13.49</span>
                <button type="button" class="close" aria-label="Close"><i class="fa fa-trash-o"></i></button>
              </div>
            </div>
            
            <div class="media">
              <a href="detail.php"><img src="../img/product/8.jpg" width="50" height="50" alt="Beats Studio3 Wireless Headphones"></a>
              <div class="media-body">
                <a href="detail.php" title="Beats Studio3 Wireless Headphones">Beats Studio3 Wireless Headphones</a>
                <div class="input-spinner input-spinner-sm">
                  <input type="number" class="form-control form-control-sm" value="1" min="1" max="999">
                  <div class="btn-group-vertical">
                    <button type="button" class="btn btn-light"><i class="fa fa-chevron-up"></i></button>
                    <button type="button" class="btn btn-light"><i class="fa fa-chevron-down"></i></button>
                  </div>
                </div>
                x <span class="price">$299.99</span>
                <button type="button" class="close" aria-label="Close"><i class="fa fa-trash-o"></i></button>
              </div>
            </div>
            
            <div class="media">
              <a href="detail.php"><img src="../img/product/12.jpg" width="50" height="50" alt="Essential Phone in Halo Gray - 128 GB Unlocked"></a>
              <div class="media-body">
                <a href="detail.php" title="Essential Phone in Halo Gray - 128 GB Unlocked">Essential Phone in Halo Gray - 128 GB Unlocked</a>
                <div class="input-spinner input-spinner-sm">
                  <input type="number" class="form-control form-control-sm" value="1" min="1" max="999">
                  <div class="btn-group-vertical">
                    <button type="button" class="btn btn-light"><i class="fa fa-chevron-up"></i></button>
                    <button type="button" class="btn btn-light"><i class="fa fa-chevron-down"></i></button>
                  </div>
                </div>
                x <span class="price">$435.00</span>
                <button type="button" class="close" aria-label="Close"><i class="fa fa-trash-o"></i></button>
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


    <!-- Review Form Modal -->
    <div class="modal fade" id="reviewFormModal" tabindex="-1" role="dialog" aria-labelledby="reviewFormModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="reviewFormModalLabel">Write your review</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form>
            <div class="modal-body">
              <div class="form-group">
                <label for="InputTitle">Title</label>
                <input type="text" class="form-control" id="InputTitle" placeholder="Enter Title">
              </div>
              <div class="form-group">
                <label for="inputDesc">Review</label>
                <textarea class="form-control" id="inputDesc" rows="3" placeholder="Your review"></textarea>
              </div>
              <div class="form-group">
                <label>Rating</label>
                <div id="star-rating" class="text-warning h5"></div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Photoswipe container-->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="pswp__bg"></div>
      <div class="pswp__scroll-wrap">
        <div class="pswp__container">
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
          <div class="pswp__top-bar">
            <div class="pswp__counter"></div>
            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
            <button class="pswp__button pswp__button--share" title="Share"></button>
            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
            <div class="pswp__preloader">
              <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                  <div class="pswp__preloader__donut"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip"></div>
          </div>
          <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
          <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
          <div class="pswp__caption">
            <div class="pswp__caption__center"></div>
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
    <script src="../plugins/raty-fa/jquery.raty-fa.min.js"></script>
    <script src="../plugins/photoswipe/photoswipe.min.js"></script>
    <script src="../plugins/photoswipe/photoswipe-ui-default.min.js"></script>

    <!-- MagMag JS  -->
    <script src="../dist/js/script.min.js"></script>

  </body>

<!-- Mirrored from MagMag-electronics16.netlify.com/html/detail-tab.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 May 2019 21:58:08 GMT -->
</html>