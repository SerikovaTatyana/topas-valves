// калалог заголовков и селекторов
var content = {

    regulatory: [
    	{
    	selector: '#wb_Text2 > span > strong',
    	content: 'Регулирующие клапаны Topas от производителя'		
    	},
    	{
    	selector: '#wb_Text3 > span:nth-child(1) > strong',
    	content: '2х(3х)-ходовые с электроприводом и без'		
    	},
    	{
    	selector: '#wb_Image12',
    	content: '<img src="images/valves-regular.png" id="Image12" alt="">'		
    	},		
		
    ],
	
    manual: [
    	{
    	selector: '#wb_Text2 > span > strong',
    	content: 'Ручные балансировочные клапаны'		
    	},
    	{
    	selector: '#wb_Text3 > span:nth-child(1) > strong',
    	content: 'Topas MBV. От производителя'		
    	},
    	{
    	selector: '#wb_Image12',
    	content: '<img src="images/valves-manual.png" id="Image12" alt="">'		
    	},		
		
    ],

    auto: [
    	{
    	selector: '#wb_Text2 > span > strong',
    	content: 'Автоматические балансировочные клапаны'		
    	},
    	{
    	selector: '#wb_Text3 > span:nth-child(1) > strong',
    	content: '(Регуляторы перепада давления). От производителя.'		
    	},
    	{
    	selector: '#wb_Image12',
    	content: '<img src="images/valves-auto.png" id="Image12" alt="">'		
    	},		
		
    ],	
	
    chugun: [
    	{
    	selector: '#wb_Text2 > span > strong',
    	content: 'Чугунные фланцевые балансировочные клапаны'		
    	},
    	{
    	selector: '#wb_Text3 > span:nth-child(1) > strong',
    	content: 'Ручные. От производителя'		
    	},
    	{
    	selector: '#wb_Image12',
    	content: '<img src="images/valves-chugun.png" id="Image12" alt="">'		
    	},		
		
    ],	
	
	};	
	

// заменяет контент
function replacer(content, utm) {
    if (utm in content) {
        for (i in content[utm]) {
        	if(document.querySelector(content[utm][i]['selector'])!=null) {document.querySelector(content[utm][i]['selector']).innerHTML=content[utm][i]['content'];};
        };
    } /* else {
        console.log("Каталог контента не имеет такой utm метки");
    } */;
};


// возвращает cookie с именем name, если есть, если нет, то undefined
function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

// записывает utm в cookie на 30 дней
function setCookie(utm) {
	var date = new Date(new Date().getTime() + (30*24*60*60*1000));
	document.cookie = 'utm_replace=' + utm + '; path=/; expires=' + date.toUTCString();
};

// объединяет все функции в один алгоритм
function replacerMain(content) {
	// check is there utm in url
	if (/utm_replace=([^&]*)/g.exec(document.URL)) {
		var utm = /utm_replace=([^&]*)/g.exec(document.URL)[1];
		} else {
		var utm = null
	};

	if (utm != null) {
		replacer(content, utm);
		setCookie(utm);
	} else if (getCookie('utm_replace') != undefined) {
		replacer(content, getCookie('utm_replace'));
	}/*  else {
		console.log('UTM replacer не нашел метку ни в URL, ни в cookie')
	} */;
};
replacerMain(content);
