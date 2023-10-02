<?php

function has_error($inputName, $regex, $errorType = "invalid") {
	if (!isset($_POST[$inputName])) {
		return "unset";
	} else if ($_POST[$inputName] == "") {
		return "error required";
	} else if (!preg_match($regex, $_POST[$inputName])) {
		return "error " . $errorType;
	}

	return "";
}

// Error for the second input
function error_if($firstInput, $secondInput, $errorType = "invalid", $predicate = null) {
	if (is_null($predicate)) $predicate = fn ($value1, $value2) => $value1 != $value2;

	if (!isset($_POST[$firstInput]) || !isset($_POST[$secondInput])) {
		return "unset";
	} else if ($_POST[$secondInput] == "") {
		return "error required";
	} else if ($predicate($_POST[$firstInput], $_POST[$secondInput])) {
		return "error " . $errorType;
	}

	return "";
}

$ERRORS = [
	"login" => has_error("login", "/^[a-zA-Zа-яА-Я0-9_-]{4,}$/"),
	"password" => has_error("password", "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{7,}$/"),
	"confirm-password" => error_if("password", "confirm-password"),
	"email" => has_error("email", "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/"),
	"captcha" => error_if("captcha-value-encoded", "captcha", "invalid", fn ($val1, $val2) => base64_decode($val1) != $val2),
];

function get_val($inputName) {
	return isset($_POST[$inputName]) ? $_POST[$inputName] : "";
}

$formValid = !in_array(true, array_map(fn ($item) => str_starts_with($item, "error") || $item == "unset", $ERRORS));

// Add to the database
if ($formValid) {
	require_once("database-model.php");

	$db = new DatabaseModel();
	$db->use_table("users");
	$db->create([
		"login" => get_val("login"),
		"password" => password_hash(get_val("password"), PASSWORD_BCRYPT),
		"email" => get_val("email")
	]);
}

?>

<main>
	<?php if (!$formValid) { ?>
		<section class="registration-section">
			<form class="form" action="" method="POST" novalidate>
				<h2>Registration</h2>

				<div class="field <?= $ERRORS["login"] ?>">
					<label for="reg-login">Login</label>
					<input type="text" name="login" id="reg-login" value="<?= get_val("login") ?>">
					<i class="fa fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>
					<span class="error-type required-error">Required</span>
					<span class="error-type invalid-error">Login is not valid!</span>
				</div>

				<div class="field <?= $ERRORS["password"] ?>">
					<label for="reg-password">Password</label>
					<input type="password" name="password" id="reg-password" value="<?= get_val("password") ?>">
					<i class="fa fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>
					<span class="error-type required-error">Required</span>
					<span class="error-type invalid-error">Password is not valid!</span>
				</div>

				<div class="field <?= $ERRORS["confirm-password"] ?>">
					<label for="reg-confirm-password">Confirm password</label>
					<input type="password" name="confirm-password" id="reg-confirm-password" value="<?= get_val("confirm-password") ?>">
					<i class="fa fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>
					<span class="error-type required-error">Required</span>
					<span class="error-type invalid-error">Your password do not matched!</span>
				</div>

				<div class="field <?= $ERRORS["email"] ?>">
					<label for="reg-email">Email</label>
					<input type="email" name="email" id="reg-email" value="<?= get_val("email") ?>">
					<i class="fa fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>
					<span class="error-type required-error">Required</span>
					<span class="error-type invalid-error">Email must be in the format username@example.com</span>
				</div>

				<div class="field <?= $ERRORS["captcha"] ?>">
					<label for="captcha">Enter the characters shown in the figure</label>

					<div class="captcha-container">
						<div class="captcha-image">
							<canvas width="300" height="100"></canvas>
						</div>
						<div class="captcha-content">
							<input type="text" name="captcha" id="captcha">
							<input type="hidden" name="captcha-value-encoded" id="captcha-value-encoded">
							<button class="reload-captcha btn secondary-btn black">
								<i class="fa fa-solid fa-rotate" style="color: #000000;"></i>
							</button>
						</div>
					</div>

					<span class="error-type required-error">Required</span>
					<span class="error-type invalid-error">Try again!</span>
				</div>

				<button class="btn primary-btn black" type="submit">Sign Up</button>
			</form>

			<div class="section-image">
				<img src="img/registration-cover.jpg" alt="Registration">
			</div>
		</section>
	<?php } else { ?>
		<section class="registration-success">
			<h1>Success</h1>
			<a href="index.php" class="btn primary-btn black">Go home</a>
		</section>
	<?php } ?>
</main>
