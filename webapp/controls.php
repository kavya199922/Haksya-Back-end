<?php
include "connect.php";

$result = mysqli_query($conn,"SELECT * FROM temporder");
$rows1 = mysqli_num_rows($result);
// //update quantity
// while($res1=mysqli_fetch_array($result)){
// $prod=$res1['productname'];
// $res=mysqli_query($conn,"SELECT `QUANTITY` FROM `product` WHERE PRODUCTNAME='$prod'");
// $res2=mysqli_fetch_array($res);


// echo $res2['QUANTITY'];
// }
// $existingqty=(int)$res['QUANTITY'];
// $updatedquantity=(int)$updatedquantity;
// $updatedquantity+=$existingqty;
// echo $updatedquantity;
// // echo gettype($res['QUANTITY']);
// $ins=mysqli_query($conn,"UPDATE `product` SET `QUANTITY`='$updatedquantity' WHERE `PRODUCTNAME`='$updatedproduct'");
// if(!$ins){
//    echo "error";
// }
// else{
//    echo "success";
// }
// }






























 if(isset($_POST['confirm_order'])){
     $rows=$rows1;
     $salesmanname=$_POST['customerPO'];
    
     $res=mysqli_query($conn, "SELECT * from `order` ORDER BY `orderid` DESC LIMIT 1 ");
     $pdata=mysqli_fetch_row($res);
     $orderid=$pdata[2]+1;
    // echo $orderid;

 
 
   $sql="INSERT INTO `order`(`shopname`,`productname`,`brandname`,`quantity`,`price`,`keyword`) SELECT `shopname`,`productname`,`brandname`,`quantity`,`price`,`keyword` FROM `temporder`";
   
    mysqli_query($conn,$sql);
    $result=mysqli_query($conn,"DELETE FROM `temporder`");
    header("location:salesman4.php");
    $update="UPDATE `order` SET `orderid`=$orderid WHERE `orderid`=0";
    mysqli_query($conn,$update);
    
  
      
       
    

    

      
      
     
    
}

if(isset($_POST['delete_prod'])){

    $delete=$_POST['num'];
   while(list($key,$val)= @each($delete)){
   // header("location:viewproduct.php");
   mysqli_query($conn,"DELETE FROM temporder WHERE ID=$val");
  // echo $val;
   }
   header("location:salesman4.php");
}
?>