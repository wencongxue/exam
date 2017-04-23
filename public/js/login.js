window.onload = function(){
	var submit = document.getElementById("submit");
	submit.onclick = checkLogin;
}

function checkLogin(){
	var form = document.getElementById('login');
	if (form.username.value.trim() == '') {
		alert("用户名不得为空");
		form.username.focus();
		return false;
	}
	if (form.username.value.trim().length < 2 || form.username.value.trim().length > 20) {
		alert("用户名不得小于2位或者大于20位");
		form.username.focus();
		return false;
	}

	if (form.password.value.trim() == '') {
		alert("密码不得为空");
		form.password.focus();
		return false;
	}
	if (form.password.value.trim().length < 5) {
		alert("密码长度不得小于5位");
		form.password.focus();
		return false;
	}

	return true;
}