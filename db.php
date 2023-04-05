<?php 
$connection=mysqli_connect('localhost','root','','test');

if($connection){
    echo "";
} else {
    die("database connection failed");
}

?>