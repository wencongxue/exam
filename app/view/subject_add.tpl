<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加科目</title>
</head>
<body>
    <form action="{makeUrl('Other', 'subject_add')}" method="post">
    	<label style="display: block;margin: 20px;">科目名称 : <input type="text" name="sName" id="sName"><span>(* 不得大于20位)</span></label>
    	<label><input type="submit" value="添加科目" id="submit"></label>
    </form>
</body>
<script>
	var btn     = document.getElementById('submit');
	var sName   = document.getElementById('sName');
	btn.onclick = function(){
		if (sName.value.trim() == '') {
			alert('科目名称不得为空');
			return false;
		}

		if (sName.value.length > 20) {
			alert('科目名称不得大于20位');
			return false;
		}
		return true;
	}
</script>
</html>