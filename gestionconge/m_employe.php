<?php
include("include/header.php");
include("include/navadmin.php");
// include("checkinfo/function.php");
function emp_get($connect)
{
    $query = "SELECT * FROM employe";
    $rslt = mysqli_query($connect, $query);
    if ($rslt != null) :
        return $rslt;
    else :
        return false;
    endif;
}
$rslt = emp_get($connect);
// die(print_r($result));
?>

<div class="container">
    <div class="container__row">
        <div class="container__col">
            <div class="container__card">
                <div class="container__body">
                    <?php if (isset($_GET['message']) && $_GET['message'] == 'success') :
                        echo "<p id='msg'>employé ajouté avec succes<p>";
                    elseif (isset($_GET['message']) && $_GET['message'] == 'updated') :
                        echo "<p id='msg'>employé modifé avec succes<p>";
                    elseif (isset($_GET['message']) && $_GET['message'] == 'deleted') :
                        echo "<p id='msg'>employé supprimé avec succes<p>";
                    elseif (isset($_GET['message']) && $_GET['message'] == 'err') :
                        echo "<p id='msg'>Veuillez réessayer<p>";
                    endif;
                    ?>
                    <table class="container__table">
                        <thead>
                            <tr class="container__tr">
                                <th class="container__th">Nom</th>
                                <th class="container__th">Prénom</th>
                                <th class="container__th">CIN</th>
                                <th class="container__th">Téléphone</th>
                                <th class="container__th">Email</th>
                                <th class="container__th">Date Embauche</th>
                                <th class="container__th">Sérvice</th>
                                <th class="container__th">Matricule</th>
                                <th class="container__th">Date De Naissance</th>
                                <th class="container__th">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $rslt->fetch_assoc()) :
                            ?>
                                <tr>
                                    <td id="info"><?php echo $row['nom']; ?></td>
                                    <td><?php echo $row['prenom']; ?></td>
                                    <td><?php echo $row['CIN']; ?></td>
                                    <td><?php echo $row['Tel']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['date_embauche']; ?></td>
                                    <td><?php echo $row['id_service']; ?></td>
                                    <td><?php echo $row['matricule']; ?></td>
                                    <td><?php echo $row['date_de_naissance']; ?></td>
                                    <td><a href="D_congé/deletemp.php?id=<?php echo $row['id']; ?>" title="delete"><img src="dist/img/ikondelet.svg" style="width: 20px;"></a></td>
                                    <td><a href="D_congé/update.php?id=<?php echo $row['id']; ?>" title="update"><img src="dist/img/iconupdate.svg" style="width: 20px;"></a></td>
                                </tr>
                            <?php
                            endwhile;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>