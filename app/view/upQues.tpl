<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改试题</title>
	<link rel="stylesheet" href="{getRootDir()}/public/css/basic.css">
	<style>
		form{
			margin: 10px 0 0 50px;
		}
		form label{
			display: block;
			margin-top: 15px;
		}
	</style>
</head>
<body>
	<form action="{makeUrl('Question','upQues')}" method="post">
		<label>试题类型 : 
			<select name="type" id="type" disabled="disabled">
				{if $types}
					{foreach $types as $value}
						<option value="{$value['id']}" {if $old_type == $value['id']}selected{/if}>{$value['type']}</option>
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
						<option value="{$value['id']}" {if $old_subj == $value['id']}selected{/if}>{$value['sName']}</option>
					{/foreach}
				{else}
					<option value="0">没有科目,请先去添加</option>
				{/if}
			</select>
		</label>
		<label>题目描述 : <br>
			<textarea name="desc" id="desc" cols="50" rows="2">{$desc}</textarea>
		</label>
		<div id="cont">
			{if $str_type == '单选题'}
				{foreach $cont as $value}
					<label>{$value|substr:0:2}<input type="radio" name="answer" value="A" {if $answer == $value[0]}checked{/if}>标记为答案 <br>
						<textarea name="options[]"  cols="50" rows="2">{$value|substr:2}</textarea>
					</label>
				{/foreach}
			{elseif $str_type == '多选题'}
				{foreach $cont as $value}
					<label>{$value|substr:0:2}<input type="checkbox" name="answer[]" value="A" {if  {$answer|stristr:$value[0]} != false }checked{/if}>标记为答案<br>
							<textarea name="options[]"  cols="50" rows="2">{$value|substr:2}</textarea>
					</label>
				{/foreach}
			{elseif $str_type == '判断题'}
				<label><input type="radio" name="answer" value="A" {if $answer == 'A'}checked{/if}> 正确</label>
				<label><input type="radio" name="answer" value="B" {if $answer == 'B'}checked{/if}> 错误</label>
			{/if}
		</div>
		<input type="hidden" name="id" value="{$smarty.get.id}">
		<label><input type="submit" value="保存" id="submit"></label>
	</form>
</body>
<script type="text/javascript" src="{getRootDir()}/public/js/upQues.js"></script>
</html>