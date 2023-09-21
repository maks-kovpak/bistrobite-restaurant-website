<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?php include "constants.php";
		echo $PAGE_TITLES[isset($_GET["action"]) ? $_GET["action"] : "main"]; ?>
	</title>
	<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/4f1ad13275.js" crossorigin="anonymous"></script>

	<!-- Styles -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" integrity="sha256-5uKiXEwbaQh9cgd2/5Vp6WmMnsUr3VZZw0a8rKnOKNU=" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php require_once("layout/header.php"); ?>

	<?php
	if (isset($_GET["action"]) && file_exists("views/{$_GET["action"]}.php")) {
		require_once("views/{$_GET["action"]}.php");
	} else {
		require_once("views/main.php");
	}
	?>

	<?php require_once("layout/footer.php"); ?>

	<!-- Scripts -->
	<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js" integrity="sha256-FZsW7H2V5X9TGinSjjwYJ419Xka27I8XPDmWryGlWtw=" crossorigin="anonymous"></script>
	<script src="js/script.js"></script>
</body>

</html>
