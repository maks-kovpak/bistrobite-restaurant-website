<?php

$db->use_table('menu');
$success = false;

if (isset($_GET["id"])) {
	$id = (int) $_GET["id"];
	$success = $db->delete($id);
}

?>

<main>
	<?php if (ActiveUser::isAdmin() && $success) { ?>
		<section class="info-block">
			<h1>The record has been successfully deleted!</h1>
			<div class="buttons">
				<a href="index.php" class="btn primary-btn black">Go home</a>
				<a href="index.php?action=menu" class="btn secondary-btn black">View menu</a>
			</div>
		</section>
	<?php } else { ?>
		<section class="info-block">
			<h1>Page was not found...</h1>
			<a href="index.php" class="btn primary-btn black">Go home</a>
		</section>
	<?php } ?>
</main>
