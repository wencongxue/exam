<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>考试</title>
	<link rel="stylesheet" href="{getRootDir()}/public/css/basic.css">
	<link rel="stylesheet" href="{getRootDir()}/public/css/exam.css">
</head>
<body>
	<!-- 页面头部 -->
	<div class="header">
		<div class="username">姓名:{$smarty.cookies.username}</div>
		<div class="examname">{$e_info['title']} (总分 : {$p_info['totalScore']})</div>
		<div class="other">
			<div class="remaining"></div>
			<div class="submit">我要交卷</div>
		</div>
	</div>
	<!-- 答题卡 -->
	<ul class="cards">
		{for $var=1 to $qNum}
			<li><a href="#q{$var}">{$var}</a></li>
		{/for}
	</ul>
	<!-- 题目列表 -->
	<form action="{makeUrl('Exam','check')}" method="post">
		<input type="hidden" id="beginTime" value="{$e_info['beginTime']}">
		<input type="hidden" id="endTime" value="{$e_info['endTime']}">
		<input type="hidden" name="paperId" value="{$p_info['id']}">
		<input type="hidden" name="examId" value="{$e_info['id']}">
        <!-- 单选题 -->
        {if $sQues}
            <div class="single">
                <h2 class="title">单选题(每题{$p_info['sScore']}分) : </h2>
                {foreach $sQues as $key=>$val}
                    <div class="single-item" id="q{$s}">
                        <h3><span>{$s}. </span>{$val['desc']}</h3>
                        {foreach $val['opts'] as $_key=>$opt}
                            <label for="q{$s}{$_key}">{$_key}. <input type="radio" value="{$_key}" name="q{$s}" id="q{$s}{$_key}"> {$opt}</label>
                        {/foreach}
                        <span style="display: none;">{$s++}</span>
                    </div>
                {/foreach}
            </div>
        {/if}
        <!-- 多选题 -->
        {if $mQues}
            <div class="multiple">
                <h2 class="title">多选题(每题{$p_info['mScore']}分) : </h2>
                {foreach $mQues as $key=>$val}
                    <div class="multiple-item" id="q{$s}">
                        <h3><span>{$s}. </span>{$val['desc']}</h3>
                        {foreach $val['opts'] as $_key=>$opt}
                            <label for="q{$s}{$_key}">{$_key}. <input type="checkbox" value="{$_key}" name="q{$s}[]" id="q{$s}{$_key}"> {$opt}</label>
                        {/foreach}
                        <span style="display: none;">{$s++}</span>
                    </div>
                {/foreach}
            </div>
        {/if}
        <!-- 判断题 -->
        {if $cQues}
            <div class="check">
                <h2 class="title">判断题(每题{$p_info['cScore']}分) : </h2>
                {foreach $cQues as $key=>$val}
                    <div class="check-item" id="q{$s}">
                        <h3><span>{$s}. </span>{$val['desc']}</h3>
                        <label for="q{$s}A">A. <input type="radio" value="A" name="q{$s}" id="q{$s}A"> 正确</label>
                        <label for="q{$s}B">B. <input type="radio" value="B" name="q{$s}" id="q{$s++}B"> 错误</label>
                    </div>
                {/foreach}
            </div>
        {/if}
		<input type="submit" name="submit" id="submit">
	</form>
</body>
<script type="text/javascript" src="{getRootDir()}/public/js/exam.js"></script>
</html>