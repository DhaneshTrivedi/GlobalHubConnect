<?php
$username = isset($_GET['username']) ? $_GET['username'] : '';
$imageName = isset($_GET['image_name']) ? $_GET['image_name'] : '';
$imageSrc = "api/v1/userImages/" . $imageName;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GHC -Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <style>
    .container_acc {
      margin-top: 20vh;
      width: 90vw;
      display: flex;
      justify-content: center;
      gap: 40px;
      flex-wrap: wrap;
    }

    .card_acc:hover {
      transform: scale(1.02);
    }

    .welcome_dp {
      display: flex;
      width: 100vw;
      height: 100vh;
      align-items: center;
      justify-content: center;
    }

    .greet-text {
      font-size: 35px;
      display: block;
      position: absolute;
      margin-top: 80vh;
      margin-left: 38.5vw;
    }

    .dropdown-menu {
      background-color: var(--color-secondary);
      filter: opacity(0.8);
      margin-top: -13.5px;
      z-index: 1;
      width: 200px;
    }

    .dropdown-item:hover {
      font-size: 110%;
      background-color: var(--color-secondary);
    }

    .card {
      background-color: var(--color-secondary);

    }

    .card:hover {
      transform: scale(1.03);
      transition-property: transform;
      transition-duration: 0.3s;
      box-shadow: 5px 3px black;
      cursor: pointer;

    }

    .service-container {
      display: flex;
      flex-direction: row;
      justify-content: center;
      gap: 2rem;
    }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top"
    style="background-color: rgba(14, 29, 52, 0.9);">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo.png" alt="">
        <h1><span style="color:green;">G</span>lobal<span style="color:brown;">H</span>ub<span
            style="color:blue;">C</span>onnect</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li id="servicesNavItem" class="nav-item">
            <a class="nav-link" href="services.html">Services</a>
          </li>
          <li><a href="pricing.html">Pricing</a></li>
          <li><a href="contact.html">Contact</a></li>

        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- End Header -->
  <div class="greet-text">
    <?php echo "Welcome, ", $username, "!!"; ?>
  </div>
  <div class="welcome_dp">
    <?php
    echo '<img src="' . $imageSrc . '" style="width: 415px; height:400px; object-fit: cover; object-position: top center;" class="img-fluid" alt="">';
    ?>
  </div>


  <!-- services ui  -->
  <!-- 1 -->
  <div class="service-container">
    <div class="card" style="width: 16rem;">
      <img src="assets\img\rent-home-img.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title text-info">Rent-Home</h5>
        <p class="card-text" style="color:white;">Want to give your home on rent?</p>
        <a href="Rent-Home.html" class="btn btn-primary">click here!</a>
      </div>
    </div>

    <!-- 2 -->
    <div class="card" style="width: 16rem;">
      <img src="assets\img\hire-img.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title text-info">Recruite</h5>
        <p class="card-text" style="color:white;">Want to hire someone for some fit role?</p>
        <a href="Recruite.html" class="btn btn-primary">click here!</a>
      </div>
    </div>
    <!-- 3 -->
    <div class="card" style="width: 16rem;">
      <img src="assets\img\community-page-img.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title text-info">Community Page</h5>
        <p class="card-text" style="color:white;">Want to build a community abroad?</p>
        <a href="community_pages.html" class="btn btn-primary">click here!</a>
      </div>
    </div>
    <!-- 4 -->
    <div class="card" style="width: 16rem;">
      <img src="assets\img\upcoming-events-img.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title text-info">Community Event</h5>
        <p class="card-text" style="color:white;">Want to host an event for the community members?</p>
        <a href="community_events.html" class="btn btn-primary">click here!</a>
      </div>
    </div>
  </div>
  <!-- container containing accomodation cards -->


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="margin-top: 15px;">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <span>Socials</span>
          </a>
          <div class="social-links d-flex mt-4">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About us</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="pricing.html">Pricing</a></li>
            <li><a href="contact.html">Contact</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Accomodation</a></li>
            <li><a href="#">Jobs @ Abroad</a></li>
            <li><a href="#">Community Search</a></li>
            <li><a href="#">Community Events</a></li>
            <li><a href="#">Community Pages</a></li>
            <li><a href="#">Recommendations</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>GlobalHubConnect</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <strong>GlobalHubConnect</strong> team
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->


  <!-- Vendor JS Files -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    $(document).ready(function () {

      // Create the data object to send
      accessToken = localStorage.getItem("token");

      var data = {
        "method": "check_login",
        "token": accessToken,
      };

      var formData = new FormData();
      formData.append('data', JSON.stringify(data));

      $.ajax({
        url: "http://localhost/GlobalHubConnect/api/v1/",
        type: "POST",
        data: formData,
        processData: false, // Prevent jQuery from processing the data
        contentType: false, // Prevent jQuery from automatically setting the content type

        success: function (response) {
          var responseObject = JSON.parse(response);

          // Access the status property
          var message = responseObject.message;

          if (message === "access approved"
            && responseObject.code == 200) {
            var responseData = JSON.parse(response);

            $("#user_id").text(responseData.user_id);
            var logoutListItem = '<li><a class="get-a-quote" id="logout" onclick="logout()" href="#">Logout</a></li>';

            // Insert the new list item after the "Contact" link
            $("a[href='contact.html']").parent().after(logoutListItem);

            // Add the classes "nav-item" and "dropdown" to #servicesNavItem
            $("#servicesNavItem").addClass("nav-item dropdown");
            // Replace the navigation item with a dropdown menu
            $("#servicesNavItem").html(

              '<a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" ' +
              'aria-haspopup="true" aria-expanded="false">Services</a>' +
              '<div class="dropdown-menu" aria-labelledby="navbarDropdown">' +
              '<a class="dropdown-item" style="color:white"  href="Rent-Home.html">Rent Home</a>' +
              '<a class="dropdown-item" style="color:white"  href="Recruite.html">Recruite</a>' +
              '<a class="dropdown-item" style="color:white" href="community_pages.html" >Community Pages</a>' +
              '<a class="dropdown-item" style="color:white" href="community_events.html" >Community Events</a>' +
              '<a class="dropdown-item" style="color:white" href="community_chat.html" >Community Chat</a>' +
              '</div>' +
              '</li>'
            );



          }
          else {
            console.log("Error: " + responseObject);
            console.log("error");
          }
        },
        error: function (xhr, status, error) {
          // Handle errors
          console.error(error);
        }
      });


    })

    function logout() {

      accessToken = localStorage.getItem("token");
      localStorage.removeItem('token');

      // Create the data object to send
      var data = {
        "method": "logout",
        "token": accessToken
      };

      var formData = new FormData();
      formData.append('data', JSON.stringify(data));

      $.ajax({
        url: "http://localhost/GlobalHubConnect/api/v1/",
        type: "POST",
        data: formData,
        processData: false, // Prevent jQuery from processing the data
        contentType: false, // Prevent jQuery from automatically setting the content type

        success: function (response) {
          var responseObject = JSON.parse(response);

          // Access the status property
          var message = responseObject.message;

          if (message === "Logout successfully!"
            && responseObject.code == 200) {

            // Redirect to user-list.php
            alert("Logged out successfully");
            window.location.href = "http://localhost/GlobalHubConnect/login.html";
          } else if (message === "Something went wrong please try again!") {
            alert("Something went wrong please try again!")
          }
          else {
            console.log("error");
          }
        },
        error: function (xhr, status, error) {
          // Handle errors
          console.error(error);
        }
      });

    }

  </script>
</body>

</html>


<?php ?>