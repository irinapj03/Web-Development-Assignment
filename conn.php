<?php

$con  = mysqli_connect('localhost','root','','petlovers');

//Check connection error
if (mysqli_connect_error()){
    echo 'There is an error with database coonection: '.mysqli_connect_error();
}    

?>