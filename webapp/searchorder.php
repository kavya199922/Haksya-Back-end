<?php
include "connect.php";
if(isset($_POST['submitsearch'])){
    $selectedshop=$_POST['enteredshopname'];
    $sql="SELECT * FROM `order` where `shopname`='$selectedshop'";
    $result=mysqli_query($conn,$sql);
    // $ans=mysqli_fetch_assoc($result);

    // echo $ans['orderid'];
    // echo "<br/>";
    // echo $ans['shopname'];
    // echo "<br/>";
    // echo $ans['brandname'];
    // echo "<br/>";
    // echo $ans['productname'];
    // echo "<br/>";
    // echo $ans['date'];
    // echo "<br/>";
    // echo $ans['quantity'];
    // echo "<br/>";
    // echo $ans['price'];
    // echo "<br/>";
    // echo $ans['inctax'];
    // echo "<br/>";
    // echo $ans['extax'];
    // echo "<br/>";
    // echo $ans['salestatus'];

?>  
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

    <?php //while($ans=mysqli_fetch_array($result)){?>
    <!-- <td><?php //echo $ans['ORDERID'];?></td> -->
    <?php//}?>

<?php
    while($ans=mysqli_fetch_array($result)){

?>
  
   
  
<tr>
        <td> 
              <?php $orderid=$ans['orderid']; echo $orderid;?> </td>

           <td>    <?php $shopiname=$ans['shopname']; echo $shopiname;?> </td>
           <td>    <?php $brandname=$ans['brandname'];echo $ans['brandname'];?> </td>
           <td>    <?php $productname=$ans['productname'];echo $ans['productname'];?> </td>

           <td>    <?php $keyword=$ans['keyword'];echo $ans['keyword'];?> </td>
           <td>    <?php $quantity= $ans['quantity'];echo $ans['quantity'];?> </td>
           <td>    <?php $price=$ans['price'];echo $ans['price'];?> </td>
            <td>    <?php $inctax=$ans['inctax'];echo $ans['inctax'];?> </td>
            <td>    <?php $extax=$ans['extax'];echo $ans['extax'];?> </td>
            <td>    <?php $salestatus=$ans['salestatus'];echo $ans['salestatus'];?> </td>
    </tr>    
         


<?php
//insert to temp

// $res=mysqli_query($conn,"INSERT INTO `temporder` (`orderid`,`shopname`,`brandname`,`productname`,`keyword`,`quantity`,`price`,`inctax`,`extax`,`salestatus`)values $ans['orderid'],$ans['shopname'],$ans['brandname'],$ans['productname'],$ans['keyword'],$ans['quantity'],$ans['price'],$ans['inctax'],$ans['extax'],$ans['salestatus']");
//    

$new =mysqli_query($conn,"INSERT INTO `temporder`(`orderid`,`shopname`,`brandname`,`productname`,`keyword`,`quantity`,`price`,`inctax`,`extax`,`salestatus`) VALUES ($orderid,'$shopiname','$brandname','$productname','$keyword','$quantity','$price','$inctax','$extax','$salestatus')");
//  if($new)
//  {
//      echo "happy";
//  }  
//  else
//  {
//      echo "not";
//  }

}}?>



<form method="POST" action="export.php">
    <input type="submit" name="exportorder">
</form>




