<?php
// include("./function.php");
function dmc_insert($connect, $values = array())
{
    $params = "'" . implode("','", $values) . "'";
    $query = "INSERT INTO demande_conge (date_début,date_fin,durée,id_employe,id_type_conge,id_service,demande)
              VALUES (" . $params . ")";
    // die($query);
    if (mysqli_query($connect, $query)) :
        return true;
    else :
        return false;
    endif;
}
function redirect($page){
    header('location:' .$page);
}
$errors = [];
$message = "";
// check formule domande conge
if (isset($_POST['ajouter'])) :
    global $connect;
    // check the information
    $date_début = htmlentities($_POST['date_début']);
    $date_fin = htmlentities($_POST['date_fin']);
    $durée = htmlentities($_POST['durée']);
    $id = $_SESSION['id_employe'];
    $id_typeConge = htmlentities($_POST['type_conge']);
    $id_sérvice = htmlentities($_POST['Service']);
    $demande = 'attendre';
    if (empty($date_début)) :
        $errors = '*veuillez entrer date début';
    elseif (empty($date_fin)) :
        $errors = '*veuillez entrer date fin';
    elseif (empty($durée)) :
        $errors = '*veuillez entrer la durée';
    elseif (empty($id_typeConge)) :
        $errors = '*veuillez entrer le type congé';
    elseif (empty($id_sérvice)) :
        $errors = '*veuillez entrer le servicé';
    else :
        $values = array(
            'date_début' => $date_début,
            'date_fin' => $date_fin,
            'durée' => $durée,
            'id_employe' => $id,
            'id_type_conge' => $id_typeConge,
            'id_service' => $id_sérvice,
            'demande' => $demande,
        );
        //submit information
        if (dmc_insert($connect, $values) === true) :
        //    $message = '*le demande congé envoyez';
           redirect('voirconge.php?message=envoyez');
            //  echo "<script> alert ('le demande congé envoyez')</script>";
        else :
           $message = '*Une demande de congé a été refuse';
            // echo "<script> alert ('le demande conge refuse')</script>";
        endif;
    endif;
endif;





