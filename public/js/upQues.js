window.onload =function(){
	var submitBtn  = document.getElementById('submit');
	submitBtn.onclick = checkfm;

	/*var type     = document.getElementById('type');
	var oldCont  = document.getElementById('cont').innerHTML;     //最初内容编辑区
	var oldType  = type.options[type.selectedIndex].text.trim();  //最初试题类型
	type.onchange = function(){
		setCont(oldType,oldCont);
	}*/
}

/**
 * 表单验证
 */
function checkfm(){
	var fm           = document.getElementsByTagName('form')[0],
 	    cont         = document.getElementById('cont'),             //试题选项区容器
 	    desc         = fm.desc,                                     //试题题目内容
 	    contOpts     = cont.getElementsByTagName('textarea'),       //试题选项内容
 	    answer       = cont.getElementsByTagName('input'),          //试题答案
 	    allUnchecked = true;                                        //看试题答案是否给定
	 	if (desc.value.trim() == '') {
	 		alert('题目描述不能为空');
	 		desc.focus();
	 		return false;
	 	}
	 	//判断是否一个选项也没有
	 	if (fm.type.options[fm.type.selectedIndex].text.indexOf('判断题') == -1 && !contOpts) {
	 		alert('当前题目没有选项,请点击添加按钮添加');
	 		return false;
	 	}
	 	//当选项存在时判断有没有全部填写完整
	 	if (contOpts) {
	 		for (var i = 0; i < contOpts.length; i++) {
		 		if (contOpts[i].value.trim() == '') {
		 			alert('有试题选项内容没有填写,请填写完整');
		 			return false;
		 		}
	 		}
	 	}
	 	//判断答案是否已经设定
	 	for (var i = 0; i < answer.length; i++) {
	 		if (answer[i].checked)  allUnchecked = false;
	 	}
	 	if (allUnchecked) {
	 		alert('请选择一个答案');
	 		return false;
	 	}
	 	return true;
	}
}

/**
 * 设置试题编辑区
 */
/* function setCont(oldType,oldCont){
 	if (!oldType || !oldCont) return;
 	var contDiv = document.getElementById('cont');
 	//判断是否选中了初始题型
 	if (this.options[this.selectedIndex].text.trim() == oldType) {
 		contDiv.innerHTML = oldCont;
 		return;
 	} else if (this.options[this.selectedIndex].text.trim() == '判断题') {
 		contDiv.innerHTML = '<label><input type="radio" name="answer" value="A"> 正确</label>\
				<label><input type="radio" name="answer" value="B"> 错误</label>';
 	} else if (this.options[this.selectedIndex].text.trim() == '单选题') {
 		contDiv.innerHTML = contDiv.innerHTML.replace(/fd/,);
 	}
 }
*/