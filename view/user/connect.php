<div class="row justify-content-center">

		<div class="card" style="width: 18rem;">
		  <div class="card-body">
		   	<form action="" method="get" class="form-example">
         <input type="hidden" name="controller" value="user">
        <input type="hidden" name="action" value="connected">
			  <div class="form-group">
			    <label for="exampleInputLogin">Login</label>
			    <input type="text" name="login" class="form-control" id="exampleInputLogin" value="<?php echo htmlspecialchars($login)?>" required>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
			  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		  </div>
		</div>
		
	</div>
