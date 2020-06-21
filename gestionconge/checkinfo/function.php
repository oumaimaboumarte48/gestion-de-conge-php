<!-- <?php
function redirect($page){
    header('location:' .$page);
}
// FUNCTION SELECT ALL  EMPLOYEES IN TABLE 
function emp_get($connect)
{
    $query = "SELECT * FROM employe";
    $result = mysqli_query($connect, $query);
    if ($result != null) :
        return $result;
    else :
        return false;
    endif;
}
// FUNCTION INSERT  ALL  EMPLOYEES IN TABLE 
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
// FUNCTION INSERT ALL THE REQUEST LEAVE
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
// FUNCTION DELETE
function emp_delete($connect, $id){
    $query = "DELETE FROM employe WHERE id = '$id'";
    $result = mysqli_query($connect, $query);
    if ($result != null) :
        return $result;
    else :
        return false;
    endif;
}
// FUNCTION UPDATE
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
// FUNCTION REFUSE
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
// FUNCTION SELECT ALL THE REQUEST LEAVE
function emp_getdmc($connect)
{
    $query = "SELECT * FROM demande_conge";
    $result = mysqli_query($connect, $query);
    if ($result != null) :
        return $result;
    else :
        return false;
    endif;
}