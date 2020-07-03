<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "phptrainee";
$connection = mysqli_connect($host,$username,$password,$dbname);
if(mysqli_connect_errno()){
die("database connection failed. Error Number:" .
mysqli_connect_errno()." Error Type.".mysqli_connect_error());
                          }




$query = " UPDATE Post set title = '$ftitle' , Description = '$fdesc' where Pid = '$postid'";
        $result = mysqli_query($connection,$query);
        if($result)
        echo "Update Sucessfully";

















?>