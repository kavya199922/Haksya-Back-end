<!DOCTYPE html>
<html>

<head>

    <link rel="icon" href="assets/img/hg-logo.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Company" content="Haksya Global SDN BHD">
    <meta name="webapp name" content="Make your order">
    <meta name="front end developer" content="Sankar Ganesh">
    <meta name="back end developer" content="kavya">
    <link rel="stylesheet" href="assets/css/admin.css">
    <script src="assets/js/autocomplete.js"></script>

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
    <div id="search">
        <center>
<form  method="POST">
    <input name="prodName" type="search" placeholder="search Brand" width="200" height="200">
        <input type="submit" name="search-btn" value="search">
</center>

</form>
<form method="POST">
    <button name="view">view</button>
</form>
<!-- display entire table -->
<?php
 include "connect.php";
       if(isset($_POST['view'])){
        
       
        $sqlSelect = "SELECT * FROM product ";
        $result = mysqli_query($conn, $sqlSelect);
                    
        if (mysqli_num_rows($result) > 0) {
        ?>
        <table id='prodTable' border="1">
            <thead>
                <tr>
                    <th>PRODUCT ID</th>
                    <th>PRODUCT NAME</th>
                    <th>UNIT</th>
                    <th>PRICE</th>
                    <th>BRAND</th>
                    <th>KEYWORD</th>
        
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
        
            <tbody>
                <tr>
                 
                    <td><?php  echo $row['PRODUCTID']; ?></td>
                    <td><?php  echo $row['PRODUCTNAME']; ?></td>
                    <td><?php  echo $row['UNIT']; ?></td>
                    <td><?php  echo $row['PRICE']; ?></td>
                    <td><?php  echo $row['BRAND']; ?></td>
                    <td><?php  echo $row['KEYWORD']; ?></td>
                    <td><?php  echo $row['QUANTITY']; ?></td>
                </tr>
             <?php
             }
             ?>
            </tbody>
        </table>
        <?php }} ?>


<!-- display details of searched val -->
<?php
if(isset($_POST['search-btn'])){
    include "connect.php";
$search=$_POST['prodName'];
$sql="SELECT * FROM product  WHERE BRAND LIKE '%$search%'";
$query=mysqli_query($conn,$sql);
if(mysqli_num_rows($query)==0){
    echo "no results found";

}
else{?>
<form method="POST" action="viewanddeleteproduct.php">
   
    <table id='prodTable' border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>PRODUCT ID</th>
            <th>PRODUCT NAME</th>
            <th>UNIT</th>
            <th>PRICE</th>
            <th>BRAND</th>
            <th>KEYWORD</th>
            <th>QUANTITY</th>
            <th>delete</th>
        </tr>
    </thead>
    <?php
    while($row=mysqli_fetch_array($query)){?>
        <tbody>
        <tr>
            <td><?php echo $row['ID'];?></td>
            <td><?php  echo $row['PRODUCTID']; ?></td>
            <td><?php  echo $row['PRODUCTNAME']; ?></td>
            <td><?php  echo $row['UNIT']; ?></td>
            <td><?php  echo $row['PRICE']; ?></td>
            <td><?php  echo $row['BRAND']; ?></td>
            <td><?php  echo $row['KEYWORD']; ?></td>
            <td><?php  echo $row['QUANTITY']; ?></td>
            <td><input type="checkbox" name="num[]"  value="<?php echo $row['ID'];?>"></td>
        </tr>
     <?php
     }

     ?>
     <button name="delete">delete</button>
    </tbody>
</table>
            
         
            
<?php
    }
}




?>
</form>

 </div>

   <div>
   </div> 


    
    <br><br><br><br>
    <hr>
    <center>
        <table>
            <tr>
                <td>
                    
                </td>
                <td>
                    <div ><button><a href="admin1.php">Back</a></button></div>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>