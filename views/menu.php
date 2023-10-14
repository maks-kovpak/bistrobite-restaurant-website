<?php

$limit = '';
$paginateBy = 6;

if (isset($_GET["page"])) {
	$page = (int) $_GET["page"];

	if ($page < 1) {
		$page = 1;
		$_GET["page"] = 1;
	}

	$offset = $paginateBy * ($page - 1);
	$limit = "LIMIT {$paginateBy} OFFSET {$offset}";
}


$db->use_table("menu");

$dishes = isset($_SESSION["is-admin"]) && $_SESSION["is-admin"]
	? $db->query("SELECT * FROM menu ORDER BY date DESC {$limit}")
	: $db->query("SELECT * FROM menu WHERE published = 1 ORDER BY date DESC {$limit}");

$count = isset($_SESSION["is-admin"]) && $_SESSION["is-admin"]
	? (int) $db->query("SELECT COUNT(*) FROM menu")->fetch_array()[0]
	: (int) $db->query("SELECT COUNT(*) FROM menu WHERE published = 1")->fetch_array()[0];

$count = ceil($count / $paginateBy);

?>

<main>
	<section class="menu-section">
		<div class="section-text center">
			<h2>Our Special Dishes</h2>
			<p> Explore our culinary masterpieces, meticulously crafted by our talented chefs</p>
		</div>

		<div class="cards-container">
			<?php foreach ($dishes as $i => $dish) { ?>
				<?php if ($i > $paginateBy - 1) break; ?>
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
							<a href="" class="btn secondary-btn black">Order Now</a>
							<strong>$<?= $dish["price"] ?></strong>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

		<div class="pagination">
			<button class="prev-page">
				<i class="fa fa-solid fa-angle-left"></i>
			</button>

			<?php for ($i = 1; $i <= $count; $i++) { ?>
				<button class="page <?= $i == 1 ? 'current-page' : '' ?>" data-page-number="<?= $i ?>"><?= $i ?></button>
			<?php } ?>

			<button class="next-page">
				<i class="fa fa-solid fa-angle-right"></i>
			</button>
		</div>
	</section>
</main>

<div class="modal" id="confirm-delete-modal">
	<div class="modal-content">
		<h3>Are you sure to delete this record?</h3>

		<div class="buttons">
			<button class="modal-button btn primary-btn black" data-click-mode="close">No</button>
			<a class="modal-button btn secondary-btn black" data-click-mode="close" href="index.php">Yes</a>
		</div>
	</div>
</div>
