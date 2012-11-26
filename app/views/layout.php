<!doctype html>
<html>
	<head>
		<base href="<?php echo $this->base_url; ?>">
		<title><?php echo $this->title; ?></title>
		<meta name="author" content="peraud_v" />
		<meta charset="UTF-8" />

		<link rel="stylesheet" type="text/css" media="all" href="libs/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" media="all" href="media/css/style.css" />
		<?php if ($this->controller == "login") : ?>
			<link rel="stylesheet" type="text/css" media="all" href="media/css/login.css" />
		<?php endif; ?>
		<link rel="stylesheet" href="libs/blueprint/grid.css" type="text/css" />

		<script type="text/javascript" src="libs/jQuery.js"></script>
		<script type="text/javascript" src="libs/bootstrap/js/bootstrap.js"></script>

	</head>
	<body>
		<div class="container" id="page">
			<?php require_once($contentView); ?>
		</div>

		<div class="modal hide fade" id="formError">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3>Erreur</h3>
			</div>
			<div class="modal-body">
				<p>Formulaire incomplet</p>
			</div>
			<div class="modal-footer">
				<a id="modal-close" href="#" class="btn btn-danger">Fermer</a>
			</div>
		</div>
	</body>
</html>