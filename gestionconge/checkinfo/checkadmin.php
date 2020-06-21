<?php
function emp_insert($connect, $values = array())
{
    $params = "'" . implode("','", $values) . "'";
    $query = "INSERT INTO employe (nom,prenom,CIN,Tel,email,date_embauche,id_service,matricule,date_de_naissance)
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
//check formule employe
if (isset($_POST['submit'])) :

    // check the information
    $Nom = htmlentities($_POST['nom']);
    $Prénom = htmlentities($_POST['prenom']);
    $Cin = htmlentities($_POST['CIN']);
    $Télé = htmlentities($_POST['Tel']);
    $Email = htmlentities($_POST['email']);
    $Date_Embauche = htmlentities($_POST['date_embauche']);
    $Sérvice = htmlentities($_POST['Service']);
    $matricule = htmlentities($_POST['matricule']);
    $date_naissance = htmlentities($_POST['date_de_naissance']);
    if (empty($Nom)) :
        $errors = '*veuillez entrer le nom';
    elseif (empty($Prénom)) :
        $errors = '*veuillez entrer le Prénom';
    elseif (empty($Cin)) :
        $errors = '*veuillez entrer le CIN';
    elseif (empty($Télé)) :
        $errors = '*veuillez entrer numéro téléphone ';
    elseif (empty($Email)) :
        $errors = '*veuillez entrer votre email';
    elseif (empty($Date_Embauche)) :
        $errors = '*veuillez entrer Date Embauche';
    elseif (empty($Sérvice)) :
        $errors = '*veuillez entrer sérvice';
    elseif (empty($matricule)) :
        $errors = '*veuillez entrer matricule';
    elseif (empty($date_naissance)) :
        $errors = '*veuillez entrer date naissance';
    else :
        $values = array(
            'Nom' => $Nom,
            'prenom' => $Prénom,
            'CIN' => $Cin,
            'Tel' => $Télé,
            'email' => $Email,
            'sate_embauche' => $Date_Embauche,
            'id_service' => $Sérvice,
            'matricule' => $matricule,
            'date_de_naissance' => $date_naissance,
        );
        //submit information
        if (emp_insert($connect, $values) === true) :
            redirect('m_employe.php?message=success');
        else :
            $message = '*Veuillez réessayer';
        endif;
    endif;
endif;

