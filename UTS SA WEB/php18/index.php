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

      // for($i=0; $i < count($hewan); $i++)
      //   {
      //     echo "__________";
      //     echo $hewan[$i];
      //     echo "__________ <br>";
      //   }

      // foreach($hewan as $h){
      //   echo "__________";
      //     echo $h;
      //     echo "__________ <br>";
      // }

      // $data = ['nama' => 'mahesa',
      //   'umur' => 20,
      //   'sifat' => 'ngoding'];

      // foreach($data as $key => $value){
      //   echo $value . "<br>";
      // }

      // ----------- 3) while & do while
      // while(syarat)

      $i = 5;

      // while( $i < count($hewan) ){
      //   echo $hewan[$i] . "<br>";
      //   $i;
      // }

      do{
        echo '_______';
        echo $hewan[$i] . "<br>";
        $i++;
      }while( $i < count($hewan));
        ?>
  </body>
</html>