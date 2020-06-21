<?php
session_start();
include("./checkinfo/connect.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist\css\style.css">
    <title><?php echo "profil" ?></title>
</head>

<body style="background: #e8e4e1;">
    <!-- --header-- -->
    <header>
        <span class="profil">
            <h1 profil__user>Bonjour . <?php echo  $_SESSION['username']; ?></h1>
            <img src="dist/img/employée.jpg" alt="photo">
        </span>
        <hr>
        <!-- --nav_bar-- -->
        