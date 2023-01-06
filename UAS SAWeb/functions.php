<?php 
	

	// MENERIMA POST DATA DARI FORM LOGIN
	if (isset($_POST['login'])) {
		// ambil data form
		$email 		= mysqli_real_escape_string($conn, trim($_POST['email']));
		$password 	= mysqli_real_escape_string($conn, trim($_POST['password']));



		$password = md5($password);

		// MENCARI DATA ke database DENGAN EMAIL DAN PASSWORD yang di input
		$query 		= "SELECT * FROM tb_users WHERE email='$email' AND password='$password'";
		$getData 	= mysqli_query($conn, $query);

		$totaldata 	= mysqli_num_rows($getData); 
		// jumlah data yang di dapat apabila 0 berarti gagal login, selain itu sukses

		if ($totaldata == 0) {
			// Gagal Login - buat notif
			$notif 	= "<p class='notif'>Email dan password Salah</p>";

		}else {
			// Sukses Login - Ambil data user yang login
			$data_user = mysqli_fetch_object($getData);
			
			// Membuat session
			$_SESSION['login'] = true;
			$_SESSION['id_user'] = $data_user->id_user;

			$checkbox = isset($_POST['checkbox']) ? "1" : "0";
			if ($checkbox == 1) {
				// Gunakan remember me dengan menyimpan data login pada cookie
				
				setcookie("MYCOOKIE", $password, time() + (86400 * 30), "/"); // 86400 = 1 hari
				
			}

			header("Location: index.php?page=dashboard"); // untuk mengarahkan halaman 
			die(); // die berfungsi untuk menghentikan script

		}
		
	}


	// MENERIMA POST DATA DARI FORM REGISTER
	if (isset($_POST['register'])) {
		
		$nama 		= htmlspecialchars(trim($_POST['nama']));
		$email 		= htmlspecialchars(trim($_POST['email']));
		$password 	= md5(htmlspecialchars(trim($_POST['password'])));

		// mengecek email jika sudah di gunakan tidak boleh daftar
		$query 		= "SELECT * FROM tb_users WHERE email='$email'";
		$getEmail 	= mysqli_query($conn, $query);
		$totalEmail = mysqli_num_rows($getEmail); 

		if ($totalEmail != 0) {
		
			// Email sudah digunakan
			$notif 	= "<p class='notif'>Pendaftaran Gagal, Email sudah gunakan</p>";
		}else {
			
			// Proses register
			$query = "INSERT INTO tb_users (nama,email,password,status) VALUES ('$nama','$email','$password','aktif')";
			$InserData 	= mysqli_query($conn, $query);
	
			if (!$InserData) {
				
				$notif 	= "<p class='notif'>Pendaftaran Gagal</p>";
			}else {
			
				
				$notif 	= "<p class='notif-success'>Pendaftaran Berhasil</p>
				 <script>
				 	setTimeout(() => {
				 		location.href = 'index.php';
				 	}, 3000)
				 </script>
				";
			}
		}
	}











	// MENERIMA POST DATA DARI FORM FORGET PASSWORD
	if (isset($_POST['forget'])) {
		$email 		= htmlspecialchars(trim($_POST['email']));

		// mengecek email terdaftar atau tidak
		$query 		= "SELECT * FROM tb_users WHERE email='$email'";
		$getEmail 	= mysqli_query($conn, $query);
		$totalEmail = mysqli_num_rows($getEmail); 

		if ($totalEmail == 0) {
			// Email sudah digunakan
			$notif 	= "<p class='notif'>Email Tidak Terdaftar</p>";
		}else {
			$data_user = mysqli_fetch_object($getEmail);
			$new_code_verification = rand(111111,999999);
			$new_code_verificationmd5 = md5($new_code_verification);
			$now = time();
			$cektime = $now - $data_user->timestamp_limit;

			// Fitur untuk mengirim email hanya  minimal 5 menit untuk pengiriman 1 kali reset password
			if ($cektime < (60*5)) {
				$notif 		= "<p class='notif'>Waiting <span id='number'>".((60*5)-$cektime)."</span> Second to send email </p>

				<script>
					var i = ".((60*5)-$cektime)."
					var number = document.getElementById('number');
					var x = setInterval(() => {
						number.innerText = i--;
						if(i < 1){
							clearInterval(x);
						}
					},1000)
				</script>
				
				";
			}else {

				$query 			= "UPDATE tb_users SET kode_verif='$new_code_verificationmd5',timestamp_limit='$now' WHERE email='$email'";
				$change_kode 	= mysqli_query($conn, $query);
				if ($change_kode) {
					$notif 		= "<p class='notif-success'>Send Verifikasi Code Success, Please Check your email</p>
					
					";
				}


				// LINK YANG AKAN DI KLIK USER 
				$link_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

				$link_kode = $link_url."&token=".md5($new_code_verification);
				if ("localhost" == $_SERVER['SERVER_NAME']) {
					$localIP = getHostByName(getHostName());
					$link_kode = str_replace("localhost", $localIP, $link_kode);
				}

				$pesan = "KLIK LINK BERIKUT UNTUK MERESET PASSWORD <br><br><a href='$link_kode'>RESET PASSWORD</a>";
				// SEND EMAIL OPEN
			date_default_timezone_set('Asia/Jakarta');

			$emailtujuan = $data_user->email;
			$namatujuan = $data_user->nama;


			include "classes/class.phpmailer.php";
			$mail = new PHPMailer; 
			$mail->IsSMTP();
			$mail->SMTPSecure = 'tls'; 
			$mail->Host = "instechgeneration.com"; //host masing2 provider email
			$mail->SMTPDebug = 0;
			$mail->Port = 587;
			$mail->SMTPAuth = true;
			$mail->Username = "example@instechgeneration.com"; //user email
			$mail->Password = "9Z5xg^u}pxW1"; //password email 
			$mail->SetFrom("example@instechgeneration.com","Azhari Coding"); //set email pengirim
			$mail->Subject = "Testing"; //subyek email
			$mail->AddAddress($emailtujuan,$namatujuan);  //tujuan email
			$mail->MsgHTML($pesan);
			if($mail->Send()) {
				$notif 		= "<p class='notif-success'>Send Verifikasi Code Success, Please Check your email</p>
					
					";
			}

			// SEND EMAIL CLOSE

			}


			
		}
	}
	










	// MENERIMA POST DATA DARI FORM RISET
	if (isset($_POST['new_password'])) {
		$password1 		= htmlspecialchars(trim($_POST['password1']));
		$password2 		= htmlspecialchars(trim($_POST['password2']));
		$token 			= htmlspecialchars(trim($_POST['token']));

		if ($password1 != $password2) {
			// Konfrimasi password
			$notif 	= "<p class='notif'>Konfirmasi Password tidak sesuai</p>";
		}else {
			// Proses RESET
			$data_user = mysqli_fetch_object($getEmail);
			$new_password = md5($password2);

			
			$query 			= "UPDATE tb_users SET password='$new_password' WHERE kode_verif='$token'";
				$change_kode 	= mysqli_query($conn, $query);

			$_SESSION['notif'] = "<p class='notif-success'>Berhasil reset password, silakan login</p>";
			header("Location: index.php");
			die();
		}
	}


	
 ?>
