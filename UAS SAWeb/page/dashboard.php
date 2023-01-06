<?php 
	if (!isset($_SESSION['login'])) {
		header("Location: index.php");
		die();
	}
	$id_user = $_SESSION['id_user'];
	$query 		= "SELECT * FROM tb_users WHERE id_user='$id_user'";
	$getdata 	= mysqli_query($conn, $query);
	$data_user = mysqli_fetch_object($getdata);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
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
			max-width: 1000px;
			border-radius: 12px;
			box-shadow: 0px 0px 10px 2px #808080;
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
		<h1>Selamat Datang, <?= $data_user->nama ?></h1>

		<br><br>


		<center>
			<a onclick="return confirm('Apakah ingin keluar ?')" href="index.php?page=logout">Log Out</a>
		</center>
	</div>

	
</body>
</html>