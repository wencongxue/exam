window.onload = function(){
	var items  = document.getElementsByClassName('items');
	var ifm    = document.getElementById("iframe");
	var par    = document.getElementsByClassName('iframe')[0];
	//导航变色
	changeItem();	

	//首页iframe高度自适应
	aClick(items);
	iFrameHeight(ifm,par);
}

function changeItem(){
	var lis   = document.getElementById('nav').getElementsByTagName('li');
	var title = document.title;
	for (var i = 0; i < lis.length; i++) {
		if (lis[i].getElementsByTagName('a')[0].innerHTML == title) {
			lis[i].className = 'selected';
			break;
		}
	}
}

