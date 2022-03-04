<?php

session_start();
            
include "config.php";


$sql1 = "SELECT * FROM data WHERE email='{$_SESSION['email']}' ";

             $result1 = mysqli_query($conn, $sql1);
            if (!$result1) {
                echo myqli_query_error();
                exit();
            }
            
            $row_count = mysqli_num_rows($result1);
            if ($row_count == 0) {
                echo "Login failed! Invalid email or password.";
                exit();
            }

            $row = mysqli_fetch_assoc($result1);
            $_SESSION['user_id'] = $row['user_id'];
   


     if(isset($_POST["import"])){
         echo mysqli_error();
         die();
         $filname = $_FILES["file"]["tmp_name"];
         if ($_FILES["file"]["size"] > 0) {
             $file = fopen($filname, "r");

            
             sleep(3);
             
            


             function generateRandomString($length = 8) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }
             while (($column = fgetcsv($file)) !== FALSE ){
               
                $password = generateRandomString();
               
                $sql= "INSERT INTO data (full_name, email, password,is_admin, created_by) VALUES('".$column[0]."','".$column[1]."','$password',FALSE, '{$_SESSION['user_id']}')";
                $result = mysqli_query($conn, $sql);
                // echo ($sql);
                
              
             }
            //  if (!empty($result)) {
                // $response = array("success" => true, "message" => "csv data imported into database");
                // echo json_encode($response);
                // return;
           

            }
            
            //     $response = array("success" => false, "message" => "Problem in importing data");
            //     echo json_encode($response);
            //     return;
                
            }
         
     
    
    ?>

