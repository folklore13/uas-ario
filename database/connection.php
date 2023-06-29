<?php 

$connection = mysqli_connect("localhost", "root", "", "uas_ario");

if(!$connection){
    die ("Couldn't connect: ".mysqli_connect_error());
}
