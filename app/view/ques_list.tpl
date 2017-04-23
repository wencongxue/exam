<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>试题列表</title>
	<link rel="stylesheet" href="{getRootDir()}/public/css/basic.css">
	<link rel="stylesheet" href="{getRootDir()}/public/css/table.css">
</head>
<body>
	<table border="1" cellspacing="0" cellpadding="0">
		<caption>试题管理</caption>
		<thead><tr><th>编号</th><th>题型</th><th>试题描述</th><th>所属科目</th><th>操作</th><th style="width: 30%;"><input type="checkbox" id="all" /></th></tr></thead>
		<tbody>
			{if $ques}
				<form action="{makeUrl('Question','multiDel')}" method="post">
					{foreach $ques as $key=>$value}
						<tr>
							<td>{$s+++1}</td>
							<td>{$value['type']}</td>
							<td class="cont">{$value['cont']}</td>
							<td>{$value['subject']}</td>
							<td><a href="#" url="{makeUrl('Question','upQues')}/id/{$value['id']}" class="update">修改 </a> <a href="{makeUrl('Question','delQues')}/id/{$value['id']}" onclick="return confirm('你确定要删除吗?');">删除</a></td>
							<td><input type="checkbox" name="ids[]" value="{$value['id']}"></td>
						</tr>
					{/foreach}
					<tr><td colspan="5">{$show}</td><td><input type="submit" value="批量删除" id="submit"> <input type="submit" value="导出所选" id="export"> <input type="submit" value="导出筛选结果" id="exportAll"></td></tr>
					<!-- 导出时的url -->
					<input type="hidden" id="exportUrl"   value="{makeUrl('Question','export')}">
				</form>
			{else}
				<tr><td colspan="6">没有任何数据</td></tr>
			{/if}
		</tbody>
	</table>
	<form action="{makeUrl('Question','ques_list')}" method="get" style="margin:10px 0 0 20px;" id="filter">
		题型: <select name="type">
			<option value="all" {if $where1 == $value['id']}selected{/if}>所有</option>
			{foreach $types as $value}
				<option value="{$value['id']}" {if $where1 == $value['id']}selected{/if}>{$value['type']}</option>
			{/foreach}
		</select>
		科目: <select name="subject">
			<option value="all" {if $where2 == $value['id']}selected{/if}>所有</option>
			{foreach $subjects as $value}
				<option value="{$value['id']}" {if $where2 == $value['id']}selected{/if}>{$value['sName']}</option>
			{/foreach}
		</select>
		题干或选项 : <input type="text" name="cont" value="{$smarty.get.cont}">(支持模糊查询)
		<input type="submit" value="筛选">
	</form>
	<br>
	 <a href="{makeUrl('Question','del_repeat')}">点击去除重复的试题</a>
</body>
<script type="text/javascript" src="{getRootDir()}/public/js/public.js"></script>
<script type="text/javascript" src="{getRootDir()}/public/js/ques_list.js"></script>
</html>