<?php
include("include/header.php");
include("include/navadmin.php");
include("checkinfo/checkadmin.php");
?>
<!-- --main-- -->
<section>

    <article class="content">
        <!-- --formule-- -->
        <p class="errors" >
            <?php
            if (!empty($errors)) :
                echo $errors;
            else:
                echo $message;
            endif;
            ?>
            <hr style="width: 23rem;">
        </p>
        <form class=" formule" action="" method="POST">
            <div class="parent section affiche">

                <div class="parent__children">
                    <!-- <label class="parent__label" for="nom">Nom*</label><br> -->
                    <input class="parent__input" type="text" name="nom" placeholder="Entrer le Nom" value="<?php echo isset($_POST['nom']) ? $_POST['nom'] : ''; ?>" ><br><br>
                </div>

                <div class="parent__children">
                    <!-- <label class="parent__label" for="prenom">prénom*</label><br> -->
                    <input class="parent__input" type="text" name="prenom" placeholder="Entrer le prenom " value="<?php echo isset($_POST['prenom']) ? $_POST['prenom'] : ''; ?>" ><br><br>
                </div>

                <div class="parent__children">
                    <!-- <label class="parent__label" for="CIN">CIN*</label><br> -->
                    <input class="parent__input" type="text" name="CIN" placeholder="N° CIN" value="<?php echo isset($_POST['CIN']) ? $_POST['CIN'] : ''; ?>" ><br><br>
                </div>


                <div class="parent__children">
                    <!-- <label class="parent__label" for="Tel"> Numéro de téléphone*</label><br> -->
                    <input class="parent__input" type="number" name="Tel" placeholder="Entrer Numéro de téléphone " value="<?php echo isset($_POST['Tel']) ? $_POST['Tel'] : ''; ?>" ><br><br>
                </div>

                <div class="parent__children">
                    <!-- <label class="parent__label" for="Tel"> Numéro de téléphone*</label><br> -->
                    <input class="parent__input" type="text" name="email" placeholder="Entrer votre email " value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" ><br><br>
                </div>

                <div class="parent__children">
                    <label class="parent__label" for="Date Embauche"> Date Embauche*</label><br>
                    <input class="parent__input" type="date" name="date_embauche" placeholder="Entrer date embauche " value="<?php echo isset($_POST['date_embauche']) ? $_POST['date_embauche'] : ''; ?>" ><br><br>
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
                    <input class="parent__input" type="number" name="matricule" placeholder="Entrer matricule " value="<?php echo isset($_POST['matricule']) ? $_POST['matricule'] : ''; ?>" ><br><br>
                </div>

                <div class="parent__children">
                    <label class="parent__label" for="Tel"> date de naissance*</label><br>
                    <input class="parent__input" type="date" name="date_de_naissance" placeholder="Entrer date de naissance " value="<?php echo isset($_POST['date_de_naissance']) ? $_POST['date_de_naissance'] : ''; ?>" ><br><br>
                </div>

                <div class="parent__div">
                    <button id="envoyés" class="parent__btn" type="submit" name="submit">Ajouté</button>
                </div>
            </div>
            </form>
    </article>
</section>
<script src="js/script.js">
</script>
</body>

</html>