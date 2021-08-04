<!-- View of account area page : to change the secret answer-->

<?php ob_start(); ?>

    <div class="infos_perso">
        <h2>
            Ma récupération de mot de passe
        </h2>
        <p>
            Vous trouverez ci-dessous un formulaire vous permettant de changer votre question secrète. Celle-ci est utilisée pour changer de mot de passe lorsque vous oubliez ce dernier.
        </p>
        <div class="formulaire_infos_perso">
            <form action="index.php?controller=account#secret_answer" method="post">
                    <p>
                        La question que vous avez choisi lors de votre inscription est : <strong><?php echo isset($_POST['question'])? $_POST['question'] : $_SESSION['question'];?></strong>
                    </p>
                    <div class="question">
                    <label for="question"><strong>Choisissez une question secrète :  </strong></label> 
                        <select name="question" id="question" required>
                            <option value="" >Choisissez dans la liste</option>
                            <option value="Quelle est votre ville de naissance?" >Quelle est votre ville de naissance?</option>
                            <option value="Quel est votre chanteur/groupe préféré?">Quel est votre chanteur/groupe préféré?</option>
                            <option value="Dans quel pays aimeriez-vous voyager?">Dans quel pays aimeriez-vous voyager?</option>
                            <option value="Quelle est votre boisson préférée?">Quelle est votre boisson préférée?</option>
                        </select>
                    </div>
                    <br>
                    <div class="reponse">
                        <label for="reponse"><strong>Votre réponse actuelle:  </strong></label> 
                        <br>
                        <input type="text" id="reponse" name="reponse" value="<?php echo isset($_POST['reponse'])? htmlspecialchars($_POST['reponse']) : htmlspecialchars($_SESSION['answer']);?>" required>
                    </div>
                    <br>
                <input type="submit" value="Modifier" class="button_submit">
            </form>
        </div>
        <?php $alert = updateSecretQuestion(); ?>
        <?= (isset($alert)) ? $alert : ''; ?>
    </div>
    <div id="secret_answer" class="separator"></div>

    <?php $content3 = ob_get_clean(); ?>
