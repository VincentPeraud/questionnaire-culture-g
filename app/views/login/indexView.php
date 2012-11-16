<h2>Connexion</h2>

<form action="<?php echo $this->generateUrl("login"); ?>" method="post" class="form-horizontal">

	<?php if ($auth_failed) : ?>
		<div class="alert alert-error">
	  		<strong>Erreur : </strong>accès refusé.
		</div>
	<?php endif; ?>

    <div class="control-group">
	    <label class="control-label" for="login">Login</label>
	    <div class="controls">
		    <input type="text" id="login" name="login" value="" />
	   </div>
	</div>

	<div class="control-group">
	    <label class="control-label" for="password">Mot de passe (PPP)</label>
    	<div class="controls">
		    <input type="password" id="password" name="password" />
		</div>
	</div>

	<div class="prepend-5 prepend-top">
    	<input class="span-3 btn btn-primary" type="submit" id="_submit" name="_submit" value="Connexion" />
	</div>

</form>