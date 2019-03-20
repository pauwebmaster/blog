

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>markdown</title>
	<link rel="stylesheet" href="css/editormd.preview.css" />
	<style>            
	.editormd-html-preview {
		width: 90%;
		margin: 0 auto;
	}
</style>
</head>
<body>


	<div id="layout">

		<div id="test-editormd-view">

			<textarea style="display:none;" name="test-editormd-markdown-doc"></textarea>               
		</div>



		<div id="test-editormd-view2">
			<textarea id="append-test" style="display:none;">
			</textarea>          
		</div>



	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="lib/marked.min.js"></script>
	<script src="lib/prettify.min.js"></script>
	<script src="lib/raphael.min.js"></script>
	<script src="lib/underscore.min.js"></script>
	<script src="lib/sequence-diagram.min.js"></script>
	<script src="lib/flowchart.min.js"></script>
	<script src="lib/jquery.flowchart.min.js"></script>

	<script src="js/editormd.js"></script>
	<script type="text/javascript">
		$(function() {
			var testEditormdView, testEditormdView2;

//url parçalama yap link buraya gelecek databaseden



			let readme= <?php echo $_GET["textGit"]; ?>;
			//let readme= "https://raw.githubusercontent.com/pauwebmaster/codesdb/master/README.md"
						


			$.get(readme, function(markdown) {

				testEditormdView = editormd.markdownToHTML("test-editormd-view", {
                        markdown        : markdown ,//+ "\r\n" + $("#append-test").text(),
                        //htmlDecode      : true,       // 开启 HTML 标签解析，为了安全性，默认不开启
                        htmlDecode      : "style,script,iframe",  // you can filter tags decode
                        //toc             : false,
                        tocm            : true,    // Using [TOCM]
                        //tocContainer    : "#custom-toc-container", // 自定义 ToC 容器层
                        //gfm             : false,
                        //tocDropdown     : true,
                        // markdownSourceCode : true, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
                        emoji           : true,
                        taskList        : true,
                        tex             : true,  // 默认不解析
                        flowChart       : true,  // 默认不解析
                        sequenceDiagram : true,  // 默认不解析
                    });

                    //console.log("返回一个 jQuery 实例 =>", testEditormdView);
                    
                    // 获取Markdown源码
                    //console.log(testEditormdView.getMarkdown());
                    
                    //alert(testEditormdView.getMarkdown());
                });

			testEditormdView2 = editormd.markdownToHTML("test-editormd-view2", {
                    htmlDecode      : "style,script,iframe",  // you can filter tags decode
                    emoji           : true,
                    taskList        : true,
                    tex             : true,  // 默认不解析
                    flowChart       : true,  // 默认不解析
                    sequenceDiagram : true,  // 默认不解析
                });
		});
	</script>



	<?php 
	include 'footer.php';
	?>