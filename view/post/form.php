<div class="row justify-content-center">

	<div class="card" style="width: 30rem;">
		<div class="card-body">
			<form method="get" action="./index.php">
				<input type="hidden" name="action" value="<?php echo $action ?>">
				<?php if ($id != "") {
					echo "<input type=\"hidden\" name=\"id\" value = $id >";
				}
				if ($date_publication != "") {
					echo "<input type=\"hidden\" name=\"date_publication\" value = $date_publication >";
				} ?>
				<input type="hidden" name="auteur_id" value=<?php echo $auteur_id ?>>
				<input type="hidden" name="emotion_id" value=<?php echo $emotion_id ?>>
				<input type="hidden" name="nbUpvote" value=<?php echo $nbUpvote ?>>
				<input type="hidden" name="jeu_id" value="<?php echo $jeu_id ?>">

				<div class="form-group">
					<label for="InputTitle">Titre</label>
					<input type="text" name="titre" class="form-control" id="InputTitle" value="<?php echo $titre ?>" aria-describedby="emailHelp" $option>
					<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				</div>

				<div class="form-group">
					<label for="gametitle">Jeu</label>
					<input type="text" name="jeu_titre" class="form-control" id="gametitle" autocomplete="off" value="<?php echo ($jeu == false ? " " : $jeu->getTitre()) ?>" aria-describedby="emailHelp" $option>
					<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
					<div class="card position-absolute px-2" id="search-result">
					</div>
				</div>

				<div class="form-group">
					<label for="Textarea">Description</label>
					<textarea class="form-control" name="contenu" id="Textarea" rows="3" required><?php echo $contenu ?></textarea>
					<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				</div>

				<div class="form-group">
					<label>Tristesse</label>
					<input type="range" list="tickmarks" class="PostRange bg-secondary"  name="tristesse" min=0 max=100 value="<?php echo ($emotion == false ? "0" : $emotion->getTristesse()) ?>" required>
					<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				</div>

				<div class="form-group">
					<label>Joie</label>
					<input type="range" list="tickmarks" class="PostRange bg-success" name="joie" min=0 max=100 value="<?php echo ($emotion == false ? "0" : $emotion->getJoie()) ?>" required>
					<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				</div>

				<div class="form-group">
					<label>Colère</label>
					<input type="range" list="tickmarks" class="PostRange bg-danger" name="colere" min=0 max=100 value="<?php echo ($emotion == false ? "0" : $emotion->getColere()) ?>" required>
					<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				</div>

				<div class="form-group">
					<label>Peur</label>
					<input type="range" list="tickmarks" class="PostRange bg-warning" name="peur" min=0 max=100 value="<?php echo ($emotion == false ? "0" : $emotion->getPeur()) ?>" required>
					<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				</div>

				<div class="form-group">
					<label>Surprise</label>
					<input type="range" list="tickmarks" class="PostRange bg-info" name="surprise" min=0 max=100 value="<?php echo ($emotion == false ? "0" : $emotion->getSurprise()) ?>" required>
					<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				</div>

				<div class="form-group">
					<label>Dégoût</label>
					<input type="range" list="tickmarks" class="PostRange bg-dark" name="degout" min=0 max=100 value="<?php echo ($emotion == false ? "0" : $emotion->getDegout()) ?>" required>
					<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				</div>

				<datalist id="tickmarks">
					<option value="0">
					<option value="10">
					<option value="20">
					<option value="30">
					<option value="40">
					<option value="50">
					<option value="60">
					<option value="70">
					<option value="80">
					<option value="90">
					<option value="100">
				</datalist>

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>

</div>