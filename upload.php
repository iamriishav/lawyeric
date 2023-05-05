<?php
session_start();

include 'conn.php';

$data = "SELECT * FROM `document`";
$result = mysqli_query($conn, $data);

$data_count = mysqli_num_rows($result);
$doc_data = mysqli_fetch_assoc($result);

$applicant_email = $doc_data['applicant_email'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $sql = "UPDATE `document` SET `document_status` = '$status' WHERE applicant_email = '$applicant_email'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>
                alert('Updated Successfully');
                location = 'lawyerdashboard';
            </script>";
    } else {
        echo "<script>
                alert('Not Updated');
                location = 'lawyerdashboard';
            </script>";
    }
}
