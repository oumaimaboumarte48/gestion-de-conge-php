<?php
include("../checkinfo/connect.php");
function emp_refuse($connect, $id)
{
    $query = "UPDATE demande_conge SET demande = 'refuse' WHERE id = '$id' ";
    $result = mysqli_query($connect, $query);
    if ($result != null) :
        return $result;
    else :
        return false;
    endif;
}
function redirect($page)
{
    header('location:' . $page);
}
$id = $_GET['id'];
if (emp_refuse($connect, $id)) :
    header("location:../d_congé.php?message=refused");
else :
    header("location:../d_congé.php?message=err");
endif;
