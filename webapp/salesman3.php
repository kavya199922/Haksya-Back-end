<!DOCTYPE html>
<html>
    <!-- DB CONNECT -->
<?php
//include "login.php";


include "connect.php";

?>
<head>
    <link rel="icon" href="assets/img/hg-logo.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Company" content="Haksya Global SDN BHD">
    <meta name="webapp name" content="Make your order">
    <meta name="front end developer" content="Sankar Ganesh">
    <meta name="back end developer" content="kavya">
    <link rel="stylesheet" href="assets/css/salesman.css">

</head>

<body>
<div class="head">
        <center>
            <table>
                <tr>
                    <td><img src="assets/img/hg-logo.png"></td>
                    <td>
                        <h1>HAKSYA GLOBAL SDN BHD</h1>
                    </td>
                </tr>
            </table>
        </center>
    </div>
    <!-- <form method="POST">
    <label>Enter Salesman name</label>
                    <input type="text" name="customerpo">
                    <input type="submit" name="entersalesman">

</form> -->
 <?php  
 
// if(isset($_POST['entersalesman'])){
//     $customerpo=$_POST['customerpo'];
// echo $customerpo;
//     }
?>
    
<?php
// get the chosen shopname and brandname
if(isset($_GET['brand'])){
//$salesman=$_GET['salesmanname'];
  $insertbrandname=$_GET['brand'];
  echo $insertbrandname;
echo"<br/>";
  $insertshopname=$_GET['shopname'];
   
    $insertshopname =  str_replace('"', "'", $insertshopname);
    echo $insertshopname;
   // $insertshopname=urlencode($insertshopname);
}

    session_start();
    $_SESSION['shop']=$insertshopname;
    $_SESSION['brand']=$insertbrandname;
    
 $sql="SELECT PRODUCTNAME,UNIT,PRICE,PRODUCTID FROM `product` WHERE BRAND='$insertbrandname'";
 $row=mysqli_query($conn,$sql);
 while($result=mysqli_fetch_array($row)){

 ?>
   
    
   
    <div class=example>
        <!-- <center> -->
            <!-- <p><?php echo $result['PRODUCTNAME'];?></p>
                  
                <p>UNIT:<?php echo $result['UNIT'];?></p> -->
                <form method="POST">
                    PRODUCT:
                    <input type="text"value="<?php echo $result['PRODUCTNAME'];?>" name="prod">
                    <?php $prod=$result['PRODUCTNAME'];?>
                    PRODUCTID:
                    <input type="text"value="<?php echo $result['PRODUCTID'];?>" name="prod">
                    <?php $prodid=$result['PRODUCTID'];?>
                    NAME:
                    <input type="text" value="<?php echo $result['UNIT'];?>" name="unit">
                    PRICE:
                    <input type="text" value="<?php echo $result['PRICE'];?>" name="price">
                    <input type="number" placeholder="Quantity" name="amt">
                     <?php 
                    echo "LIMIT:";
                    $qtyres=mysqli_query($conn,"SELECT `QUANTITY` FROM `product` WHERE PRODUCTNAME='$prod' AND BRAND='$insertbrandname'");
                    $fetchedqty=mysqli_fetch_array($qtyres);
                    echo $fetchedqty['QUANTITY'];
                    ?> 
                    <button name="addtocart">Add to cart</button>
 </form>
 <?php }?>

  
    </div><br><br>
 <?php
 
if(isset($_POST['addtocart'])){
   
    // include "login.php";
    // echo $_POST['uname'];
   //session_start();
   // $insertshopname=$_SESSION['shop'];
    //$insertbrandname=$_SESSION['brand'];
    //$customerpo=$_POST['customerPO'];

     $prod_name=$_POST['prod'];
     $qty=$_POST['amt'];
     $price=$_POST['price'];
     $insertshopname=mysqli_real_escape_string($conn,$insertshopname);
     $insertbrandname=mysqli_real_escape_string($conn,$insertbrandname);
     echo $insertshopname;
     echo $insertbrandname;
     echo $prod_name;
     echo $qty;
    // echo $customerpo;
     
     $currentDateTime =mysqli_real_escape_string($conn,date('Y-m-d')) ;
     echo gettype($currentDateTime);
     
     if($answer=mysqli_query($conn,"INSERT INTO temporder (shopname,brandname,quantity,productname,price,dateoforder,productid) VALUES ('$insertshopname','$insertbrandname',$qty,'$prod_name','$price','$currentDateTime','$prodid')")){
         echo"data inserted";
     }
     else{
         echo mysqli_error($conn);
     }
//    header("location:salesman3.php?shopname=$insertshopname&brand=$insertbrandname");
//echo $insertshopname;
   
}?>   
    <center>
<form method="POST" action="inserttemp.php" >
        <button name="submit">SUBMIT</button>

 </form>
 
    </center>

</body>

</html>