<div class="row justify-content-center">

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <form method="get" action="./index.php">
            <input type="hidden" name="action" value="updated">
    <input type="hidden" name="controller" value="user">
    <input type="hidden" name="login" value="<?php echo $login ?>">
                <div class="form-group">
                    <label for="InputEmail">Email address</label>
                    <input type="email" name="email" class="form-control" id="InputEmail" value="<?php echo $email ?>" aria-describedby="emailHelp" required>
                </div>
                <a href="index.php?controller=user&action=updatePassword&login=<?php echo $login ?>">changer de mot de passe?</a>
                <button type="submit" class="btn btn-primary">Change</button>
            </form>
        </div>
    </div>

</div>