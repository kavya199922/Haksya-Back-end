<?php
include "connect.php";
if(isset($_REQUEST['term'])){
   
    $search=$_REQUEST['term'];
$sql="SELECT `shopname` FROM `order`  WHERE `shopname` LIKE '%$search%'";
$query=mysqli_query($conn,$sql);
$count = mysqli_num_rows($query);
if($count == 0){
     $output = 'there was no search result!';
    }else{
        while($row = mysqli_fetch_array($query)){
           //$shopname= $row['CUSTOMERNAME'];
        
        
            //$output = '<div> '.$shopname.'</div>';
            echo "<p>" . $row['shopname'] . "</p>";
       }
      // echo ($shopname);
    
   }
}





if(isset($_POST['submitsearchdate'])){
    $selectedshop=$_POST['enteredshopname'];
    $selecteddate= $_POST['entereddate'];
    $result=mysqli_query($conn,"SELECT `orderid`,`shopname`,`brandname`,`productname`,`date`,`quantity`,`price`,`inctax`,`extax`,`salestatus` FROM `order` WHERE `date`='$selecteddate' AND `shopname`='$selectedshop'");?>
     <table id='orderTable' border='1'>
   <thead>
  
        <tr>

            <th>ORDERID</th>
            <th>SHOPNAME</th>
            <th>BRANDNAME</th>
            <th>PRODUCTNAME</th>
            <th>DATE</th>
            <th>QUANTITY</th>
            <th>PRICE</th>
            <th>INCTAX</th>
            <th>EXTAX</th>
            <th>SALESTATUS</th>
           
        </tr>
    </thead>
    <?php
    while($ans=mysqli_fetch_array($result)){

?>
  
   
  
<tr>
        <td> 
              <?php $orderid=$ans['orderid']; echo $orderid;?> </td>

           <td>    <?php $shopiname=$ans['shopname']; echo $shopiname;?> </td>
           <td>    <?php $brandname=$ans['brandname'];echo $ans['brandname'];?> </td>
           <td>    <?php $productname=$ans['productname'];echo $ans['productname'];?> </td>

           <!-- <td>    <?php// $keyword=$ans['keyword'];echo $ans['keyword'];?> </td> -->
           <td>    <?php $keyword=$ans['date'];echo $ans['date'];?> </td>
           <td>    <?php $quantity= $ans['quantity'];echo $ans['quantity'];?> </td>
           <td>    <?php $price=$ans['price'];echo $ans['price'];?> </td>
            <td>    <?php $inctax=$ans['inctax'];echo $ans['inctax'];?> </td>
            <td>    <?php $extax=$ans['extax'];echo $ans['extax'];?> </td>
            <td>    <?php $salestatus=$ans['salestatus'];echo $ans['salestatus'];?> </td>
    </tr>    
         

    <?php
   
$deltemp=mysqli_query($conn,"DELETE * FROM `temporder`");
$new =mysqli_query($conn,"INSERT INTO `temporder`(`orderid`,`shopname`,`brandname`,`productname`,`keyword`,`quantity`,`price`,`inctax`,`extax`,`salestatus`) VALUES ($orderid,'$shopiname','$brandname','$productname','$keyword','$quantity','$price','$inctax','$extax','$salestatus')");


}}?>



<form method="POST" action="export.php">
    <input type="submit" name="exportorder">
</form>






