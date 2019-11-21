<form method="get" action="./index.php"> 
<input type="hidden" name="action" value="created">
<input type="hidden" name="controller" value="user">
					<table>
						<tr>
							<td align="right">
								<label for="login">Login :  </label>
							</td>
							<td align="right">
								<input type="text" placeholder="Votre login" id="login" name="login"/>
							</td>
						</tr>
						<tr>
							<td align="right">
								<label for="email">Email :  </label>
							</td>
							<td align="right">
								<input type="email" placeholder="Votre email" id="email" name="email"/>
							</td>
						</tr>
						<tr>
							<td align="right">
								<label for="email2">Confirmation du Email :  </label>
							</td>
							<td align="right">
								<input type="email" placeholder="Confirmez votre email" id="email2" name="email2"/>
							</td>
						</tr>
						<tr>
							<td align="right">
								<label for="password">Mot de Passe :  </label>
							</td>
							<td align="right">
								<input type="password" placeholder="Votre Mot de Passe" id="password" name="password"/>
							</td>
						</tr>
						<tr>
		                  	<td align="right">
		                    	<label for="password2">Confirmation du mot de passe :</label>
			                </td>
			                <td>
		                     <input type="password" placeholder="Confirmez votre Mot de Passe" id="password2" name="password2" />
		                    </td>
		                </tr>
		                <tr>
                  			<td></td>
                  			<td align="center">
                     		<br>
                     		<input type="submit" name="forminscription" value="Je m'inscris" />
                 			</td>
              			</tr>
					</table>
				</form>