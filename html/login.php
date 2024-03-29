<?php

session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: /");
}

require 'database.php';

if(!empty($_POST['email']) && !empty($_POST['password'])):
	
	$records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';

	if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){

		$_SESSION['user_id'] = $results['id'];
		header("Location: ./index-2.php");

	} else {
		$message = 'Sorry, those credentials do not match';
	}

endif;

?>

<!doctype html>
<html >
  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="../../fonts.googleapis.com/cssd54f.css?family=Fira+Sans">

    <link rel="stylesheet" href="../dist/css/vendor.min.css">

    <link rel="stylesheet" href="../dist/css/style.min.css">


    <title>Login / Register - MagMag</title>
  </head>
  <body>

    <!--Header -->
    <header class="navbar navbar-expand navbar-light fixed-top">

      <!-- Toggle Menu -->
      <span class="toggle-menu"><i class="fa fa-bars fa-lg"></i></span>

      <!-- Logo -->
      <a class="navbar-brand" href="index-2.html"><img src="../img/logo.svg" alt="Mimity">Mimity</a>

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
            USD <i class="fa fa-caret-down fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownCurrency">
            <button class="dropdown-item" type="button">USD</button>
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
            <button class="dropdown-item" type="button">Spain</button>
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
          <a href="login.html" class="nav-link btn btn-light btn-sm"><i class="fa fa-sign-in"></i> Login</a>
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
          <a class="dropdown-item has-icon" href="account-order.html"><i class="fa fa-shopping-bag fa-fw"></i> My Orders</a>
          <a class="dropdown-item has-icon has-badge" href="account-wishlist.html"><i class="fa fa-heart fa-fw"></i> Wishlist <span class="badge badge-secondary">3</span></a>
          <a class="dropdown-item has-icon" href="account-profile.html"><i class="fa fa-cog fa-fw"></i> Account Setting</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item has-icon" href="login.html"><i class="fa fa-sign-out fa-fw"></i> Sign out</a>
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
            <a href="index-2.html" class="list-group-item list-group-item-action"><i class="fa fa-home fa-lg fa-fw"></i> Home</a>
            <a href="grid.html" class="list-group-item list-group-item-action"><i class="fa fa-star fa-lg fa-fw text-warning"></i> Editor's Choice</a>
            <a href="categories.html" class="list-group-item list-group-item-action"><i class="fa fa-th fa-lg fa-fw"></i> Categories</a>
            <a href="grid.html" class="list-group-item list-group-item-action sub">Computers</a>
            <a href="grid.html" class="list-group-item list-group-item-action sub">Cell Phones</a>
            <a href="grid.html" class="list-group-item list-group-item-action sub">Photography</a>
            <a href="grid.html" class="list-group-item list-group-item-action sub">Home Entertainment</a>
            <a href="grid.html" class="list-group-item list-group-item-action sub">Video Games</a>
            <div class="collapse" id="categories">
              <a href="grid.html" class="list-group-item list-group-item-action sub">Headphones</a>
              <a href="grid.html" class="list-group-item list-group-item-action sub">Office Electronics</a>
              <a href="grid.html" class="list-group-item list-group-item-action sub">Office Supplies</a>
              <a href="grid.html" class="list-group-item list-group-item-action sub">Musical Instruments</a>
            </div>
            <a href="#categories" class="list-group-item list-group-item-action sub toggle" data-toggle="collapse" aria-expanded="false">MORE &#9662;</a>
            <a href="about.html" class="list-group-item list-group-item-action"><i class="fa fa-list fa-lg fa-fw"></i> Other Pages</a>
            <a href="about.html" class="list-group-item list-group-item-action sub">About Us</a>
            <a href="cart.html" class="list-group-item list-group-item-action sub">Cart</a>
            <a href="checkout.html" class="list-group-item list-group-item-action sub">Checkout</a>
            <a href="compare.html" class="list-group-item list-group-item-action sub">Compare</a>
            <a href="contact.html" class="list-group-item list-group-item-action sub">Contact Us</a>
            <a href="404.html" class="list-group-item list-group-item-action sub">Error 404</a>
            <a href="faq.html" class="list-group-item list-group-item-action sub">FAQ</a>
            <a href="login.html" class="list-group-item list-group-item-action sub active">Login / Register</a>
                        <div class="collapse" id="pages">
                          <a href="account-profile.html" class="list-group-item list-group-item-action sub">My Profile</a>
              <a href="account-order.html" class="list-group-item list-group-item-action sub">My Orders</a>
              <a href="account-order-detail.html" class="list-group-item list-group-item-action sub">Order Detail</a>
              <a href="account-address.html" class="list-group-item list-group-item-action sub">My Address</a>
              <a href="account-wishlist.html" class="list-group-item list-group-item-action sub">My Wishlist</a>
              <a href="detail-tab.html" class="list-group-item list-group-item-action sub">Product Detail with Tab</a>
            </div>
                        <a href="#pages" class="list-group-item list-group-item-action sub toggle" data-toggle="collapse" aria-expanded="false">MORE &#9662;</a>
                        <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-question-circle fa-lg fa-fw"></i> Help</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-plus-circle fa-lg fa-fw"></i> Start Selling</a>
          </div>
          <div class="small p-3">Copyright © 2019 Mimity All right reserved</div>
        </div>
        <!-- /Sidebar -->


        <div class="col" id="main-content">

          <div class="row justify-content-center">
            <div class="col-xl-6 col-md-8 col-12">
              <nav class="d-flex justify-content-center mb-4">
                <div class="btn-group nav" role="tablist">
                  <a class="btn btn-outline-info active" data-toggle="tab" href="#login" id="login-tab" role="tab" aria-controls="login" aria-selected="true">Login</a>
                  <a class="btn btn-outline-info" data-toggle="tab" href="#register" id="register-tab" role="tab" aria-controls="register" aria-selected="false">Register</a>
                </div>
              </nav>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                  <div class="card shadow-sm card-login-form">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-6">
                          <form>
                            <div class="form-group text-center">Login to your account</div>
                            <div class="form-group">
                              <input type="text" name="email" class="form-control" id="loginUsername" placeholder="Username">
                            </div>
                            <div class="form-group">
                              <input type="password" name="password" class="form-control" id="loginPassword" placeholder="Password">
                            </div>
                            <div class="form-group">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="remember">
                                <label class="custom-control-label" for="remember">Remember me</label>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-block">LOGIN</button>
                          </form>
                        </div>
                        <div class="col-sm-6 mt-2 mt-sm-0">
                          <div class="form-group text-center">OR</div>
                          <div class="btn-group w-100 mb-1">
                            <button class="btn btn-primary active"><i class="fa fa-facebook fa-fw"></i></button>
                            <button class="btn btn-primary btn-block">Login with Facebook</button>
                          </div>
                          <div class="btn-group w-100 mb-1">
                            <button class="btn btn-danger active"><i class="fa fa-google-plus fa-fw"></i></button>
                            <button class="btn btn-danger btn-block">Login with Google+</button>
                          </div>
                          <div class="btn-group w-100">
                            <button class="btn btn-info active"><i class="fa fa-twitter fa-fw"></i></button>
                            <button class="btn btn-info btn-block">Login with Twitter</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                  <div class="card shadow-sm">
                    <div class="card-body">
                      <form>
                        <div class="form-row">
                          <div class="form-group col-sm-6">
                            <label for="registerFirstName">First Name</label>
                            <input type="text" class="form-control" id="registerFirstName">
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="registerLastName">Last Name</label>
                            <input type="text" class="form-control" id="registerLastName">
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="registerEmail">Email address</label>
                            <input type="email" class="form-control" id="registerEmail">
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="registerPhone">Phone Number</label>
                            <input type="number" class="form-control" id="registerPhone">
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="registerPassword">Password</label>
                            <input type="password" class="form-control" id="registerPassword">
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="registerConfirmPassword">Confirm Password</label>
                            <input type="password" class="form-control" id="registerConfirmPassword">
                          </div>
                          <div class="form-group col-sm-6">
                            <img src="../img/captcha.svg" class="img-thumbnail mb-1" alt="">
                            <input type="text" class="form-control" id="registerCaptcha" placeholder="Enter the above code">
                          </div>
                          <div class="form-group col-12">
                            <button type="submit" class="btn btn-success btn-block">REGISTER</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

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
              <a href="detail.html"><img src="../img/product/1.jpg" width="50" height="50" alt="NEW Microsoft Surface Go"></a>
              <div class="media-body">
                <a href="detail.html" title="NEW Microsoft Surface Go">NEW Microsoft Surface Go</a>
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
              <a href="detail.html"><img src="../img/product/3.jpg" width="50" height="50" alt="SanDisk Cruzer CZ36 64GB USB 2.0 Flash Drive"></a>
              <div class="media-body">
                <a href="detail.html" title="SanDisk Cruzer CZ36 64GB USB 2.0 Flash Drive">SanDisk Cruzer CZ36 64GB USB 2.0 Flash Drive</a>
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
              <a href="detail.html"><img src="../img/product/8.jpg" width="50" height="50" alt="Beats Studio3 Wireless Headphones"></a>
              <div class="media-body">
                <a href="detail.html" title="Beats Studio3 Wireless Headphones">Beats Studio3 Wireless Headphones</a>
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
              <a href="detail.html"><img src="../img/product/12.jpg" width="50" height="50" alt="Essential Phone in Halo Gray - 128 GB Unlocked"></a>
              <div class="media-body">
                <a href="detail.html" title="Essential Phone in Halo Gray - 128 GB Unlocked">Essential Phone in Halo Gray - 128 GB Unlocked</a>
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
              <a href="cart.html" class="btn btn-success">VIEW CART</a>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- REQUIRED JS  -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <!-- Mimity JS  -->
    <script src="../dist/js/script.min.js"></script>

  </body>

<!-- Mirrored from mimity-electronics16.netlify.com/html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 May 2019 21:58:00 GMT -->
</html>
