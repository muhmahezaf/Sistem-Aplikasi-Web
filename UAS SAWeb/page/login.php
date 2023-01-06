<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LOGIN </title>
	<style>
		body {
			background-color: lightblue;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}
		.container {
			background-color: white;
			width: 300px;
			border-radius: 12px;
			box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
			padding: 10px;

		}
		input {
			background-color: rgba(0, 0, 0, 0.1);
		}
		.container input,button {
			box-sizing: border-box;
			outline: none;
			border: none;
			margin-bottom: 10px;
			padding: 10px;
			border-radius: 12px;
			width: 100%;
		}
		button {
			background-color: orange;
			cursor: pointer;
		}
		h2 {
			text-align: center;
		}
		a {
			text-align: right;
			padding: 10px;
			color: black;
			display: block;
		}
		* {
			text-decoration: none;
			font-family: arial;
		}
		.notif {
			background-color: red;
			padding: 5px;
			border-radius: 12px;
			color: white;
		}
		.notif-success {
			background-color: green;
			padding: 5px;
			border-radius: 12px;
			color: white;
		}
	</style>
</head>
<body>


	<div class="container">
		<form action="" method="post" autocomplete="off">
			<h2>LOGIN</h2>
			<?php if (isset($_SESSION['notif'])) {
				echo $_SESSION['notif'];
				unset($_SESSION['notif']);
			} ?>
			<?= isset($notif) ? $notif : ""; ?>
			<input name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : ""  ?>" type="email" placeholder="Email" minlength="3" required>
			<input name="password" type="password" placeholder="Password" minlength="3" required>

			<div style="display:flex; cursor: pointer;">
				<input id="checkbox" name="checkbox" type="checkbox" style="width:15px">
				<label for="checkbox">Member Me</label>
			</div>
			<a href="?page=forget">Forget Password ?</a>
			<button name="login" type="submit">SUBMIT</button>
			<br><br>
			<center><a style="text-align:center;" href="?page=register">Register</a></center>
		</form>
	</div>
	
</body>
</html>