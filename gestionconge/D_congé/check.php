<?php
include("../checkinfo/connect.php");
function redirect($page)
{
    header('location:' . $page);
}
$message = '';
function emp_accepter($connect, $id)
{
    $query = "UPDATE demande_conge SET demande = 'accepter' WHERE id = '$id' ";
    $result = mysqli_query($connect, $query);
    if ($result != null) :
        return $result;
    else :
        return false;
    endif;
}
$id = $_GET['id'];
if (emp_accepter($connect, $id)) :
    header("location:../d_congé.php?message=accepter");
    else :
        header("location:../d_congé.php?message=err");

endif;  