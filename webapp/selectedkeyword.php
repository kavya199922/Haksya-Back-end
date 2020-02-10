<?php
include "connect.php";
$insertshopname;
$insertbrandname;

if(isset($_REQUEST['term'])){
    // session_start();
    // $brand=$_SESSION['brand'];
        $search=$_REQUEST['term'];
    $sql="SELECT  DISTINCT KEYWORD FROM product  WHERE KEYWORD LIKE '%$search%'";
    $query=mysqli_query($conn,$sql);
    $count = mysqli_num_rows($query);
	if($count == 0){
		 $output = 'there was no search result!';
		}else{
			while($row = mysqli_fetch_array($query)){
			   //$shopname= $row['CUSTOMERNAME'];
			
			
                //$output = '<div> '.$shopname.'</div>';
                echo "<p>" . $row['KEYWORD'] . "</p>";
           }
          // echo ($shopname);
		
       }
    }

    if(isset($_POST['submit_keyword'])){
      
        $keywordname=$_POST['searchkeyword'];
      // echo $insertbrandname;
        header("location:keyword.php?key=$keywordname");
    
$insertkeywordname=$keywordname;
    }

    ?>