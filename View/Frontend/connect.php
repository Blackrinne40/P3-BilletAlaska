<?php ob_start(); ?>

	<h2 class="connect">Connexion</h2>

	<form method="post" action="#">
		<div class="form-group">
                <label for='login'>Login </label>
                <input type="text" name="login" id="login" class="form-control" /><br/>
            </div>
            <div class="form-group">
                <label for='password'>Mot de passe </label>
                <input type="password" name="password" id="password" class="form-control"></input><br/>
            </div>
            <button class="btn btn-primary" type='submit'>Envoyer</button>

	</form>

<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>