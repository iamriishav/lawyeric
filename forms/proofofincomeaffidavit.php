<?php

session_start();
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $document_id = mysqli_real_escape_string($conn, $_POST['document_id']);
    $document_name = mysqli_real_escape_string($conn, $_POST['document_name']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = $_SESSION['email'];
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $father = mysqli_real_escape_string($conn, $_POST['father']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $pin = mysqli_real_escape_string($conn, $_POST['pin']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $residing_years = mysqli_real_escape_string($conn, $_POST['residing_years']);
    $caste = mysqli_real_escape_string($conn, $_POST['caste']);
    $employment = mysqli_real_escape_string($conn, $_POST['employment']);
    $annual_income = mysqli_real_escape_string($conn, $_POST['annual_income']);

    $sql = "INSERT INTO `document` (`document_id`, `document_name`, `applicant_name`, `applicant_email`, `applicant_age`,  `applicant_gender`, `applicant_father`, `applicant_state`,  `applicant_city`,  `applicant_pin`, `applicant_address`, `applicant_residingyear`, `applicant_caste`, `applicant_employment`, `applicant_annualincome`) VALUES ('$document_id', '$document_name', '$name', '$email', '$age', '$gender', '$father', '$state', '$city', '$pin', '$address', '$residing_years', '$caste', '$employment', '$annual_income')";

    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script>
            alert('Appliaction Submitted Successfully!');
            location = '../userdashboard';
        </script>";
    } else {
        echo "<script>
            alert('Application not Submitted!');
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
    <link rel="shortcut icon" href="../static/images/logo.webp" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Alkatra&family=Lato&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Ubuntu&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/user.css" />
    <link rel="stylesheet" href="../css/forms.css" />
    <title>Proof of Income Affidavit - Lawyeric</title>
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
                    <img src="../static/images/logo.webp" alt="logo" />
                    <h2>Lawyeric</h2>
                </div>
            </a>
            <div class="primary_btn">
                <a href="../userdashboard">My Documents</a>
                <a href="../userprofile">Profile</a>
            </div>
        </div>
    </header>
    <section class="main">
        <div class="container form">
            <h2>Applicant Details</h2>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" name="document_form" autocomplete="off">
                <input type="number" hidden value="121" name="document_id">
                <input type="text" hidden value="Proof of Income" name="document_name">
                <input type="text" name="name" id="name" placeholder="Name" onkeyUp="document.getElementById('text_name').innerHTML = this.value" required>
                <input type="number" name="age" id="age" placeholder="Age" onkeyUp="document.getElementById('text_age').innerHTML = this.value" required>
                <input type="text" name="gender" id="gender" placeholder="Gender" onkeyUp="document.getElementById('text_gender').innerHTML = this.value" required>
                <input type="text" name="father" id="father" placeholder="Father's Name" onkeyUp="document.getElementById('text_father').innerHTML = this.value" required>
                <select name="state" id="state" onchange="document.getElementById('text_state').innerHTML = this.options[this.selectedIndex].text">
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
                <input type="text" name="city" id="city" placeholder="City" onkeyUp="document.getElementById('text_city').innerHTML = this.value" required />
                <input type="number" name="pin" id="pin" placeholder="Pin Code" onkeyUp="document.getElementById('text_pin').innerHTML = this.value" required />
                <textarea name="address" id="address" cols="30" rows="5" placeholder="Address" onkeyUp="document.getElementById('text_address').innerHTML = this.value"></textarea>
                <input type="number" name="residing_years" id="residing_years" placeholder="Number of Years" onkeyUp="document.getElementById('text_residing_years').innerHTML = this.value" required>
                <input type="text" name="caste" id="caste" placeholder="Caste" onkeyUp="document.getElementById('text_caste').innerHTML = this.value" required>
                <input type="text" name="employment" id="employment" placeholder="Employment" onkeyUp="document.getElementById('text_employment').innerHTML = this.value" required>
                <input type="number" name="annual_income" id="annual_income" placeholder="What is the family's Annual Income ?" onkeyUp="document.getElementById('text_annual_income').innerHTML = this.value" required>
                <input type="text" name="annual_income_word" id="annual_income_word" placeholder="Annual income in words" onkeyUp="document.getElementById('annual_income_text').innerHTML = this.value" required>
                <button id="submit_btn">Submit</button>
            </form>
        </div>
        <div class="container doc_preview">
            <h2>Document Preview</h2>
            <div class="doc">
                <p>I, <span id="text_name">..........</span>, <span id="text_gender">..........</span>, S/o <span id="text_father">..........</span>, aged <span id="text_age">..........</span> years, residing at <span id="text_address">..........</span>, <span id="text_city">..........</span>, <span id="text_state">..........</span>, <span id="text_pin">..........</span>, do hereby solemnly affirm and declare as under:</p>
                <ol>
                    <li>That I am a citizen of india.</li>
                    <li>That I am Residing at the above address for the past <span id="text_residing_years">..........</span></li>
                    <li>That i belong to <span id="text_caste">..........</span> caste.</li>
                    <li>That I am employed as <span id="text_employment">..........</span>.</li>
                    <li>That my total annual income from all sources amounts to &#8377; <span id="text_annual_income">..........</span>/- Rupees (<span id="annual_income_text">..........</span>) Only.</li>
                    <li>That I have no other income other than that specified above.</li>
                    <li>That I have not concealed any facts and all the facts above are true and genuine.</li>
                </ol>
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
        var preloader = document.querySelector(".preloader");

        window.addEventListener("load", function() {
            preloader.style.display = "none";
        });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js">
    </script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>