<script type="text/javascript" src="libs/highcharts/js/highcharts.js"></script>
<script type="text/javascript" src="media/js/results.js"></script>

<h1 class="span-13">Résultats</h1>
<a class="btn span-5" href="<?php echo $this->generateUrl("questionnaire"); ?>"><i class="icon-eye-open"></i>&nbsp;&nbsp;Voir le questionnaire</a>
<a class="span-4 last btn btn-default" href="<?php echo $this->generateUrl("login", "logout"); ?>"><i class="icon-off"></i> Déconnexion</a>
<div class="clear"></div>

<br>

<div class="hide" id="oui"><?php echo $q1["oui"];?></div>
<div class="hide" id="non"><?php echo $q1["non"];?></div>

<div class="box span-12">
	<div class="box-header">
		<h2>
			<i class="icon-signal"></i>
			<span class="break"></span>
			Culture générale enrichie ?
		</h2>
	</div>
	<div class="box-content">
		<div id="chart_oui_non"></div>
	</div>
</div>
<div class="box span-12 last">
	<div class="box-header">
		<h2>
			<i class="icon-signal"></i>
			<span class="break"></span>
			Note sur 10
		</h2>
	</div>
	<div class="box-content">
		<p class="lead">Moyenne : <?php echo $moy; ?></p>
	</div>
</div>
<div class="box span-12 last">
	<div class="box-header">
		<h2>
			<i class="icon-signal"></i>
			<span class="break"></span>
			Participation
		</h2>
	</div>
	<div class="box-content">
		<p class="lead"><?php echo $answer . "/" . $total . " (" . $participation . " %)";?></p>
	</div>
</div>

<div class="clear"></div>

<div class="box span-24 last">
	<div class="box-header">
		<h2>
			<i class="icon-question-sign"></i>
			<span class="break"></span>
			Si vous avez répondu non à la première question, expliquez brièvement pourquoi
		</h2>
	</div>
	<div class="box-content">
		<?php foreach ($reponses as $reponse) : ?>
			<?php if ($reponse->getQuestion()->getNumero() == 2 && $reponse != "") : ?>
				<blockquote>
					<p><?php echo $reponse; ?></p>
					<?php if ($user->isAdmin()) : ?>
						<small><?php echo $reponse->getUser()->getLogin() ?></small>
					<?php endif; ?>
				</blockquote>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>

<div class="box span-24 last">
	<div class="box-header">
		<h2>
			<i class="icon-question-sign"></i>
			<span class="break"></span>
			Que pensez-vous de la manière dont le cours est présenté, de la manière dont il se déroule ?
		</h2>
	</div>
	<div class="box-content">
		<?php foreach ($reponses as $reponse) : ?>
			<?php if ($reponse->getQuestion()->getNumero() == 4 && $reponse != "") : ?>
				<blockquote>
					<p><?php echo $reponse; ?></p>
					<?php if ($user->isAdmin()) : ?>
						<small><?php echo $reponse->getUser()->getLogin() ?></small>
					<?php endif; ?>
				</blockquote>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>

<div class="box span-24 last">
	<div class="box-header">
		<h2>
			<i class="icon-question-sign"></i>
			<span class="break"></span>
			Avez-vous des suggestions pour améliorer le cours ? De quels autres sujets aimeriez-vous débattre ?
		</h2>
	</div>
	<div class="box-content">
		<?php foreach ($reponses as $reponse) : ?>
			<?php if ($reponse->getQuestion()->getNumero() == 5 && $reponse != "") : ?>
				<blockquote>
					<p><?php echo $reponse; ?></p>
					<?php if ($user->isAdmin()) : ?>
						<small><?php echo $reponse->getUser()->getLogin() ?></small>
					<?php endif; ?>
				</blockquote>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>

<div class="box span-24 last">
	<div class="box-header">
		<h2>
			<i class="icon-question-sign"></i>
			<span class="break"></span>
			Autres remarques :
		</h2>
	</div>
	<div class="box-content">
		<?php foreach ($reponses as $reponse) : ?>
			<?php if ($reponse->getQuestion()->getNumero() == 6 && $reponse != "") : ?>
				<blockquote>
					<p><?php echo $reponse; ?></p>
					<?php if ($user->isAdmin()) : ?>
						<small><?php echo $reponse->getUser()->getLogin() ?></small>
					<?php endif; ?>
				</blockquote>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>