<!DOCTYPE html>
<html>
    <!-- DB CONNECT -->
<?php

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
<?php
// get the chosen shopname and brandname
if(isset($_GET['brand'])){
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
 $sql="SELECT PRODUCTNAME,UNIT,PRICE FROM product WHERE BRAND='$insertbrandname'";
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
                    NAME:
                    <input type="text" value="<?php echo $result['UNIT'];?>" name="unit">
                    PRICE:
                    <input type="text" value="<?php echo $result['PRICE'];?>" name="price">
                    <input type="number" placeholder="Quantity" name="amt">
                    <button name="addtocart">Add to cart</button>
 </form>
 <?php }?>

  
    </div><br><br>
 <?php
if(isset($_POST['addtocart'])){
    include "connect.php";
   //session_start();
   // $insertshopname=$_SESSION['shop'];
    //$insertbrandname=$_SESSION['brand'];
     $prod_name=$_POST['prod'];
     $qty=$_POST['amt'];
     $price=$_POST['price'];
     echo $insertshopname;
     echo $insertbrandname;
     echo $prod_name;
     echo $qty;
   
     $query="INSERT INTO temporder (shopname,brandname,quantity,productname,price) VALUES ('$insertshopname','$insertbrandname','$qty','$prod_name','$price')";
     if(mysqli_query($conn,$query)){
         echo"data inserted";
     }
     else{
         echo "insertion failed";
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