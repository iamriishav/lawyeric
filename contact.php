<?php

session_start();

include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $firstname = $_POST['firstName'];
  $lastname = $_POST['lastName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];

  $sql = "INSERT INTO `query` (`firstname`, `lastname`, `email`, `phone`, `message`) VALUES ('$firstname', '$lastname', '$email', '$phone', '$message')";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo "<script>
        alert('Message sent successfully! Thank you');
        location = 'contact';
        </script>";
  } else {
    echo "<script>
        alert('Message not sent.');
        location = 'contact';
        </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Lawyeric is india's first legal service offering website which provides online legal document making services" />
  <link rel="shortcut icon" href="./static/images/logo.webp" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css2?family=Alkatra&family=Lato&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Ubuntu&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/contact.css" />
  <title>Contact Us - Lawyeric</title>
</head>

<body>
  <div class="preloader">
    <div class="loader">
      <div class="typewriter">
        <div class="slide"><i></i></div>
        <div class="paper"></div>
        <div class="keyboard"></div>
      </div>
    </div>
  </div>
  <header>
    <div class="nav">
      <a href="/lawyeric">
        <div class="logo">
          <img src="./static/images/logo.webp" alt="logo" />
          <h2>Lawyeric</h2>
        </div>
      </a>
      <div class="menu" id="main">
        <ul>
          <img src="./static/images/cross.webp" alt="close" id="close" onclick="showNavbar()">
          <li><a href="/lawyeric">Home</a></li>
          <li><a href="about">About</a></li>
          <li>
            <a href="#">Services</a>
            <ul class="submenu">
              <li><a href="./forms/proofofincomeaffidavit">Make Documents &#8599;</a></li>
              <li><a href="#">Sign Documents &#8599;</a></li>
              <li>
                <a href="#">Start a business &#8599;</a>
              </li>
              <li><a href="#">Ask a lawyer &#8599;</a></li>
            </ul>
          </li>
          <li>
            <a href="contact">Contact</a>
          </li>
        </ul>
        <div class="primary_btn">
          <?php
          if (isset($_SESSION['username'])) {
            echo '<a href="userprofile">Profile</a>';
          } else {
            echo '<a href="signin">Sign In</a>';
          }
          ?>
        </div>
      </div>
      <img src="./static/images/ham.webp" alt="hamburger" id="ham" onclick="showNavbar()">
    </div>
  </header>
  <section class="contact_container">
    <h2>Talk to Us</h2>
    <div class="contact_form">
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" name="contact_form">
        <div class="name">
          <input type="text" name="firstName" placeholder="First Name" />
          <input type="text" name="lastName" placeholder="Last Name" />
        </div>
        <input type="email" name="email" placeholder="Email" />
        <input type="tel" name="phone" placeholder="Phone" />
        <textarea name="message" id="message" cols="30" rows="5" placeholder="Write your message here..."></textarea>
        <button>Submit</button>
      </form>
    </div>
  </section>
  <footer>
    <div class="footer_container">
      <div class="col">
        <h2>Legal Documents</h2>
        <ul>
          <li><a href="#">All legal forms</a></li>
          <li><a href="#">Business forms</a></li>
          <li><a href="#">Real estate forms</a></li>
          <li><a href="#">Personal and family forms</a></li>
        </ul>
      </div>
      <div class="col">
        <h2>popular forms</h2>
        <ul>
          <li><a href="#">Lease agreements</a></li>
          <li><a href="#">power of attorney forms</a></li>
          <li><a href="#">eviction notice</a></li>
          <li><a href="#">non-disclosure Agreement</a></li>
        </ul>
      </div>
      <div class="col">
        <h2>resources</h2>
        <ul>
          <li><a href="#">legal resources</a></li>
          <li><a href="#">real state</a></li>
          <li><a href="#">personal & family</a></li>
          <li><a href="#">financial</a></li>
        </ul>
      </div>
      <div class="col">
        <h2>company</h2>
        <ul>
          <li><a href="#">pricing</a></li>
          <li><a href="about">about us</a></li>
          <li><a href="contact">contact us</a></li>
          <li><a href="#">partner with us</a></li>
        </ul>
      </div>
      <div class="col">
        <h2>users</h2>
        <ul>
          <li><a href="userprofile">account</a></li>
          <li><a href="#">terms of use</a></li>
          <li><a href="#">privacy policy</a></li>
          <li><a href="#">do not sell my personal infomation</a></li>
        </ul>
      </div>
    </div>
    <div class="footer">
      <p>Copyright &copy; <span class="year"></span> Lawyeric Ltd.</p>
      <div class="social">
        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
        <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
        <a href="#"><ion-icon name="logo-linkedin"></ion-icon></a>
      </div>
    </div>
  </footer>
  <script>
    var preloader = document.querySelector(".preloader");
    var menu = document.getElementById("main");

    window.addEventListener("load", function() {
      preloader.style.display = "none";
    });

    const showNavbar = () => {
      menu.classList.toggle("active");
    };
  </script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>