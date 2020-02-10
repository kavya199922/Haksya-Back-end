<?php
 include "connect.php";
      
     
        if(isset($_POST['delete'])){

                $delete=$_POST['num'];
               while(list($key,$val)= @each($delete)){
               // header("location:viewproduct.php");
               mysqli_query($conn,"DELETE FROM shop WHERE ID=$val");
              // echo $val;
               }
               header("location:viewcustomer.php");
        }
?>


  