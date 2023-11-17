<?php
function ValidateEmail($email)
{
   $pattern = '/^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i';
   return preg_match($pattern, $email);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formid']) && $_POST['formid'] == 'form1')
{
   $mailto = 'topaskazan@yandex.ru';
   $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
   $subject = 'topas-valves.ru-LEAD!!!';
   $message = '';
   $success_url = './TH-Page.php';
   $error_url = '';
   $error = '';
   $eol = "\n";
   $boundary = md5(uniqid(time()));
   $header  = 'From: '.$mailfrom.$eol;
   $header .= 'Reply-To: '.$mailfrom.$eol;
   $header .= 'MIME-Version: 1.0'.$eol;
   $header .= 'Content-Type: multipart/mixed; boundary="'.$boundary.'"'.$eol;
   $header .= 'X-Mailer: PHP v'.phpversion().$eol;
   if (!ValidateEmail($mailfrom))
   {
      $error .= "The specified email address is invalid!\n<br>";
   }
   if (!empty($error))
   {
      $errorcode = file_get_contents($error_url);
      $replace = "##error##";
      $errorcode = str_replace($replace, $error, $errorcode);
      echo $errorcode;
      exit;
   }
   $internalfields = array ("submit", "reset", "send", "filesize", "formid", "captcha_code", "recaptcha_challenge_field", "recaptcha_response_field", "g-recaptcha-response");
   $message .= $eol;
   $message .= "IP Address : ";
   $message .= $_SERVER['REMOTE_ADDR'];
   $message .= $eol;
   $logdata = '';
   foreach ($_POST as $key => $value)
   {
      if (!in_array(strtolower($key), $internalfields))
      {
         if (!is_array($value))
         {
            $message .= ucwords(str_replace("_", " ", $key)) . " : " . $value . $eol;
         }
         else
         {
            $message .= ucwords(str_replace("_", " ", $key)) . " : " . implode(",", $value) . $eol;
         }
      }
   }
   $body  = 'This is a multi-part message in MIME format.'.$eol.$eol;
   $body .= '--'.$boundary.$eol;
   $body .= 'Content-Type: text/plain; charset=UTF-8'.$eol;
   $body .= 'Content-Transfer-Encoding: 8bit'.$eol;
   $body .= $eol.stripslashes($message).$eol;
   if (!empty($_FILES))
   {
       foreach ($_FILES as $key => $value)
       {
          if ($_FILES[$key]['error'] == 0)
          {
             $body .= '--'.$boundary.$eol;
             $body .= 'Content-Type: '.$_FILES[$key]['type'].'; name='.$_FILES[$key]['name'].$eol;
             $body .= 'Content-Transfer-Encoding: base64'.$eol;
             $body .= 'Content-Disposition: attachment; filename='.$_FILES[$key]['name'].$eol;
             $body .= $eol.chunk_split(base64_encode(file_get_contents($_FILES[$key]['tmp_name']))).$eol;
          }
      }
   }
   $body .= '--'.$boundary.'--'.$eol;
   if ($mailto != '')
   {
      mail($mailto, $subject, $body, $header);
   }
   header('Location: '.$success_url);
   exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formid']) && $_POST['formid'] == 'form2')
{
   $mailto = 'topaskazan@yandex.ru';
   $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
   $subject = 'topas-valves.ru-LEAD!!!';
   $message = '';
   $success_url = './TH-Page.php';
   $error_url = '';
   $error = '';
   $eol = "\n";
   $boundary = md5(uniqid(time()));
   $header  = 'From: '.$mailfrom.$eol;
   $header .= 'Reply-To: '.$mailfrom.$eol;
   $header .= 'MIME-Version: 1.0'.$eol;
   $header .= 'Content-Type: multipart/mixed; boundary="'.$boundary.'"'.$eol;
   $header .= 'X-Mailer: PHP v'.phpversion().$eol;
   if (!ValidateEmail($mailfrom))
   {
      $error .= "The specified email address is invalid!\n<br>";
   }
   if (!empty($error))
   {
      $errorcode = file_get_contents($error_url);
      $replace = "##error##";
      $errorcode = str_replace($replace, $error, $errorcode);
      echo $errorcode;
      exit;
   }
   $internalfields = array ("submit", "reset", "send", "filesize", "formid", "captcha_code", "recaptcha_challenge_field", "recaptcha_response_field", "g-recaptcha-response");
   $message .= $eol;
   $message .= "IP Address : ";
   $message .= $_SERVER['REMOTE_ADDR'];
   $message .= $eol;
   $logdata = '';
   foreach ($_POST as $key => $value)
   {
      if (!in_array(strtolower($key), $internalfields))
      {
         if (!is_array($value))
         {
            $message .= ucwords(str_replace("_", " ", $key)) . " : " . $value . $eol;
         }
         else
         {
            $message .= ucwords(str_replace("_", " ", $key)) . " : " . implode(",", $value) . $eol;
         }
      }
   }
   $body  = 'This is a multi-part message in MIME format.'.$eol.$eol;
   $body .= '--'.$boundary.$eol;
   $body .= 'Content-Type: text/plain; charset=UTF-8'.$eol;
   $body .= 'Content-Transfer-Encoding: 8bit'.$eol;
   $body .= $eol.stripslashes($message).$eol;
   if (!empty($_FILES))
   {
       foreach ($_FILES as $key => $value)
       {
          if ($_FILES[$key]['error'] == 0)
          {
             $body .= '--'.$boundary.$eol;
             $body .= 'Content-Type: '.$_FILES[$key]['type'].'; name='.$_FILES[$key]['name'].$eol;
             $body .= 'Content-Transfer-Encoding: base64'.$eol;
             $body .= 'Content-Disposition: attachment; filename='.$_FILES[$key]['name'].$eol;
             $body .= $eol.chunk_split(base64_encode(file_get_contents($_FILES[$key]['tmp_name']))).$eol;
          }
      }
   }
   $body .= '--'.$boundary.'--'.$eol;
   if ($mailto != '')
   {
      mail($mailto, $subject, $body, $header);
   }
   header('Location: '.$success_url);
   exit;
}
?>
<!doctype html>
<html>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PF4PXPL');</script>
<!-- End Google Tag Manager -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>БАЛАНСИРОВОЧНЫЕ КЛАПАНЫ TOPAS</title>
<meta name="description" content="Надежное решение для систем теплоснабжения">
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
<link href="css/wb.validation.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<?php

$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

?>

<link href="<?php echo $url;?>css/index.css" rel="stylesheet">



<link href="css/style.css" rel="stylesheet">


<link rel="stylesheet" href="libs/bootstrap/bootstrap-grid-3.3.1.min.css" />


<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/wb.validation.min.js"></script>
<link rel="stylesheet" href="fancybox/jquery.fancybox-1.3.4.css">
<script src="fancybox/jquery.easing-1.3.pack.js"></script>
<script src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script src="js/wwb14.min.js"></script>
<script>   
   function displaylightbox(url, options)
   {
      options.padding = 0;
      options.autoScale = true;
      options.href = url;
      options.type = 'iframe';
      $.fancybox(options);
   }
</script>
<script>   
   $(document).ready(function()
   {
      $("#Form1").submit(function(event)
      {
         var isValid = $.validate.form(this);
         return isValid;
      });
      $("#phone").validate(
      {
         required: true,
         type: 'text',
         length_min: '16',
         length_max: '16',
         color_text: '#FFFFFF',
         color_hint: '#FFFFFF',
         color_error: '#FFE507',
         opacity: 0.00,
         color_border: '#FFFFFF',
         nohint: true,
         font_family: 'Arial',
         font_size: '13px',
         position: 'topleft',
         offsetx: 0,
         offsety: 0,
         effect: 'fade',
         error_text: 'Введите верный номер телефона!'
      });
      $("#Form2").submit(function(event)
      {
         var isValid = $.validate.form(this);
         return isValid;
      });
      $("#phone2").validate(
      {
         required: true,
         type: 'text',
         length_min: '16',
         length_max: '16',
         color_text: '#FFFFFF',
         color_hint: '#FFFFFF',
         color_error: '#FFE507',
         opacity: 0.00,
         color_border: '#FFFFFF',
         nohint: true,
         font_family: 'Arial',
         font_size: '13px',
         position: 'topleft',
         offsetx: 0,
         offsety: 0,
         effect: 'fade',
         error_text: 'Введите верный номер телефона!'
      });
   });
</script>
<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic&subset=latin,cyrillic" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto&subset=latin,cyrillic,cyrillic-ext" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,cyrillic-ext" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic&subset=latin,cyrillic,cyrillic-ext" rel="stylesheet">

</head>
<body onload="ShowObject('GalBild2', 0);ShowObject('GalBild3', 0);return false;">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PF4PXPL"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
   <script>   
   $(document).ready(function() {
         $(Form1).keydown(function(event){
           if(event.keyCode == 13) {
             event.preventDefault();
             return false;
         }
      });
   });
   </script>
   <script>   
   $(document).ready(function() {
         $(Form2).keydown(function(event){
           if(event.keyCode == 13) {
             event.preventDefault();
             return false;
         }
      });
   });
   </script>
   
   <!--
   <div id="container">
   </div> -->
   
   
   
   
   
   
   
	<div id="Layer4" class="top-wrap">
	   
		<div class="container">
		  <div id="Layer4_Container" class="hed-wrap">
		  
			<div id="wb_Image38" class="logo">
				
				<a href="https://topas-valves.ru/"><img src="images/Logo.jpg" id="Image38" alt=""></a>
			
				
			</div>
			
			<div >
		  
			 <div id="wb_Text5" >
				<span >г. Казань, ул. Васильченко, 1</span></div>
				
				
				
			</div>	
				
			 <div id="wb_Text8" >
				<span ><strong><a href="tel:88432033578">8 (843) 203-35-78</a></strong></span>
				
				<div id="wb_Text52" >
				<span ><a class="mail-hed" href="mailto:topaskazan@yandex.ru">topaskazan@yandex.ru</a></span></div>
				
				</div>
			 
			 
				
			
				
				
			 <div id="wb_Shape1" >
				<a href="javascript:displaylightbox('./Zakazat1.php',{width:357,height:301})" target="_self">
				<img class="hover" src="images/img0001_hover.png" alt="" >
				<!-- <span><img src="images/img0001.png" id="Shape1" alt="" ></span>--></a> 
				</div>
				
				
		  </div>
	   </div>
   </div>
   
   
   
   <div id="Layer1">
   
		<div class="container">

		  <div id="Layer1_Container" class="col-my-12 col-xs-7 col-sm-8 col-md-7">
			 <div id="wb_Text2" >
				<span class="title"><strong>БАЛАНСИРОВОЧНЫЕ КЛАПАНЫ TOPAS</strong></span></div>
			 <div id="wb_Text3" >
				<span ><strong>Надежное решение для систем теплоснабжения</strong></span><span style="color:#FFFFFF;font-family:'Roboto Condensed';font-size:32px;"><strong><br></strong></span></div>
			 
				<hr class="hr"> 
			 <!-- 
			 <div id="wb_Image5">
				<img src="images/3.png" id="Image5" alt=""></div> -->
			 <div id="wb_Text4" >
				<span ><strong>&#8226; Гарантия 5 лет<br>&#8226; Соответствие ГОСТ и требованиям безопасности<br>&#8226; Бесплатная доставка по РФ</strong></span></div>
			 <hr class="hr">
			 
			 <div id="wb_Shape7" >
				<a href="javascript:displaylightbox('./page1.php',{width:357,height:301})" target="_self">
				<!-- <img class="hover" src="images/img0006_hover.png" alt="" >--><span>
				<img src="images/img0006.png" id="Shape7" alt="" ></span>
				</a>
				</div>
			 
		  </div>
		  
		  <div id="wb_Image12" class="col-my-12 col-xs-5 col-sm-4 col-md-5">
				<img src="images/file7.png" id="Image12" alt=""></div>
		  
      </div>
   </div>
   
   
   
   
   
   <div id="Layer2" >
      <div id="Layer2_Container">
		
			<div class="container">
	  
				 
				 
				 <div class="col-md-12"> 
					<div class="wb_Text10_wpar">
				 
						<div id="wb_Text10" >
							<span class="title-block" ><strong>РУЧНЫЕ БАЛАНСИРОВОЧНЫЕ КЛАПАНЫ </strong></span><span class="decor-title"><strong>TOPAS MBV</strong></span></div>
					 
						
					 
						<div id="wb_Shape2" >
						<img src="images/img0003.png" id="Shape2" alt="" ></div>
					 </div>
				 </div>
				 
				 
				 <div class="col-my-12 col-xs-5 col-sm-4 col-md-4">
					 <div id="wb_Image2" class="img-decor-left" >
						<img src="images/111.png" id="Image2" alt=""></div>
				 
				 </div>
				 
				 <div class="col-my-12 col-xs-7 col-sm-8 col-md-8">
				 <div id="wb_Text11" >
					<span class="text-block-weight" ><strong>В ЛИНЕЙКЕ 6 ВИДОВ КЛАПАНОВ С УСЛОВНЫМ ПРОХОДОМ ОТ 15 ДО 50<br></strong></span>
					<span class="list-muft-decor" >•</span>
					<span  style="color:#055D75;font-family:'Roboto Condensed';font-size:19px;line-height:29px;"> </span>
					<span class="list-muft" >Муфтовое крепление<br></span>
					<span class="list-muft-decor" >•</span>
					<span class="list-muft" > Средний полный срок службы 30 лет <br></span>
					<span class="list-muft-decor" >•</span>
					<span class="list-muft" > Средний полный ресурс - 12000 циклов полной регулировки<br></span>
					<span class="list-muft-decor" >•</span>
					<span class="list-muft" > Диапазон номинальных диаметров </span>
					<span class="list-muft-decor"><strong>от ½ до 2 дюймов <br></strong></span>
					<span style="color:#000000;font-family:'Roboto Condensed';font-size:19px;line-height:32px;"><br></span>
					
					
					<span class="muft-prise">
					<strong>Цена от 750 руб.</strong></span></div>
					
					
					<div id="wb_Shape4" >
					<a href="javascript:displaylightbox('./page2.php',{width:357,height:352})" target="_self">
					<!-- <img class="hover" src="images/img0005_hover.png" alt="" > -->
					<span>
					<img src="images/img0005.png" id="Shape4" alt="" ></span></a></div>
					
				 </div>
				 
			  </div>	
      </div>	
   </div>
   
   
   
   

   
   
   
   
   <div id="Layer10">
   
		<div class="container">
   
   
			  <div id="Layer10_Container">
			  
					<div class="col-md-12">
			  
						<div id="wb_Text7" >
						
							<div class="wb_Text10_wpar">
						
								<span class="title-block" ><strong>АВТОМАТИЧЕСКИЕ БАЛАНСИРОВОЧНЫЕ КЛАПАНЫ </strong></span>
								<span class="decor-title" >
								<strong >TOPAS DPR</strong></span>
							
								<div id="wb_Text6" >
								<span >(регуляторы перепада давления)</span>
								</div>
								<div id="wb_Shape6" >
								<img src="images/img0007.png" id="Shape6" alt="" ></div>
							
							</div>
					</div>		
							
					</div>
					
					
					
					
					 
			  
				 <div id="wb_Text9" >
					
					<div class="col-md-12">
					
					<span class="text-block-weight">
					<strong>
					
					ПРЕДНАЗНАЧЕНЫ ДЛЯ ГИДРАВЛИЧЕСКОЙ БАЛАНСИРОВКИ ПУТЕМ ПОДДЕРЖАНИЯ ПЕРЕПАДА 
					ДАВЛЕНИЯ НА ПОСТОЯННОМ УРОВНЕ, ВНЕ ЗАВИСИМОСТИ ОТ МЕНЯЮЩИХСЯ ХАРАКТЕРИСТИК РАСХОДА 
					В СИСТЕМЕ.
					</strong>
					</span>
					
					
					
					</div>
					
					
					<div class="col-my-12 col-xs-7 col-sm-8 col-md-8">
					
						<span class="text-block-weight">
						<strong>
						<br>В ЛИНЕЙКЕ 5 ВИДОВ КЛАПАНОВ С УСЛОВНЫМ ПРОХОДОМ ОТ 15 ДО 50<br></strong>
						</span>
						
						<span ><br></span>
						<span class="list-muft-decor" >•</span>
						<span > </span>
						<span class="list-muft" >Муфтовое крепление<br></span>
						<span class="list-muft-decor" >•</span>
						<span class="list-muft" > Средний полный срок службы 15 лет <br></span>
						<span><br>&nbsp;&nbsp; </span>
						<span class="muft-prise" ><strong>Цена от 3500 руб.</strong></span>
						
						<div id="wb_Shape8" >
							<a href="javascript:displaylightbox('./page3.php',{width:357,height:352})" target="_self">
							<img class="hover" src="images/img0008_hover.png" alt="" >
							<!-- <span><img src="images/img0008.png" id="Shape8" alt="" ></span> -->
							</a>
						</div>
						
					</div>
					
					
					<div class="col-my-12 col-xs-5 col-sm-4 col-md-4">
					
						
						 <div id="wb_Image3" class="img-decor-right img-decor-top">
						<img src="images/111111111111.jpg" id="Image3" alt=""></div>
						
					</div>
					
					
					
					
					</div>
				 
				 
				 
					
					
				
				 
				 <div id="wb_Shape5" >
					<div id="Shape5"></div></div>
				
				 
			  
			</div>
	   </div>
   </div>
   
   
   <div id="Layer15" >
	
		<div class="container">
   
		  <div id="Layer15_Container">
		  
				<div class="col-md-12">
		  
					 <div id="wb_Shape21" >
						<div id="Shape21"></div></div>
						
						
						
					 <div id="wb_Text44" >
						<span class="title-block" ><strong>РУЧНОЙ БАЛАНСИРОВОЧНЫЙ КЛАПАН </strong></span>
						<span class="decor-title" ><strong>ФЛАНЦЕВЫЙ ЧУГУННЫЙ</strong></span>
						
						<div id="wb_Shape22" >
						<img src="images/img0018.png" id="Shape22" alt="" ></div>
						
						</div>
				 
				 </div>
				 
				 
				 <div class="col-my-12 col-xs-5 col-sm-4 col-md-5 col-lg-4">
				 
					 <div id="wb_Image19" class="img-decor-left">
					<img src="images/attach-636628435496126290-2.jpg" id="Image19" alt=""></div>
				 
				 </div>
				 
				 <div class="col-xs-0 col-sm-0 col-md-0 col-lg-4">
				 
					
				 
				 </div>
				 
				 <div class="col-my-12 col-xs-7 col-sm-8 col-md-7 col-lg-4">
				 
					 <div id="wb_Text45" >
						<span class="text-block-weight" ><strong>ХАРАКТЕРИСТИКИ:<br><br></strong></span>
						<span class="list-muft-decor">•</span>
						<span class="list-muft" >Материал: Чугун</span><br>
						<span class="list-muft-decor">•</span>
						<span class="list-muft" >ДУ: 32-450 мм.</span><br>
						<span class="list-muft-decor">•</span>
						<span class="list-muft" >PN: 25/40</span><br>
						<span class="list-muft-decor">•</span>
						<span class="list-muft" >Рабочая температура: -40 +120</span><br>
						
						<span class="muft-prise" >
						<br><strong>Цена от 10000 руб.</strong></span></div>
						
						 <div id="wb_Shape23" >
							<a href="javascript:displaylightbox('./page2.php',{width:357,height:352})" target="_self">
							<!-- <img class="hover" src="images/img0021_hover.png" alt="" > -->
							<span><img src="images/img0021.png" id="Shape23" alt="" ></span>
							</a>
							</div>
						
						
						
				</div>
				
				
			


		  </div>
	   </div>
   </div>
   
     <div id="Layer100">
	
		<div class="container">
	
		  <div id="Layer100_Container">
				
				<div class="col-md-12">
				
					<div id="wb_Text7" >
					<span class="title-block" ><strong>Клапан 2х(3x)-ходовой регулирующий с электроприводом  </strong></span>
					<span class="decor-title" ><strong>TOPAS VF2, VF3</strong></span>
					
					<div id="wb_Shape6" >
					<img src="images/img0007.png" id="Shape6" alt="" style="width:100px;height:5px;"></div>
					
					</div>
				</div>
			
			
			<div class="col-my-12 col-xs-7 col-sm-8 col-md-5">
		  
			 <div id="wb_Text9" >
				<span class="text-block-weight" ><strong>ХАРАКТЕРИСТИКИ<br></strong></span>
				<span ><br></span>
				<span class="list-muft-decor" >•</span>
				<span > </span>
				<span class="list-muft">Среда: горячая и холодная вода, 50% этиленгликоля <br></span>
				<span class="list-muft-decor" >•</span>
				<span class="list-muft"> Температура среды: 2~130°С <br></span>
				<span class="list-muft-decor" >•</span>
				<span class="list-muft"> Материал: ковкий чугун  <br></span>
				<span ><br>&nbsp;&nbsp; </span>
				<span class="muft-prise"><strong>Цена комплекта от 35000 руб.</strong></span>
				
				</div>
				
				<div id="wb_Shape8" >
				<a href="javascript:displaylightbox('./page3.php',{width:357,height:352})" target="_self">
				<!-- <img class="hover" src="images/img0008_hover.png" alt="" > -->
				<span><img src="images/img0008.png" id="Shape8" alt="" ></span></a></div>
				
			</div>
			 
			 
			<div class="col-xs-0 col-sm-0 col-md-3"> 
			
			</div>	
			
			
			<div class="col-my-12 col-xs-5 col-sm-4 col-md-4"> 
			
				<div id="wb_Image3" class="img-decor-right">
				<img src="images/attach-6366284353234878562.jpg" id="Image3" alt=""></div>
			
			</div>
				
				
			 
				
				
			 <div id="wb_Shape5" >
				<div id="Shape5"></div></div>
				
				
			 
				
				
				
			 <div id="wb_Text6" >
				<span ></span></div>
		  </div>
	   </div>  
   </div>  
   
   
   
   
   
   
   
   
    <div id="Layer1000" >
	
		<div class="container">
	
		  <div id="Layer1000_Container" >
			 
			 
			<div class="col-md-12">
			 
				 <div id="wb_Text7" >
					<span class="title-block"><strong>Клапан 2х-ходовой регулирующий с
					электроприводом латунный муфтовый </strong></span>
					<span class="decor-title"><strong>TOPAS VRG2</strong></span>
					<div id="wb_Shape6" >
							<img src="images/img0007.png" id="Shape6" alt="" ></div>
					</div>
					
			</div>
			
			 <div  class="col-my-12 col-xs-7 col-sm-8 col-md-7 col-lg-4">
			
				 <div id="wb_Text9" >
					<span ><strong>ХАРАКТЕРИСТИКИ<br></strong></span>
					<span ><br></span>
					<span class="list-muft-decor">•</span>
					<span > </span>
					<span class="list-muft">Среда: горячая и холодная вода, 50% этиленгликоля <br></span>
					<span class="list-muft-decor">•</span>
					<span class="list-muft"> Температура среды: 2~90°С <br></span>
					<span class="list-muft-decor" >•</span>
					<span class="list-muft"> Материал: латунь  <br></span>
					<span ><br>&nbsp;&nbsp; </span>
					<span ><strong></strong></span></div>
					
					
					<div id="wb_Shape8" >
							<a href="javascript:displaylightbox('./page3.php',{width:357,height:352})" target="_self">
							<!-- <img class="hover" src="images/img0008_hover.png" alt="" > -->
							<span><img src="images/img0008.png" id="Shape8" alt="" ></span></a></div>
			 
			</div>
			
			<div class="col-xs-0 col-sm-0 col-md-0 col-lg-4"> 
			
			</div>
			
			<div  class="col-my-12 col-xs-5 col-sm-4 col-md-5 col-lg-4">
						 
						 
							
							
						 <div id="wb_Shape5" >
							<div id="Shape5"></div></div>
							
						 <div id="wb_Image3" class="img-decor-right">
							<img style="width: auto;" src="images/valves-regular-muft.jpg" id="Image3" alt=""></div>
						 <div id="wb_Text6" >
							<span ></span></div>
							
			</div>
			
			
			</div>
		</div>
   </div> 
   
   
     <div id="Layer5" >
   
	<div class="container">
		  <div id="Layer5_Container" >
		  
			<div  class="col-md-12 col-lg-5">
				 <div id="wb_Text29" >
					<span ><strong>Получить оптовый прайс-лист</strong></span></div>
			</div>

			<div  class="col-md-12 col-lg-7">
					
					<!--
				 <div id="wb_Form2" >
					<form name="Form2" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" accept-charset="UTF-8" id="Form2">
					   <input type="hidden" name="formid" value="form2">
					   <input type="hidden" name="ПОЛУЧИТЬ ПРАЙС-ЛИСТ" value="">
					   
					   
					   <div class="form-wrap" >
					   
				
							<div >
							<div id="wb_Text38" style="position:absolute;left:44px;top:2px;width:297px;height:20px;visibility:hidden;z-index:42;">
							<span style="color:#FFFFFF;font-family:'Roboto Condensed';font-weight:300;font-size:17px;">Это точно Ваш телефон?</span></div>
							
							<div id="wb_Text39" style="position: absolute; left: 44px; top: 2px; width: 356px; height: 19px; visibility: visible; z-index: 37;">
                  <span style="color:#FFFFFF;font-family:'Roboto Condensed';font-weight:300;font-size:16px;">Введите верный номер телефона</span></div>
				
							<input type="tel" id="phone2"  name="Tel_" value="" spellcheck="false" placeholder="+7(___) ___-__-__" $.fn.inputmasks="function(maskOpts," mode)="">
					   
				
				
				
						   <div id="wb_Text37" >
							  <span style="color:#FFFFFF;">Данные используются только для обратной связи, не подлежат обработке.</span></div>
					   </div>
					   
						  
						<div >
						  
					   <div id="Layer14" >
						  <div id="wb_Shape28" >
							 <a href="#" onclick="ShowObject('Layer14', 0);ShowObject('wb_Text38', 1);ShowObject('wb_Text39', 0);return false;">
							 <img src="images/img0044.png" id="Shape28" alt="" ></a></div>
					   </div>
					   
					   
					   <div id="wb_Shape15" style="position:absolute;left:362px;top:27px;width:140px;height:50px;z-index:40;">
                  <a href="javascript:history.back()" onclick="ShowObject('wb_Text39', 1);ShowObject('wb_Text38', 0);ShowObject('Layer14', 1);return false;"><img src="images/img0024.png" id="Shape15" alt="" style="width:140px;height:50px;"></a></div>
					   
					   <input type="submit" id="Button2" onmouseover="ShowObject('wb_Image6', 0);return false;" onmouseout="ShowObject('wb_Image6', 1);return false;" name="" value="Оставить заявку" class="style1" style="position:absolute;left:520px;top:30px;width:140px;height:56px;z-index:41;">
					   
					   
					   
					   <input type="checkbox" id="Checkbox2" name="Checkbox1" value="on" checked  required>
					   
					   
					   
					   <div id="wb_Text40"  display:="" none="">
						  <span style="color:#000000;"><a href="javascript:popupwnd('Politika.pdf','no','no','no','no','no','no','','0','800','750')" class="style2" target="_self">Согласен(а) с Политикой конфиденциальности.</a></span></div>
						  
						</div> 


						</div> 
						
					</form>
				 </div>
				 
				 -->
				 
				 
				 <div id="wb_Form2" >
				<form name="Form2" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" accept-charset="UTF-8" id="Form2">
				   
				   <div class="wrap_form2" >
						
						<div >
							
							<div class="form-text2">
								<div id="wb_Text39" >
								  <span >Введите верный номер телефона</span></div>
							 
							   
								  
								  
							   
							   
							   <div id="wb_Text38" >
								  <span >Это точно Ваш телефон?</span>
								  </div>
							  </div>
						
							<input type="tel" id="phone2"  name="Tel_" value="" spellcheck="false" placeholder="+7(___) ___-__-__" $.fn.inputmasks="function(maskOpts," mode)="">
							  <div id="wb_Text37" >
						  <span style="color:#FFFFFF;">Данные используются только для обратной связи, не подлежат обработке.</span></div>
						</div>
						
						
						<div >
						
							<div class="form_but_wrap">
							
								 <div id="Layer14" >
								  <div id="wb_Shape28" >
									 <a href="#" onclick="ShowObject('Layer14', 0);ShowObject('wb_Text38', 1);ShowObject('wb_Text39', 0);return false;">
									 <img src="images/img0044.png" id="Shape28" alt=""></a></div>
							   </div>
				   
				   
							   <div id="wb_Shape15" >
								  <a href="javascript:history.back()" onclick="ShowObject('wb_Text39', 1);ShowObject('wb_Text38', 0);ShowObject('Layer14', 1);return false;">
								  <img src="images/img0024.png" id="Shape15" alt=""></a></div>
								  
								<div id="wb_Shape14" >
								<a href="./page2.php"><img src="images/img0023.png" id="Shape14" alt=""></a></div>  
								
								<input type="submit" id="Button2" onmouseover="ShowObject('wb_Image6', 0);return false;" onmouseout="ShowObject('wb_Image6', 1);return false;" name="" value="Оставить заявку" class="style1">
								
							</div >
							  
							 <input type="checkbox" id="Checkbox2" name="Checkbox1" value="on" checked  required>
						   <div id="wb_Text40"  display:="" none="">
							  <span style="color:#000000;"><a href="javascript:popupwnd('Politika.pdf','no','no','no','no','no','no','','0','800','750')" class="style2" target="_self">Согласен(а) с Политикой конфиденциальности.</a></span></div>
					
						
						</div>
				   
					   <input type="hidden" name="formid" value="form2">
					   
					   
					   <input type="hidden" name="ПОЛУЧИТЬ ПРАЙС-ЛИСТ" value="">
					   
					   
					   
					   
					   
					   
					  
					   
					  
					</div>
				</form>
			 </div>
				 
				 </div>
			 </div>
		  </div>
      </div>
	  
	  
	   <div id="Layer3" >
   
	<div class="container">
      <div id="Layer3_Container" >
	  
			<div  class="col-xs-12 col-sm-6 col-md-4">
			
				<div  class="stock-wrap">
			
					<div id="wb_Text25" >
					<span class="title-block"><strong>ВНИМАНИЕ! </strong></span>
					<span class="decor-title"><strong>АКЦИЯ!</strong></span></div>
					
					<div id="wb_Shape11" >
					<img src="images/img0012.png" id="Shape11" alt="" ></div>
					
					
					<div id="wb_Text26" >
					<span ><strong>До</strong></span>
					<span style="color:#EE4234"><strong> 30.11.2023 года. <br></strong></span>
					<span ><strong>500 клапанов по цене 400*</strong></span></div>
				 <div id="wb_Text12" >
					<span >*При оплате 400 единиц любых клапанов Вы получаете 500. </span></div>
				 
				
				
				</div>
			</div>
			
			<div  class="col-xs-0 col-sm-0 col-md-3">
			 <div id="wb_Image4" >
					<img src="images/file6.png" id="Image4file6" alt=""></div>
			  </div>
			  
			  
			<div  class="col-xs-12 col-sm-6 col-md-5">
			
				<div  class="form-wrap2">
					<!--
					<div id="wb_Text27" >
					<span ><strong>Оставьте заявку и получите </strong></span>
					<span ><br><br></span>
					<span ><strong>БЕСПЛАТНО 100 КЛАПАНОВ</strong></span></div>
					
					<div id="wb_Form1" >
					<form name="Form1" method="post" action="<?php //echo basename(__FILE__); ?>" enctype="multipart/form-data" accept-charset="UTF-8" id="Form1">
					   <input type="hidden" name="formid" value="form1">
					   <input type="hidden" name="АКЦИЯ" value="">
					   <div id="wb_Text32" >
						  <span style="color:#000000;">Данные используются только для обратной связи, не подлежат обработке.</span></div>
					   <div id="wb_Shape16" >
						  <a href="./page2.php"><img src="images/img0029.png" id="Shape16" alt="" ></a></div>
					   <div id="wb_Shape25" >
						  <a href="javascript:history.back()" onclick="ShowObject('wb_Text34', 1);ShowObject('wb_Text33', 0);ShowObject('Layer13', 1);return false;">
						  <img src="images/img0030.png" id="Shape25" alt="" ></a></div>
					   <input type="submit" id="Button1" onmouseover="ShowObject('wb_Image6', 0);return false;" onmouseout="ShowObject('wb_Image6', 1);return false;" name="" value="Оставить заявку" class="style1">
					   <div id="wb_Text33" >
						  <span >Это точно Ваш телефон?</span></div>
					   <div id="wb_Text34" >
						  <span >Введите верный номер телефона</span></div>
					   <div id="Layer13" >
						  <div id="wb_Shape27" >
							 <a href="#" onclick="ShowObject('Layer13', 0);ShowObject('wb_Text33', 1);ShowObject('wb_Text34', 0);return false;">
							 <img src="images/img0031.png" id="Shape27" alt="" ></a></div>
					   </div>
					   <input type="tel" id="phone"  name="Tel_" value="" spellcheck="false" placeholder="+7(___) ___-__-__" $.fn.inputmasks="function(maskOpts," mode)="">
					   <input type="checkbox" id="Checkbox1" name="Checkbox1" value="on" checked required>
					   <div id="wb_Text35"  display:="" none="">
						  <span style="color:#000000;"><a href="javascript:popupwnd('Politika.pdf','no','no','no','no','no','no','','0','800','750')" target="_self">Согласен(а) с Политикой конфиденциальности.</a></span></div>
					</form>
				 </div>
				 
				 -->
				 
				 
				 
				 
				 
				 
				 
				 
				 
			<div id="wb_Text27">
				<span class="title-form">
				<strong>Оставьте заявку и получите </strong></span>
				<span style="color:#000000;font-family:'Roboto Condensed';font-size:19px;"></span>
				<span style="color:#EE4234;font-family:'Roboto Condensed';font-size:27px;"><strong>БЕСПЛАТНО 100 КЛАПАНОВ</strong></span>
			
			</div>
			
			<div id="wb_Form1">
            <form name="Form1" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" accept-charset="UTF-8" id="Form1">
			
				<div class="form-text">
				
					<div id="wb_Text33" >
					  <span style="color:#000000;font-family:'Roboto Condensed';font-weight:300;font-size:19px;">Это точно Ваш телефон?</span></div>
					  
					  <div id="wb_Text34">
					  <span style="color:#000000;font-family:'Roboto Condensed';font-weight:300;font-size:16px;">Введите верный номер телефона</span>
					  </div>
				  </div>
				  
				
				<input type="tel" id="phone" name="Tel_" value="" spellcheck="false" placeholder="+7(___) ___-__-__" $.fn.inputmasks="function(maskOpts," mode)="">
               
			
               <input type="hidden" name="formid" value="form1">
               <input type="hidden" name="АКЦИЯ" value="">
			   
               <div class="form-wrap-but">
				  
				   <div id="wb_Shape16">
					  <a href="./page2.php"><img src="images/img0029.png" id="Shape16" alt=""></a></div>
					  
					  
					  
				   <div id="wb_Shape25">
					  <a href="javascript:history.back()" onclick="ShowObject('wb_Text34', 1);ShowObject('wb_Text33', 0);ShowObject('Layer13', 1);return false;">
					  <img src="images/img0030.png" id="Shape25" alt=""></a>
					  </div>
				   
				   
				   <input type="submit" id="Button1" onmouseover="ShowObject('wb_Image6', 0);return false;" onmouseout="ShowObject('wb_Image6', 1);return false;" name="" value="Оставить заявку" class="style1">
				   
				   
					  
					  
				   
					  
				   <div id="Layer13" >
					  <div id="wb_Shape27">
						 <a href="#" onclick="ShowObject('Layer13', 0);ShowObject('wb_Text33', 1);ShowObject('wb_Text34', 0);return false;">
						 <img src="images/img0031.png" id="Shape27" alt=""></a>
						 </div>
				   </div>
               </div>
			   
			   
			    <div class="checkbox-text">
              
				   <input type="checkbox" id="Checkbox1" name="Checkbox1" value="on" checked  required>
				   
				   <div id="wb_Text35" display:="" none="">
					  <span style="color:#000000;">
					  <a href="javascript:popupwnd('Politika.pdf','no','no','no','no','no','no','','0','800','750')" target="_self">Согласен(а) с Политикой конфиденциальности.</a></span>
					  </div>
				  
				  </div>
				  
				  
				  
				  <div id="wb_Text32">
                  <span style="color:#000000;">Данные используются только для обратной связи, не подлежат обработке.</span></div>
				  
            
			</form>
         </div>
				 
				 
				 
				 
				 
				 
				 
			 </div>
				
			
			  </div>  
			<!-- 
			<div id="wb_Image29" > 
				<img src="images/5.png" id="Image29" alt=""></div> -->
         
         
         
         
        
         
		 
		 
		 
		 
      </div>
      </div>
   </div>
  
	  
	  
	  
	  
	  
   
   <div id="Layer11" >
		
		<div class="container">
   
		  <div id="Layer11_Container" >
		  
			<div class="col-md-12">
			
				<div id="wb_Text13" >
				<span class="title-block" style="color: #fff;"><strong>ПОЧЕМУ КЛИЕНТЫ ВЫБИРАЮТ</strong></span>
				<span ><strong> </strong></span>
				<span class="decor-title"><strong>TOPAS</strong></span>
				<div id="wb_Shape9" >
				<img src="images/img0002.png" id="Shape9" alt="" ></div>
				
				</div>
			
			
			</div>
			
			
			<div class="col-md-12">
			
				<div class="advantages" >
				
					<div class="advantage" >
						
						<div class="advantages-icon" >
						
							<img src="images/file4.png" id="Shape18" alt="" >
					
						</div>
						
						<div class="advantage-text" >
						
							<span ><strong>БЕСПЛАТНАЯ</strong></span>
							<span > </span>
							<span >доставка <br>в любую точку России</span>
					
						</div>
						
					</div>
					
					<div class="advantage" >
						
						<div class="advantages-icon" >
						
							<img style="max-width: 60%;" src="images/file3.png" id="Shape18" alt="" >
					
						</div>
						
						<div class="advantage-text" >
						
							<span ><strong>ГАРАНТИЯ</strong></span>
							<span > </span>
							<span ><strong>5 ЛЕТ<br></strong></span>
							<span >на оборудование </span>
					
						</div>
						
					</div>
					
					<div class="advantage" >
						
						<div class="advantages-icon" >
						
							<img style="max-width: 60%;" src="images/file5.png" id="Shape18" alt="" >
					
						</div>
						
						<div class="advantage-text" >
						
							<span >Оптимизация издержек -</span>
							<span > <br></span>
							<span ><strong>ЦЕНА НИЖЕ НА 20-30% </strong></span>
					
						</div>
						
					</div>
					
					<div class="advantage" >
						
						<div class="advantages-icon" >
						
							<img style="max-width: 60%;" src="images/file2.png" id="Shape18" alt="" >
					
						</div>
						
						<div class="advantage-text" >
						
							<span ><strong>СОБСТВЕННОЕ </strong></span>
							<span ><br></span>
							<span >производство</span>
					
						</div>
						
					</div>
					
					
					<div class="advantage" >
						
						<div class="advantages-icon" >
						
							<img style="max-width: 42%;" src="images/file1.png" id="Shape18" alt="" >
					
						</div>
						
						<div class="advantage-text" >
						
							<span >Вся продукция </span>
							<span ><br></span>
							<span ><strong>СЕРТИФИЦИРОВАНА</strong></span>
					
						</div>
						
					</div>
					
					
					<div class="advantage" >
					
						<div id="wb_Shape19" >
							<a href="javascript:displaylightbox('./page5.php',{width:1000,height:550})" target="_self">
							<!-- <img class="hover" src="images/img0020_hover.png" alt="" > -->
							<span><img src="images/img0020.png" id="Shape19" alt="" ></span></a>
						</div>
					</div>
				
				</div>
			
			
			</div>
		  
		  
		  
			 
			 
			 
				
				
		  </div>
	  
      </div>
	  
	  
   </div>
   
   
   
   
   
   
   
   <div id="Layer6">
   
		<div class="container">
	
	
		  <div id="Layer6_Container" >
			 <div id="wb_Text19" >
				<span class="title-block"><strong>НАШИ КЛАПАНА РАБОТАЮТ </strong></span>
				<span class="decor-title" ><strong>ПО ВСЕЙ РОССИИ</strong></span></div>
			 
			 
			<div class="cities-wrap" > 
				
					<div class="city" > 
				
					 <div id="wb_Image1" >
					<img src="images/ggrqq4.jpeg" id="Image1" alt=""></div>
					 <div id="wb_Text18" >
						<span >г. Подольск<br>поликлиника</span>
						</div>
					</div>
					
					<div class="city" > 
				
					 <div id="wb_Image2" >
					<img src="images/ggrqq6.jpg" id="Image2" alt=""></div>
					 <div id="wb_Text18" >
						<span >г. Ростов-на Дону<br>ЖК Суворовский, Литер 18</span>
						</div>
					</div>
					
					<div class="city" > 
				
					 <div id="wb_Image3" >
					<img src="images/ggrqq5.jpeg" id="Image3" alt=""></div>
					 <div id="wb_Text18" >
						<span >г. Курган<br>ЖК Родные просторы дом 2</span>
						</div>
					</div>
					
					<div class="city" > 
				
					 <div id="wb_Image4ggrqq7" >
					<img src="images/ggrqq7.jpeg" id="Image4ggrqq7" alt=""></div>
					 <div id="wb_Text18" >
						<span >г. Ярославль<br>ул Моховая д 2</span>
						</div>
					</div>
					
					<div class="city_mini" > 
				
					 <div id="wb_Image5" >
					<img src="images/ggrqq2-2.jpg" id="Image5" alt=""></div>
					 <div id="wb_Text18" >
						<span >г. Самара <br>ул. Промышленности 180</span>
						</div>
					</div>
					
					<div class="city_mini" > 
				
					 <div id="wb_Image6" >
					<img src="images/ggrqq1-2.jpg" id="Image6" alt=""></div>
					 <div id="wb_Text18" >
						<span >г. Самара <br>ЖК Статус</span>
						</div>
					</div>
					
					<div class="city_mini" > 
				
					 <div id="wb_Image7" >
					<img src="images/ggrqq3-2.jpg" id="Image7" alt=""></div>
					 <div id="wb_Text18" >
						<span >г. Пенза <br>ул. Новоказанская 7</span>
						</div>
					</div>
					
					

				 
				 
					
					
			  </div>
		  </div>
		  
		  
      </div>
	  
	  
   </div>
   
   
   
   <div id="Layer8">
 <!--<script charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ab080af4b235056070f30932abe89ab450b0df55a7270a19a9b59d64a61722c6c&amp;width=0&amp;height=500&amp;lang=ru_RU&amp;scroll=true"></script> -->
      <script charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ab080af4b235056070f30932abe89ab450b0df55a7270a19a9b59d64a61722c6c&amp;width=100%&amp;height=500&amp;lang=ru_RU&amp;scroll=true"></script>
      <div id="Layer8_Container" >
      </div>
   </div>
   
   
   
   <div id="Layer7">
   
        <hr class="hr-foot">
		
		<div class="container">
		
			<footer class="row">
   
			  <div id="Layer7_Container" >
			  
				
					<div class="col-my-12 col-xs-12 col-sm-12 col-md-3">
					
						<div class="address-wrap">
					
							 <div id="wb_Image11" >
							<img src="images/Logo.jpg" id="Image11" alt=""></div>
							
							<div id="wb_Text30" >
							<span >ООО «ТОПАС»<br>г. Казань, ул. Васильченко, 1<br>ИНН 1658197862 / КПП 165801001<br></span></div>
						
						
						</div>
					</div>
					
					<div class="col-my-12 col-xs-6 col-sm-6 col-md-3 ">
					
						<div id="wb_Text31" >
						<span style="color:#231F20;"> <a href="mailto:topaskazan@yandex.ru">topaskazan@yandex.ru</a></span>
						<!--
							<div id="wb_Line1" >
						<img src="images/img0027.png" id="Line1" alt=""></div> -->
						</div>
						
						
					
					</div>
					
					<div class="col-my-12 col-xs-6 col-sm-6 col-md-3 decor-row">
					
						 <div id="wb_Text24" >
						<span style="color:#000000;"><strong><a href="tel:88432033578">8 (843) 203-35-78</a></strong></span></div>
						<div id="wb_Text28" >
					<span style="color:#000000;">Время работы: пн-пт с 8-00 до 17-00</span></div>
					
					</div>
					
					
					<div class="col-my-12 col-xs-12 col-sm-12 col-md-3">
					
						<div id="wb_Shape26" >
						<a href="javascript:displaylightbox('./Zakazat1.php',{width:357,height:301})" target="_self">
						<!-- <img class="hover" src="images/img0028_hover.png" alt="" style="border-width:0;width:279px;height:49px;"> -->
						<span><img src="images/img0028.png" id="Shape26" alt="" style="width:279px;height:49px;"></span></a></div>
					
					</div>
			  
				 
					
				</div>	
			
			
			</footer>
			
			</div>	
			
			 
			
				<hr class="hr-foot">
			 
			<div class="container"> 
					
					<div class="foot-line" >
				 
					 <div id="wb_Text23" >
						<span style="color:#D5E7EF;">
						<strong><u><a href="javascript:popupwnd('Politika.pdf','no','no','no','no','no','no','','','800','550')" target="_self">Политика конфиденциальности</a></u></strong></span></div>
						
						<div id="wb_Text36" >
						<span style="color:#15273F;">Данный интернет-сайт носит исключительно информационный характер и ни при каких условиях не 
						является публичной офертой, определяемой статьями 437 ГК РФ.</span></div>
					 
				  </div>
			  </div>
		  
      
	  
	  
	  
	  
   </div>
   
   <!--
   <div id="Layer12" style="position:absolute;text-align:center;left:0%;top:6218px;width:100%;height:1px;z-index:141;min-width:1250px
