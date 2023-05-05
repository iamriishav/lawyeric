<?php
session_start();

include 'conn.php';

if ($_SESSION['userid'] == '') {
    header("location: signin");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $oldPass = $_POST['oldpassword'];
    $newPass = $_POST['newpassword'];
    $cPass = $_POST['confirmpassword'];
    $email =   $_SESSION['email'];

    $check_email = "SELECT * FROM `user947` WHERE user_email = '$email'";
    $email_query = mysqli_query($conn, $check_email);

    $data = mysqli_fetch_assoc($email_query);

    $hashed_password = $data['user_pass'];


    $verify = password_verify($oldPass, $hashed_password);

    if ($verify) {
        if ($newPass == $cPass) {
            $new_hashed_pass = password_hash($newPass, PASSWORD_BCRYPT);

            $query = "UPDATE `user947` SET `user_pass` = '$new_hashed_pass' WHERE user_email = '$email'";

            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<script>
                alert('Password Updated Successfully!');
                alert('Please login to Continue.');
                location = '/lawyeric/signin';
                </script>";
            } else {
                echo "<script>
                alert('Error Updating Password: ');
                location = 'changepassword';
                </script>" . mysqli_error($conn);
            }
        } else {
            echo "<script> 
            alert('New password and Confirm Password does not matched!');
            location = 'changepassword';
            </script>";
        }
    } else {
        echo "<script>
        alert('Old password does not matched!');
        location = 'changepassword';
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
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/SignUp.css" />
    <link rel="stylesheet" href="./css/changepassword.css" />
    <title>Change Password - Lawyeric</title>
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
        <h2>Change Password</h2>
        <div class="form">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" name="signup_form">
                <input type="password" name="oldpassword" id="oldpassword" placeholder="Old Password" required minlength="6" maxlength="18" />
                <input type="password" name="newpassword" id="newpassword" placeholder="New Password" required minlength="6" maxlength="18" />
                <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required minlength="6" maxlength="18" />
        </div>
        <div class="action_container">
            <div class="show_password">
                <input type="checkbox" name="showPassword" id="showPassword" />
                <label for="showPassword">Show Password</label>
            </div>
        </div>
        <button type="submit">Change Password</button>
        </form>
        <p><a href="userprofile">back</a></p>
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
        const oldpassword = document.getElementById("oldpassword");
        const newpassword = document.getElementById("newpassword");
        const confirmpassword = document.getElementById("confirmpassword");
        const showPassword = document.getElementById("showPassword");

        showPassword.addEventListener("click", function() {
            if (oldpassword.type === "password") {
                oldpassword.setAttribute('type', 'text');
                newpassword.setAttribute('type', 'text');
                confirmpassword.setAttribute('type', 'text');
            } else {
                oldpassword.setAttribute('type', 'password');
                newpassword.setAttribute('type', 'password');
                confirmpassword.setAttribute('type', 'password');
            }
        });
    </script>
</body>

</html>