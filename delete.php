<?php

session_start();
include_once 'autoload.php';

$cin=$_GET['cin'];

$persons=new PersonRepository();

$persons->deleteByCin($cin);
header('location:acceuil.php');

?>