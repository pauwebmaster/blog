<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!-- Compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:800" rel="stylesheet">
</head>
<body>
    <div class="container">
      <form action="" method="post" name="uptodate">
        <div class=" row yenile-sifre">
            <div class="col s12"></div>
            <h3>Şifre Yenile</h3>
            <div class="input-field col s12">
                <i class="material-icons prefix">vpn_key</i>
                <input name="npass" id="password" type="password" class="validate">
                <label for="password">Yeni Şifreni Gir</label>
              </div>
              <div class="input-field col s12">
                <i class="material-icons prefix">vpn_key</i>
                <input id="password1" type="password" class="validate">
                <label for="password1">Yeni Şifre Tekrar</label>
              </div>

              <div class="col s12 menu-yenile-button">              
              <button type="submit" class="aves-effect waves-light btn" name="submit">Güncelle</button>
            </div>

        </div>

      </form>
        
    </div>

</body>
</html>




<?php 
include 'baglan.php';


if (isset($_GET['hash'])) {
    $hash = $_GET['hash'];
    echo "asfasfas";
    $qry = $bag->cek("","n_users","*","WHERE forget_hash=?",array($hash));
    $rs = $qry->fetch(PDO::FETCH_OBJ);

      if ($qry) {
        echo "asfsafsafas";
          if (isset($_POST['submit'])) {
            echo "adsgfagsdgasd";
            $npass = $_POST['npass'];
            $nhash = md5(rand(0,100));
            $update = $bag->guncelle(0,"n_users","pass,forget_hash","WHERE forget_hash=?" , array(md5($npass),$nhash,$hash));
            header("Location:index.php");
          }
      }


}



 ?>