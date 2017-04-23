<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加考试</title>
	<link rel="stylesheet" href="{getRootDir}/public/css/basic.css">
	<link rel="stylesheet" href="{getRootDir}/public/css/exam_add.css">
</head>
<body>
	<form action="{makeUrl('Exam','exam_add')}" method="post">
		<label><span class="desc">考试名称 : </span></span><input type="text" name="title"><span>  ( *不得大于30位 )</span></label>
		<label><span class="desc">所属科目 : </span>
			<select name="subject">
				{if $allSubj}
					{foreach $allSubj as $key=>$value}
						<option value="{$value['id']}">{$value['sName']}</option>
					{/foreach}
				{else}
					<option value="0">当前没有科目,请先添加</option>
				{/if}
			</select>
		</label>
		<label><span class="desc">考试试卷 : </span><input type="text" name="paperName" readonly="readonly" id="paperName"><button id="getPaper" url="{makeUrl('Exam', 'paper_select')}">点击选择试卷</button></label>
		<input type="hidden" name="paperId" value="" id="paperId">
		<label><span class="desc">考试开始时间 : </span><input type="text" name="beginTime" class="sang_Calender"></label>
		<label><span class="desc">考试结束时间 : </span><input type="text" name="endTime" class="sang_Calender"></label>
		<label style="display: inline;"><input type="submit" value="发布考试" id="submit"></label>
	</form>
</body>
<script type="text/javascript" src="{getRootDir()}/public/js/public.js"></script>
<script type="text/javascript" src="{getRootDir()}/public/js/exam_add.js"></script>
<script type="text/javascript" src="{getRootDir()}/public/js/datetime.js"></script>
</html>