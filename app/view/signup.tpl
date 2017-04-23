<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
	<link rel="stylesheet" type="text/css" href="{getRootDir}/public/css/basic.css">
	<link rel="stylesheet" type="text/css" href="{getRootDir}/public/css/signup.css">
</head>
<body>
	<form action="{makeUrl('Index','signup')}" method="post" id="signup">
		<fieldset>
			<legend>注册</legend>
			<label for="username">用 户 名 &nbsp;:  <input type="text" name="username" id="username"> (2-20位)</label>
			<label for="password">密　　码 :  <input type="password" name="password" id="password"> (至少5位)</label>
			<label for="username">密码确认 : <input type="password" name="confirmPass"></label>
			<label for="class">班级 : <select name="class" id="class">
					{if $classes}
						{foreach $classes as $item}
							<option value="{$item['id']}">{$item['class']}</option>
						{/foreach}
					{else}
						<option>当前没有班级,请联系管理员添加</option>
					{/if}
				</select>
			</label>
			<input type="submit" value="注册" name="submit" class="submit" id="submit"><p>已有账号?<a href="{makeUrl('Index','login')}">立刻登录</a></p>
		</fieldset>
	</form>
</body>
<script type="text/javascript" src="{getRootDir}/public/js/signup.js"></script>
</html>