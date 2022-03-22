<?php
$name = $email = $comment = $website = $gender = "";
$nameErr = $emailErr = $websiteErr = $genderErr = "";

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
		$nameErr = "Name is required";
	} else {
		$name = test_input($_POST["name"]);
		if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
			$nameErr = "Only letters and white space allowed";
		}
	}

	if (empty($_POST["email"])) {
		$emailErr = "Email is required";
	} else {
		$email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format";
		}
	}
	if (empty($_POST["comment"])) {
		$comment = "";
	} else {
		$comment = test_input($_POST["comment"]);
	}

	if (empty($_POST["gender"])) {
		$genderErr = "Gender is required";
	} else {
		$gender = test_input($_POST["gender"]);
	}
}
if (empty($_POST["website"])) {
	$website = "";
} else {
	$website = test_input($_POST["website"]);
	if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
		$websiteErr = "Invalid URL";
	}
}

if (empty($_POST["comment"])) {
	$comment = "";
} else {
	$comment = test_input($_POST["comment"]);
}
?>



<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Jack's Form</title>
	<link rel="stylesheet" href="main.css">
</head>

<body>
	<div id="section-wrapper">
		<div id="section-content">
			<div class="Title">
				<h1> Welcome to my project
				</h1>
				<h2>Please use me</h2>

			</div>

			<div class="jacksform">

				<form id="jacksform" class="formstuff" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					<div class=" form-row form-control">
						<label for="name">Name</label>
						<input type="text" name="name" class="formstuff" placeholder="Joe Bloggs" value="<?php echo $name; ?>">
						<?php if ($nameErr) : ?>
							<span class="error">*<?php echo $nameErr; ?></span>
						<?php endif; ?>
						<div class="form-row form-control">
							<label for="email">Email </label>
							<input type="text" name="email" class="formstuff" placeholder="JoeBloggs@gmail.com" value="<?php echo $email; ?>">
							<?php if ($emailErr) : ?>
								<span class="error">*<?php echo $emailErr; ?></span>
							<?php endif; ?>
						</div>
						<div class="form-row form-control">
							<label for="website">Website</label>
							<input type="text" name="website" class="formstuff" placeholder="https://www.google.com" value="<?php echo $website; ?>">
							<?php if ($websiteErr) : ?>
								<span class="error">*<?php echo $websiteErr; ?></span>
							<?php endif; ?>
						</div>
						<div class="form-row">
							<div>
								<input type="radio" name="gender" id="male" value="male" checked>
								<label for="male">Male</label>
								<input type="radio" name="gender" id="female" value="female">
								<label for="female">Female</label>
								<input type="radio" name="gender" id="other" value="other">
								<label for="other">Other</label>
							</div>
							<?php if ($genderErr) : ?>
								<span class="error">*<?php echo $genderErr; ?></span>
							<?php endif; ?>
						</div>
						<div class="form-row form-control">
							<textarea name="comment" id="comment">Leave a comment here</textarea>
						</div>
						<div class="form-row form-control">



						</div>
						<div class="submitbutton">
							<td> <input type="submit" name="submit" value="submit" class="submit"> </td>
						</div>
				</form>

			</div>

</body>