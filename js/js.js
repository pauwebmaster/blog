$(document).ready(function(){




/*
*
* GRADİENT SİDENAV
*
*/
var granimInstance = new Granim({
  element: '#sidenavCanvasBanner',
  direction: 'top-bottom',
  isPausedWhenNotInView: true,
  states : {
    "default-state": {
      gradients: [
      ['#0e191e', '#2f1e16'],
      ['#2f1627', '#0e191e'],
      ['#2f1e16', '#2f1e16']
      ]
    }
  }
});





  /*
  *
  * JGUERY CENTER  JAVASCRİPT
  *
  */


  jQuery.fn.center = function(parent) {
    if (parent) {
      parent = this.parent();
    } else {
      parent = window;
    }
    this.css({
      "position": "absolute",
      "top": ((($(parent).height() - this.outerHeight()) / 2) + $(parent).scrollTop() + "px"),
      "left": ((($(parent).width() - this.outerWidth()) / 2) + $(parent).scrollLeft() + "px")
    });
    return this;
  }

//login card centered
$(".login-block").center(true);

$("#forget").center(true);
  /*
  *
  *  SİDEBAR
  *
  */

  $(document).ready(function(){
    $('.sidenav').sidenav();
  });



 /*
*
*  DATA-SETTİNG
*
*/

/*$('.datepicker').datepicker(
{
  autoClose: true,
  container: 'body',
  format: 'dd/mm/yyyy',
  showMonthAfterYear:true,
  showDaysInNextAndPreviousMonths:true,
  selectYears:30,
}
);*/

  /*s
*
*  LOGİN MODALS -karartma
*
*/
$(".login-block").modal();


/*
*
*  LOGİN OPEN
*
*/
$("#tikla").click(function() {

  $(".login-block").toggleClass("animated fadeInDown").
  css("display","block")
  .toggleClass("animated fadeInDown","slow");
});

/*
*
*  LOGİN CLOSE
*
*/

$("#close").click(function() {
 $(".login-block").toggleClass("animated zoomOut")
 .toggleClass("animated zoomOut","slow",function(){
  $(".login-block").hide();
  $(".loginUsers").show();
  $(".signUsers").hide();
});
 $(".login-block").modal("close");



 $(".login-block input").each(function(){
  $(this).val("");
  var errMsj=  $(this).attr("data-error");
  $(errMsj).text("");
});
 $(".login-block label").each(function(){
  $(this).removeClass("active");
});

} );


/*
*
*  LOGİN SİGN İN
*
*/


$(".login_signButton").click(function() {
  $( ".loginUsers" ).hide( "slide", { direction: "down" }, "slow",function(){ $(".signUsers").show("slide", { direction: "up" },"slow");     } );
} );


 /*
*
*  LOGİN SİGN İN TO LOGİN BUTTON
*
*/


$(".users-loginButton span").
click(function(){ 
  $( ".signUsers" ).hide( "slide", { direction: "up" }, "slow",function(){ $(".loginUsers").show("slide", { direction: "down" },"slow");     } );
});


/*
*
*  LOGİN KAYIT ETMEK
*
*/

/*$("button[name='loginButton']").click(function() {


        //code empty


      });*/

      jQuery.validator.addMethod("noSpace", function(value, element) { 
        return value.indexOf(" ") < 0 && value != ""; 
      }, "Boşluk bırakmadan giriniz.");

      $(".kayit").validate({
        rules: {
          username: {
            required: true,
            minlength: 5,
            remote:"check.php",
            noSpace:true

          },
          email: {
            required: true,
            email:true,
            remote: "check.php"
          },
          password: {
            required: true,
            minlength: 5,
            noSpace:true
          },
          cpassword: {
            required: true,
            minlength: 5,
            equalTo: "#siginPassword"
          },
          phone:{
            required: true,
            phoneUS: true
          }

        },
              //For custom messages
              messages: {
                username:{
                  required: "Lütfen bu alanı doldurun.",
                  minlength: "En az 3 karekter giriniz.",
                  remote: jQuery.validator.format("{0} ismi kullanımda.")
                },
                email:{
                  required: "Lütfen bu alanı doldurun.",
                  email: "Lütfen doğru adres giriniz.",
                  remote: jQuery.validator.format("{0} zaten kullanımda")
                },
                password:{
                  required: "Lütfen bu alanı doldurun.",
                  minlength: "En az 5 karekter giriniz."
                }, 
                cpassword:{
                  required: "Lütfen bu alanı doldurun.",
                  minlength: "En az 5 karekter giriniz.",
                  equalTo:"Lütfen şifreyi doğru giriniz."
                },
                phone:{
                  required: "Lütfen bu alanı doldurun",
                  phoneUS: "Geçerli bir telefon numarası giriniz."
                }
              },
              errorElement : 'div',
              errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                $(placement).addClass("errForm");
                if (placement) {
                  $(placement).append(error);
                } else {
                  error.insertAfter(element);
                }
              },
              submitHandler: function(){              
                myAjax(
                  "post",
                  "users.php",
                  $(".kayit").serialize()+"&captchai="+grecaptcha.getResponse(1),
                  function(){
                    M.toast({html: 'Giriş için  e-mail onay mesaji gönderdik', classes: 'rounded  green darken-2 ',displayLength:5000,activationPercent:0.8});
                    $("#loading").hide("fade","slow");
                  },
                  function(){
                    $("#loading").show("fade","fast");
                  });
              }

            });

/*
*
*  LOGİN GİRİŞ YAP
*
*/

$("#loginform").validate({
  rules:{

    loginuser:{
      required: true,
      minlength: 5
    },
    loginpassword:{
      required:true,
      minlength:5
    }
  },
  messages:{
    loginuser:{
      required:"Bu alanı boş bırakmayın.",
      minlength:"En az 5 karekter giriniz."

    },
    loginpassword:{
      required:"Bu alanı boş bırakmayın.",
      minlength: "En az 5 karekter giriniz."
    }


  }
  ,
  errorElement : 'div',
  errorPlacement: function(error, element) {
    var placement = $(element).data('error');
    $(placement).addClass("errForm");
    if (placement) {
      $(placement).append(error);
    } else {
      error.insertAfter(element);
    }
  },


  submitHandler: function(){ 
    myAjax(
      "post",
      "userID.php",
      $("#loginform").serialize()+"&captcha="+grecaptcha.getResponse(0),
      function(data){

        if (data===false) {
          javascript:grecaptcha.reset(scrt);
                    //errmessages
                    var placement  =[ $("#loginUsername").data('error'),$("#icon-password").data('error')];
                    
                    placement.forEach(element => {
                     $(element).addClass("errForm");
                     $(element).text("kullanıcı adı ya da şifre yanlıştır.");
                   });}
                    var errDeleteLogin  =[ $("#loginUsername"),$("#icon-password")];
                    errDeleteLogin.forEach(element => {
                     $(element).focus(function() {
                      let  errKey= $(this).data('error');
                      $(errKey).text(" ");
                      

                    });

                   });
                    

                    $("#loading").hide("fade","slow");
                  },
                  function(){
                    $("#loading").show("fade","fast");
                  });
  }



  

});

/*
*
* textForm validate
* 
*
*/
$("#textForm").validate({
  rules:{
    textHeader:{
      required:true,
      minlength:5

    },
    textGit:{
      url:true


    },
    textContent:{
      minlength:160
    },
    kategori:{
      required:true
    }
    ,
    tag:{
      //required:true
    }

  },
  messages:{
    textHeader:{
      required:"Lütfen başlık giriniz.",
      minlength:"En az 5 karakter giriniz."
    },
    textGit:{
      url:"gitHub adresi giriniz."
    },
    textContent:{
      minlength:"En az 160 karakter girmelisiniz."
    },
    kategori:
    {
      required:"Lütfen kategori belirleyiniz.",

    },
    tag:{
          //  required:"En az bir etiket giriniz",

    }

  },
  errorElement : 'div',
  errorPlacement: function(error, element) {
          var placement = $(element).data('error');

          $(placement).addClass("errForm");
          if ( element.is(":radio") )
          {
            //$(".profilPageGender").addClass("errForm");
            $(".kategoriText").append(error);
          }
          
        

          else if (placement) {
            $(placement).append(error);
          } else {
            error.insertAfter(element);
          }
        },
  submitHandler: function(){ 
    for ( instance in CKEDITOR.instances )
    {
     CKEDITOR.instances[instance].updateElement();

     $.ajax({
          type:'POST',            // - POST veya GET
          data:$("#textForm").serialize()+"&tag="+JSON.stringify(M.Chips.getInstance($('.chips')).chipsData),              // - Yukarıda data değişkenini tanımladık.
          dataType:'json',          // - JSON Formatında Gönderilmesini Sağladık.
          url:'textSend.php',          // - Data Bilgisinin Gönderileceği Dosya Adresi.
          success:function(){      // - Success, complete ve error Fonksiyonları vardır.
            alert("başarılı"); // - Gelen Verimizi Sonuc Divinin İçerisine Yazdırdık.
          }
        });
   }
 }

});







$('.loginUsers input').keypress(function(e) {
  if (e.which == 13) {
  	$("#loginButton").click();
  }
});


/**
*
*       PROFİL SAYFASI
*
**/



$(".profilSettingForm").validate({
  rules: {
    name: {
      required: true,
      minlength: 2
    },
    last_name: {
      required: true,
      minlength:2
    },
    date: {
      required: true
    },
    telefon: {
      required: true,
      phoneUS:true
    },
    
    passwordOld:{
      minlength:5
    },
    passwordNew:{
      minlength:5,
      
    },
    passwordNew2:{
      minlength:5,
      equalTo:"#passwordNew"
    }
    ,
    gender:{
      required:true
    },
    userBio:{
      minlength:50
    }

  },
              //For custom messages
              messages: {
               name: {
                required: "Doldurulması zorunlu alan.",
                minlength: "En az 2 karakter giriniz."
              },
              last_name: {
               required: "Doldurulması zorunlu alan.",
               minlength: "En az 2 karakter giriniz."
             },
             date: {
               required: "Doldurulması zorunlu alan."
             },
             telefon: {
               required: "Doldurulması zorunlu alan.",
               phoneUS:"Geçerli telefon numarası giriniz."

             },
             passwordOld:{
              minlength:"En az 5 karakter giriniz."
            },
            passwordNew:{
              minlength:"En az 5 karakter giriniz.",
            }, 
            passwordNew2:{
              minlength:"En az 5 karakter giriniz.",
              equalTo:"Lütfen şifreyi doğru giriniz."
            },
            gender:{
             required: "Doldurulması zorunlu alan."
           },
           userBio:{
            minlength:"En az 50 karakter giriniz."
          }
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');

          $(placement).addClass("errForm");
          if ( element.is(":radio") )
          {
            //$(".profilPageGender").addClass("errForm");
            $(".profilPageGender").append(error);
          }

          else if (placement) {
            $(placement).append(error);
          } else {
            error.insertAfter(element);
          }
        },
        submitHandler: function(){ 
          myAjax(
            "post",
            "profilEdit.php",
            $(".profilSettingForm").serialize()+"&resimlink='"+$(".profilGridImg img").attr("src")+"'",
            function(){
              M.toast({html: 'Profiliniz Güncellenmiştir', classes: 'rounded  green darken-2 ',displayLength:5000,activationPercent:0.8});
              $("#loading").hide("fade","slow");
            },
            function(){
              $("#loading").show("fade","fast");
            });
        }

      });

/*
*
*  forget.modal
*
*/

$("#forgetForm").validate({
  rules:{
   f_email:{
    required:true,
    email:true
   }

  },
  messages:{
   f_email:{
required:"Doldurulması zorunlu alan.",
email:"Dogru email hesabı giriniz."

   }

  },
  errorElement : 'div',
  errorPlacement: function(error, element) {
          var placement = $(element).data('error');

          $(placement).addClass("errForm");
        
           if (placement) {
            $(placement).append(error);
          } else {
            error.insertAfter(element);
          }
        },
submitHandler: function(){              
                myAjax(
                  "post",
                  "forget.php",
                  $("#forgetForm").serialize(),
                  function(){
                    M.toast({html: 'Mail adresinizi kontrol ediniz.', classes: 'rounded  green darken-2 ',displayLength:5000,activationPercent:0.8});
                    $(".loading-Bar").hide("fade","slow");
                  },
                  function(){
                    $(".loading-Bar").show("fade","fast");
                  });
              }

            

});

/*
*
*  AJAX
*
*/

function myAjax(type,url,data,success,beforeSend,complete){
  this.type=type;
  this.url=url;
  this.data=data;
  this.success=success;
  this.beforeSend=beforeSend;
  this.complete=complete;
  //console.log(this.beforeSend)
  $.ajax({
    type:this.type,
    url: this.url,
    data: this.data,
    beforeSend:  this.beforeSend,
    complete: this.complete ,
    success: this.success,
  })

}


            //ready content...
          });





