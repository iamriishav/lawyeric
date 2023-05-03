<?php

include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $aadhaar = mysqli_real_escape_string($conn, $_POST['aadhaar']);
  $certificate = mysqli_real_escape_string($conn, $_POST['certificate']);
  $state = mysqli_real_escape_string($conn, $_POST['state']);
  $city = mysqli_real_escape_string($conn, $_POST['city']);
  $pin = mysqli_real_escape_string($conn, $_POST['pin']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $islawyer = isset($_POST['password']) ? 1 : 0;

  $check_email = "SELECT * FROM `user947` WHERE user_email = '$email'";
  $email_query = mysqli_query($conn, $check_email);

  $email_count = mysqli_num_rows($email_query);

  if ($email_count > 0) {
    echo "<script>
      alert('Email Already Registered');
      </script>";
  } else {
    $pass = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO `user947` (`user_name`, `user_email`,  `user_phone`, `user_aadhaar`, `certificate`, `user_state`,  `user_city`,  `user_pin`, `user_address`, `user_pass`, `islawyer`) VALUES ('$name', '$email', '$phone', '$aadhaar', '$certificate', '$state', '$city', '$pin', '$address', '$pass', '$islawyer')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
      echo "<script>
                  alert('Account Created Successfully');
                  location = 'signin';
              </script>";
    } else {
      echo "<script>
                  alert('Account not created');
              </script>";
    }
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
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="SignUp.css" />
  <title>Sign Up - Lawyeric</title>
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
    <h2>Sign Up</h2>
    <div class="form">
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" name="signup_form">
        <input type="text" name="name" id="name" placeholder="name" required />
        <input type="email" name="email" id="email" placeholder="Email" required />
        <input type="tel" name="phone" id="phone" placeholder="Phone" minlength="10" maxlength="10" required />
        <input type="number" name="aadhaar" id="aadhaar" placeholder="Addhaar" required minlength="12" maxlength="12" />
        <input type="text" name="certificate" id="certificate" placeholder="Certificate Number" required />
        <input type="text" name="country" id="country" value="India" disabled />
        <select name="state" id="state">
          <option value="--Select State--">--Select State--</option>
          <option value="Andaman and Nicobar">Andaman and Nicobar</option>
          <option value="Andhra Pradesh">Andhra Pradesh</option>
          <option value="Arunachal Pradesh">Arunachal Pradesh</option>
          <option value="Assam">Assam</option>
          <option value="Bihar">Bihar</option>
          <option value="Chandigarh">Chandigarh</option>
          <option value="Chhattisgarh">Chhattisgarh</option>
          <option value="Delhi">Delhi</option>
          <option value="Goa">Goa</option>
          <option value="Gujarat">Gujarat</option>
          <option value="Haryana">Haryana</option>
          <option value="Himachal Pradesh">Himachal Pradesh</option>
          <option value="Jammu and Kashmir">Jammu and Kashmir</option>
          <option value="Jharkhand">Jharkhand</option>
          <option value="Karnataka">Karnataka</option>
          <option value="Kerala">Kerala</option>
          <option value="Ladakh">Ladakh</option>
          <option value="Lakshadweep(UT)">Lakshadweep(UT)</option>
          <option value="Madhya Pradesh">Madhya Pradesh</option>
          <option value="Maharashtra">Maharashtra</option>
          <option value="Manipur">Manipur</option>
          <option value="Meghalaya">Meghalaya</option>
          <option value="Mizoram">Mizoram</option>
          <option value="Nagaland">Nagaland</option>
          <option value="Odisha">Odisha</option>
          <option value="Pondicherry">Pondicherry</option>
          <option value="Punjab">Punjab</option>
          <option value="Rajasthan">Rajasthan</option>
          <option value="Sikkim">Sikkim</option>
          <option value="Tamil Nadu">Tamil Nadu</option>
          <option value="Tripura">Tripura</option>
          <option value="UT of DHN and DD">UT of DHN and DD</option>
          <option value="Uttarakhand">Uttarakhand</option>
          <option value="Uttar Pradesh">Uttar Pradesh</option>
          <option value="West Bengal">West Bengal</option>
        </select>
        <input type="text" name="city" id="city" placeholder="City" required />
        <input type="number" name="pin" id="pin" placeholder="Pin Code" required />
        <textarea name="address" id="address" cols="30" rows="5" placeholder="Address"></textarea>
        <input type="password" name="password" id="password" placeholder="Password" required minlength="6" maxlength="18" />
    </div>
    <div class="action_container">
      <div class="show_password">
        <input type="checkbox" name="showPassword" id="showPassword" />
        <label for="showPassword">Show Password</label>
      </div>
      <div class="is_lawyer">
        <input type="checkbox" name="islawyer" id="islawyer" />
        <label for="islawyer">Are you a Lawyer ?</label>
      </div>
    </div>
    <button type="submit">Sign Up</button>
    </form>
    <p>Already have an account? <a href="signIn">Log In</a></p>
  </div>
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
    const islawyer = document.getElementById('islawyer');
    const certificate = document.getElementById('certificate');

    islawyer.addEventListener('change', () => {
      if (islawyer.checked) {
        certificate.style.display = 'block';
      } else {
        certificate.style.display = 'none';
      }
    });
  </script>
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
  <script src="app.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>