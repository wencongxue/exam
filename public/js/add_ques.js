window.onload = function(){
	//自适应高度
	var ifm = window.parent.document.getElementById('iframe');
	window.parent.iFrameHeight(ifm);

	//表单验证
	var submitBtn = document.getElementById('submit');
	submitBtn.onclick = checkFm;

	var cont  = document.getElementById('cont');   //题目编辑区容器
	var type  = document.getElementById('type');   //题型下拉框

	//创建一个包含26个大写字母的数组
	var upperLetters = [];
	for (var i = 65; i < 91; i++)
		upperLetters.push(String.fromCharCode(i));

	//动态添加选项
	var add = document.getElementById('add');
	add.onclick = function(){
		if (type.options[type.selectedIndex].text.indexOf('判断题') != -1) return false;
		var len   = cont.getElementsByTagName('label').length;
		var label = document.createElement('label');
		label.innerHTML = upperLetters[len] + '. ' + '<input type="radio" name="answer" value="'+upperLetters[len]+'">标记为答案 <br>' + '<textarea name="options[]"  cols="50" rows="2"></textarea>';
		if (type.options[type.selectedIndex].text.indexOf('多选题') != -1) {
			label.innerHTML = upperLetters[len] + '. ' + '<input type="checkbox" name="answer[]" value="'+upperLetters[len]+'">标记为答案 <br>' + '<textarea name="options[]"  cols="50" rows="2"></textarea>';
		}
		cont.appendChild(label);

		//添加之后调整框架高度
		window.parent.iFrameHeight(ifm);
		//防止页面刷新
		return false;
	}

	//动态删除选项
	var del     = document.getElementById('del');
	del.onclick = function(){
		if (type.options[type.selectedIndex].text.indexOf('判断题') != -1) return false;
		var lastLabel = cont.getElementsByTagName('label');
		if (lastLabel.length <= 2) return false;
		cont.removeChild(lastLabel[lastLabel.length - 1]);

		//调整框架高度
		window.parent.iFrameHeight(ifm);
		//防止页面刷新
		return false;
	}

	//根据题型的不同来加载不同的题目编辑区
	var options = type.getElementsByTagName('option');

	//监听下拉框的选项改变事件
	var singleCont = cont.innerHTML;
	type.onchange  = function(){
		switch (this.options[this.selectedIndex].text.trim()) {
			case '单选题' : 
				cont.innerHTML = singleCont;
				break;
			case '多选题' :
				cont.innerHTML = '<label>A. <input type="checkbox" name="answer[]" value="A">标记为答案 <br>\
					<textarea name="options[]"  cols="50" rows="2"></textarea>\
				</label>\
				<label>B. <input type="checkbox" name="answer[]" value="B">标记为答案 <br>\
					<textarea name="options[]"  cols="50" rows="2"></textarea>\
				</label>\
				<label>C. <input type="checkbox" name="answer[]" value="C">标记为答案 <br>\
					<textarea name="options[]"  cols="50" rows="2"></textarea>\
				</label>\
				<label>D. <input type="checkbox" name="answer[]" value="D">标记为答案 <br>\
					<textarea name="options[]"  cols="50" rows="2"></textarea>';
				break;
			case '判断题' :
				cont.innerHTML = '<label>A. <input type="radio" name="answer" value="A">正确 <br></label><label>B. <input type="radio" name="answer" value="B">错误 <br></label>';
				break;
		}
	}	
}

/**
 * 表单验证
 */
 function checkFm(){
 	var fm           = document.getElementsByTagName('form')[0],
 	    cont         = document.getElementById('cont'),             //试题选项区容器
 	    typeOpts     = fm.type.getElementsByTagName('option'),      //试题类型选项
 	    subOpts      = fm.subject.getElementsByTagName('option'),   //试题所属科目选项
 	    desc         = fm.desc,                                     //试题题目内容
 	    contOpts     = cont.getElementsByTagName('textarea'),       //试题选项内容
 	    answer       = cont.getElementsByTagName('input'),          //试题答案
 	    allUnchecked = true;                                        //看试题答案是否给定
 	if (typeOpts.length == 1 && typeOpts[0].value == 0) {
 		alert('当前没有试题类型,请先添加');
 		return false;
 	}
 	if (subOpts.length == 1 && subOpts[0].value == 0) {
 		alert('当前没有科目,请先添加');
 		return false;
 	}
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