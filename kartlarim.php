
<?php include 'header.php'; ?>

<div class="container">

 <table>
        <thead class="tablo-baslik">
          <tr>
              <th>
                  <i class="fas fa-pen"></i>
                Başlık</th>
              <th>
                  <i class="fab fa-github fa-1x"></i> GitHub Link</th>
              <th>
                  <i class="fas fa-tag"></i>
                Etiket</th>
              <th>
                  <i class="fas fa-hammer"></i>
                Düzenle</th>
          </tr>
        </thead>

        <tbody>

          <?php for ($i=0; $i <3 ; $i++) { 
            # code...
          ?>
          <tr>
            <td>Lorem, ipsum.</td>
            <td>
              <a href="">Lorem, ipsum dolor.</a> </td>
            <td>Lorem ipsum dolor sit.</td>
            <td>
                <a class="waves-effect waves-light btn btn-small green darken-2"> Güncelle</a>
                <a class="waves-effect waves-light btn btn-small red accent-4"> Sil</a>
            </td>
          </tr>
        <?php }  ?>
         
        </tbody>
      </table>





</div>

<script>
  
$("nav").css("background","#0e191eb5");
$(".navSearchD").css("visibility","hidden");

</script>

<?php 

include 'footer.php';

 ?>