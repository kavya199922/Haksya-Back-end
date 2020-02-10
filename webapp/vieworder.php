<!-- <!DOCTYPE html>
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
    <h1>DISPLAY THE LINKS WITH THE DATE AND THE SHOP NAME TO CLICK AND VIEW THE ORDER FULLY IN THE EXPORT PAGE</h1>
    <h2>
        for example
    </h2>
    <hr>
    <hr>
    <h1>DATE:22/02/2019</h1>
    <h1>Shop name: AJAMAL CASH AND CARRY</h1>
    <CENTER>
        <button>view fully</button>
    </CENTER>
    <hr>
    <h1>DATE:11/04/2019</h1>
    <h1>Shop name: phonix CASH AND CARRY</h1>
    <CENTER>
        <button>view fully</button>
    </CENTER>
    <hr>
    <center>
        <button>
                BACK
            </button>

    </center>


</body>

</html> -->


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
    <!-- search the shop name -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("searchorderdatename.php", {term: inputVal}).done(function(data){
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
<!-- search order by date and name -->
<form method="POST" action="searchorderdatename.php" autocomplete="off">
   <label>Enter date</label>
   <!-- <input type="date"  data-date="" name="entereddate" data-date-format="YYYY MM DD"> -->
   <input type="text" name="entereddate" placeholder="YYYY-MM-DD" required 
pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" 
/>
<div class="search-box">
<input type="text" name="enteredshopname" autocomplete="off">
<div class="result"></div>
</div>
   <input type="submit" name="submitsearchdate">
   <br/>
   </form>

   
    <form method="POST">
    <button name="view">view</button>
</form>
<!-- VIEW ENTIRE TABLE -->
<?php
 include "connect.php";
       if(isset($_POST['view'])){
        
       
        $sqlSelect = "SELECT * FROM `order` ";
        $result = mysqli_query($conn, $sqlSelect);
                    
        if (mysqli_num_rows($result) > 0) {
        ?>
        <form method='POST' action="viewanddeleteorder.php">
        <table id='orderTable' border="1">
            <thead>
                <tr>
                <th>ID</th>
                <th>shopname</th>
                 <th>orderid</th> 
                 <th>date</th> 
                 <th>productname
                <th> brandname</th>
                <th>keyword</th>
                <th>quantity</th>
                <th>price</th>
                <th>inctax</th>
                <th>extax</th>
                <th>salestatus</th>
               
        
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
        
            <tbody>
                <tr>
                 
                <td><?php echo $row['ID'];?></td>
                <td><?php  echo $row['shopname']; ?></td>
                <td><?php  echo $row['orderid']; ?></td>
                <td><?php  echo $row['date']; ?></td>
                <td><?php  echo $row['productname']; ?></td>
                <td><?php  echo $row['brandname']; ?></td>
                <td><?php  echo $row['keyword']; ?></td>
                <td><?php  echo $row['quantity']; ?></td>
                <td><?php  echo $row['price']; ?></td>
                <td><?php  echo $row['inctax']; ?></td>
                <td><?php  echo $row['extax']; ?></td>
                <td><?php  echo $row['salestatus']; ?></td>
                <td><input type="checkbox" name="num[]"  value="<?php echo $row['ID'];?>"></td>

                </tr>
             <?php
             }
             ?>
            </tbody>
        </table>
        
        <?php }} ?>

        <button name="delete">delete</button>
        </form>
















<!--                view searched detail -->

  

    
        
        </tbody>
    </table>
                
             
                
    
        
    
    </form>
     <?php
//  include "connect.php";
      
     
//         if(isset($_POST['delete'])){

//                 $delete=$_POST['num'];
//                while(list($key,$val)= @each($delete)){
//                // header("location:viewproduct.php");
//                mysqli_query($conn,"DELETE FROM order WHERE ID=$val");
//               // echo $val;
//                }
//                header("location:vieworder.php");
//         }
?> 


  
    
     </div>
     
     <div ><button><a href="admin1.php">Back</a></button></div>

    
</body>

</html>