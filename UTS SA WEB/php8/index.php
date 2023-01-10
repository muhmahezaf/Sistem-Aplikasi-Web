<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Belajar PHP</title>
</head>
<body>
  <!--   Muhammad Maheza F-201552018152987-PHP3-4 -->

	<?php

	// berapa baris
	// komentar
	// terserah

	// variabel pada php
	$nama = "Universitas Widyagama Malang";
	$nama2 = 'Teknik Informatika';

	echo "Selamat datang di $nama <br>";

	//tipe data angka/number
	// 1. Integer 2. Float

	$angka = 1000;
	$angka2 = 3;
	$angka3 = 2.64;

	//------------- Operator Math -----------
	// + - * / % ++ --

	//nama = nilai
	//$angka = $angka + $angka2;
	// $angka *= $angka2;

	//------------- Math Method ------------
	//round rand(min, max) max min
	//echo "Angka hari ini adalah ". min($angka3, $angka, $angka2);

	//------------- String Method -----------
	//strlen && str_word_count
	//str_replace(find,raplace,string)
	//str_repeat(text, times); str_shuffle(text)

	$text = "Hai semuanya di sini";
	// echo str_repeat(str_replace( "Hai", "Hallo" ,$text) 10 );

	// echo "$angka";

	// echo $angka + $angka2;
	?>

</body>
</html>