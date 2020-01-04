<!-- <form method="get" action="./index.php">

    <input type="hidden" name="action" value="updatedPassword">
    <input type="hidden" name="controller" value="user">
    <input type="hidden" name="login" value="<?php echo $login ?>">

    <label for="oldpassword">mot de passe actuelle :</label>
    <input type="password" id="oldpassword" name="oldpassword" required>
    <label for="password">Password :</label>
    <input type="password" id="password" name="password" required>
    <label for="password2">Confirm password :</label>
    <input type="password" id="password2" name="password2" required>

    <input type="submit" name="updatePassword" value="change">

</form> -->

<div class="row justify-content-center">

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <form>
                <input type="hidden" name="action" value="updatedPassword">
                <input type="hidden" name="controller" value="user">
                <input type="hidden" name="login" value="<?php echo $login ?>">
                <div class="form-group">
                    <label for="InputoldPassword">Mot de passe actuel</label>
                    <input type="password" name="oldpassword" class="form-control" id="InputoldPassword" required>
                </div>
                <div class="form-group">
                    <label for="InputnewPassword">Nouveau mot de passe</label>
                    <input type="password" name="password" class="form-control" id="InputnewPassword" required>
                </div>
                <div class="form-group">
                    <label for="InputconfPassword">Confimer mot de passe</label>
                    <input type="password" name="password2" class="form-control" id="InputconfPassword" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>