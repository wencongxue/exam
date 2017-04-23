<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>试卷列表</title>
	<link rel="stylesheet" href="{getRootDir()}/public/css/basic.css">
	<link rel="stylesheet" href="{getRootDir()}/public/css/table.css">
</head>
<body>
	<table border="1" cellspacing="0" cellpadding="0">
		<caption>考试管理</caption>
		<thead><tr><th>编号</th><th>考试名称</th><th>所属科目</th><th>开始时间</th><th>结束时间</th><th>状态</th><th>操作</th><th style="width: 10%;"><input type="checkbox" id="all" /></th></tr></thead>
		<tbody>
			{if $exam}
				<form action="{makeUrl('Exam','multi_del')}" method="post">
					{foreach $exam as $key=>$value}
						<tr>
							<td>{$s+++1}</td>
							<td class="cont">{$value['title']}</td>
							<td>{$value['subject']}</td>
							<td class="beginTime">{$value['beginTime']}</td>
							<td class="endTime">{$value['endTime']}</td>
							<td class="status"></td>
							<td>
								<a href="#" url="{makeUrl('Paper','preview')}/id/{$value['paperId']}" class="preview">预览试卷 </a> 
								<a href="{makeUrl('Exam','exam_del')}/id/{$value['id']}" onclick="return confirm('你确定要删除吗?');">删除</a>
							</td>
							<td><input type="checkbox" name="ids[]" value="{$value['id']}"></td>
						</tr>
					{/foreach}
					<tr><td colspan="7">{$show}</td><td><input type="submit" value="批量删除" id="submit"> </td></tr>
				</form>
			{else}
				<tr><td colspan="8">没有任何数据</td></tr>
			{/if}
		</tbody>
	</table>
	<form action="{makeUrl('Exam','exam_list')}" method="get" style="margin:10px 0 0 20px;" id="filter">
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
<script type="text/javascript" src="{getRootDir()}/public/js/exam_list.js"></script>
</html>