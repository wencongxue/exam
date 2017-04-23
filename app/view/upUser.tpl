<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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
	</style>
</head>
<body>
	<form action="{makeUrl('Admin','upUser')}" method="post">
		<label>用户名 : <input type="text" value="{$user['username']}" name="username" readonly></label>
		<label>密　码 : <input type="password" value="" name="password"> (留空则不修改该项)</label>
		<label>班　级 : 
			<select name="class">
				{foreach $class as $value}
					<option value="{$value['id']}" {if $user['class'] == $value['id']}selected{/if}>{$value['class']}</option>
				{/foreach}
			</select>
		</label>
		<label><input type="submit" id="submit" name="submit" value="修改"></label>
	</form>
</body>
<script type="text/javascript">
	
</script>
</html>