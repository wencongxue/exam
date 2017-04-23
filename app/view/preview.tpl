<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>试卷预览</title>
    <link rel="stylesheet" href="{getRootDir()}/public/css/basic.css">
    <link rel="stylesheet" href="{getRootDir()}/public/css/preview.css">
</head>
<body>
    <div class="paper-title">{$p_info['title']}</div>
    <div class="info">总分:{$p_info['totalScore']}   及格分数:{$p_info['passScore']}</div>
    <!-- 题目列表 -->
    <div class="q-list">
        <!-- 判断题 -->
        {if $cQues}
            <div class="check">
                <h2 class="title">判断题 : </h2>
                {foreach $cQues as $key=>$val}
                    <div class="check-item" id="q{$s}">
                        <h3><span>{$s}. </span>{$val['desc']}</h3>
                        <label for="q{$s}A">A. <input type="radio" value="A" name="q{$s}" id="q{$s}A"> 正确</label>
                        <label for="q{$s}B">B. <input type="radio" value="B" name="q{$s}" id="q{$s++}B"> 错误</label>
                    </div>
                {/foreach}
            </div>
        {/if}
        <!-- 单选题 -->
        {if $sQues}
            <div class="single">
                <h2 class="title">单选题 : </h2>
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
                <h2 class="title">多选题 : </h2>
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
    </div>
</body>
</html>