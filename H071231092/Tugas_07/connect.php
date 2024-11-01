<?php
$server_name ='localhost';
$username ='root';
$password ='';
$database ='test';

$connect = new mysqli($server_name,$username,$password,$database);

if($connect->connect_error){
    die('koneksi gagal'. $connect->connect_error);
}else{
    echo'';
}
?>