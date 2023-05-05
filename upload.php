<?php

session_start();
include 'conn.php';

$data = "SELECT * FROM `document`";
$result = mysqli_query($conn, $data);

$data_count = mysqli_num_rows($result);
$doc_data = mysqli_fetch_assoc($result);

$applicant_email = $doc_data['applicant_email'];
if(isset($_POST['submit'])) {
    $file_name = $_FILES['document']['name'];
    $file_temp = $_FILES['document']['tmp_name'];
    $upload_dir = 'pdf_uploads/';
    $file_path = $upload_dir . $file_name;
    
    if(move_uploaded_file($file_temp, $file_path)) {
        
        $sql = "UPDATE `document` SET `document_pdf` = '$file_path' WHERE applicant_email = '$applicant_email'";
        $result = mysqli_query($conn, $sql);
        
        if($result) {
            echo "<script>
                    alert('File Uploaded Successfully!');
                    location = 'lawyerdashboard';
                </script>";
        }else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>