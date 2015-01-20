<?php
session_start();
unset($_SESSION['notification']);

$_SESSION['notification']='test';

header('location: test1.php');
?>