<div class="row justify-content-center">
	<div class="card" style="width: 30rem;">
		<div class="card-body">
			<form method="get" action="./index.php">

				<input type='hidden' name='action' value='created'>
				<input type='hidden' name='controller' value='jeu'>				
				<div class="form-group">
					<label for="InputTitle">Titre</label>
					<input type="text" name="titre" class="form-control" id="InputTitle" required>
					<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>