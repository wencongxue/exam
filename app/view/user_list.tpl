<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生列表</title>
	<link rel="stylesheet" href="{getRootDir()}/public/css/basic.css">
	<link rel="stylesheet" href="{getRootDir()}/public/css/table.css">
</head>
<body>
	<table border="1" cellspacing="0" cellpadding="0">
		<caption>学生信息管理</caption>
		<thead><tr><th>编号</th><th>用户名</th><th>所属班级</th><th>操作</th><th style="width: 20%;"><input type="checkbox" id="all" /></th></tr></thead>
		<tbody>
			{if $users}
				<form action="{makeUrl('Admin','multiDel')}" method="post">
					{foreach $users as $key=>$value}
						<tr>
							<td>{$s+++1}</td>
							<td>{$value['username']}</td>
							<td>{$value['class']}</td>
							<td><a href="#" url="{makeUrl('Admin','upUser')}/id/{$value['id']}" class="update">修改 </a> <a href="{makeUrl('Admin','delUser')}/id/{$value['id']}" onclick="return confirm('你确定要删除吗?');">删除</a></td>
							<td><input type="checkbox" name="ids[]" value="{$value['id']}"></td>
						</tr>
					{/foreach}
					<tr><td colspan="4">{$show}</td><td><input type="submit" value="批量删除" id="submit" onclick="return confirm('你确定要删除吗?');"></td></tr>
				</form>
			{else}
				<tr><td colspan="4">没有任何数据</td></tr>
			{/if}
		</tbody>
	</table>
	<form action="{makeUrl('Admin','user_list')}" method="get" style="margin:10px 0 0 20px;" id="filter">
		班级: <select name="class">
			{foreach $class as $value}
				<option value="{$value['id']}" {if $where == $value['id']}selected{/if}>{$value['class']}</option>
			{/foreach}
		</select>
		姓名 : <input type="text" name="username" value="{$smarty.get.username}">(如进行姓名查询,则不筛选班级)
		<input type="submit" value="筛选">
	</form>
</body>
<script type="text/javascript" src="{getRootDir()}/public/js/public.js"></script>
<script type="text/javascript" src="{getRootDir()}/public/js/user_list.js"></script>
</html>