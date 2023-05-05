<?php

session_start();

include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $check_email = "SELECT * FROM `user947` WHERE user_email = '$email'";
  $email_query = mysqli_query($conn, $check_email);

  $email_count = mysqli_num_rows($email_query);

  if ($email_count) {
    $data = mysqli_fetch_assoc($email_query);

    $user_pass = $data['user_pass'];

    $_SESSION['userid'] = $data['user_id'];
    $_SESSION['username'] = $data['user_name'];
    $_SESSION['email'] = $data['user_email'];
    $_SESSION['phone'] = $data['user_phone'];
    $_SESSION['aadhaar'] = $data['user_aadhaar'];
    $_SESSION['certificate'] = $data['certificate'];
    $_SESSION['country'] = $data['user_country'];
    $_SESSION['state'] = $data['user_state'];
    $_SESSION['city'] = $data['user_city'];
    $_SESSION['pin'] = $data['user_pin'];
    $_SESSION['address'] = $data['user_address'];
    $_SESSION['islawyer'] = $data['islawyer'];

    $verify_pass = password_verify($password, $user_pass);

    if ($verify_pass) {
      header("location: /lawyeric");
    } else {
      echo "<script>
                alert('Invalid Password');
                </script>";
    }
  } else {
    echo "<script>
            alert('Email not registered');
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
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Ubuntu&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Alkatra&family=Lato&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./css/SignIn.css" />
  <link rel="stylesheet" href="./css/style.css" />
  <title>Sign In - Lawyeric</title>
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
    <nav>
      <a href="/lawyeric">
        <div class="logo">
          <img src="./static/images/logo.webp" alt="logo" />
          <h2>Lawyeric</h2>
        </div>
      </a>
    </nav>
  </header>
  <div class="form_container">
    <h2>Log In</h2>
    <div class="form">
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" name="signin_form">
        <input type="email" name="email" id="email" placeholder="Email" />
        <input type="password" name="password" id="password" placeholder="Password" />
    </div>
    <div class="action_container">
      <div class="show_password">
        <input type="checkbox" name="showPassword" id="showPassword" />
        <label for="showPassword">Show Password</label>
      </div>
      <div class="forgot_password">
        <a href="#">Forgot password ?</a>
      </div>
    </div>
    <button id="logIn">Log In</button>
    </form>
    <p>Don't have an account? <a href="signUp">Sign Up</a></p>
  </div>
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
  <script src="./JavaScript/app.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>