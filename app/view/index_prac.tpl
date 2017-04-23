<div class="top">
	<p>当前用户 : <a href="#" class="user">{$smarty.cookies.username}</a>　<span href="#" id="changePass">修改密码</span>　<a href="{makeUrl('Index','logout')}">退出登录</a></p>
</div>
<div class="header">
	<div class="logo"><img src="{getRootDir}/public/img/logo_exam.png" alt=""></div>
	<ul id="nav">
		<li><a href="{makeUrl('Index','index')}">首页</a></li>
		<li><a href="{makeUrl('Exam','practice')}">练习</a></li>
	</ul>
</div>