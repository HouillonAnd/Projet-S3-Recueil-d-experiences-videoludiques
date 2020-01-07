<div class="row justify-content-center">

	<div class="card" style="width: 18rem;">
		<div class="card-body">
			<form method="get" action="./index.php">
				<input type="hidden" name="action" value="created">
				<input type="hidden" name="controller" value="user">
				<div class="form-group">
					<label for="InputLogin">Login</label>
					<input type="text" name="login" class="form-control" id="InputLogin" aria-describedby="emailHelp" value="<?php echo $login ?>" required>
				</div>
				<div class="form-group">
					<label for="InputEmail">Email</label>
					<input type="email" name="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" value="<?php echo $email ?>" required>
				</div>
				<div class="form-group">
					<label for="InputEmail2">Email confirmation</label>
					<input type="email" name="email2" class="form-control" id="InputEmail2" aria-describedby="emailHelp" value="<?php echo $email2 ?>" required>
				</div>
				<div class="form-group">
					<label for="InputPassword">Mot de passe</label>
					<input type="password" name="password" class="form-control" id="InputPassword" required>
				</div>
				<div class="form-group">
					<label for="InputEmail2">Confirmer mot de passe</label>
					<input type="password" name="password2" class="form-control" id="InputEmail2" required>
				</div>
				<button type="submit" class="btn btn-primary">Envoyer</button>
			</form>
		</div>
	</div>

</div>