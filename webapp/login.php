<?php
include "connect.php";
// salesman
if(isset($_POST['Salesmamlogin'])){
    
    $GLOBALS['user'] =$_POST['uname'];
$username=$_POST['uname'];
$password=$_POST['psw'];
$query=mysqli_query($conn,"SELECT * from login where USERNAME='$username' and PASSWORD='$password' and USERTYPE='salesman'  LIMIT 1 ");
$rows=mysqli_num_rows($query);
//$row = mysqli_fetch_array($query);

if($rows==1){
    header("location:salesman1.php");
}
else{
    echo '<script language="javascript">';
    echo 'alert("invalid credentials")';
    echo '</script>';

}

}
// admin
if(isset($_POST['Adminlogin'])){
    $username=$_POST['uname'];
    $password=$_POST['psw'];
    $query=mysqli_query($conn,"select * from login where USERNAME='$username' and PASSWORD='$password' and USERTYPE='admin'  LIMIT 1 ");
    $rows=mysqli_num_rows($query);
    if($rows==1){
        header("location:admin1.php");
    }
    else{
        echo '<script language="javascript">';
        echo 'alert("invalid credentials")';
        echo '</script>';
    
    }
    
    }
    if(isset($_POST['Shoplogin'])){
        $username=$_POST['uname'];
        $password=$_POST['psw'];
        $query=mysqli_query($conn,"select * from login where USERNAME='$username' and PASSWORD='$password' and USERTYPE='shop'  LIMIT 1 ");
        $rows=mysqli_num_rows($query);
        if($rows==1){
            header("location:shop1.php?shopname=$username");
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("invalid credentials")';
            echo '</script>';
            header("location:index.html");
        
        }
        
        }
        ?>