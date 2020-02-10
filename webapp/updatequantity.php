<?php
include "connect.php";

?>
<!-- <html>
<head>
<-- search the product name -->
<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("updatequantityofproduct.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>


</head>  -->


    <!-- <body>
        <form method="POST">
        <label>Search product name</label> -->

<!-- Search  php code-->

<!-- <div class="search-box">
<input type="text" name="enteredproductname" autocomplete="off">

<div class="result"></div>
</div> -->


          <?php
//  $result = mysqli_query($conn,"SELECT PRODUCTNAME  from `product`"); 
    
//  echo "<html>";
//  echo "<body>";
//  echo "<select name='id'>"; 

//  while ($row = mysqli_fetch_array($result)) {

               
               
//                $name = $row['PRODUCTNAME']; 
//                echo '<option value="'.$name.'">'.$name.'</option>';
              
// }

//  echo "</select>";
//  echo "</body>";
//  echo "</html>";
?> 

        <!-- <label>Enter  quantity</label>
            <input type="number" name="qty">
            <input type="submit" value="update" name="updateqty">
            
</form>
</body> -->
</html>
<!-- search -->
<?php 
if(isset($_REQUEST['term'])){
   
    $search=$_REQUEST['term'];
$sql="SELECT `PRODUCTNAME` FROM `product`  WHERE `productname` LIKE '%$search%'";
$query=mysqli_query($conn,$sql);
$count = mysqli_num_rows($query);
if($count == 0){
     $output = 'there was no search result!';
    }else{
        while($row = mysqli_fetch_array($query)){
           //$shopname= $row['CUSTOMERNAME'];
        
        
            //$output = '<div> '.$shopname.'</div>';
            echo "<p>" . $row['PRODUCTNAME'] . "</p>";
       }
      // echo ($shopname);
    
   }
}
?>

<?php
if(isset($_POST['updateqty'])){
    $updatedproduct= $_POST['enteredproductname'];
    $updatedquantity=$_POST['qty'];
    $res=mysqli_query($conn,"SELECT `QUANTITY` FROM `product` WHERE PRODUCTNAME='$updatedproduct'");
    $res=mysqli_fetch_array($res);
   // echo $res['QUANTITY'];
    $existingqty=(int)$res['QUANTITY'];
   $updatedquantity=(int)$updatedquantity;
   $updatedquantity+=$existingqty;
  echo $updatedquantity;
  // echo gettype($res['QUANTITY']);
   $ins=mysqli_query($conn,"UPDATE `product` SET `QUANTITY`='$updatedquantity' WHERE `PRODUCTNAME`='$updatedproduct'");
  // echo $updatedproduct;
   echo " ";
   //echo $updatedquantity;
   if(!$ins){
    echo "error";
}
else{
   echo "updated";
  // header("location:updatequantityofproduct.html");
}

 
 
}
?>
<html>
    <body>
        <button><a href="updatequantityofproduct.html">update</a></button>
        <button><a href="admin1.php">go to admin dashboard</a></button>
        
        