window.onload = function(){
	//自适应高度
	var ifm = window.parent.document.getElementById('iframe');
	window.parent.iFrameHeight(ifm);

	exportScore();
}

//点击导出成绩按钮时动态改变表单的提交地址
function exportScore(){
	var url    = document.getElementById('url').value;
	var exBtn  = document.getElementById('exBtn');
	var fm     = document.getElementsByTagName('form')[0];

	exBtn.onclick = function(){
		fm.action = url + '/' + getQueryString('score_list');
	}
}