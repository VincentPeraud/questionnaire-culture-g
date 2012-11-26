<script type="text/javascript" src="media/js/questionnaire.js"></script>

<h1 class="span-19">Questionnaire</h1>
<?php if ($user->isAdmin()) : ?>
	<a class="btn span-4" href="<?php echo $this->generateUrl("results"); ?>"><i class="icon-eye-open"></i>&nbsp;&nbsp;Voir les résultats</a>
<?php endif; ?>
<div class="clear"></div>


<p class="lead">Merci de répondre à ce questionnaire concernant le module et les cours de culture générale</p>

<form action="<?php echo $this->generateUrl("questionnaire", "traitement"); ?>" method="post" id="questionnaire">
	<div class="control-group">
	<label for="question1">Avez-vous enrichi votre culture générale personnelle en assistant aux cours ?</label>
	<label class="radio inline" for="question1oui">
		<input type="radio" name="question1" id="question1oui" value="oui" <?php if ($reponses[1] == "oui") echo "checked";?> /> Oui
	</label>
	<label class="radio inline" for="question1non">
		<input type="radio" name="question1" id="question1non" value="non" <?php if ($reponses[1] == "non") echo "checked";?> /> Non
	</label>
	</div>

	<div class="control-group">
		<label for="question2">Si vous avez répondu non à la question précédente, expliquez brièvement pourquoi :</label>
		<textarea name="question2" id="question2" rows="5"><?php echo $reponses[2];?></textarea>
	</div>

	<div class="control-group">
		<label for="question3">Quelle note donneriez-vous à ces cours de culture générale ?</label>
		<?php for ($i = 0 ; $i <= 10 ; ++$i) : ?>
			<label class="radio inline" for="question3_<?php echo $i; ?>">
				<input type="radio" name="question3" id="question3_<?php echo $i; ?>" value="<?php echo $i; ?>" <?php if ($reponses[3] != "" && $reponses[3] == $i) echo "checked";?> /> <?php echo $i; ?>
			</label>
		<?php endfor; ?>
	</div>

	<div class="control-group">
		<label for="question4">Que pensez-vous de la manière dont le cours est présenté, de la manière dont il se déroule ?</label>
		<textarea name="question4" id="question4" rows="5"><?php echo $reponses[4];?></textarea>
	</div>

	<div class="control-group">
		<label for="question5">Avez-vous des suggestions pour améliorer le cours ? De quels autres sujets aimeriez-vous débattre ?</label>
		<textarea name="question5" id="question5" rows="5"><?php echo $reponses[5];?></textarea>
	</div>

	<div class="control-group">
		<label for="question6">Autres remarques :</label>
		<textarea name="question6" id="question6" rows="5"><?php echo $reponses[6];?></textarea>
	</div>

	<input type="submit" class="btn btn-primary" value="Valider mes réponses" />
</form>