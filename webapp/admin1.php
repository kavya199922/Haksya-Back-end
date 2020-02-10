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
    <center>
        <!-- <div class="e-button"> -->
            <form method="POST" action="vieworder.php">
            <button>view & export order details</button>
        </form>
        <!-- </div> --><br> 
        <!-- <div class="l-button"> -->
            <form method="POST" action="viewproduct.php">
          <button>  view or delete Product details </button>
        </form>
        <!-- update quantities -->
        <form method="POST" action="updatequantityofproduct.html">
          <button>  update quantity</button>
        </form>
        <!-- </div> -->
        <br>
        <!-- <div class="l-button"> -->
            <form method="POST" action="viewcustomer.php">
           <button>view or delete customer details</button> 
        </form>
        <!-- </div>-->
        <br> 
        <!-- <div class="l-button"> -->
<form method="POST" action="viewsalesman.php">
            <button name="salesman">view or delete salesman details</button>
        </form>
        <!-- </div> -->
        <br>
        <!-- <div class="l-button"> -->

            <form method="POST" action="viewocustumer.php">
           <button name="onlinecustomer"> view or delete online customer</button>
        </form>
        <!-- </div> -->
        <br>
        <!-- <div class="l-button"> -->
            <form method="POST" action="viewadmin.php">
        <button name="admin">  view or delete admin details</button>
    </form>
        <!-- </div> -->
        <br>
    </center>
    <div class="row">
        <div class="column">
            <form action="adduser.php" method="POST">
                <center>
                    <h1>ADD <br>SALESMAN</h1>
                </center>
                <div class="container">
                    <label for="uname"><b>Name</b></label>
                    <input type="text" placeholder="Name" name="Name" required>
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    <button type="submit" name="addsalesman">ADD</button>
                </div>
            </form>
        </div>
        <div class="column">
            <form action="adduser.php" method="POST">
                <center>
                    <h1>ADD <br> CUSTOMER</h1>
                </center>
                <div class="container">
                    <label for="uname"><b>Name</b></label>
                    <input type="text" placeholder="Name" name="Name" required>
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    <button type="submit" name="onlinecustomer">ADD</button>
                </div>
            </form>
        </div>
        <div class="column">
            <form method="POST" action="adduser.php">
                <center>
                    <h1>ADD <br>ADMIN</h1>
                </center>
                <div class="container">
                    <label for="uname"><b>Name</b></label>
                    <input type="text" placeholder="Name" name="Name" required>
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    <button type="submit" name="admin">ADD</button>
                </div>
            </form>
        </div>
    </div>
    <!-- insert product details into db -->
    <div class="container">
        <form action="insertproduct.php" method="POST">
            <center>
                <h1>ADD PRODUCT</h1>
            </center>
            <div class="container">
                <label for="pid"><b>Product ID</b></label>
                <input type="text" placeholder="Enter Product ID" name="pid" required>
                <label for="pname"><b>Product Name</b></label>
                <input type="text" placeholder="Enter Product Name" name="pname" required>
                <label for="brand"><b>Brand</b></label>
                <input type="text" placeholder="Enter Brand Name" name="brand" required>
                <label for="unit"><b>Unit</b></label>
                <input type="text" placeholder="Enter Unit : For example 'pkt' " name="unitName" required>
                <label for="key"><b>KeyWord</b></label>
                <input type="text" placeholder="Enter KeyWord" name="key" required>
                <label for="price"><b>Price</b></label>
                <input type="number" placeholder="Enter price in RM" name="price" required>
                <label for="qty"><b>Quantity</b></label>
                <input type="number" placeholder="Enter Quantity" name="quantity" required>
                <button type="submit" name="addproduct">ADD</button>
                <!-- <button>IMPORT</button> -->
            </div>
        </form>
        <form action="insertproduct.php" method="POST" enctype="multipart/form-data">
            <input type='file' name='file'>
            <input type="submit" name="submit_file_product">Import</button>
        </form>
    </div>
    <!-- INSERT SHOP DETAILS IN TO DB -->
    <div class="container">
        <form action="insertshop.php" method="POST">
            <center>
                <h1>ADD SHOPS</h1>
            </center>
            <div class="container">
                <label for="cname"><b>Customer Name</b></label>
                <input type="text" placeholder="Enter The Customer Name" name="cname" required>
                <label for="city"><b>City</b></label>
                <input type="text" placeholder="Enter City" name="city" required>
                <label for="state"><b>State</b></label>
                <input type="text" placeholder="Enter State" name="state" required>
                <label for="cphn"><b>Phone</b></label>
                <input type="number" placeholder="Enter Phone Number" name="cphn" required>
                <button type="submit" name="addshop">ADD</button>
                <!-- <button type="file" name="import_file_shop">IMPORT</button> -->
                <!-- <input type='file' name='import_file_shop'>
                <button name="submit_file">Import</button> -->
            </div>
           
        </form>
        <form action="insertshop.php" method="POST" enctype="multipart/form-data">
            <input type='file' name='file'>
            <input type="submit" name="submit_file_shop">Import</button>
        </form>
    </div>
    <center>
        <form action="logout.php" method="POST">
                <button name="logout"><div class="b-button">logout</div></button>
        </form>
        
    </center>
</body>

</html>