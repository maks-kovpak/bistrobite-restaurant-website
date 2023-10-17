<?php

$db->use_table("menu");

$search_query = $_GET["q"];
$condition = $_SESSION["is-admin"] ? "" : "AND published = 1";

$dishes = $db->query("SELECT * from menu WHERE (name LIKE '%{$search_query}%' OR description LIKE '%{$search_query}%') {$condition} ORDER BY date DESC");

?>

<main>
	<section class="menu-section">
		<div class="section-text center">
			<h2>Search results by "<?= $_GET["q"] ?>"</h2>
		</div>

		<?php if (empty($dishes->fetch_array())) { ?>
			<section class="info-block" style="margin: 0 auto 6rem;">
				<h1>Nothing was found...</h1>
				<a href="index.php" class="btn primary-btn black">Go home</a>
			</section>
		<?php } else { ?>
			<div class="cards-container">
				<?php foreach ($dishes as $dish) { ?>
					<div class="card <?= !$dish['published'] ? 'not-published' : '' ?>" title="Created: <?= date_create($dish["date"])->format("d.m.Y") ?>">
						<?php if (isset($_SESSION["is-admin"]) && $_SESSION["is-admin"]) { ?>
							<div class="admin-buttons">
								<a class="btn edit-button" href="index.php?action=edit-dish" title="Edit">
									<i class="fa fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
								</a>
								<button class="btn delete-button" title="Delete" data-id="<?= $dish['id'] ?>" data-modal-target="confirm-delete-modal" data-click-mode="open">
									<i class="fa fa-solid fa-trash-can" style="color: #ffffff;"></i>
								</button>
							</div>
						<?php } ?>

						<div class="card-content">
							<div class="card-body">
								<div class="cover-image">
									<img src="<?= $dish["image_path"] ?>" alt="<?= $dish["name"] ?>">
								</div>

								<div class="info">
									<h3><?= $dish["name"] ?></h3>
									<p><?= $dish["description"] ?></p>
								</div>
							</div>

							<div class="card-footer">
								<a href="index.php?action=view-dish&id=<?= $dish['id'] ?>" class="btn secondary-btn black">View</a>
								<strong>$<?= $dish["price"] ?></strong>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
	</section>
</main>

<div class="modal" id="confirm-delete-modal">
	<div class="modal-content">
		<h3>Are you sure you want to delete this record?</h3>

		<div class="buttons">
			<button class="modal-button btn primary-btn black" data-click-mode="close">No</button>
			<a class="modal-button btn secondary-btn black" data-click-mode="close" href="index.php">Yes</a>
		</div>
	</div>
</div>
