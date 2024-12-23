<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
    <!-- Favicon link -->
  <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/user-assets/images/bss-favicon.png">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user-assets/css/bootstrap-css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />

  <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="<?php echo base_url(); ?>assets/user-assets/fontawesome/css/fontawesome.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/user-assets/fontawesome/css/brands.css?version=<?php echo rand(99, 999999999); ?>" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/user-assets/fontawesome/css/solid.css?version=<?php echo rand(99, 999999999); ?>" rel="stylesheet" />


  <!-- custom CSS --> 
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user-assets/css/custom-css/header.css?version=<?php echo rand(99, 999999999); ?>" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user-assets/css/custom-css/footer.css?version=<?php echo rand(99, 999999999); ?>" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user-assets/css/custom-css/index.css?version=<?php echo rand(99, 999999999); ?>" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user-assets/css/custom-css/giftBasket.css?version=<?php echo rand(99, 999999999); ?>" />
  
  <!--Dashboard Notification Link-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user-assets/css/custom-css/notification.css" />
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js" crossorigin="anonymous"></script>
    <script>
      (function (w, d, f) {
        var a = d.getElementsByTagName('head')[0];
        var s = d.createElement('script');
        s.async = 1;
        s.src = f;
        s.setAttribute('id', 'produktlyScript');
        s.dataset.clientToken = "0f6f075ea0c2dbab61a2ceb0c743b0b1f8f32ab9e3689263ad102622075e4442aca13333a5e99cd7dcc93b81d98e380391a0802d0e4848ccfe66d0d46a5a979cd05581a2a9d6a056802d8e586f037abe3f09c1f5ae5172545c2889454f4dc5adbc19f8ac";
        a.appendChild(s);
      })(window, document, "https://public.produktly.com/js/main.js");
    </script>
  <title><?php echo $title; ?></title>
</head>

