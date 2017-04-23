/**
 * 一些被多个文件用到的函数
 * 提高代码复用性
 * author : xwc
 */

/**
 * iframe加载完毕时,自动调整父窗口中iframe的高度
 * @param ifm   iframe元素
 * @param par   iframe元素的父元素
 */
function iFrameHeight(ifm) {
	var subWeb = document.frames ? document.frames["iframe"].document : ifm.contentDocument;
	ifm.style.height = subWeb.body.scrollHeight+"px";
}

/**
 * 点击左侧列表项中的a标签时触发iframe高度自适应函数
 * @param items 指的是单击哪些元素时触发iframe自适应函数
 */
function aClick(items){
	for (var i = 0; i < items.length; i++) {
		var as = items[i].getElementsByTagName('a');
		for (var j = 0; j < as.length; j++) {
			as[j].onclick = function(){
				iFrameHeight(ifm);
			}
		}
	}
}

/**
 * 表单中的全选与取消全选功能
 * @param ckBtn 指的是单击这个按钮时实现全选与取消全选的功能
 * @param cks   被选中或被取消选中的节点们
 */
 function check(ckBtn,cks){
 	if (!cks) return;
 	ckBtn.onclick = function(){
 		for (var i = 0; i < cks.length; i++) {
 			cks[i].checked = ckBtn.checked;
 		}
 	}
 }

/**
 * 打开新窗口函数
 * @param string url 弹窗url
 * @param int    width   窗口宽度
 * @param int    height  窗口高度
 */
 function openWindow(url,width,height){
 	var left   = (window.screen.availWidth  - width)  / 2,
        top    = (window.screen.availHeight - height) / 2;
 	window.open(url,'_blank','width='+width+',height='+height+',left='+left+',top='+top);
 }

/**
 * 检查批量删除或导出时表单是否一条数据都没有选中
 * @param  cks         复选框元素集
 * @return boolean
 */
function allNot(cks){
	if (!cks) return;
	var allNot = true;
	for (var i = 0; i < cks.length; i++) {
		if (cks[i].checked) {
			allNot = false;
			break;
		}
	}
	return allNot ? true : false; 
}

/**
 * 根据传入的参数设置筛选表单提交的url
 * @param form  指定设定哪个表单的action
 * @param submitBtn  该表单的提交按钮
 * @param array  keys 要添加的query键
 * @param array  valueSource  指定query键的值从哪些元素来,在这里,数组中的元素限定为option节点集合和text节点
 */
/*function setUrl(form, submitBtn,keys,valueSource){
	submitBtn.onclick = function(){
		for (var i = 0; i < valueSource.length; i++) {
			var val;
			if (valueSource[i] instanceof HTMLCollection) {
				for (var j = 0; j < valueSource[i].length; j++) {
					if (valueSource[i][j].selected) {
						val = valueSource[i][j].value;
						break;
					}
				}
			} else {
				val = valueSource[i].value;
			}
			if (form.action.indexOf(keys[i]) == -1) {
				form.action += '/' + keys[i] + '/' + val;
			}
		}
	}
}*/

/**
 * 控制表格单元格数据长度
 * @param eles 表格单元格集合
 */
 function limitLen(eles){
 	if (!eles) return;
 	for (var i = 0; i < eles.length; i++) {
 		if (eles[i].innerHTML.length > 13) {
 			eles[i].innerHTML = eles[i].innerHTML.substr(0,13) + '...';
 		}
 	}
 }

 /**
  * 获取当前url的queryString
  * @param  string  method    后台操作名,也就是后台控制器里面的方法名
  * @return string            以'/'连接的queryString
  */
function getQueryString(method){
	var url = window.location.href;
	var qs  = url.substr(url.indexOf(method)+method.length+1);

	//不拼接没有值的键
	var matches      = qs.match(/\w+=(&|$)/g);
	if (!!matches) {
		for (var item in matches){
			qs = qs.replace(matches[item], '');
		}
	}
	return qs.replace(/[=&]/g,'/');
}