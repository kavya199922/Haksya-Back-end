<?php include "connect.php";

// if(isset($_POST['addtocart'])){
//       // include "connect.php";
//       session_start();
//       $insertshopname=$_SESSION['shop'];
//       $insertbrandname=$_SESSION['brand'];
//        $prod_name=$_POST['prod'];
//        $qty=$_POST['amt'];

     
//        $query="INSERT INTO temporder(productname,shopname,brandname,quantity) VALUES ('$prod_name',$insertshopname,$insertbrandname,$qty)";
//        $res=mysqli_query($conn,$query);
//   //    header("location:salesman3.php?shopname=$insertshopname&brand=$insertbrandname");
     
// }
if(isset($_POST['submit'])){
      header("location:salesman4.php");
}

?>

