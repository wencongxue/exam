var ckBtn       =  document.getElementById('all'),
    cks         =  document.getElementsByName('ids[]'),
    submitBtn1  =  document.getElementById('submit'),
    updates     =  document.getElementsByClassName('update'),
    form        =  document.getElementsByTagName('form')[0],
    eles        =  document.getElementsByClassName('cont');
window.onload   =  function(){
	//自适应高度
	var ifm = window.parent.document.getElementById('iframe');
	window.parent.iFrameHeight(ifm);
	
	check(ckBtn,cks);              //表单的全选与取消全选
	alertUpdate(updates);          //弹出更新窗口
	limitLen(eles);	               //控制单元格内容长度
	submitBtn1.onclick = function(){
		if (allNot(cks)) {
			alert('请至少选择一条数据');
			return false;
		}
		return confirm('你真的要删除这些数据吗?') ? true : false;
	}
	exportQues();
}

//弹出修改用户数据的窗口
function alertUpdate(updates){
	for (var i = 0; i < updates.length; i++){
		updates[i].onclick = function(){
			openWindow(this.getAttribute('url'),500,500);
		}
	}
}

//修改form的action
function exportQues(){
	var url       = document.getElementById('exportUrl').value;
	var exBtn     = document.getElementById('export');
	var exAllBtn  = document.getElementById('exportAll');
	exBtn.onclick = function(){
		if (allNot(cks)) {
			alert('请至少选择一条数据');
			return false;
		}
		form.action = url;
	}
	exAllBtn.onclick = function(){
		form.action = url + '/all/all/' + getQueryString('ques_list');
	}
}