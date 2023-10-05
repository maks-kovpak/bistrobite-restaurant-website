<?php

$db->use_table("users");
$foundUser = null;

// Verify user password
function verify($user) {
	return isset($_POST["password"]) ? password_verify($_POST["password"], $user["password"]) : false;
}

if (isset($_POST["login"])) {
	$result = $db->find("login = '{$_POST['login']}'");

	foreach ($result as $record) {
		if (verify($record)) {
			$foundUser = $record;
			break;
		}
	}
}

if (!is_null($foundUser)) {
	$_SESSION["user-id"] = $foundUser["id"];
	$_SESSION["user-login"] = $foundUser["login"];
	$_SESSION["is-admin"] = $foundUser["admin"];
}

?>

<main>
	<?php if (is_null($foundUser)) { ?>
		<section class="registration-section">
			<div class="section-image">
				<img src="img/login-page-cover.jpg" alt="Registration">
			</div>

			<form class="form" action="" method="POST" novalidate>
				<h2>Log in to your account</h2>
				<p>Or <a href="index.php?action=registration">sign up</a> if you do not have an account</p>

				<div class="field">
					<label for="login">Login</label>
					<input type="text" name="login" id="login" value="">
				</div>

				<div class="field">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" value="">
				</div>

				<?php if (isset($_POST["login"]) && isset($_POST["password"])) { ?>
					<strong style="color: red">Login or password is not valid!</strong>
				<?php } ?>

				<button class="btn primary-btn black" type="submit">Log In</button>
			</form>
		</section>
	<?php } else { ?>
		<section class="success-block">
			<h1>Success</h1>
			<a href="index.php" class="btn primary-btn black">Go home</a>
		</section>
	<?php } ?>
</main>
