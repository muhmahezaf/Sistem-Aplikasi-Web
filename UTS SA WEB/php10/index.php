<html>
  <head>
    <meta charset="utf-8">
    <title>Belajar PHP</title>
  </head>
  <body>

<!--     Muhammad Maheza Fresmanda-201552018152987-PHP5-6 -->

    <h1>Array PHP</h1>
    
    <?php
      // ---------- tipe data array ----------
        $angka = [5, 10, 2, 1, 6];
        $kotak = array('anjing', 'kura kura', 'koala', 'banteng');
        $nama = ['Hilman', 'Endy', 'Tiqa'];

        // print_r($kotak);
        // echo $nama[0];

      // ---------- metode array ----------
      // array_unique, _reverse, shuffle, count, sort

        sort($angka);
        print_r( $angka );

        // echo count($nama);

    ?>

  </body>
</html>