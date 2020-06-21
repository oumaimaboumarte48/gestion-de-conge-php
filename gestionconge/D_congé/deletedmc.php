<?php
include("../checkinfo/connect.php");
function emp_delete($connect, $id)
{
    $query = "DELETE FROM demande_conge WHERE id = '$id'";
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
if (emp_delete($connect, $id)) :
    header("location:../d_congé.php?message=supprimer");
else :
    header("location:../d_congé.php?message=err");
endif;
