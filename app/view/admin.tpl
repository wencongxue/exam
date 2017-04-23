<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>考试系统后台</title>
	<link rel="stylesheet" href="{getRootDir()}/public/css/basic.css">
	<link rel="stylesheet" href="{getRootDir()}/public/css/admin.css">
</head>
<body>
	<div class="top">
		<p>当前用户 : <a href="#" class="user">{$smarty.cookies.admin}</a>　<span href="#" id="changePass"></span>　<a href="{makeUrl('Admin','logout')}">退出登录</a></p>
	</div>
	<div class="header">
		<div class="logo"><img src="{getRootDir()}/public/img/logo_exam.png" alt=""></div>
	</div>

	<div class="main">
		<div class="items">
			<dl>
				<dt>学生信息管理</dt>
				<dd class="selected"><a href="{makeUrl('Admin','user_list')}" target="iframe">学生列表</a></dd>
			</dl>
			<dl>
				<dt>试题管理</dt>
				<dd><a href="{makeUrl('Question','ques_list')}" target="iframe">试题列表</a></dd>
				<dd><a href="{makeUrl('Question','add_ques')}" target="iframe">添加试题</a></dd>
				<dd><a href="{makeUrl('Question','import')}" target="iframe">导入试题</a></dd>
			</dl>
			<dl>
				<dt>试卷管理</dt>
				<dd><a href="{makeUrl('Paper', 'paper_list')}" target="iframe">试卷列表</a></dd>
				<dd><a href="{makeUrl('Paper', 'paper_add')}" target="iframe">添加试卷</a></dd>
			</dl>
			<dl>
				<dt>考试管理</dt>
				<dd><a href="{makeUrl('Exam', 'exam_list')}" target="iframe">考试列表</a></dd>
				<dd><a href="{makeUrl('Exam', 'exam_add')}" target="iframe">添加考试</a></dd>
			</dl>
			<dl>
				<dt>成绩管理</dt>
				<dd><a href="{makeUrl('Exam', 'score_list')}" target="iframe">导出成绩</a></dd>
			</dl>
			<dl>
				<dt>其他管理</dt>
				<dd><a href="{makeUrl('Other', 'subject_list')}" target="iframe">科目信息管理</a></dd>
				<dd><a href="{makeUrl('Other', 'class_list')}" target="iframe">班级信息管理</a></dd>
			</dl>
		</div>
		<iframe src="{makeUrl('Admin','user_list')}" frameborder="0" name="iframe" id="iframe"></iframe>
	</div>
</body>
<script type="text/javascript" src="{getRootDir()}/public/js/public.js"></script>
<script type="text/javascript" src="{getRootDir()}/public/js/admin.js"></script>
</html>