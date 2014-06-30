<?php
require_once 'esapi/src/ESAPI.php';
require_once 'bootstrap.php';

$Application = new Application();
try {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf8">
		<link rel="stylesheet" href="kube.min.css"/>
		<title>Hardening PHP Applications Sample App</title>
	</head>
	<body class="units-row">
	<div class="unit-centered unit-90">
		<nav class="navbar nav-fullwidth">
			<ul>
				<li><a href="?p=home">Home page</a></li>
				<li><a href="?p=list">List records</a></li>
				<li><a href="?p=add">Add new</a></li>
				<li><a href="?p=about">About</a></li>
			</ul>
		</nav>
		<div class="content">
			<?php $Application->displayPage(isset($_GET['p']) ? $_GET['p'] : ""); ?>
		</div>
	</div>

	</body>
	</html>
<?php
} catch (Exception $e) {
	die($e->getMessage());
}
