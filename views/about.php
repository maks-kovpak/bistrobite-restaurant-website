<main>
	<section class="page-cover about-us-page">
		<div class="inner">
			<h1>About Us</h1>
			<p>
				Welcome to BistroBite, where culinary excellence meets a warm and inviting atmosphere.
				We are more than just a restaurant; we are a culinary journey, a celebration of flavors,
				and a place where memorable moments are created.
			</p>
		</div>
	</section>

	<?php require_once("layout/components/about-sections.php"); ?>

	<section class="achievements-section">
		<h2>Our Achievements</h2>
		<p class="description">
			At BistroBite, we take pride in our journey and the milestones we've achieved along the way.
			These achievements are a testament to our commitment to culinary excellence and the satisfaction
			of our valued guests. We are honored to share some of our proudest accomplishments with you:
		</p>

		<div class="achievements-container">
			<div class="achievement">
				<h3>+200</h3>
				<p>Customers Served</p>
			</div>

			<div class="achievement">
				<h3>50K</h3>
				<p>Branches</p>
			</div>

			<div class="achievement">
				<h3>370k</h3>
				<p>Deliveries</p>
			</div>

			<div class="achievement">
				<h3>100+</h3>
				<p>Recognition</p>
			</div>
		</div>
	</section>

	<section class="feedbacks-section">
		<h2>Our Happy Customers</h2>
		<p class="description">The heart and soul of BistroBite lies in the smiles and satisfaction of our cherished guests</p>

		<!-- TODO. It's only for testing -->
		<div id="feedbacks-slider" class="splide">
			<div class="splide__track">
				<ul class="splide__list">
					<?php for ($i = 0; $i < 4; $i++) { ?>
						<li class="splide__slide">
							<div class="feedback-card">
								<div class="rating" data-rate="5"></div>
								<q>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare</q>
								<div class="author">
									<div class="author-image">
										<img src="img/avatar-1.jpg" alt="">
									</div>

									<div class="author-info">
										<h3>Wade Warren</h3>
										<time datetime="20.09.2023">20.09.2023</time>
									</div>
								</div>
							</div>
						</li>

						<li class="splide__slide">
							<div class="feedback-card">
								<div class="rating" data-rate="3"></div>
								<q>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare</q>
								<div class="author">
									<div class="author-image">
										<img src="img/avatar-2.jpg" alt="">
									</div>

									<div class="author-info">
										<h3>Jenny Wilson</h3>
										<time datetime="01.08.2023">01.08.2023</time>
									</div>
								</div>
							</div>
						</li>

						<li class="splide__slide">
							<div class="feedback-card">
								<div class="rating" data-rate="4"></div>
								<q>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare</q>
								<div class="author">
									<div class="author-image">
										<img src="img/avatar-3.jpg" alt="">
									</div>

									<div class="author-info">
										<h3>Albert Flores</h3>
										<time datetime="12.03.2023">12.03.2023</time>
									</div>
								</div>
							</div>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</section>
</main>
