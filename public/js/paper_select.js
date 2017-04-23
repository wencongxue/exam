var submitBtn1  =  document.getElementById('submit'),
    updates     =  document.getElementsByClassName('update'),
    form        =  document.getElementsByTagName('form')[0],
    eles        =  document.getElementsByClassName('title');
window.onload   =  function(){	
	alertUpdate(updates);          //弹出更新窗口
	limitLen(eles);	               //控制单元格内容长度
	submitBtn1.onclick = passVal;  //向父页面传值
}

//弹出修改用户数据的窗口
function alertUpdate(updates){
	for (var i = 0; i < updates.length; i++){
		updates[i].onclick = function(){
			openWindow(this.getAttribute('url'),550,500);
		}
	}
}

function passVal(){
	var radios    =  document.getElementsByClassName('radios');
	var noChecked = true;
	var index     = 0;
	for (var i = 0; i < radios.length; i++) {
		if (radios[i].checked) {
			noChecked = false;
			index     = i;
			break;
		}
	}
	if (noChecked) {
		alert('没有试卷被选择,请选择一张试卷');
		return false;
	}

	var paperId   = document.getElementsByClassName('radios')[index].value;
	var paperName = document.getElementsByClassName('title')[index].innerHTML;
	window.opener.document.getElementById('paperId').value   = paperId;
	window.opener.document.getElementById('paperName').value = paperName;

	alert('试卷添加成功');window.close();

	return false;
}