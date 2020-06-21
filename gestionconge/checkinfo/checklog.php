<?php
session_start();
include("./connect.php");

// check the information user
$username = isset($_POST['username']) ? $_POST['username'] : NULL;
$password = isset($_POST['password']) ? $_POST['password'] : NULL;

$query = mysqli_query($connect, " SELECT * FROM employe WHERE prenom = '$username' && matricule = '$password' ");
$rows = mysqli_num_rows($query);

if ($rows > 0) :
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    // $_SESSION['id_employe'] = $rows;

    header("Location:../formule.php");

    if ($rows) :
        $row = mysqli_fetch_assoc($rows);
        $result_id = $query;

        $id_employe = mysqli_fetch_assoc($result_id);
        $_SESSION['id_employe'] = $id_employe['id'];
    endif;

    else : echo "<script> alert('wrong username or password') </script>";
           header("Location:../index.php");

endif;



// check the information admin
 $useradmin = isset($_POST['username']) ? $_POST['username'] : NULL;
 $pass = isset($_POST['password']) ? $_POST['password'] : NULL;

$query = mysqli_query($connect, " SELECT id FROM employe WHERE prenom = '$useradmin' && id_service = 6 && matricule = '$pass' ");
$rows = mysqli_num_rows($query);

if ($rows > 0) :
    $_SESSION['username'] = $useradmin;

    header("Location:../admin.php");

endif;
