<html>
  <head>
    <meta charset="utf-8">
    <title>Belajar PHP</title>
  </head>
  <body>

<!--     Muhammad Maheza Fresmanda-201552018152987-PHP5-6 -->

    <h1>Array PHP</h1>
    
    <?php
      // ---------------------
      // -----GET DAN POST----
      // ---------------------

      // if ( isset($GET['submit']) ){
      //   echo $_GET['password'];
      // }

      // echo $_SERVER['REMOTE_ADDR'];
      // die();

      // session_start();

      $user = 'hilman';
      $password = '123';

      if ( isset($_POST['submit']) ){

        if( $_POST['nama'] == $user &&
            $_POST['password'] == $password){

            // cookie
            // setcookie(key, nilai, expire)
            setcookie('nama_user', $_POST['nama'], time()+120);

            // session
            $_SESSION['nama_user'] = $_POST['nama'];

            // memindahkan halaman
            header('Location: profile.php');
            }else{
              echo 'login gagal!';
            }
      }
    ?>

    <form action="index.php" method="post">
      <input type="text" name="nama">
      <input type="password" name="password">
      <input type="submit" name="submit">
    </form>

  </body>
</html>