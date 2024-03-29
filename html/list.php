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
  
<!-- Mirrored from MagMag-electronics16.netlify.com/html/list.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 May 2019 22:00:02 GMT -->
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
    <link rel="stylesheet" href="../plugins/nouislider/nouislider.min.css">

    <!-- MagMag CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

    <title>Shop List - MagMag</title>
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
            <a href="grid.php" class="list-group-item list-group-item-action sub active">Computers</a>
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

          <!-- Category Banner -->
          <div class="card border-0 mb-3">
            <img src="../img/categories/1-wide.jpg" alt="" class="card-img">
            <div class="card-img-overlay">
              <h2 class="card-title text-white title">Computers &amp; Accessories</h2>
            </div>
          </div>
          <!-- /Category Banner -->

          <div class="d-flex justify-content-between">
            <!-- Tags -->
            <div class="btn-tags">
              <a href="#" class="btn btn-light btn-sm active">Laptops</a>
              <a href="#" class="btn btn-light btn-sm">Desktops</a>
              <a href="#" class="btn btn-light btn-sm">PC Gaming</a>
              <a href="#" class="btn btn-light btn-sm">Monitors</a>
              <a href="#" class="btn btn-light btn-sm">Tablets</a>
              <a href="#" class="btn btn-light btn-sm">Computer Accessories</a>
              <a href="#" class="btn btn-light btn-sm">Networking</a>
              <a href="#" class="btn btn-light btn-sm">Computer Components</a>
              <a href="#" class="btn btn-light btn-sm">Storage &amp; Hard Drives</a>
            </div>
            <!-- /Tags -->

            <!-- Filter Modal Toggler -->
            <span>
              <button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#filterModal"><i class="fa fa-filter"></i> FILTER</button>
            </span>
          </div>

          <!-- List -->
          <div class="d-flex justify-content-between mt-4">
            <h3 class="title">Laptops</h3>
            <div class="btn-group btn-group-sm align-self-start" role="group">
              <a href="grid.php" class="btn btn-outline-secondary"><i class="fa fa-th-large"></i></a>
              <a href="list.php" class="btn btn-secondary"><i class="fa fa-list"></i></a>
            </div>
          </div>
          <div class="row no-gutters gutters-2">

            <div class="col-6 col-sm-12 mb-2">
              <div class="card card-product card-product-list">
                <div class="ribbon"><span class="bg-info text-white">New</span></div>
                <button class="wishlist" title="Add to wishlist"><i class="fa fa-heart"></i></button>
                <a href="detail.php"><img src="../img/product/1.jpg" alt="NEW Microsoft Surface Go" class="card-img-top"></a>
                <div class="card-body">
                  <a href="detail.php" class="card-title h5">NEW Microsoft Surface Go</a>
                  <div class="d-inline-block d-sm-block mb-2">
                    <span class="price">$549.00</span>
                  </div>
                  <p lang="zxx">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem illum, at eligendi nisi cumque velit est! Nihil unde, commodi doloribus beatae vero veritatis aliquid mollitia dolores dolor assumenda incidunt, rem.</p>
                  <button type="button" class="btn btn-outline-info btn-sm">Add to cart</button>
                </div>
              </div>
            </div>

            <div class="col-6 col-sm-12 mb-2">
              <div class="card card-product card-product-list">
                <button class="wishlist active" title="Added to wishlist"><i class="fa fa-heart"></i></button>
                <a href="detail.php"><img src="../img/product/2.jpg" alt='Apple 15.4" MacBook Pro Laptop Space Gray' class="card-img-top"></a>
                <div class="card-body">
                  <a href="detail.php" class="card-title h5">Apple 15.4" MacBook Pro Laptop Space Gray</a>
                  <div class="d-inline-block d-sm-block mb-2">
                    <span class="price">$2,720.38</span>
                    <span class="rating" data-value="4"></span>
                  </div>
                  <p lang="zxx">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure ipsam at cum consequuntur quo earum error obcaecati neque non accusamus maiores, mollitia minima ipsa minus libero expedita alias reprehenderit animi?</p>
                  <button type="button" class="btn btn-outline-info btn-sm">Add to cart</button>
                </div>
              </div>
            </div>

            <div class="col-6 col-sm-12 mb-2">
              <div class="card card-product card-product-list">
                <button class="wishlist" title="Add to wishlist"><i class="fa fa-heart"></i></button>
                <a href="detail.php"><img src="../img/product/9.jpg" alt="ASUS VivoBook F510UA FHD Laptop" class="card-img-top"></a>
                <div class="card-body">
                  <a href="detail.php" class="card-title h5">ASUS VivoBook F510UA FHD Laptop ASUS VivoBook F510UA FHD Laptop</a>
                  <div class="d-inline-block d-sm-block mb-2">
                    <span class="price">$509.99</span>
                    <span class="rating" data-value="4"></span>
                  </div>
                  <p lang="zxx">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia eveniet, non aperiam, ratione aliquid quo ipsum, iure excepturi blanditiis temporibus recusandae laborum ipsam tempora rem minima. Ut rerum, saepe soluta.</p>
                  <button type="button" class="btn btn-outline-info btn-sm">Add to cart</button>
                </div>
              </div>
            </div>

            <div class="col-6 col-sm-12 mb-2">
              <div class="card card-product card-product-list">
                <button class="wishlist" title="Add to wishlist"><i class="fa fa-heart"></i></button>
                <a href="detail.php"><img src="../img/product/13.jpg" alt="Acer Aspire E 15, 15.6&quot; Full HD, 8th Gen Intel Core i3" class="card-img-top"></a>
                <div class="card-body">
                  <a href="detail.php" class="card-title h5">Acer Aspire E 15, 15.6&quot; Full HD, 8th Gen Intel Core i3</a>
                  <div class="d-inline-block d-sm-block mb-2">
                    <span class="price">$379.99</span>
                    <span class="rating" data-value="4"></span>
                  </div>
                  <p lang="zxx">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis assumenda voluptas unde dignissimos mollitia cum veniam incidunt ut, repellendus minus aut quidem molestias animi esse harum, fugit omnis debitis alias.</p>
                  <button type="button" class="btn btn-outline-info btn-sm">Add to cart</button>
                </div>
              </div>
            </div>

            <div class="col-6 col-sm-12 mb-2">
              <div class="card card-product card-product-list">
                <button class="wishlist" title="Add to wishlist"><i class="fa fa-heart"></i></button>
                <a href="detail.php"><img src="../img/product/14.jpg" alt="MSI GV62 8RD-200 15.6&quot; Full HD" class="card-img-top"></a>
                <div class="card-body">
                  <a href="detail.php" class="card-title h5">MSI GV62 8RD-200 15.6&quot; Full HD</a>
                  <div class="d-inline-block d-sm-block mb-2">
                    <span class="price">$799.00</span>
                    <span class="rating" data-value="4.5"></span>
                  </div>
                  <p lang="zxx">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo iusto non pariatur architecto cumque fugit, mollitia porro, vel atque labore, corporis repudiandae asperiores excepturi eligendi accusamus voluptate repellat assumenda quo.</p>
                  <button type="button" class="btn btn-outline-info btn-sm">Add to cart</button>
                </div>
              </div>
            </div>

            <div class="col-6 col-sm-12 mb-2">
              <div class="card card-product card-product-list">
                <button class="wishlist" title="Add to wishlist"><i class="fa fa-heart"></i></button>
                <a href="detail.php"><img src="../img/product/15.jpg" alt="LG Electronics gram Thin and Light Laptop" class="card-img-top"></a>
                <div class="card-body">
                  <a href="detail.php" class="card-title h5">LG Electronics gram Thin and Light Laptop</a>
                  <div class="d-inline-block d-sm-block mb-2">
                    <span class="price">$1,196.99</span>
                    <span class="rating" data-value="5"></span>
                  </div>
                  <p lang="zxx">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem eius soluta inventore aspernatur, id cumque harum iure accusantium mollitia, voluptate exercitationem, ducimus. Tempore explicabo porro libero enim suscipit laudantium, maiores.</p>
                  <button type="button" class="btn btn-outline-info btn-sm">Add to cart</button>
                </div>
              </div>
            </div>

            <div class="col-6 col-sm-12 mb-2">
              <div class="card card-product card-product-list">
                <button class="wishlist" title="Add to wishlist"><i class="fa fa-heart"></i></button>
                <a href="detail.php"><img src="../img/product/16.jpg" alt="Dell Inspiron 13 5000 2-in-1 - 13.3&quot; FHD Touch" class="card-img-top"></a>
                <div class="card-body">
                  <a href="detail.php" class="card-title h5">Dell Inspiron 13 5000 2-in-1 - 13.3&quot; FHD Touch</a>
                  <div class="d-inline-block d-sm-block mb-2">
                    <span class="price">$649.99</span>
                    <span class="rating" data-value="3.5"></span>
                  </div>
                  <p lang="zxx">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt fuga vero fugiat! Odio sapiente, iusto reiciendis, explicabo vel magni eaque blanditiis, magnam quasi quidem in ipsam, facere placeat earum suscipit!</p>
                  <button type="button" class="btn btn-outline-info btn-sm">Add to cart</button>
                </div>
              </div>
            </div>

            <div class="col-6 col-sm-12 mb-2">
              <div class="card card-product card-product-list">
                <button class="wishlist" title="Add to wishlist"><i class="fa fa-heart"></i></button>
                <a href="detail.php"><img src="../img/product/17.jpg" alt="ASUS ZenBook 13 Ultra-Slim Laptop, 13.3&quot; Full HD" class="card-img-top"></a>
                <div class="card-body">
                  <a href="detail.php" class="card-title h5">ASUS ZenBook 13 Ultra-Slim Laptop, 13.3&quot; Full HD</a>
                  <div class="d-inline-block d-sm-block mb-2">
                    <span class="price">$749.00</span>
                    <span class="rating" data-value="4"></span>
                  </div>
                  <p lang="zxx">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, sunt, ipsam dicta obcaecati impedit eligendi nemo. Ab ipsam odit sequi commodi, error, quod ut beatae fugiat aperiam ex quos voluptatum.</p>
                  <button type="button" class="btn btn-outline-info btn-sm">Add to cart</button>
                </div>
              </div>
            </div>

          </div>
          <!-- /List -->

          <!-- Pagination -->
          <nav aria-label="Page navigation Shop List">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled"><a class="page-link" href="list.php" tabindex="-1">Previous</a></li>
              <li class="page-item active"><a class="page-link" href="list.php">1</a></li>
              <li class="page-item"><a class="page-link" href="list.php">2</a></li>
              <li class="page-item"><a class="page-link" href="list.php">3</a></li>
              <li class="page-item disabled"><a class="page-link" href="list.php" tabindex="-1">...</a></li>
              <li class="page-item"><a class="page-link" href="list.php">70</a></li>
              <li class="page-item">
                <a class="page-link" href="list.php">Next</a>
              </li>
            </ul>
          </nav>
          <!-- /Pagination -->

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

    <!-- Modal filter -->
    <div class="modal fade modal-filter" id="filterModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="filterSortBy">Sort by</label>
                <select class="form-control custom-select" id="filterSortBy">
                  <option>Popular</option>
                  <option>Price: low to high</option>
                  <option>Price: high to low</option>
                </select>
              </div>
              <hr>
              <div class="form-group">
                <label for="filterCategory">Category</label>
                <select id="filterCategory" class="form-control custom-select">
                  <option>Laptops</option>
                  <option>Desktops</option>
                  <option>PC Gaming</option>
                  <option>Monitors</option>
                  <option>Tablets</option>
                  <option>Computer Accessories</option>
                  <option>Networking</option>
                  <option>Computer Components</option>
                  <option>Storage &amp; Hard Drives</option>
                </select>
              </div>
              <hr>
              <div class="form-group">
                <label class="mb-5">Price Range</label>
                <div id="price-range"></div>
              </div>
              <hr>
              <div class="form-group">
                <label>Rating</label>
                <div id="star-rating" data-score="4.5"></div>
              </div>
              <hr>
              <div class="form-group text-center">
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="reset" class="btn btn-light">CLEAR ALL</button>
                  <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">DONE</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- REQUIRED JS  -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <!-- PLUGINS FOR CURRENT PAGE -->
    <script src="../plugins/nouislider/nouislider.min.js"></script>
    <script src="../plugins/raty-fa/jquery.raty-fa.min.js"></script>

    <!-- MagMag JS  -->
    <script src="../dist/js/script.min.js"></script>

  </body>

<!-- Mirrored from MagMag-electronics16.netlify.com/html/list.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 May 2019 22:00:02 GMT -->
</html>