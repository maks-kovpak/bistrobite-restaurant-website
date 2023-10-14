<?php

$db->use_table("menu");
$search_query = $_GET["q"];

$dishes = $_SESSION["is-admin"]
	? $db->query("SELECT * FROM menu WHERE name LIKE '%{$search_query}%' OR description LIKE '%{$search_query}%' ORDER BY date DESC")
	: $db->query("SELECT * from menu WHERE published = 1 AND (name LIKE '%{$search_query}%' OR description LIKE '%{$search_query}%') ORDER BY date DESC");

?>

<main>
	<section class="menu-section">
		<div class="section-text center">
			<h2>Search results by "<?= $_GET["q"] ?>"</h2>
		</div>

		<?php if (empty($dishes->fetch_array())) { ?>
			<section class="success-block" style="margin: 0 auto 6rem;">
				<h1>Nothing was found...</h1>
				<a href="index.php" class="btn primary-btn black">Go home</a>
			</section>
		<?php } else { ?>
			<div class="cards-container">
				<?php foreach ($dishes as $dish) { ?>
					<div class="card <?= !$dish['published'] ? 'not-published' : '' ?>" title="Created: <?= date_create($dish["date"])->format("d.m.Y") ?>">
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
				<?php } ?>
			</div>
		<?php } ?>
	</section>
</main>
