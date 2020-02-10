 
   <?php
include "connect.php";
$insertshopname;
$insertbrandname;
        
    if(isset($_REQUEST['term'])){
        $search=$_REQUEST['term'];
    $sql="SELECT CUSTOMERNAME FROM shop  WHERE CUSTOMERNAME LIKE '%$search%'";
    $query=mysqli_query($conn,$sql);
    $count = mysqli_num_rows($query);
	if($count == 0){
		 $output = 'there was no search result!';
		}else{
			while($row = mysqli_fetch_array($query)){
			   //$shopname= $row['CUSTOMERNAME'];
			
			
                //$output = '<div> '.$shopname.'</div>';
                echo "<p>" . $row['CUSTOMERNAME'] . "</p>";
           }
          // echo ($shopname);
		
       }
    }
    if(isset($_POST['submit_shop'])){
        $shopname=$_POST['searchshop'];
        echo $shopname;
        header("location:salesman2.php?shopname=$shopname");
    
$insertshopname=$shopname;
    }
    
//     echo $insertshopname;
    //select brand
    
    
    //echo $insertshopname;
	
	
?>
