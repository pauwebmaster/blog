<?php include 'header.php'; ?>


<div class="container profilGrid">
        <form  class="col s12 profilSettingForm">


          <div class="row">


            <div class="col s12">

                <div class="profilGridImg">
                    <img src="https://i.hizliresim.com/V30lEZ.jpg" alt="">

                    <div class="imgSetting">
                        <input type="file" name="profilUserImgFile" style="display: none;">
                        <i class="fas fa-camera uploadImg"></i>
                    </div>
                </div>


            </div>

            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input id="name" type="text" class="validate" name="name" data-error=".profilPageName">
                <label for="name">İsim</label>
                <div class="profilPageName"></div>
            </div>


            <div class="input-field col s12 ">
                <i class="material-icons prefix">account_circle</i>

                <input id="last_name" type="text" class="validate" name="last_name" data-error=".profilPageSurname">
                <label for="last_name">Soyisim</label>
                <div class="profilPageSurname"></div>
            </div>




            <div class="input-field col s12">
                <i class="material-icons prefix">date_range</i>
                <input id="date" type="text" name="date" class="validate datepicker" name="date" data-error=".profilPageDate">
                <label for="date">Doğum Tarihi</label>
                <div class="profilPageDate"></div>
            </div>




            <div class="input-field col s12">
                <i class="material-icons prefix">phone</i>
                <input id="telefon" type="tel" name="telefon" class="validate" name="telefon" data-error=".profilPageTelefon">
                <label for="telefon">Telefon Numarası</label>
                <div class="profilPageTelefon"></div>
            </div>

            <div class="input-field col s12">
             <i class="material-icons prefix">lock</i>

             <input id="passwordOld" type="password" name="passwordOld" class="validate" data-error=".profilPagePassOld">
             <label for="passwordOld">Eski Şifre</label>
             <div class="profilPagePassOld"></div>
         </div> 
         <div class="input-field col s12">
             <i class="material-icons prefix">lock</i>

             <input id="passwordNew" type="password" name="passwordNew" class="validate" data-error=".profilPagePassNew">
             <label for="passwordNew">Yeni Şifre</label>
             <div class="profilPagePassOld"></div>
         </div>    

         <div class="input-field col s12">
             <i class="material-icons prefix">lock</i>

             <input id="passwordNew2" type="password" name="passwordNew2" class="validate" data-error=".profilPagePassNew2">
             <label for="passwordNew2">Yeni Şifre</label>
             <div class="profilPagePassNew2"></div>
         </div> 

         <div class="col s12 cinsiyet">


            <label>
              <input name="gender" type="radio" value="erkek"   />
              <span>Erkek</span>
          </label>


          <label>
              <input name="gender" type="radio" value="kadın"  />
              <span>Kadın</span>
          </label>

          <label>
              <input name="gender" type="radio" value="other"  />
              <span>Other</span>
          </label>

<div class="profilPageGender errForm"></div>
      </div>

      <div class="input-field col s12">
        <i class="material-icons prefix">border_color
        </i>
        <textarea id="userBio" class="materialize-textarea" data-length="150" name="userBio" data-error=".profilPageUserBio"></textarea>
        <label for="userBio">Textarea</label>
        <div class="profilPageUserBio"></div>
    </div>

    <div class="col s12 profilButton">
        <button class="btn waves-effect waves-light" type="submit" name="action">Güncelle
            <i class="material-icons right">send</i>
        </button>
    </div>

</div>



</form>
</div>



<script>
    $(".uploadImg").click(function () {
        $("input[name='profilUserImgFile']").click();

    });

    $(".profilGridImg").hover(function(){
        $(".imgSetting").css("transform","translateY(0px)");
        $(".profilGridImg img").css("transform", "scale(1.1)");

    },function(){
        $(".imgSetting").css("transform","translateY(35px)");
                $(".profilGridImg img").css("transform", "scale(1)");

    });

$("nav").css("background","#0e191eb5");
$(".navSearchD").css("visibility","hidden");
</script>




<?php include 'footer.php'; ?>