<h1>Questionnaire</h1>

<p class="lead">Merci de répondre à ce questionnaire concernant le module et les cours de culture générale</p>

<form action="<?php echo $this->generateUrl("questionnaire", "traitement"); ?>" method="post">
	<div class="control-group">
	<label for="question1">Avez-vous enrichi votre culture générale personnelle en assistant aux cours de culture générale ?</label>
	<label class="radio inline" for="question1oui">
		<input type="radio" name="question1" id="question1oui" value="oui" /> Oui
	</label>
	<label class="radio inline" for="question1non">
		<input type="radio" name="question1" id="question1non" value="non" /> Non
	</label>
	</div>

	<div class="control-group">
		<label for="question2">Si vous avez répondu non à la question précédente, expliquez brièvement pourquoi :</label>
		<textarea name="question2" id="question2" rows="5"></textarea>
	</div>

	<div class="control-group">
		<label for="question3">Quelle note donneriez-vous à ces cours de culture générale ?</label>
		<?php for ($i = 0 ; $i <= 10 ; ++$i) : ?>
			<label class="radio inline" for="question1oui">
				<input type="radio" name="question3" id="question1oui" value="<?php echo $i; ?>" /> <?php echo $i; ?>
			</label>
		<?php endfor; ?>
	</div>

	<div class="control-group">
		<label for="question4">Que pensez-vous de la manière dont le cours est présenté, de la manière dont il se déroule ?</label>
		<textarea name="question4" id="question4" rows="5"></textarea>
	</div>

	<div class="control-group">
		<label for="question5">Avez-vous des suggestions pour améliorer le cours ?</label>
		<textarea name="question5" id="question5" rows="5"></textarea>
	</div>

	<div class="control-group">
		<label for="question6">Autres remarques :</label>
		<textarea name="question6" id="question6" rows="5"></textarea>
	</div>

	<input type="submit" class="btn btn-primary" value="Valider mes réponses" />
</form>