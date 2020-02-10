<!DOCTYPE html>
<html>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("selectedbrand.php", {term: inputVal}).done(function(data){
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
<script>
$(document).ready(function(){
    $('.search-box-keyword input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result-keyword");
        if(inputVal.length){
            $.get("selectedkeyword.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result-keyword p", function(){ 
        $(this).parents(".search-box-keyword").find('input[type="text"]').val($(this).text());
        $(this).parent(".result-keyword").empty();
    });
});


    </script>
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

    <body>
        <div class=head>
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
            <h1>Select The Brand Of The Product</h1>
        </center>
        <?php
        $shopname=$_GET['shopname'];
        echo $shopname;
        echo "<br/>";
        session_start();
        $_SESSION['sho']=$shopname;
        include "connect.php";
        $sql="SELECT DISTINCT BRAND FROM product";
        $row=mysqli_query($conn,$sql);
        while($result=mysqli_fetch_assoc($row)){
            
            echo $result['BRAND'];
            echo ",";
        
        }?>
        <center>
        <form autocomplete="off" action="selectedbrand.php" method="POST" >
            
            <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search brand" name="searchbrand" />
        <div class="result"></div>
    </div>
            <input type="submit" name="submit_brand">
        </form>
        </center><br><br><br><br>
        <hr><br><br><br>
        <?php
        include "connect.php";
        $sql="SELECT DISTINCT KEYWORD FROM product";
        $row=mysqli_query($conn,$sql);
        while($result=mysqli_fetch_assoc($row)){
            
            echo $result['KEYWORD'];
            echo ",";
        
        }?>
        <center>
            <!--                            KEYWORD                                           -->
            <h1>Select The KEYWORD</h1>
        </center>
        <center>
        <form autocomplete="off" action="selectedkeyword.php" method="POST" >
          
            <div class="search-box-keyword">
        <input type="text" autocomplete="off" placeholder="Search keyword" name="searchkeyword" />
        <div class="result-keyword"></div>
    </div>
            <input type="submit" name="submit_keyword">
        </form>
        </center>
        <center>
            <button>
                BACK
            </button>

        </center>

    </body>
</body>

</html>