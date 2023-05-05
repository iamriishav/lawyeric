<?php

session_start();

include 'conn.php';

if ($_SESSION['userid'] == '') {
  header("location: signin");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_SESSION['email'];
  $phone = $_POST['phone'];
  $aadhaar = $_POST['aadhaar'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $pin = $_POST['pin'];
  $address = $_POST['address'];

  $update = "UPDATE `user947` SET `user_name` = '$name', `user_phone` = '$phone', `user_aadhaar` = '$aadhaar', `user_state` = '$state', `user_city` = '$city', `user_pin` = '$pin', `user_address` = '$address' where `user_email` = '$email'";

  $result = mysqli_query($conn, $update);

  $check_email = "SELECT * FROM `user947`";
  $email_query = mysqli_query($conn, $check_email);

  if ($update) {
    echo "<script>
        alert('Profile Updated Successfully!');
        location = 'userprofile';
        </script>";
    $new_data = mysqli_fetch_assoc($email_query);
    $_SESSION['username'] = $new_data['user_name'];
    $_SESSION['phone'] = $new_data['user_phone'];
    $_SESSION['aadhaar'] = $new_data['user_aadhaar'];
    $_SESSION['state'] = $new_data['user_state'];
    $_SESSION['city'] = $new_data['user_city'];
    $_SESSION['pin'] = $new_data['user_pin'];
    $_SESSION['address'] = $new_data['user_address'];
  } else {
    echo "<script>
    alert(Profile not updated! '.mysqli_error($conn)')
    location = 'userprofile';
    </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Lawyeric is india's first legal service offering website which provides online legal document making services" />
  <link rel="shortcut icon" href="./static/images/logo.webp" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Ubuntu&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Alkatra&family=Lato&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/SignIn.css" />
  <link rel="stylesheet" href="./css/user.css" />
  <title>Profile</title>
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
      <div class="primary_btn">
        <a href="logout">Logout</a>
      </div>
    </div>
  </header>
  <section class="form_container">
    <div class="action_btn">
      <button id="btn2" onclick="window.location.href='http://localhost/lawyeric/userdashboard'">Dashboard</button>
      <button id="btn3" onclick="window.location.href='http://localhost/lawyeric/changepassword'">Change Password</button>
    </div>
    <div class="form">
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" name="profile_form">
        <label for="name">Name*</label>
        <input type="text" name="name" value="<?php echo $_SESSION['username']; ?>">
        <label for="email">Email*</label>
        <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" disabled>
        <label for="phone">Phone*</label>
        <input type="tel" name="phone" value="<?php echo $_SESSION['phone']; ?>">
        <label for="aadhaar">Aadhaar*</label>
        <input type="number" name="aadhaar" value="<?php echo $_SESSION['aadhaar']; ?>">
        <label for="country">Country*</label>
        <input type="text" name="country" value="<?php echo $_SESSION['country']; ?>" disabled>
        <label for="state">State*</label>
        <input type="text" name="state" value="<?php echo $_SESSION['state']; ?>">
        <label for="city">City*</label>
        <input type="text" name="city" value="<?php echo $_SESSION['city']; ?>">
        <label for="pin">Pin Code*</label>
        <input type="number" name="pin" value="<?php echo $_SESSION['pin']; ?>">
        <label for="address">Address*</label>
        <input type="text" name="address" id="address" value="<?php echo $_SESSION['address']; ?>">
        <button id="update_btn">Update</button>
      </form>
    </div>
  </section>
  <footer>
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
</body>

</html>