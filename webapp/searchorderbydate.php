<?php
include "connect.php";?>
<?php   
if(isset($_POST['submitsearchdate'])){
    
    $selecteddate= $_POST['entereddate'];
    
    $qry=mysqli_query($conn,"SELECT * FROM `order` WHERE `date`='$selecteddate'")?>
     
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
    while($ans=mysqli_fetch_array($qry)){
        

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
} }?>

<form method="POST" action="export.php">
    <input type="submit" name="exportorder">
</form>

