<?php
ini_set('max_execution_time', 300);
include "connect.php";
if(isset($_POST['addshop'])){
    $customername=$_POST['cname'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $phonenumber=$_POST['cphn'];
   
    $sql="INSERT INTO shop (CUSTOMERNAME,CITY,STATE,PHONENUMBER) VALUES ('$customername','$city','$state',$phonenumber) ";
if(mysqli_query($conn,$sql)){
  
    header("location:admin1.html");
}

else{
   
    echo '<script language="javascript">';
    echo 'alert(" registration failed")';
    echo '</script>';
}
}


if(isset($_POST["submit_file_shop"])){
$fileName = $_FILES["file"]["tmp_name"];
    
if ($_FILES["file"]["size"] > 0) {
    
    $file = fopen($fileName, "r");
    
    while (($col = fgetcsv($file, 10000, ",")) !== FALSE) {
$column[0]=mysqli_real_escape_string($conn,$col[0]);
$column[1]=mysqli_real_escape_string($conn,$col[1]);
$column[2]=mysqli_real_escape_string($conn,$col[2]);
$column[3]=mysqli_real_escape_string($conn,$col[3]);
//echo $column[0];
echo"<br/>";
        $sqlInsert = "INSERT INTO shop (CUSTOMERNAME,CITY,STATE,PHONENUMBER)
               VALUES ('$column[0]','$column[1]','$column[2]','$column[3]')";
        $result = mysqli_query($conn, $sqlInsert);
        
        
        if (! empty($result)) {
            $type = "success";
            $message = "CSV Data Imported into the Database";
            header("location:admin1.php");
        } else {
            $type = "error";
            $message = "Problem in Importing CSV Data";
            //echo "error";
           // break;
        }
    }
}
}




?>