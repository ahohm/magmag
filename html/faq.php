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
  
<!-- Mirrored from MagMag-electronics16.netlify.com/html/faq.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 May 2019 21:58:05 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- FONT  -->
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="../../fonts.googleapis.com/cssd54f.css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- MagMag CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">


    <title>FAQ - MagMag</title>
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
            <a href="faq.php" class="list-group-item list-group-item-action sub active">FAQ</a>
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

          <div class="row">
            <div class="col-12 mb-4">
              <h3 class="title">Frequently Asked Questions (FAQ)</h3>
              <hr>
            </div>
            <div class="col-md-3">
              <h5><i class="fa fa-shopping-cart fa-fw"></i> Shopping</h5>
            </div>
            <div class="col-md-9 mb-4">
              <div id="accordion1" role="tablist" class="mb-3">
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading1-1">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse1-1" aria-expanded="false" aria-controls="collapse1-1">
                        I see different prices with the same title. Why?
                    </a>
                  </div>
                  <div id="collapse1-1" class="collapse" role="tabpanel" aria-labelledby="heading1-1" data-parent="#accordion1">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading1-2">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse1-2" aria-expanded="false" aria-controls="collapse1-2">
                        Why do I see different prices for the same product?
                    </a>
                  </div>
                  <div id="collapse1-2" class="collapse" role="tabpanel" aria-labelledby="heading1-2" data-parent="#accordion1">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident blanditiis ipsa expedita, earum esse omnis delectus possimus fugit perferendis ex veritatis veniam consequuntur mollitia, facilis vel velit voluptatem eos ut!
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading1-3">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse1-3" aria-expanded="false" aria-controls="collapse1-3">
                        Is it necessary to have an account to shop on Marketshop?
                    </a>
                  </div>
                  <div id="collapse1-3" class="collapse" role="tabpanel" aria-labelledby="heading1-3" data-parent="#accordion1">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, quisquam, corrupti. Perspiciatis maxime provident in vero dolore similique quam voluptatum eum reiciendis ex repellat a saepe, explicabo odit quae perferendis!
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading1-4">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse1-4" aria-expanded="false" aria-controls="collapse1-4">
                        What do I need to know before getting an order gift wrapped?
                    </a>
                  </div>
                  <div id="collapse1-4" class="collapse" role="tabpanel" aria-labelledby="heading1-4" data-parent="#accordion1">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab perferendis, similique a accusamus ipsum incidunt repellendus quis, soluta, minus molestiae illum eligendi id hic eum accusantium voluptatem quae facilis architecto.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading1-5">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse1-5" aria-expanded="false" aria-controls="collapse1-5">
                        What is Advantage?
                    </a>
                  </div>
                  <div id="collapse1-5" class="collapse" role="tabpanel" aria-labelledby="heading1-5" data-parent="#accordion1">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, culpa rem in voluptate inventore repudiandae officia ad eveniet aut reiciendis corrupti, odit, velit officiis voluptatibus, incidunt minima omnis voluptas. Similique.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <h5><i class="fa fa-credit-card fa-fw"></i> Payments</h5>
            </div>
            <div class="col-md-9 mb-4">
              <div id="accordion2" role="tablist" class="mb-3">
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-1">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-1" aria-expanded="false" aria-controls="collapse2-1">
                        How do I pay for a purchase?
                    </a>
                  </div>
                  <div id="collapse2-1" class="collapse" role="tabpanel" aria-labelledby="heading2-1" data-parent="#accordion2">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-2">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-2" aria-expanded="false" aria-controls="collapse2-2">
                        Are there any hidden charges (Octroi or Sales Tax) when I make a purchase?
                    </a>
                  </div>
                  <div id="collapse2-2" class="collapse" role="tabpanel" aria-labelledby="heading2-2" data-parent="#accordion2">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident blanditiis ipsa expedita, earum esse omnis delectus possimus fugit perferendis ex veritatis veniam consequuntur mollitia, facilis vel velit voluptatem eos ut!
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-3">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-3" aria-expanded="false" aria-controls="collapse2-3">
                        What is Cash on Delivery?
                    </a>
                  </div>
                  <div id="collapse2-3" class="collapse" role="tabpanel" aria-labelledby="heading2-3" data-parent="#accordion2">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, quisquam, corrupti. Perspiciatis maxime provident in vero dolore similique quam voluptatum eum reiciendis ex repellat a saepe, explicabo odit quae perferendis!
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-4">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-4" aria-expanded="false" aria-controls="collapse2-4">
                        How do I pay using a credit/debit card?
                    </a>
                  </div>
                  <div id="collapse2-4" class="collapse" role="tabpanel" aria-labelledby="heading2-4" data-parent="#accordion2">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab perferendis, similique a accusamus ipsum incidunt repellendus quis, soluta, minus molestiae illum eligendi id hic eum accusantium voluptatem quae facilis architecto.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-5">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-5" aria-expanded="false" aria-controls="collapse2-5">
                        Is it safe to use my credit/debit card on this store?
                    </a>
                  </div>
                  <div id="collapse2-5" class="collapse" role="tabpanel" aria-labelledby="heading2-5" data-parent="#accordion2">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, culpa rem in voluptate inventore repudiandae officia ad eveniet aut reiciendis corrupti, odit, velit officiis voluptatibus, incidunt minima omnis voluptas. Similique.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-6">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-6" aria-expanded="false" aria-controls="collapse2-6">
                        What is a 3D Secure password?
                    </a>
                  </div>
                  <div id="collapse2-6" class="collapse" role="tabpanel" aria-labelledby="heading2-6" data-parent="#accordion2">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, culpa rem in voluptate inventore repudiandae officia ad eveniet aut reiciendis corrupti, odit, velit officiis voluptatibus, incidunt minima omnis voluptas. Similique.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-7">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-7" aria-expanded="false" aria-controls="collapse2-7">
                        How can I get the 3D Secure password for my credit/debit card?
                    </a>
                  </div>
                  <div id="collapse2-7" class="collapse" role="tabpanel" aria-labelledby="heading2-7" data-parent="#accordion2">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, culpa rem in voluptate inventore repudiandae officia ad eveniet aut reiciendis corrupti, odit, velit officiis voluptatibus, incidunt minima omnis voluptas. Similique.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-8">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-8" aria-expanded="false" aria-controls="collapse2-8">
                        Can I use my bank's Internet Banking feature to make a payment?
                    </a>
                  </div>
                  <div id="collapse2-8" class="collapse" role="tabpanel" aria-labelledby="heading2-8" data-parent="#accordion2">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, culpa rem in voluptate inventore repudiandae officia ad eveniet aut reiciendis corrupti, odit, velit officiis voluptatibus, incidunt minima omnis voluptas. Similique.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-9">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-9" aria-expanded="false" aria-controls="collapse2-9">
                        Can I make a credit/debit card or Internet Banking payment through my mobile?
                    </a>
                  </div>
                  <div id="collapse2-9" class="collapse" role="tabpanel" aria-labelledby="heading2-9" data-parent="#accordion2">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, culpa rem in voluptate inventore repudiandae officia ad eveniet aut reiciendis corrupti, odit, velit officiis voluptatibus, incidunt minima omnis voluptas. Similique.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-10">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-10" aria-expanded="false" aria-controls="collapse2-10">
                        How does 'Instant Cashback' work?
                    </a>
                  </div>
                  <div id="collapse2-10" class="collapse" role="tabpanel" aria-labelledby="heading2-10" data-parent="#accordion2">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, culpa rem in voluptate inventore repudiandae officia ad eveniet aut reiciendis corrupti, odit, velit officiis voluptatibus, incidunt minima omnis voluptas. Similique.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading2-11">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse2-11" aria-expanded="false" aria-controls="collapse2-11">
                        How do I place a Cash on Delivery (COD) order?
                    </a>
                  </div>
                  <div id="collapse2-11" class="collapse" role="tabpanel" aria-labelledby="heading2-11" data-parent="#accordion2">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, culpa rem in voluptate inventore repudiandae officia ad eveniet aut reiciendis corrupti, odit, velit officiis voluptatibus, incidunt minima omnis voluptas. Similique.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <h5><i class="fa fa-user fa-fw"></i> My Account &amp; My Orders</h5>
            </div>
            <div class="col-md-9 mb-4">
              <div id="accordion3" role="tablist" class="mb-3">
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading3-1">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse3-1" aria-expanded="false" aria-controls="collapse3-1">
                        What is 'My Account'? How do I update my information ?
                    </a>
                  </div>
                  <div id="collapse3-1" class="collapse" role="tabpanel" aria-labelledby="heading3-1" data-parent="#accordion3">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading3-2">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse3-2" aria-expanded="false" aria-controls="collapse3-2">
                        How do I merge my accounts linked to different email ids?
                    </a>
                  </div>
                  <div id="collapse3-2" class="collapse" role="tabpanel" aria-labelledby="heading3-2" data-parent="#accordion3">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading3-3">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse3-3" aria-expanded="false" aria-controls="collapse3-3">
                        How do I know my order has been confirmed?
                    </a>
                  </div>
                  <div id="collapse3-3" class="collapse" role="tabpanel" aria-labelledby="heading3-3" data-parent="#accordion3">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading3-4">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse3-4" aria-expanded="false" aria-controls="collapse3-4">
                        Can I order a product that is 'Out of Stock'?
                    </a>
                  </div>
                  <div id="collapse3-4" class="collapse" role="tabpanel" aria-labelledby="heading3-4" data-parent="#accordion3">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <h5><i class="fa fa-gift fa-fw"></i> Gift Voucher</h5>
            </div>
            <div class="col-md-9 mb-4">
              <div id="accordion4" role="tablist" class="mb-3">
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading4-1">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse4-1" aria-expanded="false" aria-controls="collapse4-1">
                        How do I buy/gift an e-Gift Voucher?
                    </a>
                  </div>
                  <div id="collapse4-1" class="collapse" role="tabpanel" aria-labelledby="heading4-1" data-parent="#accordion4">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading4-2">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse4-2" aria-expanded="false" aria-controls="collapse4-2">
                        How do I make a purchase with an e-Gift Voucher?
                    </a>
                  </div>
                  <div id="collapse4-2" class="collapse" role="tabpanel" aria-labelledby="heading4-2" data-parent="#accordion4">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading4-3">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse4-3" aria-expanded="false" aria-controls="collapse4-3">
                        Does an e-Gift Voucher expire?
                    </a>
                  </div>
                  <div id="collapse4-3" class="collapse" role="tabpanel" aria-labelledby="heading4-3" data-parent="#accordion4">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading4-4">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse4-4" aria-expanded="false" aria-controls="collapse4-4">
                        Can I use promotional codes with e-Gift Vouchers?
                    </a>
                  </div>
                  <div id="collapse4-4" class="collapse" role="tabpanel" aria-labelledby="heading4-4" data-parent="#accordion4">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading4-5">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse4-5" aria-expanded="false" aria-controls="collapse4-5">
                        Is there a limit on how many e-Gift vouchers I can use on a single order?
                    </a>
                  </div>
                  <div id="collapse4-5" class="collapse" role="tabpanel" aria-labelledby="heading4-5" data-parent="#accordion4">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading4-6">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse4-6" aria-expanded="false" aria-controls="collapse4-6">
                        What Terms & Conditions apply to e-Gift Vouchers?
                    </a>
                  </div>
                  <div id="collapse4-6" class="collapse" role="tabpanel" aria-labelledby="heading4-6" data-parent="#accordion4">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <h5><i class="fa fa-question-circle fa-fw"></i> Order Status</h5>
            </div>
            <div class="col-md-9 mb-4">
              <div id="accordion5" role="tablist" class="mb-3">
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading5-1">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse5-1" aria-expanded="false" aria-controls="collapse5-1">
                        How do I check the current status of my orders?
                    </a>
                  </div>
                  <div id="collapse5-1" class="collapse" role="tabpanel" aria-labelledby="heading5-1" data-parent="#accordion5">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading5-2">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse5-2" aria-expanded="false" aria-controls="collapse5-2">
                        What do the different order status mean?
                    </a>
                  </div>
                  <div id="collapse5-2" class="collapse" role="tabpanel" aria-labelledby="heading5-2" data-parent="#accordion5">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading5-3">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse5-3" aria-expanded="false" aria-controls="collapse5-3">
                        When and how can I cancel an order?
                    </a>
                  </div>
                  <div id="collapse5-3" class="collapse" role="tabpanel" aria-labelledby="heading5-3" data-parent="#accordion5">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <h5><i class="fa fa-truck fa-fw"></i> Shipping</h5>
            </div>
            <div class="col-md-9 mb-4">
              <div id="accordion6" role="tablist" class="mb-3">
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading6-1">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse6-1" aria-expanded="false" aria-controls="collapse6-1">
                        What are the delivery charges?
                    </a>
                  </div>
                  <div id="collapse6-1" class="collapse" role="tabpanel" aria-labelledby="heading6-1" data-parent="#accordion6">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading6-2">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse6-2" aria-expanded="false" aria-controls="collapse6-2">
                        Are there any hidden costs (sales tax, octroi etc) on items sold by sellers?
                    </a>
                  </div>
                  <div id="collapse6-2" class="collapse" role="tabpanel" aria-labelledby="heading6-2" data-parent="#accordion6">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading6-3">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse6-3" aria-expanded="false" aria-controls="collapse6-3">
                        What is the estimated delivery time?
                    </a>
                  </div>
                  <div id="collapse6-3" class="collapse" role="tabpanel" aria-labelledby="heading6-3" data-parent="#accordion6">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading6-4">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse6-4" aria-expanded="false" aria-controls="collapse6-4">
                        Why does the estimated delivery time vary from seller to seller?
                    </a>
                  </div>
                  <div id="collapse6-4" class="collapse" role="tabpanel" aria-labelledby="heading6-4" data-parent="#accordion6">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading6-5">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse6-5" aria-expanded="false" aria-controls="collapse6-5">
                        Why does the delivery date not correspond to the delivery timeline mentioned?
                    </a>
                  </div>
                  <div id="collapse6-5" class="collapse" role="tabpanel" aria-labelledby="heading6-5" data-parent="#accordion6">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading6-6">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse6-6" aria-expanded="false" aria-controls="collapse6-6">
                        Seller does not/cannot ship to my area. Why?
                    </a>
                  </div>
                  <div id="collapse6-6" class="collapse" role="tabpanel" aria-labelledby="heading6-6" data-parent="#accordion6">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading6-7">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse6-7" aria-expanded="false" aria-controls="collapse6-7">
                        I need to return an item, how do I arrange for a pick-up?
                    </a>
                  </div>
                  <div id="collapse6-7" class="collapse" role="tabpanel" aria-labelledby="heading6-7" data-parent="#accordion6">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
                <div class="card mb-1">
                  <div class="card-header p-2" role="tab" id="heading6-8">
                    <a class="collapsed text-secondary font-weight-bold" data-toggle="collapse" href="#collapse6-8" aria-expanded="false" aria-controls="collapse6-8">
                        Does deliver internationally?
                    </a>
                  </div>
                  <div id="collapse6-8" class="collapse" role="tabpanel" aria-labelledby="heading6-8" data-parent="#accordion6">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam unde dicta ab sapiente harum beatae nihil aspernatur nam eos perferendis. Iusto perspiciatis assumenda vitae aspernatur nam est fuga maiores sequi.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="alert alert-info" role="alert">
                Was this article helpful ? <a href="#" class="alert-link">Yes</a> / <a href="contact.php" class="alert-link">No, I want to contact support</a>
              </div>
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


    <!-- REQUIRED JS  -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <!-- MagMag JS  -->
    <script src="../dist/js/script.min.js"></script>

  </body>

<!-- Mirrored from MagMag-electronics16.netlify.com/html/faq.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 May 2019 21:58:05 GMT -->
</html>