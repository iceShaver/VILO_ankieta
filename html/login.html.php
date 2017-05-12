<?php $title = 'Zaloguj się'; include $_SERVER['DOCUMENT_ROOT'] . '/html/inc/header.html.inc.php'; ?>
	<div class="container content">
		<div class="loginform">
			<form name="loginform" id="login" action="" method="post">
				<fieldset align="center">
					<legend>Zaloguj się</legend>
					<br>
                    <?php
																				
if (isset ( $GLOBALS ['loginError'] )) { echo "Niepoprawne login lub hasło";
																				}
																				?>
																				<br>
                    <label for="name">Login: </label><input type="text"
						name="name" id="name"> <br> <label for="password">Hasło: </label><input
						type="password" name="password" id="password"> <br> <input
						type="hidden" name="action" value="login"> <br> <input
						type="submit" value="Zaloguj">
				</fieldset>
			</form>
		</div>
	</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/html/inc/footer.html.inc.php'; ?>



