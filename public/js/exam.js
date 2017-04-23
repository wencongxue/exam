var cards     = document.getElementsByClassName('cards')[0].getElementsByTagName('li');
var submitBtn = document.getElementById('submit');
var submitDiv = document.getElementsByClassName('submit')[0];
window.onload = function() {
	//单击交卷的逻辑处理
	submitDiv.onclick = function(){
		if (!isAllDone()) {
			 confirm('你还没有全部做完,是否继续交卷?') ? submitBtn.click() : null;
		} else {
			 confirm('请确认是否交卷!') ? submitBtn.click() : null;
		}
	}

	//答题卡的显示
	isDone();

	// 考试倒计时
	freshTime();
}

/**
 * 遍历整个试卷,监听每道题每个选项的单击事件,并判断是否点亮答题卡
 */
 function isDone(){
 	var checkItems  = document.getElementsByClassName('check-item');
 	var singleItems = document.getElementsByClassName('single-item');
 	var multiItems  = document.getElementsByClassName('multiple-item');
 	foreachItems(cards,checkItems);
 	foreachItems(cards,singleItems);
 	foreachItems(cards,multiItems);
 }

/**
 * 此函数为遍历试题的辅助函数
 */
 function foreachItems(cards,items){
 	for (var i = 0; i <items.length; i++) {
 		var inputs = items[i].getElementsByTagName('input');
 		for (var j = 0; j < inputs.length; j ++) {
 			inputs[j].onclick = function(){
 				var cardIndex = parseInt(this.parentNode.parentNode.id.substring(1)) - 1;
 				cards[cardIndex].className = 'done';
 			}
 		}
 	}
 }

 /**
  * 判断考生是否把试题全部做完
  * 返回布尔值
  */
function isAllDone(){
	for (var i = 0; i < cards.length; i++) {
		if (cards[i].className.indexOf('done') == -1) {
			return false;
		}
	}
	return true;
}

/**
 * 考试时间倒计时
 */

function freshTime(){
	//考试结束时间
	var endTime       = new Date(document.getElementById('endTime').value);

	//每一秒刷新一次时间
	var  timer        =  setInterval(function(){
		var timeArea  =  document.getElementsByClassName('remaining')[0],
			nowTime   =  new Date(),
		    leftTime  =  parseInt((endTime.getTime() - nowTime.getTime())/1000),
		    hours     =  addZero(parseInt(leftTime/3600)),
		    mins      =  addZero(parseInt((leftTime%3600)/60)),
		    secs      =  addZero(leftTime % 60);
			timeArea.innerHTML = '剩余时间 : ' + hours + ' : ' + mins + ' : ' + secs;

			//提醒考生快要交卷
			leftTime == 300 && alert('考试时间还剩余5分钟,请注意考试时间,到时系统将自动交卷');
			
			//时间到了就自动交卷
			if (leftTime <= 0){
				alert('考试结束,系统将自动交卷,请点击确定');
				submitBtn.click();
			} 
	},1000);	
}

/**
 * 给小于10的数加上数字前缀0,如果传入的数大于等于10则直接返回
 */
function addZero(num){
	return num >= 10 ? num : '0' + num;
}