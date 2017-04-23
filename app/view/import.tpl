<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>导入试题</title>
	<link rel="stylesheet" href="{getRootDir()}/public/css/basic.css">
	<style>
		form{
			margin:20px 0 10px 20px;
			border:1px dashed #ccc;
		}
		p{
			margin:20px 0 0 20px;
			color: red;
		}
	</style>
</head>
<body>
	<p>*仅支持txt文本文件</p>
	<form action="{makeUrl('Question','import')}" method="post" enctype="multipart/form-data">
		<input type="file" name="myFile" accept="text/plain">
		<input type="submit" value="导入">
	</form>
	<p><a href="{makeUrl('Question','getDemo')}">点击下载试题模板文件</a></p>
</body>
<script>
	window.onload = function(){
		var inputs = document.getElementsByTagName('input');
		inputs[1].onclick = function(){
			if (inputs[0].value == '') {
				alert('请选择一个文件');
				return false;
			}
			return true;
		}
	}
</script>
</html>