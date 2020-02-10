<!DOCTYPE html>
<html>
<?php 
ob_start();
include"connect.php";?>
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
    <center>
    
        <table>
            <tr>
                <form action="controls.php" method="POST">
                    <!-- <label>Enter Salesman name</label>
                    <input type="text" name="customerPO"> -->
                <td><button name="confirm_order">Submit</button></td>

                <td><button name="delete_prod">delete</button></td>
          <?php $insertshopname;$insertbrandname;?>     
            </tr>
        </table>
        <div>
        <table id='temporderTable' border="1">
            <thead>
                <tr>
                <th>ID</th>
                <th>SHOPNAME</th>
                <th>PRODUCT NAME</th>
                <th>BRAND NAME</th>
                <th>KEYWORD</th>
                <th>QUANTITY</th>
                <th>DATE OF ORDER</th>
                <th>DELETE</th>
               
        
                </tr>
            </thead>
           <?php
               $sql="SELECT * FROM temporder";
               $res=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($res)){?>

<tbody>
                <tr>
                 
                <td><?php echo $row['ID'];?></td>
                <td><?php  echo $row['shopname']; ?></td>
                <?php $insertshopname=mysqli_real_escape_string($conn, $row['shopname']);?>
                <?php $insertbrandname= mysqli_real_escape_string($conn,$row['brandname']);?>
                <td><?php  echo $row['productname']; ?></td>
                <td><?php echo $row['brandname'];?></td>
                <td><?php  echo $row['keyword']; ?></td>
                <td><?php  echo $row['dateoforder']; ?></td>
                <td><?php  echo $row['quantity']; ?></td>
                <td><input type="checkbox" name="num[]"  value="<?php echo $row['ID'];?>"></td>
                </tr>

                <?php }?>
                </table>
                </div>
                
                </form>
                <?php 
//                 if(isset($_POST['confirm_order'])){
//    // $sql="SELECT PRODUCTID,PRICE FROM product WHERE PRODUCTNAME="
//     $sql="INSERT INTO order (shopname,orderid,date,customername,productid,description,productname,quantity,price,inctax,extax,salestatus) VALUES ("
// }?>
           
        </h1><br><br><br><br>
        <form method="POST" action="export.php">
        <input name="export" type="submit" value="export">
             

        </form>
        <br/>
        <form method="POST" >
                <input name="sub_order" type="submit" value="other brands">

</form>

<br/><br/>
<?php 
if(isset($_POST['sub_order'])){
header("location:salesman2.php?shopname=$insertshopname");
}?>
       <form method="POST" >
            <input type="submit" name="new_order" value="New order">

               
</form>
<?php
if(isset($_POST['new_order'])){
    
    //delete data from temporder
    $sql="DELETE FROM `temporder`";
    if(mysqli_query($conn,$sql)){
    header("location:salesman1.php");
    }
    else{
        echo mysqli_error($conn);
    }
}
?>

        </center>
</body>

</html>