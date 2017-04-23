<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改科目信息</title>
	<link rel="stylesheet" href="{getRootDir()}/public/css/basic.css">
	<style>
		form{
			width: 80%;
			margin:20px 10%;
		}
		form label{
			display: block;
			height: 35px;
			line-height: 35px;
		}
		form label span{
			color:red;
		}
	</style>
</head>
<body>
	<form action="{makeUrl('Other','subject_mod')}" method="post">
		<label>科目名称 : <input type="text" value="{$subject['sName']}" name="sName"> <span>(*不得大于20位)</span></label>
		<input type="hidden" name="id" value="{$subject['id']}">
		<label><input type="submit" id="submit" name="submit" value="修改"></label>
	</form>
</body>
<script type="text/javascript">
	window.onload = function(){
		var fm         = document.getElementsByTagName('form')[0];
		var submitBtn  = document.getElementById('submit');
		submitBtn.onclick = function(){
			if (fm.sName.value.trim() == '') {
				alert('科目名称不得为空');
				return false;
			}

			if (fm.sName.value.length > 20) {
				alert('科目名称不得大于20位');
				return false;
			}

			return true;
		}
	}
</script>
</html>