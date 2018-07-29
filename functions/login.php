<?php
include 'query.php';
include 'config.php';

function login(){
    if (mysqli_num_rows(query("select * from profile where "
            . "username ='$username' and passwrod='$password'"))==1);
    session_start();
    $session ['username']=$getuser ['username'];
    $session ['password']=$getuser ['password'];
    $session ['Login_ID']=$getuser ['Login_ID'];
    $session ['firstname']=$getuser ['firstname'];
    
}
?>

