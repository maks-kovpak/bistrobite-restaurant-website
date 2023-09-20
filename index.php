<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BistroBite | Experience the real taste of Best Dishes</title>
	<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/4f1ad13275.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/pages/index.css">
</head>

<body>
	<?php require_once("header.php"); ?>

	<main>
		<?php
		require_once("main-page/banner.php");
		require_once("main-page/welcome-section.php");
		require_once("main-page/about-us-section.php");
		?>
	</main>

	<?php require_once("footer.php"); ?>

</body>

</html>
