<?php include 'header.php'; ?>

<img  class="textBanner" src="img/textBanner.svg" alt="">



<form method="post" id="textForm">


	<div class="row">
		<div class="textGrid">
			

			<div class="input-field col s5  ">
				<i class="fas fa-pen-nib prefix"></i>
				<input id="textHeader" type="text" name="textHeader"data-error=".errTextHeader" class="validate">
				<label for="textHeader">Konunun başlığını giriniz</label>
				<div class="errTextHeader"></div>
			</div>
			<div class="input-field col s5  ">
				<i class="fab fa-github prefix"></i>
				<input id="gitHub" type="url" name="textGit" data-error=".errgitHub" class="validate">
				<label for="gitHub">Github dökümanı için linki buraya yapıştır :)</label>
				<a id="git_url" class="helper-text right-align inline" href="#githubContent">önizlemek için tıklayın</a>
				<div class="errgitHub errForm"></div>
			</div>

			<div class="input-field col s10  ">
 <div class="chips chips-autocomplete">   <input name="tag" data-error=".errTag" class="custom-class">   </div>
 <div class="errTag"></div>
			</div>
<div class="input-field col s10">
	<div class="row">
		<div class="col  s4">
	<label>
        <input name="kategori" type="radio" value="PHP"  />
        <span>PHP</span>
      </label>
</div>

<div class="col s4">
	<label>
        <input name="kategori" type="radio" value="JAVASCRİPT"  />
        <span>JAVASCRİPT</span>
      </label>
</div>
<div class="col s4">
	<label>
        <input name="kategori" type="radio" value="CSS"  />
        <span>CSS</span>
      </label>
</div>
</div>
	<div class="kategoriText errForm"></div>		

</div>
<div class="col s2 textButtonGrid">
				
				<button class="waves-effect waves-light btn-large" name="submit" type="submit">gönder</button>
				
<!-- <input type="submit"class="waves-effect waves-light btn" placeholder="gönder">
-->

</div>
</div>


</div>
<div class="input-field col s12">
	<textarea name="textcontent" id="editor1" cols="30" rows="10" data-error=".errTextContent"></textarea>

	<div class="errTextContent"></div>
</div>
</div>
</form>




<div id="githubContent" style="display: none;">fatihemre</div>


<!-- modal -->






<script src="https://cdn.ckeditor.com/4.11.2/standard-all/ckeditor.js"></script>


<script>
	
	$("#gitHub").on("blur",function(){

		var git_url__git=$('#gitHub').val().replace("https://github.com", "").replace(".git","");
		$("#githubContent").load( "markdown.php?textGit='https://raw.githubusercontent.com" + git_url__git  +  "/master/README.md'"  );
		$('.inline').modaal();
	});





</script>

<script>

	$(document).ready(function(){
		$('select').formSelect();
		$('select').show();



		CKEDITOR.replace('editor1',{

			extraPlugins: 'codesnippet , autogrow',
			codeSnippet_theme :'monokai_sublime',
			uiColor:"whitesmoke",
			autoGrow_minHeight :250,
			autoGrow_maxHeight: 550,
			//toolbar : 'Basic'
			toolbarGroups : [

			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
			{ name: 'links', groups: [ 'links' ] },
			{ name: 'insert', groups: [ 'Image'] },
			{ name: 'styles', groups: [ 'styles' ] },
			{ name: 'colors', groups: [ 'colors' ] },
			{ name: 'tools', groups: [ 'tools' ] },
			{ name: 'others', groups: [ 'others' ] },

			],
			removeButtons :'Source,Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Radio,TextField,Textarea,Button,ImageButton,HiddenField,Checkbox,Subscript,Superscript,CopyFormatting,CreateDiv,Language,BidiRtl,BidiLtr,Flash,SpecialChar,Iframe,PageBreak,Font,ShowBlocks,About,Select,Styles'


		});

	});

	





</script>


<script>

	$(document).ready(function(){
	$('.chips-autocomplete').chips({

		placeholder:"Etiket belirleyin.",
		limit:5,
		secondaryPlaceholder: '+Tag',
    autocompleteOptions: {
      data: {
        'Apple': null,
        'Microsoft': null,
        'Google': null
      },
      limit: Infinity,
      minLength: 1
    }
  });


 var denemeTag= JSON.stringify(M.Chips.getInstance($('.chips')).chipsData);

});



</script>


<?php 

include 'footer.php';
?>