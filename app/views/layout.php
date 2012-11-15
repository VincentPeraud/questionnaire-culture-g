<!doctype html>
<html>
	<head>
		<base href="<?php echo $this->base_url; ?>">
		<title><?php echo $this->title; ?></title>
		<meta name="author" content="peraud_v" />
		<meta charset="utf-8" />

		<link rel="stylesheet" type="text/css" media="all" href="libs/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" media="all" href="media/css/style.css" />

	</head>
	<body>
		<div class="container" id="page">
			<?php require_once($contentView); ?>
		</div>
	</body>
</html>