<?php
ini_set('max_execution_time', 300); 
include "connect.php";
if(isset($_POST['addproduct'])){
    $productid=$_POST['pid'];
    $productname=$_POST['pname'];
    $brand=$_POST['brand'];
    $unitname=$_POST['unitName'];
    $keyword=$_POST['key'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
//idnameunit price brand keyword
   ?>






   <?php
    $sql="INSERT INTO product (PRODUCTID,PRODUCTNAME,UNIT,PRICE,BRAND,KEYWORD,QUANTITY) VALUES ('$productid','$productname','$unitname',$price,'$brand','$keyword','$quantity') ";
if(mysqli_query($conn,$sql)){
  
    header("location:admin1.html");
}

else{
   
    echo '<script language="javascript">';
    echo 'alert(" insertion failed")';
    echo '</script>';
    header("location:admin1.html");
}
}
// if(isset($_POST["submit_file"]))
// {
//  $file = $_FILES["file"]["tmp_name"];
//  $file_open = fopen($file,"r");

// //  $i=0;
//  while(($csv = fgetcsv($file_open, 1000, ',')) !== false)
//  {
//   $customername = $csv[0];
//   $city = $csv[1];
//   $state = $csv[2];
//   $phonenumber =  $csv[3];
// //   echo $name;
// $sql="INSERT INTO shop (CUSTOMERNAME,CITY,STATE,PHONENUMBER) VALUES ('$customername','$city','$state','$phonenumber') ";

// }
// // if(mysqli_query($conn,$sql)){
  
// //    header("location:admin1.html");
// // }

// // else{
   
// //     echo '<script language="javascript">';
// //     echo 'alert(" insertion failed")';
// //     echo '</script>';
// // }
// }
if(isset($_POST["submit_file_product"])){
// {
//  if($_FILES['file']['name'])
//  {
//   $filename = explode(".", $_FILES['file']['name']);
//   if($filename[1] == 'csv')
//   {
//    $handle = fopen($_FILES['file']['tmp_name'], "r");
//    while($data = fgetcsv($handle))
//    {
//         // $item1 = mysqli_real_escape_string($conn, $data[0]);  
//         //         $item2 = mysqli_real_escape_string($conn, $data[1]);
//         //         $item3 = mysqli_real_escape_string($conn, $data[2]);
//         //         $item5 = mysqli_real_escape_string($conn, $data[4]);
//         //         $item6 = mysqli_real_escape_string($conn, $data[5]);

//       //pid
//         $item1=$data[0];
//       //pname
//         $item2=$data[1];
//      // unit
//         $item3=$data[2];
//       //  price
//         $item4=$data[3];
//        // brand
//         $item5=$data[4];
//         //keyword
//         $item6=$data[5];
//         // echo $item2;
//         // echo "";
       


//                 $query = "INSERT IGNORE INTO product (PRODUCTID,PRODUCTNAME,UNIT,PRICE,BRAND,KEYWORD) VALUES ('$item1','$item2','$item3','$item4','$item5','$item6') ";
//                 mysqli_query($conn, $query);
//                 // if(mysqli_query($conn,$query)){
//                 //     echo"inserted";
//                 // }
//                 // else{

//                 //     echo "failure";
//                 // }
//                // break;
//    }
//    fclose($handle);
// }
//  }
//header("location:admin1.html");
$fileName = $_FILES["file"]["tmp_name"];
    
if ($_FILES["file"]["size"] > 0) {
    
    $file = fopen($fileName, "r");
    
    while (($col = fgetcsv($file, 10000, ",")) !== FALSE) {
$column[0]=mysqli_real_escape_string($conn,$col[0]);
$column[1]=mysqli_real_escape_string($conn,$col[1]);
$column[2]=mysqli_real_escape_string($conn,$col[2]);
$column[3]=mysqli_real_escape_string($conn,$col[3]);
$column[4]=mysqli_real_escape_string($conn,$col[4]);
$column[5]=mysqli_real_escape_string($conn,$col[5]);
$column[5]=mysqli_real_escape_string($conn,$col[6]);
        $sqlInsert = "INSERT into product (PRODUCTID,PRODUCTNAME,UNIT,PRICE,BRAND,KEYWORD,QUANTITY)
               values ('$column[0]','$column[1]','$column[2]','$column[3]','$column[4]','$column[5]','$column[6]')";
        $result = mysqli_query($conn, $sqlInsert);
        
        if (! empty($result)) {
            $type = "success";
            $message = "CSV Data Imported into the Database";
            header("location:admin1.php");
        } else {
            $type = "error";
            $message = "Problem in Importing CSV Data";
        }
    }
}


}

?>