">
      <div id="Layer12_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
      </div>
   </div>-->
   
 
   
   
   
   
   
   
   
   
   
 
   </div>
   
   
   


   
   
   
   <!-- 
   <div id="Layer9" style="position:absolute;text-align:center;left:0%;top:6048px;width:100%;height:1px;z-index:143;min-width:1250px
">
      <div id="Layer9_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">	  
      </div>
   </div> -->
   
   
   
<link rel="stylesheet" href="https://cdn.envybox.io/widget/cbk.css">
   <script src="https://cdn.envybox.io/widget/cbk.js?wcb_code=09a3f9faa8f6d10d299521bf210c9e18" charset="UTF-8" async></script>
   <script>   
       (function(e){function t(){var e=document.createElement("input"),t="onpaste";return e.setAttribute(t,""),"function"==typeof e[t]?"paste":"input"}var n,a=t()+".mask",r=navigator.userAgent,i=/iphone/i.test(r),o=/android/i.test(r);e.mask={definitions:{9:"[0-9]",0:"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"},dataName:"rawMaskFn",placeholder:"_"},e.fn.extend({caret:function(e,t){var n;if(0!==this.length&&!this.is(":hidden"))return"number"==typeof e?(t="number"==typeof t?t:e,this.each(function(){this.setSelectionRange?this.setSelectionRange(e,t):this.createTextRange&&(n=this.createTextRange(),n.collapse(!0),n.moveEnd("character",t),n.moveStart("character",e),n.select())})):(this[0].setSelectionRange?(e=this[0].selectionStart,t=this[0].selectionEnd):document.selection&&document.selection.createRange&&(n=document.selection.createRange(),e=0-n.duplicate().moveStart("character",-1e5),t=e+n.text.length),{begin:e,end:t})},unmask:function(){return this.trigger("unmask")},mask:function(t,r){var c,l,s,u,f,h;return!t&&this.length>0?(c=e(this[0]),c.data(e.mask.dataName)()):(r=e.extend({placeholder:e.mask.placeholder,completed:null},r),l=e.mask.definitions,s=[],u=h=t.length,f=null,e.each(t.split(""),function(e,t){"?"==t?(h--,u=e):l[t]?(s.push(RegExp(l[t])),null===f&&(f=s.length-1)):s.push(null)}),this.trigger("unmask").each(function(){function c(e){for(;h>++e&&!s[e];);return e}function d(e){for(;--e>=0&&!s[e];);return e}function m(e,t){var n,a;if(!(0>e)){for(n=e,a=c(t);h>n;n++)if(s[n]){if(!(h>a&&s[n].test(R[a])))break;R[n]=R[a],R[a]=r.placeholder,a=c(a)}b(),x.caret(Math.max(f,e))}}function p(e){var t,n,a,i;for(t=e,n=r.placeholder;h>t;t++)if(s[t]){if(a=c(t),i=R[t],R[t]=n,!(h>a&&s[a].test(i)))break;n=i}}function g(e){var t,n,a,r=e.which;8===r||46===r||i&&127===r?(t=x.caret(),n=t.begin,a=t.end,0===a-n&&(n=46!==r?d(n):a=c(n-1),a=46===r?c(a):a),k(n,a),m(n,a-1),e.preventDefault()):27==r&&(x.val(S),x.caret(0,y()),e.preventDefault())}function v(t){var n,a,i,l=t.which,u=x.caret();t.ctrlKey||t.altKey||t.metaKey||32>l||l&&(0!==u.end-u.begin&&(k(u.begin,u.end),m(u.begin,u.end-1)),n=c(u.begin-1),h>n&&(a=String.fromCharCode(l),s[n].test(a)&&(p(n),R[n]=a,b(),i=c(n),o?setTimeout(e.proxy(e.fn.caret,x,i),0):x.caret(i),r.completed&&i>=h&&r.completed.call(x))),t.preventDefault())}function k(e,t){var n;for(n=e;t>n&&h>n;n++)s[n]&&(R[n]=r.placeholder)}function b(){x.val(R.join(""))}function y(e){var t,n,a=x.val(),i=-1;for(t=0,pos=0;h>t;t++)if(s[t]){for(R[t]=r.placeholder;pos++<a.length;)if(n=a.charAt(pos-1),s[t].test(n)){R[t]=n,i=t;break}if(pos>a.length)break}else R[t]===a.charAt(pos)&&t!==u&&(pos++,i=t);return e?b():u>i+1?(x.val(""),k(0,h)):(b(),x.val(x.val().substring(0,i+1))),u?t:f}var x=e(this),R=e.map(t.split(""),function(e){return"?"!=e?l[e]?r.placeholder:e:void 0}),S=x.val();x.data(e.mask.dataName,function(){return e.map(R,function(e,t){return s[t]&&e!=r.placeholder?e:null}).join("")}),x.attr("readonly")||x.one("unmask",function(){x.unbind(".mask").removeData(e.mask.dataName)}).bind("focus.mask",function(){clearTimeout(n);var e;S=x.val(),e=y(),n=setTimeout(function(){b(),e==t.length?x.caret(0,e):x.caret(e)},10)}).bind("blur.mask",function(){y(),x.val()!=S&&x.change()}).bind("keydown.mask",g).bind("keypress.mask",v).bind(a,function(){setTimeout(function(){var e=y(!0);x.caret(e),r.completed&&e==x.val().length&&r.completed.call(x)},0)}),y()}))}})})(jQuery);
   </script>
   <script>   
       $(function(){
           //тут поставить нужный номер поля ввода, если несколько полей, то под друг другом
           $("#phone").mask("+7?(999)999-99-99");
           $("#phone2").mask("+7?(999)999-99-99");
   
       })
   </script>
<script src="js/replacecontent.js"></script>
</body>
</html>
