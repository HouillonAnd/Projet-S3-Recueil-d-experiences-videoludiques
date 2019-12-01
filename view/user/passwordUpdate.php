<form method="get" action="./index.php">

<input type="hidden" name="action" value="updatedPassword">
<input type="hidden" name="controller" value="user">
<input type="hidden" name="id" value="<?php echo $id?>">
<input type="hidden" name="login" value="<?php echo $login?>">

<label for="oldpassword">mot de passe actuelle :</label>
<input type="password" id="oldpassword" name="oldpassword" required>
<label for="password">Email :</label>
<input type="password" id="password" name="password" required>
<label for="password2">Email :</label>
<input type="password" id="password2" name="password2" required>

<input type="submit" name="updatePassword" value="change">

</form>