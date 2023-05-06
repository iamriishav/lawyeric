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
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/SignIn.css" />
    <link rel="stylesheet" href="./css/user.css" />
    <link rel="stylesheet" href="./css/userdashboard.css" />
    <link rel="stylesheet" href="./css/lawyerdashboard.css" />
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
                <a href="lawyerprofile">Profile</a>
            </div>
        </div>
    </header>
    <section class="form_container">
        <div class="action_btn">
            <button id="btn1">Requested Documents</button>
        </div>
        <div class="documents_container">
            <div id="mydocument" class="document_container">
                <?php
                if ($data_count > 0) {
                    echo '                
                    <table>
                    <tr>
                        <th>Doc ID</th>
                        <th>Document</th>
                        <th>Customer Name</th>
                        <th>Status</th>
                        <th>Document</th>
                    </tr>';
                    while ($doc_data = mysqli_fetch_assoc($result)) {
                        echo '
                        <tr>';
                        echo '<td>' . $doc_data['document_id'] . '</td>';
                        echo '<td>' . $doc_data['document_name'] . '</td>';
                        echo '<td>' . $doc_data['applicant_name'] . '</td>';
                        echo '<td>';
                        echo '
                        <form action="update.php" method="post" class="td_form" name="status_update_form" autocomplete="off">
                            <input type="text" name="status" value="' . $doc_data['document_status'] . '" id="status">
                            <button class="send_btn">Send</button>
                        </form>';
                        echo '</td>';
                ?>
                <?php
                        if ($doc_data["document_status"] == "completed") {
                            echo '<td>';
                            echo '
                            <form action="upload.php" method="post" class="td_form" name="document_upload_form" enctype="multipart/form-data" autocomplete="off">
                                <input type="file" name="document" id="document">
                                <button class="send_btn" name="submit">Upload</button>
                            </form>';
                            echo '</td>';
                        } else {
                            echo '<td> <button class="disabled upload_document" name="submit" onclick="status()">Upload</button> </td>';
                        }
                        echo '</tr>';
                    }
                    echo '</table>';
                } else {
                    echo '<a href="#">No Request</a>;';
                }
                ?>
            </div>
        </div>
    </section>
    <script>
        var preloader = document.querySelector(".preloader");
        var menu = document.getElementById("main");

        window.addEventListener("load", function() {
            preloader.style.display = "none";
        });

        const showNavbar = () => {
            menu.classList.toggle("active");
        };

        function status() {
            alert('Please update status as completed to Upload the file');
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>