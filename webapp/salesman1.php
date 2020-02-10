
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
    <link rel="stylesheet" href="assets/css/salesman.css">
    <script src="assets/js/autocomplete.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("selectedshop.php", {term: inputVal}).done(function(data){
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
    <center>
        <h1>Enter the shop name to place the order</h1>
    </center>
    <center>
        <form autocomplete="off" action="selectedshop.php" method="POST" >
            <!-- <div class="autocomplete" style="width:300px;">
                <input type="search" name="shopname" placeholder="Enter Shop Name">
            </div> -->
            <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search Shop" name="searchshop" />
        <div class="result"></div>
    </div>
            <input type="submit" name="submit_shop">
        </form>
<!-- search -->




    

    </center>
    <br><br><br>
    <center>
        
        <form method="POST" action="logout.php">
        <button name="logout">
            LogOut
        </button>
</form>

    </center>
</body>

</html>