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
    <input type="hidden" name="login" value="<?php echo $login?>">

    <label for="email">Email :</label>
    <input type="text" id="email" name="email" value="<?php echo $email ?>" required>

    <a href="index.php?controller=user&action=updatePassword&login=<?php echo $login ?>">changer de mot de passe?</a>

    <input type="submit" name="updateProfil" value="modifier!">

</form>