<?php
include "connect.php";
$insertshopname;
$insertbrandname;
session_start();
$insertshopname=$_SESSION['sho'];
if(isset($_REQUEST['term'])){
        $search=$_REQUEST['term'];
    $sql="SELECT  DISTINCT BRAND FROM product  WHERE BRAND LIKE '%$search%'";
    $query=mysqli_query($conn,$sql);
    $count = mysqli_num_rows($query);
	if($count == 0){
		 $output = 'there was no search result!';
		}else{
			while($row = mysqli_fetch_array($query)){
			   //$shopname= $row['CUSTOMERNAME'];
			
			
                //$output = '<div> '.$shopname.'</div>';
                echo "<p>" . $row['BRAND'] . "</p>";
                // echo"<p>(";
                // echo $row['BRAND'];
                // echo ",)";
           }
          // echo ($shopname);
		
       }
    }
    if(isset($_POST['submit_brand'])){
        $brandname=$_POST['searchbrand'];
       // echo $shopname;
       //session_start();
    // $_SESSION['brand']=$brandname;
   // $brandname=mysqli_real_escape_string($brandname);
   echo $brandname;
$brandname=urlencode($brandname);
         header("location:salesman3.php?brand=$brandname&shopname=$insertshopname");
    
$insertbrandname=$brandname;
    }
