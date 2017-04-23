<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>班级列表</title>
	<link rel="stylesheet" href="{getRootDir()}/public/css/basic.css">
	<link rel="stylesheet" href="{getRootDir()}/public/css/table.css">
</head>
<body>
	<table border="1" cellspacing="0" cellpadding="0">
		<caption>班级管理</caption>
		<thead><tr><th>编号</th><th>班级名称</th><th>操作</th><th style="width: 20%;"><input type="checkbox" id="all" /></th></tr></thead>
		<tbody>
			{if $class}
				<form action="{makeUrl('Other','multi_del_class')}" method="post">
					{foreach $class as $key=>$value}
						<tr>
							<td>{$s+++1}</td>
							<td class="cont">{$value['class']}</td>
							<td>
								<a href="#" url="{makeUrl('Other', class_mod)}/id/{$value['id']}" class="update">修改</a>
								<a href="{makeUrl('Other','class_del')}/id/{$value['id']}" onclick="return confirm('你确定要删除吗?');">删除</a>
							</td>
							<td><input type="checkbox" name="ids[]" value="{$value['id']}"></td>
						</tr>
					{/foreach}
					<tr><td colspan="3">{$show}</td><td><input type="submit" value="批量删除" id="submit"> </td></tr>
				</form>
			{else}
				<tr><td colspan="4">没有任何数据</td></tr>
			{/if}
		</tbody>
	</table>
	<br>
	<center><a href="{makeUrl('Other', 'class_add')}">新增班级</a></center>
</body>
<script type="text/javascript" src="{getRootDir()}/public/js/public.js"></script>
<script type="text/javascript" src="{getRootDir()}/public/js/paper_list.js"></script>
</html>