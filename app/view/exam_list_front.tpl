<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{getRootDir()}/public/css/basic.css">
	<style>
		h2{
			font-size: 20px;
			color: green;
			margin: 20px 0 5px 10px;
			padding-bottom: 5px;
			font-weight: normal;
			border-bottom: 2px dashed #ccc; 
		}
		.container{
			margin: 0 0 10px 40px;
			padding-bottom: 10px;
		}
		.container h3{
			font-weight: normal;
			font-size: 15px;
			color: #666;
			margin: 5px 0;
			height: 20px;
			line-height: 20px;
		}
		.container .item{
			width: 100%;
			height: 50px;
			border-bottom: 1px solid #ccc;
			padding-bottom: 5px;
		}
		.container .item div{
			width: 100%;
			height: 30px;
			line-height: 30px;
		}
		.container p {
			width: 60%;
			float: left;
			padding-left: 10%;
		}
		.container a{
			display: block;
			float: right;
			width: 30%;
		}

	</style>
</head>
<body>
	<h2>已存在的考试</h2>
	<div class="container">
		{if $exam}
			{foreach $exam as $value}
				<div class="item">
					<h3>考试时间 : {$value['beginTime']}---{$value['endTime']}</h3>
					<div>
						<p>{$value['title']}</p>
						<a href="{makeUrl('Exam','exam')}/examId/{$value['id']}/paperId/{$value['paperId']}" target="_parent">点击参加</a>
					</div>
				</div>
			{/foreach}
		{/if}
	</div>
	<center>{$show}</center>
</body>
</html>