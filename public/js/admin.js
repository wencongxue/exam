var items  = document.getElementsByClassName('items');
window.onload = function(){
	//折叠效果
	fold();
	highLight();
}

/**
 * 选项卡的折叠效果
 * 主要是针对dl,点击dt标签,折叠所有相邻的dd标签
 */
function fold() {
	var dts = document.getElementsByClassName('items')[0].getElementsByTagName('dt');
	for (var i = 0; i < dts.length; i++) {
		//防止flag变量被污染,所以要用到匿名函数
		(function(){
			var flag = true;
			dts[i].onclick = function(){
				var dds   = this.parentNode.getElementsByTagName('dd');
				var val   = flag ? 'block'  :  'none';
				var iUrl  = flag ? 'url("../public/img/open.png")' : 'url(../public/img/fold.png)';
				this.style.backgroundImage = iUrl;
				for (var j = 0; j < dds.length; j++) {
					dds[j].style.display = val;
				}
				flag = !flag;
			}
		})();
	}
}

/**
 * 改变当前选中选项卡的样式
 */
function highLight(){
	var dds = document.getElementsByTagName('dd');
	for (var i = 0; i < dds.length; i++) {
		dds[i].onclick = function(){
			for (var j = 0; j < dds.length; j++) {
				dds[j].className = '';
			}
			this.className = 'selected';
		}
	}
}
