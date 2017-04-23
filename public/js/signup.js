window.onload = function(){
	var submit = document.getElementById("submit");
	submit.onclick = checkSignup;
}

function checkSignup(){
	var form = document.getElementById('signup');
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
	if (form.confirmPass.value.trim() == '') {
		alert("密码确认不得为空");
		form.password.focus();
		return false;
	}
	if (form.password.value.trim() != form.confirmPass.value.trim()) {
		alert("两次输入密码必须一致");
		return false;
	}
	return true;
}