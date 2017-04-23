<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加班级</title>
</head>
<body>
    <form action="{makeUrl('Other', 'class_add')}" method="post">
    	<label style="display: block;margin: 20px;">班级名称 : <input type="text" name="cName" id="cName"><span>(* 不得大于20位)</span></label>
    	<label><input type="submit" value="添加班级" id="submit"></label>
    </form>
</body>
<script>
	var btn     = document.getElementById('submit');
	var cName   = document.getElementById('cName');
	btn.onclick = function(){
		if (cName.value.trim() == '') {
			alert('班级名称不得为空');
			return false;
		}

		if (cName.value.length > 20) {
			alert('班级名称不得大于20位');
			return false;
		}
		return true;
	}
</script>
</html>