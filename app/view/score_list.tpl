<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>成绩列表</title>
	<link rel="stylesheet" href="{getRootDir()}/public/css/basic.css">
	<link rel="stylesheet" href="{getRootDir()}/public/css/table.css">
</head>
<body>
	<table border="1" cellspacing="0" cellpadding="0">
		<caption>成绩管理</caption>
		<thead><tr><th>编号</th><th>考试名称</th><th>所在班级</th><th>学生姓名</th><th>分数</th></tr></thead>
		<tbody>
			{if $score}
				{foreach $score as $key=>$value}
					<tr>
						<td>{$s+++1}</td>
						<td>{$value['title']}</td>
						<td>{$value['class']}</td>
						<td>{$value['username']}</td>
						<td>{$value['score']}</td>
					</tr>
				{/foreach}
				<tr><td colspan="5">{$show}</td></tr>
			{else}
				<tr><td colspan="5">没有任何数据</td></tr>
			{/if}
		</tbody>
	</table>
	<br>
	<form action="{makeUrl('Exam', 'score_list')}" method="get">
		考试名称 : <select name="examId">
						<option value="all" {if $smarty.get.examId == 'all'}selected{/if}>所有</option>
						{foreach $exam as $value}
							<option value="{$value['id']}" {if $smarty.get.examId == $value['id']}selected{/if}>{$value['title']}</option>
						{/foreach}
					</select>
		班级 : 		<select name="class">
						<option value="all" {if $smarty.get.class == 'all'}selected{/if}>所有</option>
						{foreach $class as $value}
							<option value="{$value['id']}" {if $smarty.get.class == $value['id']}selected{/if}>{$value['class']}</option>
						{/foreach}
					</select>
		<!-- 导出筛选结果的url -->
		<input type="hidden" id="url" value="{makeUrl('Exam', 'export_score')}">
		<input type="submit" value="筛选"> <input type="submit" value="导出筛选结果" id="exBtn">
	</form>
	<p style="margin-top: 10px;color: green;">导出时,如果只进行考试名称筛选,则会按班级分别导出成绩;如果只进行班级筛选,则会分别导出该班级所有的考试成绩;如果两者都不选,则会按班级和考试导出所有。</p>
</body>
<script type="text/javascript" src="{getRootDir()}/public/js/public.js"></script>
<script type="text/javascript" src="{getRootDir()}/public/js/score_list.js"></script>
</html>