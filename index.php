<?php
	
	if($_SERVER[REQUEST_METHOD] == "POST") {

		$user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		$mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		$phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
		$msg = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

		echo $user . "<br/>";
		echo $mail . "<br/>";
		echo $phone . "<br/>";
		echo $msg . "</br>";

		$formErrors = array();

		if( strlen($user) <= 3 ) {
			$formErrors[] = "Username Must be larger than <strong>3</strong> character" . "<br/>";
		} 

		if( strlen($msg) < 10 ) {
			$formErrors[] = "Message Can\'t be less than <strong>10</strong> character" . "<br/>";
		}

		$myEmail = "youssefali6212@gmail.com"
		$headers = "From: " . $mail . "\r\n";

		if(empty($formErrors)) {

			mail($myEmail, "contact Form", $msg, $headers);

		}

	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Contact Form</title>
		<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/formStyle.css">
	</head>
	<body>

		<div class="container">
			<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
				<h1 class="text-center">Contact Me</h1>
				<?php if(! empty($formErrors) ) { ?>
					<div class="errors alert alert-danger">
						<?php 
							foreach ($formErrors as $error) {
								echo $error;
							}
						?>
					</div>
				<?php } ?>
				<div class="form-group">
					<input
					 type="text"
					 name="username"
					 class="form-control username" 
					 placeholder="Type Your Name" 
					 value="<?php if(isset($user)) {echo $user;} ?>">
					<i class="fa fa-user fa-fw"></i>
					<span class="asterisx">*</span>
					<div class="alert alert-danger custom-alert">
						Username Must be larger than <strong>3</strong> character
					</div>
				</div>
				<div class="form-group">
					<input
					type="email" 
					name="email" 
					class="form-control email" 
					placeholder="Type Your Valid Email"
					value="<?php if(isset($mail)) {echo $mail;} ?>">
					<i class="fa fa-envelope fa-fw"></i>
					<span class="asterisx">*</span>
					<div class="alert alert-danger custom-alert">
						Email Can't be <strong>Empty</strong>
					</div>
				</div>
				<input 
				type="text" 
				name="phone" 
				class="form-control" 
				placeholder="Type Your Phone Number"
				value="<?php if(isset($phone)) {echo $phone;} ?>">
				<i class="fa fa-phone fa-fw"></i>

				<div class="form-group">
					<textarea placeholder="Type Your Message" name="message" class="form-control message"><?php if(isset($msg)) {echo $msg;} ?></textarea>
					<span class="asterisx spc">*</span>
					<div class="alert alert-danger custom-alert">
						Message Can\'t be less than <strong>10</strong> character
					</div>
				</div>
				<input type="submit" name="Send Message" class="btn btn-success">
				<i class="fa fa-send fa-fw"></i>
			</form>
		</div>

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>
	</body>
</html>