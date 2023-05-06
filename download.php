<?php
session_start();
include 'conn.php';

$data = "SELECT * FROM `document`";
$result = mysqli_query($conn, $data);

$data_count = mysqli_num_rows($result);
$doc_data = mysqli_fetch_assoc($result);

$applicant_email = $doc_data['applicant_email'];

$query = "SELECT document_pdf FROM document WHERE applicant_email = '$applicant_email'";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $fileContent = $row['document_pdf'];

    header("Content-type: pdf_uploads/");
    header("Content-Disposition: attachment; filename= document.pdf");

    echo "<script>
            alert('File Downloaded Successfully!');
            location = 'userdashboard';
        </script>";
} else {
    echo "Failed to retrieve PDF file from the database.";
}

mysqli_close($conn);
?>