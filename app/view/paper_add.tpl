<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加试卷</title>
	<link rel="stylesheet" href="{getRootDir}/public/css/basic.css">
	<link rel="stylesheet" href="{getRootDir}/public/css/paper_add.css">
</head>
<body>
	<form action="{makeUrl('Paper','paper_add')}" method="post">
		<label><span class="desc">试卷名称 : </span></span><input type="text" name="title"><span>  ( *不得大于30位 )</span></label>
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
		<label><span class="desc">总　　分 : </span><input type="text" name="totalScore" readonly="readonly" value="100"> <span>  ( *根据所选题目分数自动累加 )</span></label>
		<label><span class="desc">及格分数 : </span><input type="text" name="passScore" value="60"> <span>  ( *默认为总分的60% )</span></label>
		<label><span class="desc">单选题数量 : </span><input type="text" name="singleNum" value="10"></label>
		<label><span class="desc">单选题每题分值 : </span><input type="text" name="singleScore" value="3"></label>
		<label><span class="desc">多选题数量 : </span><input type="text" name="multipleNum" value="10"></label>
		<label><span class="desc">多选题每题分值 : </span><input type="text" name="multipleScore" value="5"></label>
		<label><span class="desc">判断题数量 : </span><input type="text" name="checkNum" value="10"></label>
		<label><span class="desc">判断题每题分值 : </span><input type="text" name="checkScore" value="2"></label>
		<label><input type="submit" value="添加试卷" id="submit"></label>
	</form>
</body>
<script type="text/javascript" src="{getRootDir()}/public/js/paper_add.js"></script>
</html>