window.onload = function(){
	//自适应高度
	var ifm = window.parent.document.getElementById('iframe');
	window.parent.iFrameHeight(ifm);

	var fm   = document.getElementsByTagName('form')[0];
	//表单中题目数量和题目分数的元素
	var eles = [fm.singleNum, fm.singleScore, fm.multipleNum, fm.multipleScore, fm.checkNum, fm.checkScore];


	//表单验证
	checkForm(fm, eles);

	//题目数量或者题目分数变化时,调整总分
	setTotalScore(fm,eles);
}

//表单验证
function checkForm(fm,eles){
	var submitBtn = document.getElementById('submit');
	var subjOpts  = fm.getElementsByTagName('option');
	submitBtn.onclick = function(){
		if (fm.title.value.trim() == '') {
			alert('试卷名称不能为空');
			fm.title.focus();
			return false;
		}
		if (fm.title.value.trim().length > 30) {
			alert('试卷名称不得大于30位');
			fm.title.focus();
			return false;
		}
		if (subjOpts.length == 1 && subjOpts[0].value == '0') {
			alert('数据库中没有科目,不能添加试卷');
			return false;
		}
		if (fm.passScore.value.trim() == '') {
			alert('及格分数不能为空');
			fm.passScore.focus();
			return false;
		}
		if (fm.singleNum.value.trim() == '') {
			alert('单选题数目不能为空');
			fm.singleNum.focus();
			return false;
		}
		if (fm.multipleNum.value.trim() == '') {
			alert('多选题数目不能为空');
			fm.multipleNum.focus();
			return false;
		}
		if (fm.checkNum.value.trim() == '') {
			alert('判断题数目不能为空');
			fm.checkNum.focus();
			return false;
		}
		if (fm.singleScore.value.trim() == '') {
			alert('请填写单选题每题分数');
			fm.singleScore.focus();
			return false;
		}
		if (fm.multipleScore.value.trim() == '') {
			alert('请填写多选题每题分数');
			fm.multipleScore.focus();
			return false;
		}
		if (fm.checkScore.value.trim() == '') {
			alert('请填写判断题每题分数');
			fm.checkScore.focus();
			return false;
		}
		//验证那些该输入数字的地方是否有非法字符
		var isAllNum = true;
		var ptn      = /^\d+$/;
		eles.push(fm.passScore);
		for (var i = 0; i < eles.length; i++){
			if (!(ptn.test(eles[i].value))) {
				isAllNum = false;
				break;
			}
		}
		if (!isAllNum) {
			alert('分数或者题目数量应该为数字');
			return false;
		}
		return true;
	}
}

//设置总分
function setTotalScore(fm,eles){
	var total = fm.totalScore;
	var pass  = fm.passScore;
	for (var i = 0; i < eles.length; i++) {
		eles[i].onblur = function(){
			var temp = 0;
			for (var j = 0; j <= 4; j+=2) {
				temp += eles[j].value * eles[j+1].value;
			}
			total.value = temp;
			pass.value  = parseInt(temp*0.6);
		}
	}
}

/**
 * 检查参数是否是空值,是空值就弹窗并返回false
 */
/*function emptyBack(val,str) {
	if (val.value == '') {
		alert(str+'不能为空');
		return false;
	}
}*/