var fm        = document.getElementsByTagName('form')[0];
var submitBtn = document.getElementById('submit');
var getExamBtn = document.getElementById('getPaper');

window.onload = function(){
	//载入页面时自适应高度
	var ifm = window.parent.document.getElementById('iframe');
	window.parent.iFrameHeight(ifm);

	//点开日期时间插件时,防止出现滚动条
	fm.beginTime.onclick = function(){
		window.parent.iFrameHeight(ifm);
	}
	fm.endTime.onclick = function(){
		window.parent.iFrameHeight(ifm);
	}

	getExamBtn.onclick = getPaper;

	//表单验证
	submitBtn.onclick = check;
}

/**
 * 获取考试试卷
 */
function getPaper(){
	openWindow(this.getAttribute('url'), 600, 500);
	return false;
}

/**
 * 表单验证
 */
 function check(){
 	if (fm.title.value.trim() == '') {
 		alert('考试名称不能为空');
 		fm.title.focus();
 		return false;
 	}

 	if (fm.title.value.length > 30) {
 		alert('考试名称不能大于30位');
 		return false;
 	}
	
	if (fm.paperId.value.trim() == '') {
		alert('请添加一张试卷');
		getExamBtn.click();
		return false;
	}	

	if (fm.beginTime.value.trim() == '') {
		alert('还没有设定考试开始时间');
		return false;
	}

	if (fm.endTime.value.trim() == '') {
		alert('还没有设定考试开始时间');
		return false;
	}

	if (fm.endTime.value < fm.beginTime.value) {
		alert('考试结束时间不得小于考试开始时间');
		return false;
	}

 	return true;
 }