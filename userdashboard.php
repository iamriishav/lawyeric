<?php

session_start();

include 'conn.php';

if ($_SESSION['userid'] == '') {
    header("location: signin");
}

$data = "SELECT * FROM `document`";
$result = mysqli_query($conn, $data);

$data_count = mysqli_num_rows($result);

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
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="SignIn.css" />
    <link rel="stylesheet" href="user.css" />
    <link rel="stylesheet" href="userdashboard.css" />
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
                <a href="userprofile">Profile</a>
            </div>
        </div>
    </header>
    <section class="form_container">
        <div class="action_btn">
            <button id="btn1">My Documents</button>
            <button id="btn2">Make Documents</button>
        </div>
        <div class="documents_container">
            <div id="mydocument" class="document_container">
                <?php
                if ($data_count > 0) {
                    echo '                
                    <table>
                    <thead>
                        <tr>
                            <th>Doc ID</th>
                            <th>Document</th>
                            <th>Status</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>';
                    while ($doc_data = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                        <td>' . $doc_data["document_id"] . '</td>
                        <td>' . $doc_data["document_name"] . '</td>
                        <td>' . $doc_data["document_status"] . '</td>
                        <td>' . $doc_data["document_message"] . '</td>
                        </tr>';
                    }
                    echo '
                    </tbody>
                    </table>';
                } else {
                    echo '<a href="#">Make your Legal Document</a>;';
                }
                ?>
            </div>
            <div id="makedocument" class="document_container">
                <a href="#">Make your Legal Document</a>;
            </div>
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
        var mydocument = document.getElementById("mydocument");
        var makedocument = document.getElementById("makedocument");
        var btn1 = document.getElementById("btn1");
        var btn2 = document.getElementById("btn2");

        btn1.addEventListener('click', () => {
            mydocument.style.transform = "translateX(0)";
            makedocument.style.transform = "translateX(200%)";
        })

        btn2.addEventListener('click', () => {
            mydocument.style.transform = "translateX(200%)";
            makedocument.style.transform = "translateX(0)";
        })
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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>