function Ymd(){
	// console.log("ojbk");
     var y = new Date();
     var this_year = y.getFullYear(); 
	/*获取控件*/
	var year = document.getElementById("year");
	var month = document.getElementById("month");
	var day = document.getElementById("day");

	initSelect(year,1930,this_year);
	initSelect(month,1,12);
	initSelect(day,1,31);

	//获取列表框长度
	var n = year.length;
	//列表框选中一个条目
	year.selectedIndex = Math.round(n/2);
}

/*给列表框实现赋值(传递3个值：表单元素，开始的值，结束的值)*/
function initSelect(obj,start,end){
	for(i=start;i<=end;i++){
		obj.options.add(new Option(i,i));
	}
}

/*实现改变月份和年而改变一个月的日期*/
function selectYmd(){
	var year = document.getElementById("year");
	var month = document.getElementById("month");
	var day =document.getElementById("day");
	var this_month = parseInt(month.value);
	var max_day;

	if(this_month==4 || this_month==6 || this_month==9 || this_month==11){
		max_day = 30;
	}
	else if(this_month==2){
		var this_year = parseInt(year.value);
		if((this_year%4==0 && this_year%100!=0) || (this_year%400==0)){
			max_day = 29;
		}
		else{
			max_day =28;
		}
	}
	else{
		max_day  = 31;
	}
	day.options.length = 0;
	initSelect(day,1,max_day);
}