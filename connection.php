<?php
$host="localhost";
$user="root";
$password="";
$db="gemstore_db";

$conn = new mysqli($host, $user, $pass, $db);
if($conn){
    //echo "Connected";
}
else{
    echo "Not Connected";
}
?>