<?php
include "connect.php";
if(isset($_POST['addsalesman'])){
    $name=$_POST['Name'];
    $uname=$_POST['uname'];
    $password=$_POST['psw'];
    $usertype='salesman';
    $sql="INSERT INTO login (NAME,USERNAME,PASSWORD,USERTYPE) values ('$name','$uname','$password','$usertype')";
    if(mysqli_query($conn,$sql)){
        header("location:admin1.html");
    }
    else{
        echo"fail";
 
    }
}
if(isset($_POST['addsalesman'])){
    $name=$_POST['Name'];
    $uname=$_POST['uname'];
    $password=$_POST['psw'];
    $usertype='salesman';
    $sql="INSERT INTO login (NAME,USERNAME,PASSWORD,USERTYPE) values ('$name','$uname','$password','$usertype')";
    if(mysqli_query($conn,$sql)){
        header("location:admin1.php");
    }
    else{
        echo"fail";
 
    }
}
if(isset($_POST['onlinecustomer'])){
    $name=$_POST['Name'];
    $uname=$_POST['uname'];
    $password=$_POST['psw'];
    $usertype='customer';
    $sql="INSERT INTO login (NAME,USERNAME,PASSWORD,USERTYPE) values ('$name','$uname','$password','$usertype')";
    if(mysqli_query($conn,$sql)){
        header("location:admin1.php");
    }
    else{
        echo"fail";
 
    }
}
if(isset($_POST['admin'])){
    $name=$_POST['Name'];
    $uname=$_POST['uname'];
    $password=$_POST['psw'];
    $usertype='admin';
    $sql="INSERT INTO login (NAME,USERNAME,PASSWORD,USERTYPE) values ('$name','$uname','$password','$usertype')";
    if(mysqli_query($conn,$sql)){
        header("location:admin1.php");
    }
    else{
        echo"fail";
 
    }
}
?>