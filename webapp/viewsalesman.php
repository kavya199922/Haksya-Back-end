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
        <input name="salesName" type="search" placeholder="Name" width="200" height="200">
            <input type="submit" name="search-btn" value="search">
            <button name="deleteall">DELETE ALL</button>
    </center>
    
    </form>
    <form method="POST">
    <button name="view">view</button>
</form>
<!-- VIEW ENTIRE TABLE -->
<?php
 include "connect.php";
       if(isset($_POST['view'])){
        
       
        $sqlSelect = "SELECT * FROM login WHERE USERTYPE='salesman' ";
        $result = mysqli_query($conn, $sqlSelect);
                    
        if (mysqli_num_rows($result) > 0) {
        ?>
        <table id='custTable' border="1">
            <thead>
                <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>USERNAME</th>
                
               
        
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
        
            <tbody>
                <tr>
                 
                <td><?php echo $row['ID'];?></td>
                <td><?php  echo $row['NAME']; ?></td>
                <td><?php  echo $row['USERNAME']; ?></td>
               
                </tr>
             <?php
             }
             ?>
            </tbody>
        </table>
        <?php }} ?>


















<!--                view searched detail -->

    <?php
    if(isset($_POST['search-btn'])){
        include "connect.php";
    $search=$_POST['salesName'];
    $sql="SELECT * FROM login  WHERE NAME LIKE '%$search%'";
    $query=mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)==0){
        echo "no results found";
    
    }
    else{?>
    <form method="POST" action="viewanddeletesalesman.php">
       
        <table id='prodTable' border="1">
        <thead>
            <tr>
            <th>ID</th>
                <th>NAME</th>
                <th>USERNAME</th>
                <th>DELETE</th>
               
            </tr>
        </thead>
        <?php
        while($row=mysqli_fetch_array($query)){?>
            <tbody>
            <tr>
                <td><?php echo $row['ID'];?></td>
                <td><?php  echo $row['NAME']; ?></td>
                <td><?php  echo $row['USERNAME']; ?></td>
               
               
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
    if(isset($_POST['deleteall'])){
        mysqli_query($conn,"DELETE FROM login WHERE USERTYPE='salesman'");
        header("location:viewsalesman.php");
    }
    
    
    
    
    ?>
    </form>
    
     </div>
     
     <div ><button><a href="admin1.php">Back</a></button></div>

    
</body>

</html>