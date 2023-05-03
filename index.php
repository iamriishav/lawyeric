<?php
include "conn.php";

session_start();

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
  <link rel="stylesheet" href="style.css" />
  <title>Lawyeric</title>
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
          <img src="./static/images/cross.webp" alt="close" id="close" onclick="showNavbar()" />
          <li><a href="/lawyeric">Home</a></li>
          <li><a href="about">About</a></li>
          <li>
            <a href="#">Services</a>
            <ul class="submenu">
              <li><a href="#">Make Documents &#8599;</a></li>
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
          <li>
            <div class="primary_btn">
              <?php
              if (isset($_SESSION['username'])) {
                if ($_SESSION['islawyer'] == '1') {
                  echo '<a href="lawyerprofile">Profile</a>';
                } else {
                  echo '<a href="userprofile">Profile</a>';
                }
              } else {
                echo '<a href="signin">Sign In</a>';
              }
              ?>
            </div>
          </li>
        </ul>
      </div>
      <img src="./static/images/ham.webp" alt="hamburger" id="ham" onclick="showNavbar()" />
    </div>
  </header>
  <section class="hero">
    <div class="hero_text">
      <h1>Build Your Legal Forms</h1>
      <p>Create Your Free Legal Documents & Contracts Online in Minutes</p>
    </div>
    <div class="hero_items">
      <a href="#">
        <div class="service_card">
          <div class="service">
            <ion-icon name="document-outline"></ion-icon>
            <p>Affidavits & Name Change</p>
          </div>
        </div>
      </a>
      <a href="#">
        <div class="service_card">
          <div class="service">
            <ion-icon name="newspaper-outline"></ion-icon>
            <p>e-sign Workflow</p>
          </div>
        </div>
      </a>
      <a href="#">
        <div class="service_card">
          <div class="service">
            <ion-icon name="business-outline"></ion-icon>
            <p>Start Your Business</p>
          </div>
        </div>
      </a>
      <a href="#">
        <div class="service_card">
          <div class="service">
            <ion-icon name="information-circle-outline"></ion-icon>
            <p>Lawyer Consultation</p>
          </div>
        </div>
      </a>
    </div>
    <div class="hero_form">
      <h2>Find your Document</h2>
      <form action="">
        <input type="search" placeholder="Search documents and forms" />
        <button>Search</button>
      </form>
    </div>
  </section>
  <section class="work">
    <p class="work_p">
      Lawyeric is India's trusted, Do-it-Yourself platform for making legal
      documents online. The process of making legal documentation is now made
      simple, quick and affordable.
    </p>
    <h2>How it works ?</h2>
    <img src="./static/images/working.webp" alt="working" />
    <p>
      Select any of our legal documents based on your need and fill in your
      details. Based on these details and the choices you make, our system
      will start customizing the document. You will see a real-time preview of
      the document, so you will know how exactly the document will look like.
      You will be able to draft your document in minutes, not hours. <br />
      Once your document is generated, you can either print the document on
      your own or simply opt for doorstep delivery, wherein, we will print the
      document on a Stamp paper of the requisite amount and deliver it to you
      at the place of your choice.
    </p>
  </section>
  <section class="why_us">
    <div class="features_container">
      <h2>Why Choose Lawyeric ?</h2>
      <div class="features">
        <div class="feature">
          <img src="./static/images/clock.webp" alt="clock" />
          <h2>Quick & Easy</h2>
          <p>
            Draft your document in minutes. <br />
            Get it delivered.
          </p>
        </div>
        <div class="feature">
          <img src="./static/images/like.webp" alt="like" />
          <h2>Convenient</h2>
          <p>
            Create your own legal documents <br />
            anywhere, anytime!
          </p>
        </div>
        <div class="feature">
          <img src="./static/images/clock.webp" alt="clock" />
          <h2>Legally Valid</h2>
          <p>
            Documents reviewed, verified and <br />
            approved by experts.
          </p>
        </div>
      </div>
      <p>
        We have helped tens of thousands of people draft their own agreements
        and contracts, saving ample time and money. Our ready-to-customize
        templates help you create your own legal documents at your
        convenience, at a minimal cost. If you opt for delivery, you will also
        get the document delivered at your doorstep along with Stamp Paper.
      </p>
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
        <a href="#" alt="facebook"><ion-icon name="logo-facebook"></ion-icon></a>
        <a href="#" alt="twitter"><ion-icon name="logo-twitter"></ion-icon></a>
        <a href="#" alt="linkedin"><ion-icon name="logo-linkedin"></ion-icon></a>
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
  <script>
    const year = document.querySelector(".year");

    year.innerHTML = new Date().getFullYear();
  </script>
</body>

</html>