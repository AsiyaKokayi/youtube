<?php
include 'query.php';
include 'config.php';

function register(){
    $username= $_POST['username'];
    $password= md5($_POST['password']);
    $firstname= $_POST['firstname'];
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    $question3 = $_POST['question3'];
    $answer1 = $_POST['answer1'];
    $answer2 = $_POST['answer2'];
    $answer3 = $_POST['answer3'];

    
    
    query("Insert into profile (username, password, firstname) "
            . "values ('$username','$password','$firstname')");
    $Login_ID= $getLogin_ID['Login_ID'];
    query("Insert into securityquestions"
            . "(Login_ID, question1, question2, question3, "
            . "answer1, answer2, answer3)");
    
}

?>