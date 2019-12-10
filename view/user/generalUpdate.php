<form method="get" action="./index.php">

    <?php
    $false = "";
    $true = "";
    if ($admin == 1) {
        $true = "checked";
    } else {
        $false = "checked";
    }
    echo (Session::is_admin() ?
        '<label for="admin">Admin</label> :
            <p>
                <label>
                    <input type="radio" name="admin" value="1"' . $true . '/>
                    <span>True</span>
                </label>
            </p>
            <p>
                <label>
                    <input type="radio" name="admin" value="0"' . $false . '/>
                    <span>False</span>
                </label>
            </p>'
        : "") ?>

    <input type="hidden" name="action" value="updated">
    <input type="hidden" name="controller" value="user">
    <input type="hidden" name="id" value="<?php echo $id ?>">

    <label for="login">Longin :</label>
    <input type="text" id="login" name="login" value="<?php echo $login ?>" required>
    <label for="email">Email :</label>
    <input type="text" id="email" name="email" value="<?php echo $email ?>" required>

    <a href="http://localhost/Projet-S3-Recueil-d-experiences-videoludiques/index.php?controller=user&action=updatePassword&id=<?php echo $id ?>&login=<?php echo $login ?>">changer de mot de passe?</a><br>

    <input type="submit" name="updateProfil" value="modifier!">

</form>