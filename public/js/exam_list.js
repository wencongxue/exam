var ckBtn       =  document.getElementById('all'),
    cks         =  document.getElementsByName('ids[]'),
    submitBtn1  =  document.getElementById('submit'),
    preview     =  document.getElementsByClassName('preview'),
    form        =  document.getElementsByTagName('form')[0],
    eles        =  document.getElementsByClassName('cont');
window.onload   =  function(){
	//自适应高度
	var ifm = window.parent.document.getElementById('iframe');
	window.parent.iFrameHeight(ifm);
	
	check(ckBtn,cks);              //表单的全选与取消全选
	alertUpdate(preview);          //弹出更新窗口
	limitLen(eles);	               //控制单元格内容长度
	submitBtn1.onclick = function(){
		if (allNot(cks)) {
			alert('请至少选择一条数据');
			return false;
		}
		return confirm('你真的要删除这些数据吗?') ? true : false;
	}

	//显示考试状态
	loadStatus();
}

//弹出修改用户数据的窗口
function alertUpdate(preview){
	for (var i = 0; i < preview.length; i++){
		preview[i].onclick = function(){
			openWindow(this.getAttribute('url'),550,500);
		}
	}
}

//显示考试状态
function loadStatus(){
	var endTimes   = document.getElementsByClassName('endTime');
	var beginTimes = document.getElementsByClassName('beginTime');
	var statuses   = document.getElementsByClassName('status');
	var nowTime    = (new Date()).getTime();

	for (var i = 0; i < endTimes.length; i++) {
		var endTime   = (new Date(endTimes[i].innerHTML)).getTime();
		var beginTime = (new Date(beginTimes[i].innerHTML)).getTime();
		statuses[i].innerHTML   = 
			nowTime < beginTime ? '<span style="color:purple;">还未开始</span>' :
		    nowTime < endTime   ? '<span style="color:green;">正在进行</span>'  :
			'<span style="color:red;">已经结束</span>';
	}
}