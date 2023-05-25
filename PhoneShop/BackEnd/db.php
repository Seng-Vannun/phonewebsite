<?php
$db="localhost";
$username="root";
$pass="";
$dbname="phone_shop";
$conn=mysqli_connect($db,$username,$pass,$dbname);
if(!$conn){
    echo ("error".mysql_error($conn));
}