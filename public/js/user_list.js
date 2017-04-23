var ckBtn       =  document.getElementById('all'),
    cks         =  document.getElementsByName('ids[]'),
    submitBtn1  =  document.getElementById('submit'),
    updates     =  document.getElementsByClassName('update');
window.onload   =  function(){
	//自适应高度
	var ifm = window.parent.document.getElementById('iframe');
	window.parent.iFrameHeight(ifm);
	
	check(ckBtn,cks);
	submitBtn1.onclick = function(){
		if (allNot(cks)) {
			alert('请至少选择一条数据');
			return false;
		}
		return true;
	}
	alertUpdate(updates);
}

//弹出修改用户数据的窗口
function alertUpdate(updates){
	for (var i = 0; i < updates.length; i++){
		updates[i].onclick = function(){
			openWindow(this.getAttribute('url'),500,300);
		}
	}
}