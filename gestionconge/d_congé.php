<?php
include("include/header.php");
include("include/navadmin.php");
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
$result = emp_getdmc($connect);
?>
<div class="container">
    <div class="container__row">
        <div class="container__col">
            <div class="container__card">
                <div class="container__body">
                        <?php if (isset($_GET['message']) && $_GET['message']=='supprimer') :
                            echo "<p id='msg'>le demande congé a été supprimé avec succès<p>";
                            elseif (isset($_GET['message']) && $_GET['message'] == 'refused') :
                                echo "<p id='msg'>le demande congé a été refuse avec succès<p>";
                                elseif (isset($_GET['message']) && $_GET['message'] == 'accepter') :
                                    echo "<p id='msg'>La demande de congé a été acceptée<p>";
                                    elseif (isset($_GET['message']) && $_GET['message'] == 'err') :
                                        echo "<p id='msg'>Veuillez réessayer<p>";
                        endif;
                        ?>
                    <table class="container__table">
                        <thead>
                            <tr class="container__tr">
                                <th class="container__th">Date début</th>
                                <th class="container__th">DAte fin</th>
                                <th class="container__th">Durée</th>
                                <th class="container__th">ID Employe</th>
                                <th class="container__th">ID Type Congé</th>
                                <th class="container__th">ID Sérvice</th>
                                <th class="container__th">status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) :
                            ?>
                                <tr>
                                    <td><?php echo $row['date_début']; ?></td>
                                    <td><?php echo $row['date_fin']; ?></td>
                                    <td><?php echo $row['durée']; ?></td>
                                    <td><?php echo $row['id_employe']; ?></td>
                                    <td><?php echo $row['id_type_conge']; ?></td>
                                    <td><?php echo $row['id_service']; ?></td>
                                    <td><a href="D_congé/deletedmc.php?id=<?php echo $row['id']; ?>" title="supprimer"><img src="dist/img/ikondelet.svg" style="width: 20px;"></a></td>
                                    <td><a href="D_congé/refuse.php?id=<?php echo $row['id']; ?>" title="refuse"><img src="dist/img/refuse.svg" style="width: 20px;"></a></td>
                                    <td><a href="D_congé/check.php?id=<?php echo $row['id']; ?>" title="accepter"><img src="dist/img/check.svg" style="width: 20px;"></a></td>
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