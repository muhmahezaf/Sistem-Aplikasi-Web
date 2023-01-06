<?php session_start(); // menjalankan session

	
	
  


	// Membuat Koneksi Ke Database
	$conn = mysqli_connect('localhost','root','','uas_sa_web');

	// Mengecek Koneksi
	if (!$conn) { 
		die("Connection Failed");
	}

 	error_reporting(0);

	

	

	// Mengecek url apakah ada method get | kalau ada gunain page itu | kalau tidak ada tampilkan form login
	$page = isset($_GET['page']) ? $_GET['page'] : "";
	

	// Mengambil file function
	include "functions.php";

	if ($page == "") {
		// Mengambil halaman login dari folder page dan file login.php
		include 'page/login.php';
	}

	if ($page != "") {
		include "page/$page".".php";
	}

	// Mengecek apakah cookie valid jika da
	if(isset($_COOKIE["MYCOOKIE"]) AND !isset($_SESSION['login'])) {
	 	$cookie = $_COOKIE["MYCOOKIE"];
	 	$query 		= "SELECT * FROM tb_users WHERE password='$cookie'";
		$getData 	= mysqli_query($conn, $query);

		$totaldata 	= mysqli_num_rows($getData); 
		if ($totaldata != 0) {
				$data_user = mysqli_fetch_object($getData);
				// Membuat session
				$_SESSION['login'] = true;
				$_SESSION['id_user'] = $data_user->id_user;
			

				header("Location: index.php?page=dashboard"); // untuk mengarahkan halaman 
				die(); // die berfungsi untuk menghentikan script
		}
	}



 ?>


