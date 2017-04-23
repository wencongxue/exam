<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录到系统</title>
	<link rel="stylesheet" href="{getRootDir}/public/css/basic.css">
	<link rel="stylesheet" href="{getRootDir}/public/css/login.css">
</head>
<body>
	<form action="{makeUrl('Index','login')}" method="post" id="login">
		<fieldset>
			<legend>登录</legend>
			<label for="username">用户名 : <input type="text" name="username" id="username"> (2-20位)</label>
			<label for="password">密　码 : <input type="password" name="password" id="password"> (至少5位)</label>
			<label for="stu" style="display: inline;">身　份 : <input type="radio" name="type" value="0" checked="checked" id="stu">学生 </label><label for="admin" style="display: inline;"><input type="radio" name="type" value="1" id="admin"> 管理员</label><br>
			<input type="submit" value="登录" name="submit" class="submit" id="submit"><p>没有账号?<a href="{makeUrl('Index','signup')}">注册一个</a></p>
		</fieldset>
	</form>
</body>
<script type="text/javascript" src="{getRootDir}/public/js/login.js"></script>
</html>