<header>
	<a href="index.php">
		<img src="img/icons/bistro-bite-logo.svg" alt="BistroBite Logo">
	</a>

	<svg class="hamburger-icon" viewBox="0 0 100 100" width="60" onclick="this.classList.toggle('active')">
		<path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
		<path class="line middle" d="m 70,50 h -40" />
		<path class="line bottom" d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
	</svg>

	<div class="navbar">
		<nav class="menu">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="index.php?action=about">About Us</a></li>
				<li><a href="index.php?action=menu">Menu</a></li>
				<li><a href="index.php?action=contact-us">Contact Us</a></li>
			</ul>
		</nav>

		<form class="search-container" method="post">
			<input type="search" placeholder="Search">
			<button type="submit"></button>
		</form>
		<a class="btn primary-btn black">Book a table</a>
	</div>
</header>
