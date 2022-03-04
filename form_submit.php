<?php
session_start();
require("config.php");

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password = sha1($password);




$sql = "SELECT * FROM data WHERE email='$email'";

$result = mysqli_query($conn, $sql);


if (!$result) {
    $response = array("success" => false, "message" => "Something went wrong!");
    echo json_encode($response);
    return;
}
$_SESSION['email'] = $_POST['email'];



// echo "Login success";
$row_count = mysqli_num_rows($result);
if ($row_count != 0) {
    $response = array("success" => false, "message" => "This email id is already registered with us!");
    echo json_encode($response);
    return;
}



$sql = "INSERT INTO data ( full_name,email, password, is_admin, created_by) VALUES ( '$full_name','$email', '$password', TRUE,-1)";
$result = mysqli_query($conn, $sql);
if (!$result) {
    $response = array("success" => false, "message" => "Something went wrong!");
    echo json_encode($response);
    return;
}


$response = array("success" => true, "message" => "Your account has been created successfully!");
echo json_encode($response);
mysqli_close($conn);
 


