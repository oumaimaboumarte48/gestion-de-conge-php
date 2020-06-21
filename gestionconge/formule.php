<?php
include("include/header.php");
include("checkinfo/checkformule.php");
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
<!-- --main-- -->
<section>

  <article class="content">
    <p class="errors">
      <?php
      if (!empty($errors)) :
        echo $errors;
      else :
        echo $message;
      endif;
      ?>
    </p>
    <!-- --formule-- -->
    <form class="formule" action="" method="POST">
      <div class="parent section  ">

        <div class="parent__children">
          <label class="parent__label" for="date_début">Date début*</label><br>
          <input class="parent__input" type="date" name="date_début" placeholder="date_début" value="<?php echo isset($_POST['date_début']) ? $_POST['date_début'] : ''; ?>">
        </div>

        <div class="parent__children">
          <label class="parent__label" for="date_fin">Date fin*</label><br>
          <input class="parent__input" type="date" name="date_fin" placeholder="date_fin" value="<?php echo isset($_POST['date_fin']) ? $_POST['date_fin'] : ''; ?>">
        </div>

        <div class="parent__children">
          <label class="parent__label" for="durée">durée*</label><br>
          <input class="parent__input" type="number" name="durée" placeholder="Entrer le durée" value="<?php echo isset($_POST['durée']) ? $_POST['durée'] : ''; ?>">
        </div>

        <div class="parent__children">
          <label class="parent__label" for="durée">N° employés</label><br>
          <input class="parent__input" type="number" name="id_employe" placeholder=<?= $_SESSION['id_employe']; ?> disabled><br><br>
        </div>

        <div class="parent__children">
          <label class="parent__label" for="service">sérvice*</label><br>
          <select style="width:118%;" class="parent__input" name="Service">
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
          <label class="parent__label" for="type_conge">type de congé*</label><br>
          <select style="width:118%;" class="parent__input" name="type_conge">
            <?php
            $query_type = "SELECT * FROM type_conge";
            $rslt = mysqli_query($connect, $query_type);
            if (mysqli_num_rows($rslt) > 0) {
              while ($row = mysqli_fetch_assoc($rslt)) {
            ?>
                <option value="<?= $row['id']; ?>"><?= $row["type"]; ?></option>
            <?php
              }
            } else {
              echo "0 result";
            }
            ?>
          </select>
        </div>

        <div class="parent__div">
          <button id="envoyés" class="parent__btn" type="submit" name="ajouter">Envoie la demande</button>
        </div>

      </div>
    </form>
    <footer>

    </footer>
  </article>

</section>



<script src="js/script.js"></script>
</body>

</html>