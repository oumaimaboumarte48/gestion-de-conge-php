<?php
include("../checkinfo/connect.php");
// function emp_insert($connect, $values = array())

function get_imp_by_id($connect, $id)
{
    $query = "SELECT * FROM employe WHERE id = '$id' ";
    $result = mysqli_query($connect, $query);
    if ($result != null) :
        return $result;
    else :
        return false;
    endif;
}

function emp_update($connect, $id, $values = array())
{
    $values = implode(", ", $values);
    $values = explode(", ", $values);
    // die($values[7]);
    $query = "UPDATE employe SET nom = '$values[0]', prenom = '$values[1]',CIN = '$values[2]', Tel = '$values[3]',
               email = '$values[4]', date_embauche = '$values[5]',id_service = '$values[6]', matricule = '$values[7]',
               date_de_naissance = '$values[8]' WHERE id = $id ";
    if (mysqli_query($connect, $query)) :
        return true;
    else :
        return false;
    endif;
}
function redirect($page)
{
    header('location:' . $page);
}
$errors = [];
$message = "";
$id = $_GET['id'];
$result = get_imp_by_id($connect, $id);
$row = $result->fetch_assoc();
// die($row['nom']);
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
        if (emp_update($connect, $id, $values) === true) :
            redirect('m_employe.php?message=updated');
        // $message = '*le demande congé envoyez';
        else :
            $message = '*le demande congé refuse';
        endif;
    endif;
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Brief_Demande-de-Conge/dist/css/style.css">
    <title><?php echo "Modifé" ?></title>
</head>

<body style="background: #e8e4e1;">
    <!-- --main-- -->
    <section>

        <article class="content">
            <!-- --formule-- -->
            <p class="errors">
                <?php
                if (!empty($errors)) :
                    echo $errors;
                else :
                    echo $message;
                endif;
                ?>
                <hr style="width: 23rem;">
            </p>
            <form class=" formule" action="update.php?id=<? echo $row['id']; ?>" method="POST">
                <div class="parent section affiche">

                    <div class="parent__children">
                        <!-- <label class="parent__label" for="nom">Nom*</label><br> -->
                        <input class="parent__input" type="text" name="nom" placeholder="Entrer le Nom" value="<?php echo isset($row['nom']) ? $row['nom'] : ''; ?>"><br><br>
                    </div>

                    <div class="parent__children">
                        <!-- <label class="parent__label" for="prenom">prénom*</label><br> -->
                        <input class="parent__input" type="text" name="prenom" placeholder="Entrer le prenom " value="<?php echo isset($row['prenom']) ? $row['prenom'] : ''; ?>"><br><br>
                    </div>

                    <div class="parent__children">
                        <!-- <label class="parent__label" for="CIN">CIN*</label><br> -->
                        <input class="parent__input" type="text" name="CIN" placeholder="N° CIN" value="<?php echo isset($row['CIN']) ? $row['CIN'] : ''; ?>"><br><br>
                    </div>


                    <div class="parent__children">
                        <!-- <label class="parent__label" for="Tel"> Numéro de téléphone*</label><br> -->
                        <input class="parent__input" type="number" name="Tel" placeholder="Entrer Numéro de téléphone " value="<?php echo isset($row['Tel']) ? $row['Tel'] : ''; ?>"><br><br>
                    </div>

                    <div class="parent__children">
                        <!-- <label class="parent__label" for="Tel"> Numéro de téléphone*</label><br> -->
                        <input class="parent__input" type="text" name="email" placeholder="Entrer votre email " value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>"><br><br>
                    </div>

                    <div class="parent__children">
                        <label class="parent__label" for="Date Embauche"> Date Embauche*</label><br>
                        <input class="parent__input" type="date" name="date_embauche" placeholder="Entrer date embauche " value="<?php echo isset($row['date_embauche']) ? $rowT['date_embauche'] : ''; ?>"><br><br>
                    </div>
                    <div class="parent__children">
                        <label class="parent__label" for="date embauche">Service*</label><br>
                        <select style="width: 119%;margin-bottom: 21px;" class="parent__input" name="Service">
                            <?php
                            $query_service = "SELECT * FROM Service";
                            $result = mysqli_query($connect, $query_service);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <option value="<?= $row['id']; ?>"><?= $row["Service"]; ?></option>
                            <?php
                                }
                            } else {
                                echo "0 result";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="parent__children">
                        <!-- <label class="parent__label" for="Tel"> Numéro de téléphone*</label><br> -->
                        <input class="parent__input" type="number" name="matricule" placeholder="Entrer matricule " value="<?php echo isset($row['matricule']) ? $row['matricule'] : ''; ?>"><br><br>
                    </div>

                    <div class="parent__children">
                        <label class="parent__label" for="Tel"> date de naissance*</label><br>
                        <input class="parent__input" type="date" name="date_de_naissance" placeholder="Entrer date de naissance " value="<?php echo isset($row['date_de_naissance']) ? $row['date_de_naissance'] : ''; ?>"><br><br>
                    </div>

                    <div class="parent__div">
                        <button id="envoyés" class="parent__btn" type="submit" name="submit">Ajustement des employés</button>
                    </div>
                </div>
            </form>
        </article>
    </section>
    <script src="js/script.js">
    </script>
</body>

</html>