<?php

$conn=mysqli_connect("localhost","root","");
if($conn){
$db=mysqli_select_db($conn,"test");
}

    else{
        die("connection failed ".mysqli_connect_error());
    }
?>