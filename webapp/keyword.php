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
// get the chosen keyword
if(isset($_GET['key'])){
  $keyword=$_GET['key'];
  session_start();
  $insertshopname=$_SESSION['sho'];
  echo $insertshopname;
  echo"<br/>";
  echo $keyword;

  
}

    
    
   
 $sql="SELECT PRODUCTNAME,UNIT,PRICE FROM product WHERE KEYWORD='$keyword'";
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
    // $insertbrandname=$_POST['brand'];
     echo $insertshopname;
    // echo $insertbrandname;
     echo $prod_name;
     echo $qty;
    echo $keyword;
     $query="INSERT INTO temporder (shopname,quantity,productname,price,keyword) VALUES ('$insertshopname','$qty','$prod_name','$price','$keyword')";
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