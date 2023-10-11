<?php

$db->use_table("menu");
$dishes = $db->query("SELECT * FROM users INNER JOIN menu ON users.id = menu.author");

?>

<main>
	<section class="menu-section">
		<div class="section-content center">
			<h2>Our Special Dishes</h2>
			<p> Explore our culinary masterpieces, meticulously crafted by our talented chefs</p>
		</div>

		<div class="cards-container">
			<?php foreach ($dishes as $dish) { ?>
				<div class="card" title="Author: <?= $dish["login"] ?>">
					<div class="cover-image">
						<img src="<?= $dish["image_path"] ?>" alt="<?= $dish["name"] ?>">
					</div>

					<div class="info">
						<h3><?= $dish["name"] ?></h3>
						<p><?= $dish["description"] ?></p>
						<div>
							<a href="" class="btn secondary-btn black">Order Now</a>
							<strong>$<?= $dish["price"] ?></strong>
						</div>
					</div>
				</div>
			<?php } ?>

		</div>
	</section>
</main>
