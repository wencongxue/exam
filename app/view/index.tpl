<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{$title}</title>
	<link rel="stylesheet" href="{getRootDir()}/public/css/basic.css">
	<link rel="stylesheet" href="{getRootDir()}/public/css/index.css">
</head>
<body>
	<!-- 下面引入头部公共部分 -->
	{include file="index_prac.tpl"}
	<div class="main">
		<div class="items">
			<dl>
			<!--  -->
				<dd><a href="{makeUrl('Exam','exam_list_front')}" target="iframe">参加考试</a></dd>
				<dd><a href="#">考试记录</a></dd>
			</dl>
		</div>
		<div class="iframe">
			<iframe src="{makeUrl('Exam','exam_list_front')}" frameborder="0" name="iframe" id="iframe"></iframe>
		</div>
	</div>
</body>
<script type="text/javascript" src="{getRootDir()}/public/js/public.js"></script>
<script type="text/javascript" src="{getRootDir()}/public/js/index.js"></script>
</html>