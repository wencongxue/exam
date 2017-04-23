<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加试题</title>
	<link rel="stylesheet" href="{getRootDir()}/public/css/basic.css">
	<link rel="stylesheet" href="{getRootDir()}/public/css/add_ques.css">
</head>
<body>
	<form action="{makeUrl('Question','add_ques')}" method="post">
		<label>试题类型 : 
			<select name="type" id="type">
				{if $types}
					{foreach $types as $value}
						<option value="{$value['id']}">{$value['type']}</option>
					{/foreach}
				{else}
					<option value="0">没有试题类型,请先去添加</option>
				{/if}
			</select>
		</label>
		<label>所属科目 : 
			<select name="subject" id="subject">
				{if $subjects}
					{foreach $subjects as $value}
						<option value="{$value['id']}">{$value['sName']}</option>
					{/foreach}
				{else}
					<option value="0">没有科目,请先去添加</option>
				{/if}
			</select>
		</label>
		<label>题目描述 : <br>
			<textarea name="desc" id="desc" cols="50" rows="2"></textarea>
		</label>
		<label><button id="add">添加一个选项</button> <button id="del">删除最后一个选项</button></label>
		<div id="cont">
			<label>A. <input type="radio" name="answer" value="A">标记为答案 <br>
				<textarea name="options[]"  cols="50" rows="2"></textarea>
			</label>
			<label>B. <input type="radio" name="answer" value="B">标记为答案 <br>
				<textarea name="options[]"  cols="50" rows="2"></textarea>
			</label>
			<label>C. <input type="radio" name="answer" value="C">标记为答案 <br>
				<textarea name="options[]"  cols="50" rows="2"></textarea>
			</label>
			<label>D. <input type="radio" name="answer" value="D">标记为答案 <br>
				<textarea name="options[]"  cols="50" rows="2"></textarea>
			</label>
		</div>
		<label><input type="submit" value="保存" id="submit"></label>
	</form>
</body>
<script type="text/javascript" src="{getRootDir()}/public/js/add_ques.js"></script>
</html>