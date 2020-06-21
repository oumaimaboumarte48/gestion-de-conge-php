<?php
include("include/header.php");
function emp_get($connect)
{
    $query = "SELECT * FROM demande_conge";
    $result = mysqli_query($connect, $query);
    if ($result != null) :
        return $result;
    else :
        return false;
    endif;
}
$result = emp_get($connect);
?>
<nav class="navbar">
  <ul class="navbar__ul">
    <li class="navbar__list" style="padding-left: 30px;"><a href="formule.php" id="demande">demandes de congé</a></li>
    <li class="navbar__list" style="padding-left: 40px;"><a href="voirconge.php">Voir un demande</a></li>
  </ul>
  <form action="index.php" method="POST">
    <button class="navbar__btn" type="submit" name="submit">Déconnecté</button>
  </form>
</nav>
</header>
<div class="container">
    <div class="container__row">
        <div class="container__col">
            <div class="container__card">
                <div class="container__body">
                        <?php if (isset($_GET['message']) && $_GET['message'] == 'envoyez') :
                            echo "<p id='msg'> Une demande de congé a été envoyée <p>";
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
                                    <td><?php echo $row['demande']; ?></td>
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