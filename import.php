<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import CSV</title>
    <script src="jquery.min.js"></script>
</head>
<body>
    
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="import" id="import" enctype="multipart/form-data">
         <label for="">Choose csv file</label>
         <input type="file" name="file" accept=".csv">
         <!-- <button type="submit" name="import" id="imp-btn" >Import</button> -->
         <input type="submit" value="Import" name="import" id="imp-btn">
         
     </form>
   
   
</body>
</html>
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
            $_SESSION['full_name'] = $row['full_name'];
   

        

     if(isset($_POST["import"])){
  
         $filename = $_FILES["file"]["tmp_name"];
         if ($_FILES["file"]["size"] > 0) {
             $file = fopen($filename, "r");
             function generateRandomString($length = 8) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }
            global $number; 
            $number = 0;
             while (($column = fgetcsv($file)) !== FALSE ){
               ++$number;
                $password = generateRandomString();
               
                $sql= "INSERT INTO data (full_name, email, password,is_admin, created_by) VALUES('".$column[0]."','".$column[1]."','$password',FALSE, '{$_SESSION['user_id']}')";
                $result = mysqli_query($conn, $sql);

             }
              
               echo '<script>alert("Your csv imported successfully with total number of records 3");</script>';
               echo '<h1> Your csv imported successfully with total number of records '.$number.' ';
        }   
            
         
    }
    
    ?>

<?php


 if(isset($_POST["import"])){
$url = 'https://api.elasticemail.com/v2/email/send';

try{
        $post = array('from' => 'abhishekpc9281@gmail.com', // sender email here 
		'fromName' => ' '.$_SESSION['full_name'].' ',
		'apikey' => 'D8463849B3002D2B256C12AD8EFA16E280AFA7F6C1B91D1FD4BF040C33B3218CF87FD68B03A9A9E66AFB83B5C3109622',
		'subject' => 'Importing of CSV file',
		'to' => ''.$_SESSION['email'].'', // receiver email here
		'bodyHtml' => '<h1>Email Sent<br> An account created for your email '.$_SESSION['email'].'</h1>',
		'bodyText' => '',
		'isTransactional' => false);
		
		$ch = curl_init();
		curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $post,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
			CURLOPT_SSL_VERIFYPEER => false
        ));
		
        $result=curl_exec ($ch);
        curl_close ($ch);
		
        // echo $result;	
}
catch(Exception $ex){
	echo $ex->getMessage();
}

}
?>

<!-- 
     <div id="loading"></div>
   <script src="main.js"></script>  -->