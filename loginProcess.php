<?php
session_start();
include_once ('autoload.php');


if ((isset($_POST['username'])) && (isset($_POST['password']))) {
  
$username = $_POST['username'];
$password = $_POST['password'];
        $user = new UserRepository();
        $response = $user->findByDoubleId($username, $password);
        
        if($response){
          $_SESSION['user']=$username;
          header('location:acceuil.php');
        } else {
        $_SESSION['IncorrectFieldsError']="Username or password incorrect! Please try again ...";
        header('location:login.php');
        }

} else {
    $_SESSION['IncorrectFieldsError']="Username or password incorrect! Please try again ...";
    header('location:login.php');
}