<body>

  <header>
    <!-- desktop menu bar -->
    <nav class="navbar navbar-expand-lg nav-bottom-color navbar-light px-4 py-0 d-lg-flex d-none">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">
        <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/bss-logo.svg" alt="logo">
      </a>
      <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="my-nav" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active mr-5">
            <a class="nav-link" href="#">
              <div class="d-flex user-container">
                <div class="user-shorthand d-flex justify-content-center align-items-center mr-2">
                  <p class="m-0"><?php echo substr($fname, 0, 1).''.substr($lname, 0, 1); ?></p>
                  <div class="active-user"></div>
                </div>
                <div class="user-name">
                  <p><?php echo substr($fname, 0, 1).'. '.$lname; ?></p>
                </div>
              </div>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link p-0" href="#" tabindex="-1" aria-disabled="true">
              <div class="menu-logo mr-2">
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/dashboard-icon.svg" alt="">
              </div>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center mr-4 <?php echo ($profile_title == 'Dashboard')? 'dashboard-active' : '' ; ?>">
            <div class="menu-text">
              <a href="<?php echo base_url('user/dashboard'); ?>" class=" text-dark" style="text-decoration: none;">Dashboard</a>
            </div>
          </li>


          <li class="nav-item d-flex align-items-center">
            <a class="nav-link p-0" href="#" tabindex="-1" aria-disabled="true">
              <div class="menu-logo mr-2">
                <img class="img-fluid" src="<?php echo base_url(); ?>assets//user-assets/images/portfolio.svg" alt="">
              </div>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center  <?php echo ($profile_title == 'Property Portfolio' || $profile_title == 'Payments')? 'dashboard-active' : '' ; ?> mr-4">
            <div class="menu-text">
              <a href="<?php echo base_url(); ?>user/property-portfolio" class=" text-dark" style="text-decoration: none;">Portfolio</a>
            </div>
          </li>
          <!-----<li class="nav-item d-flex align-items-center">
            <a class="nav-link p-0" href="#" tabindex="-1" aria-disabled="true">
              <div class="menu-logo mr-2">
                <img class="img-fluid" src="<?php //echo base_url(); ?>assets/user-assets/images/wallet-icon.svg" alt="">
              </div>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center mr-4  <?php //echo ($profile_title == 'Wallet')? 'dashboard-active' : '' ; ?>">
            <div class="menu-text">
              <a href="<?php //echo base_url('user/wallet'); ?>" class=" text-dark" style="text-decoration: none;">Wallet</a>
            </div>
          </li>--->
          <!---<li class="nav-item d-flex align-items-center">
            <a class="nav-link p-0" href="#" tabindex="-1" aria-disabled="true">
              <div class="menu-logo mr-2">
                <img class="img-fluid" src="<?php //echo base_url(); ?>assets/user-assets/images/financing-icon.svg" alt="">
              </div>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center mr-4 <?php //echo ($profile_title == 'Financing')? 'dashboard-active' : '' ; ?>">
            <div class="menu-text">
              <a href="<?php //echo base_url('user/financing'); ?>" class=" text-dark" style="text-decoration: none;">Financing</a>
            </div>
          </li>--->
            <li class="nav-item d-flex align-items-center">
            <a class="nav-link p-0" href="#" tabindex="-1" aria-disabled="true">
              <div class="menu-logo mr-2 position-relative">
                    <div class="notification-circle d-md-flex d-none justify-content-center align-items-center notificationCount"></div>
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/inbox-icon.svg" alt="">
              </div>
            </a>
            </li>
          <li class="nav-item d-flex align-items-center mr-4 <?php echo ($profile_title == 'Notification')? 'dashboard-active' : '' ; ?>">
            <div class="menu-text">
              <a href="<?php echo base_url('user/notification'); ?>" class=" text-dark" style="text-decoration: none;">Notification</a>
            </div>
          </li>

          <li class="nav-item d-flex align-items-center">
            <a class="nav-link p-0" href="#" tabindex="-1" aria-disabled="true">
              <div class="menu-logo mr-2">
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/profile-icon.svg" alt="">
              </div>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center mr-4 <?php echo ($profile_title == 'Profile')? 'dashboard-active' : '' ; ?>">
            <div class="menu-text">
              <a href="<?php echo base_url('user/profile'); ?>" class=" text-dark" style="text-decoration: none;">Profile</a>
            </div>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link p-0" href="#" tabindex="-1" aria-disabled="true">
              <div class="menu-logo mr-2">
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/megaphone.svg" alt="">
              </div>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center mr-4 <?php echo ($profile_title == 'Referral')? 'dashboard-active' : '' ; ?>">
            <div class="menu-text">
              <a href="<?php echo base_url('user/referrals'); ?>" class=" text-dark" style="text-decoration: none;">Referrals</a>
            </div>
          </li>

        </ul>
        <a href="<?php echo base_url('logout'); ?>">
          <span class="navbar-text text-dark mr-5">
            Log out
            <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/logout.svg" alt="">
          </span>
        </a>


      </div>
    </nav>

    <!-- mobile menu bar -->
    <nav class="navbar d-flex menu-navbar-bg nav-mobile d-flex d-lg-none">
      <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
        aria-expanded="false" aria-label="Toggle navigation">
        <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/menu-burger.svg" alt="">
      </button>
      <a href="<?php echo base_url('user/dashboard'); ?>" style="width: 33%" class="flex-grow-1 text-center">
        <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/bss-logo.svg" alt="logo">
      </a>
      <div class="d-flex user-container">
        <div class="user-shorthand d-flex justify-content-center align-items-center mr-2">
          <p class="m-0"><?php echo substr($fname, 0, 1).''.substr($lname, 0, 1); ?></p>
          <div class="active-user"></div>
        </div>

      </div>
      <div class="d-md-none d-block  nav-link text-dark dropdown-toggle dropdown-toggle--custom p-0"
        data-toggle="dropdown" href="#" role="button" aria-expanded="false">
        <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/user-mobile2.svg" alt="">
      </div>


      <div class="dropdown-menu menu_icon--dropdown p-0  logout-dropdown">
        <!-- Menu mobile view -->
        <div class=" menu-desktop py-2 px-4 d-flex flex-column">
          <a href="<?php echo base_url('logout'); ?>">
            <span class="navbar-text text-dark mr-5">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/logout.svg" alt="">
              Log out
            </span>
          </a>
          <button style="line-height: 14px;" type="button" class="btn btn-outline-dark">
            <small style="font-size: 10px; line-height: 14px;">Referral
              code
            </small><br>
            Tna2301
          </button>

        </div>


      </div>

      <div id="my-nav" class="collapse navbar-collapse mobile-menu-collapse pl-0 pt-4">
        <div class="mb-5 pl-2">
          <p>
            <a href="<?php echo base_url('user/dashboard'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/dashboard-icon.svg" alt="">
              &nbsp;&nbsp; Dashboard
            </a>
          </p>
        </div>

        <div class="mb-5 pl-2  dashboard-active">
          <p>
            <a href="<?php echo base_url('user/property-portfolio'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/portfolio.svg" alt="">
              &nbsp;&nbsp; Property Portfolio
            </a>
          </p>
        </div>

        <!---<div class="mb-5 pl-2">
          <p>
            <a href="<?php //echo base_url('user/wallet'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php //echo base_url(); ?>assets/user-assets/images/wallet-icon.svg" alt="">
              &nbsp;&nbsp; Wallet
            </a>
          </p>
        </div>

        <div class="mb-5 pl-2">
          <p>
            <a href="<?php //echo base_url('user/financing'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php //echo base_url(); ?>assets/user-assets/images/financing-icon.svg" alt="">
              &nbsp;&nbsp; Financing
            </a>
          </p>
        </div>--->
        
        <div class="mb-5 pl-2">
          <p>
            <a href="<?php echo base_url('user/notification'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/inbox-icon.svg" alt="">
              &nbsp;&nbsp; Notification
            </a>
          </p>
        </div>

        <div class="mb-5 pl-2">
          <p>
            <a href="<?php echo base_url('user/profile'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/profile-icon.svg" alt="">
              &nbsp;&nbsp; Profile
            </a>
          </p>
        </div>

        <div class="mb-5 pl-2">
          <p>
            <a href="<?php echo base_url('user/referrals'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/profile-icon.svg" alt="">
              &nbsp;&nbsp; Referrals
            </a>
          </p>
        </div>


      </div>
    </nav>

  </header>
