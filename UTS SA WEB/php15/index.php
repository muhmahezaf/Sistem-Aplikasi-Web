<html>
  <head>
    <meta charset="utf-8">
    <title>Belajar PHP</title>
  </head>
  <body>

    <h1>Loop PHP</h1>
    
    <?php 
      // -------- Pengulangan -------
      // for(variabelawal(mulai); batas(syarat); perubahan)

      $hewan = ['anjing', 'babi', 'cicak', 'domba'];

      for($i=0; $i < count($hewan); $i++)
        {
          echo "__________";
          echo $hewan[$i];
          echo "__________ <br>";
        }

        ?>
  </body>
</html>