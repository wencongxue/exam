<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>选择试卷</title>
	<link rel="stylesheet" href="{getRootDir()}/public/css/basic.css">
	<link rel="stylesheet" href="{getRootDir()}/public/css/table.css">
</head>
<body>
	<table border="1" cellspacing="0" cellpadding="0">
		<caption>试卷管理</caption>
		<thead><tr><th>编号</th><th>试卷名称</th><th>所属科目</th><th>操作</th><th style="width: 20%;">选择试卷</th></tr></thead>
		<tbody>
			{if $paper}
				<form>
					{foreach $paper as $key=>$value}
						<tr>
							<td>{$s+++1}</td>
							<td class="title">{$value['title']}</td>
							<td>{$value['subject']}</td>
							<td><a href="#" url="{makeUrl('Paper','preview')}/id/{$value['id']}" class="update">预览 </a></td>
							<td><input type="radio" name="id" value="{$value['id']}" class="radios"></td>
						</tr>
					{/foreach}
					<tr><td colspan="4">{$show}</td><td><input type="submit" value="提交" id="submit"> </td></tr>
				</form>
			{else}
				<tr><td colspan="5">没有任何数据</td></tr>
			{/if}
		</tbody>
	</table>
	<form action="{makeUrl('Exam','paper_select')}" method="get" style="margin:10px 0 0 20px;" id="filter">
		科目: <select name="subject">
			<option value="all">所有</option>
			{foreach $subjects as $value}
				<option value="{$value['id']}" {if $where == $value['id']}selected{/if}>{$value['sName']}</option>
			{/foreach}
		</select>
		<input type="submit" value="筛选">
	</form>
	<br>
</body>
<script type="text/javascript" src="{getRootDir()}/public/js/public.js"></script>
<script type="text/javascript" src="{getRootDir()}/public/js/paper_select.js"></script>
</html>