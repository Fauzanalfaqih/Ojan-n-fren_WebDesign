<?php
$hostname = "localhost";
$email = "root";
$password = "";
$database_name = "database1";

$db = mysqli_connect($hostname,$email,$password,$database_name);
if($db->connect_error){
    echo"koneksi database rusak";
    die("error!");
}
?>