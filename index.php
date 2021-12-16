<?php
		{
			require 'db1.php';
				$data = $_POST;
				if( isset($data['do_signup']) )
				{

					$errors = array();
					if( trim($data['number']) == '' )
					{
						$errors[] = 'Введите номер!'; 
					}

					if(R::count('phones', "number = ?", array($data['number'])) > 0 )
					{
						$errors[] = 'Пользователь с таким номером уже существует!';
					}
					
					if( empty($errors) )
					{
						$user = R:: dispense('phones');
						$user ->number = $data['number'];
						
						R::store($user);
						echo '<div style="color: green;">Вы успешно оставили номер</div>';


					} 

				}
		}
		

		{ 
			include_once "db2.php";
			include_once "news.php";

			$database = new Database();

			$db = $database->getConnection();

			$news = new News($db);

			$stmt =$news->read();
			$num = $stmt->rowCount();

			if ($num > 0) {
				$News_arr = array();
				$News_arr['records'] = array();
				
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					extract($row);
					$news_item = array(
						"NEWS" => $NEWS,
					);
					
					array_push($News_arr['records'], $news_item);
				}
				
				http_response_code(200);
				
				//echo json_encode($news_arr);
				$json_data = json_encode($News_arr);
				file_put_contents('news.json', $json_data);
			}
			else {
				http_response_code(404);
				
				echo json_encode(array("message" => "Записи не найдены"), JSON_UNESCAPED_UNICODE);
			}
			
			
		}
		
		{
			
			include_once "db2.php";
			include_once "qa.php";

			$database = new Database();

			$db = $database->getConnection();

			$qa = new Qa($db);

			$stmt =$qa->read();
			$num = $stmt->rowCount();

			if ($num > 0) {
				$Qa_arr = array();
				$Qa_arr['records'] = array();
				
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					extract($row);
					$qa_item = array(
						"QA" => $QA,
					);
					
					array_push($Qa_arr['records'], $qa_item);
				}
				
				http_response_code(200);
				
				//echo json_encode($news_arr);
				$json_data = json_encode($Qa_arr);
				file_put_contents('qa.json', $json_data);
			}
			else {
				http_response_code(404);
				
				echo json_encode(array("message" => "Записи не найдены"), JSON_UNESCAPED_UNICODE);
			}
		
		}
?>
		
		

<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Dental Clinic">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>main</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="main.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.0.3, nicepage.com">
    <link rel="icon" href="images/favicon.png">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Site1",
		"logo": "images/favicon.png?rand=8938"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="main">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  </head>
  <body data-home-page="main.html" data-home-page-title="main" class="u-body"><header class="u-clearfix u-header" id="sec-866e"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="" class="u-active-none u-btn u-btn-rectangle u-button-style u-hover-none u-none u-radius-0 u-text-body-color u-btn-1"><span class="u-icon u-icon-1"><svg class="u-svg-content" viewBox="0 0 405.333 405.333" x="0px" y="0px" style="width: 1em; height: 1em;"><path d="M373.333,266.88c-25.003,0-49.493-3.904-72.704-11.563c-11.328-3.904-24.192-0.896-31.637,6.699l-46.016,34.752    c-52.8-28.181-86.592-61.952-114.389-114.368l33.813-44.928c8.512-8.512,11.563-20.971,7.915-32.64    C142.592,81.472,138.667,56.96,138.667,32c0-17.643-14.357-32-32-32H32C14.357,0,0,14.357,0,32    c0,205.845,167.488,373.333,373.333,373.333c17.643,0,32-14.357,32-32V298.88C405.333,281.237,390.976,266.88,373.333,266.88z"></path></svg><img></span>&nbsp;+1 (234) 567-8910
        </a>
        <p class="u-align-center u-text u-text-1">Регистратура:</p>
        <a href="#sec-dee3" class="u-btn u-btn-round u-button-style u-dialog-link u-hover-palette-4-base u-palette-3-base u-radius-50 u-btn-2"><span class="u-icon u-icon-2"><svg class="u-svg-content" viewBox="0 0 513.64 513.64" x="0px" y="0px" style="width: 1em; height: 1em;"><path d="M499.66,376.96l-71.68-71.68c-25.6-25.6-69.12-15.359-79.36,17.92c-7.68,23.041-33.28,35.841-56.32,30.72 c-51.2-12.8-120.32-79.36-133.12-133.12c-7.68-23.041,7.68-48.641,30.72-56.32c33.28-10.24,43.52-53.76,17.92-79.36l-71.68-71.68 c-20.48-17.92-51.2-17.92-69.12,0l-48.64,48.64c-48.64,51.2,5.12,186.88,125.44,307.2c120.32,120.32,256,176.641,307.2,125.44 l48.64-48.64C517.581,425.6,517.581,394.88,499.66,376.96z"></path></svg><img></span>&nbsp;Записаться на платный прием
        </a>
        <a href="" class="u-active-none u-btn u-btn-rectangle u-button-style u-hover-none u-none u-radius-0 u-text-body-color u-btn-3"><span class="u-icon u-icon-3"><svg class="u-svg-content" viewBox="0 0 405.333 405.333" x="0px" y="0px" style="width: 1em; height: 1em;"><path d="M373.333,266.88c-25.003,0-49.493-3.904-72.704-11.563c-11.328-3.904-24.192-0.896-31.637,6.699l-46.016,34.752    c-52.8-28.181-86.592-61.952-114.389-114.368l33.813-44.928c8.512-8.512,11.563-20.971,7.915-32.64    C142.592,81.472,138.667,56.96,138.667,32c0-17.643-14.357-32-32-32H32C14.357,0,0,14.357,0,32    c0,205.845,167.488,373.333,373.333,373.333c17.643,0,32-14.357,32-32V298.88C405.333,281.237,390.976,266.88,373.333,266.88z"></path></svg><img></span>&nbsp;+1 (234) 567-8910
        </a>
        <p class="u-align-center u-text u-text-2">Справочная больницы:</p>
        <a href="" class="u-active-none u-btn u-btn-rectangle u-button-style u-hover-none u-none u-radius-0 u-text-body-color u-btn-4"><span class="u-icon u-icon-4"><svg class="u-svg-content" viewBox="0 0 405.333 405.333" x="0px" y="0px" style="width: 1em; height: 1em;"><path d="M373.333,266.88c-25.003,0-49.493-3.904-72.704-11.563c-11.328-3.904-24.192-0.896-31.637,6.699l-46.016,34.752    c-52.8-28.181-86.592-61.952-114.389-114.368l33.813-44.928c8.512-8.512,11.563-20.971,7.915-32.64    C142.592,81.472,138.667,56.96,138.667,32c0-17.643-14.357-32-32-32H32C14.357,0,0,14.357,0,32    c0,205.845,167.488,373.333,373.333,373.333c17.643,0,32-14.357,32-32V298.88C405.333,281.237,390.976,266.88,373.333,266.88z"></path></svg><img></span>&nbsp;+1 (234) 567-8910
        </a>
        <p class="u-align-center u-text u-text-3">Отделение платных услуг:</p>
        <p class="u-align-center u-text u-text-palette-2-base u-text-4">ОБЛАСТНАЯ<br>БОЛЬНИЦА
        </p>
        <a href="index.php" class="u-image u-logo u-image-1" data-image-width="900" data-image-height="900" title="Главная">
          <img src="images/favicon.png?rand=8938" class="u-logo-image u-logo-image-1">
        </a>
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;"><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</symbol>
</defs></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="1.html" style="padding: 10px 16px;">Пациентам</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="1.html" style="padding: 10px 16px;">О больнице</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="api/doctors/read.php" target="_blank" style="padding: 10px 16px;">Врачи</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="1.html" style="padding: 10px 16px;">Контакты</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="1.html" style="padding: 10px 16px;">Рабочие дни</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="login.php" style="padding: 10px 26px 10px 16px;">Админам</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" style="padding: 10px 24px;">Пациентам</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" style="padding: 10px 24px;">О больнице</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="api/doctors/read.php" target="_blank" style="padding: 10px 24px;">Врачи</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" style="padding: 10px 24px;">Контакты</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" style="padding: 10px 24px;">Рабочие дни</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="login.php" style="padding: 10px 24px;">Админам</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-clearfix u-hidden-xs u-section-1" id="sec-a4f6">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div data-interval="5000" data-u-ride="carousel" class="u-carousel u-expanded-width u-slider u-slider-1" id="carousel-4bf3">
          <ol class="u-absolute-hcenter u-carousel-indicators u-carousel-indicators-1">
            <li data-u-target="#carousel-4bf3" class="u-active u-grey-30" data-u-slide-to="0"></li>
            <li data-u-target="#carousel-4bf3" class="u-grey-30" data-u-slide-to="1"></li>
            <li data-u-target="#carousel-4bf3" class="u-grey-30" data-u-slide-to="2"></li>
          </ol>
          <div class="u-carousel-inner" role="listbox">
            <div class="u-active u-carousel-item u-container-style u-image u-shading u-slide u-image-1" data-image-width="900" data-image-height="400">
              <div class="u-container-layout u-container-layout-1">
                <h6 class="u-align-left u-text u-text-custom-color-2 u-text-default-xl u-text-1">Диагностика и<br>лечение зрения
                </h6>
                <h6 class="u-align-right u-text u-text-custom-color-2 u-text-2">Комплексное офтальмологическое обследование<br>Современные малоинвазивные технологии<br>оперативного лечения катаракты и глаукомы<br>Мультимодальные методы диагностики<br>патологии сетчатки и зрительного нерва
                </h6>
                <h1 class="u-text u-text-custom-color-2 u-text-default u-title u-text-3">ОФТАЛЬМОЛОГИЯ</h1>
              </div>
            </div>
            <div class="u-carousel-item u-container-style u-image u-shading u-slide u-image-2" data-image-width="1146" data-image-height="1100">
              <div class="u-container-layout u-container-layout-2">
                <h6 class="u-text u-text-custom-color-2 u-text-default u-text-4">Лечение под микроскопом</h6>
                <h6 class="u-text u-text-custom-color-2 u-text-default u-text-5">Лечение без сверления</h6>
                <h6 class="u-text u-text-custom-color-2 u-text-default u-text-6">Детская стоматология</h6>
                <h6 class="u-text u-text-custom-color-2 u-text-default u-text-7">Лечение под наркозом</h6>
                <h1 class="u-text u-text-custom-color-2 u-text-default u-text-8">СТОМАТОЛОГИЯ </h1>
              </div>
            </div>
            <div class="u-carousel-item u-container-style u-image u-shading u-slide u-image-3" data-image-width="767" data-image-height="533">
              <div class="u-container-layout u-container-layout-3">
                <h1 class="u-text u-text-default u-text-9">ТРАВМОТОЛОГИЯ </h1>
                <h6 class="u-text u-text-default u-text-10">Бесплатная&nbsp;<br>консультация<br>травмотолога
                </h6>
                <h6 class="u-align-right u-text u-text-default u-text-11">Лечение при переломах,<br>повреждениях суставов,<br>растяжениях
                </h6>
              </div>
            </div>
          </div>
          <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-spacing-5 u-text-grey-30 u-carousel-control-1" href="#carousel-4bf3" role="button" data-u-slide="prev">
            <span aria-hidden="true">
              <svg viewBox="0 0 477.175 477.175"><path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
                    c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"></path></svg>
            </span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="u-absolute-vcenter u-carousel-control u-carousel-control-next u-spacing-5 u-text-grey-30 u-carousel-control-2" href="#carousel-4bf3" role="button" data-u-slide="next">
            <span aria-hidden="true">
              <svg viewBox="0 0 477.175 477.175"><path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
                    c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"></path></svg>
            </span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-section-2" id="sec-0b28">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-10 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-col">
              <div class="u-size-30">
                <div class="u-layout-row">
                  <div class="u-container-style u-image u-layout-cell u-left-cell u-size-30 u-image-1" src="" data-image-width="1080" data-image-height="1080">
                    <div class="u-container-layout u-valign-middle u-container-layout-1" ></div>
                  </div>
                  <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-30 u-layout-cell-2">
                    <div class="u-container-layout u-container-layout-2">
					





                      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"> </script>

<script>

    $(function() {


   var news = [];

   $.getJSON('news.json', function(data) {
       $.each(data.records, function(i, f) {
          var tblRow = "<tr>" + "<td>" + f.NEWS + "</td>" + "</tr>"
           $(tblRow).appendTo("#userdata tbody");
     });

   });

});
</script>
</head>

<body>

<div class="wrapper">
<div class="profile">
   <table style="width:100%" id= "userdata" border="0" >
  <thead>
            <th  align="Left"><big><big><big>Новости</big></big></big></th>
			
        </thead>
      <tbody>

       </tbody>
   </table>

</div>
</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="u-size-30">
                <div class="u-layout-row">
                  <div class="u-align-left u-container-style u-layout-cell u-left-cell u-size-30 u-layout-cell-3">
                    <div class="u-container-layout u-container-layout-3">
                      <script>

    $(function() {


   var qa = [];

   $.getJSON('qa.json', function(data) {
       $.each(data.records, function(i, f) {
          var tblRow = "<tr>" + "<td>" + f.QA + "</td>" + "</tr>"
           $(tblRow).appendTo("#userdata tfoot");
     });

   });

});
</script>
</head>

<body>

<div class="wrapper">
<div class="profile">
   <table style= "width:100%" id= "userdata" border="0">
  <thead>
            <th  align="left"><big><big><big>Часто задаваемые вопросы</big></big></big></th>
			
        </thead>
      <tfoot>

       </tfoot>
   </table>

</div>
</div>
                      </p>
                    </div>
                  </div>
                  <div class="u-container-style u-image u-layout-cell u-right-cell u-size-30 u-image-2" src="" data-image-width="1080" data-image-height="1080">
                    <div class="u-container-layout u-valign-middle u-container-layout-4"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-ce7f"><div class="u-align-left u-clearfix u-sheet u-sheet-1">
        <a href="https://github.com/ICheekiBreekiII" class="u-active-none u-border-2 u-border-palette-1-base u-btn u-btn-rectangle u-button-style u-hover-none u-none u-radius-0 u-btn-1">Разработчик<br>
        </a>
      </div></footer>

  <section class="u-align-center u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-section-5" id="sec-dee3">
     
	  <div class="u-container-style u-dialog u-grey-5 u-radius-30 u-shape-round u-dialog-1">
        <div class="u-container-layout u-valign-bottom u-container-layout-1">
          <h2 class="u-align-center u-text u-text-default u-text-1"> ПОЗВОНИТЕ НАМ ИЛИ ОСТАВЬТЕ СВОЙ&nbsp;НОМЕР ТЕЛЕФОНА</h2>
          <a href="" class="u-active-none u-btn u-button-style u-hover-none u-none u-text-hover-palette-1-base u-btn-1"><span class="u-icon u-text-palette-1-base"><svg class="u-svg-content" viewBox="0 0 405.333 405.333" x="0px" y="0px" style="width: 1em; height: 1em;"><path d="M373.333,266.88c-25.003,0-49.493-3.904-72.704-11.563c-11.328-3.904-24.192-0.896-31.637,6.699l-46.016,34.752    c-52.8-28.181-86.592-61.952-114.389-114.368l33.813-44.928c8.512-8.512,11.563-20.971,7.915-32.64    C142.592,81.472,138.667,56.96,138.667,32c0-17.643-14.357-32-32-32H32C14.357,0,0,14.357,0,32    c0,205.845,167.488,373.333,373.333,373.333c17.643,0,32-14.357,32-32V298.88C405.333,281.237,390.976,266.88,373.333,266.88z"></path></svg><img></span>&nbsp;Пример&nbsp; +7 (666) 228-13-37
          </a>
		  
			<form method="POST">
				<input type="text" style="height:35px;width:495px" name="number" value="<?php echo @$data['number']; ?>">
				<div><button style="height:50px;width:495px" type="submit" name="do_signup">Отправить номер</button></div>			
			</form>

		  <p class="u-align-center u-text u-text-default u-text-2"> Мы вам перезвоним в течение рабочего дня</p>
        </div><button class="u-dialog-close-button u-icon u-text-grey-40 u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 348.333 348.334" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-9711"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 348.333 348.334" x="0px" y="0px" id="svg-9711" style="enable-background:new 0 0 348.333 348.334;"><g><path d="M336.559,68.611L231.016,174.165l105.543,105.549c15.699,15.705,15.699,41.145,0,56.85   c-7.844,7.844-18.128,11.769-28.407,11.769c-10.296,0-20.581-3.919-28.419-11.769L174.167,231.003L68.609,336.563   c-7.843,7.844-18.128,11.769-28.416,11.769c-10.285,0-20.563-3.919-28.413-11.769c-15.699-15.698-15.699-41.139,0-56.85   l105.54-105.549L11.774,68.611c-15.699-15.699-15.699-41.145,0-56.844c15.696-15.687,41.127-15.687,56.829,0l105.563,105.554   L279.721,11.767c15.705-15.687,41.139-15.687,56.832,0C352.258,27.466,352.258,52.912,336.559,68.611z"></path>
</g></svg></button>
      </div>
    </section><style> .u-section-5 {
  min-height: 866px;
}

.u-section-5 .u-dialog-1 {
  width: 545px;
  min-height: 362px;
  box-shadow: 0 0 14px 0 rgba(0,0,0,0.3);
  margin: 98px auto 60px;
}

.u-section-5 .u-container-layout-1 {
  padding: 30px 22px 25px;
}

.u-section-5 .u-text-1 {
  font-size: 2.25rem;
  margin: 0 auto;
}

.u-section-5 .u-btn-1 {
  border-style: none;
  font-weight: 700;
  font-size: 1.25rem;
  letter-spacing: 1px;
  margin: 17px auto 0;
  padding: 0;
}

.u-section-5 .u-btn-2 {
  background-image: none;
  border-style: none;
  margin: 31px auto 0;
}

.u-section-5 .u-text-2 {
  margin: 38px auto 0;
}

.u-section-5 .u-icon-2 {
  width: 16px;
  height: 16px;
  left: auto;
  top: 17px;
  position: absolute;
  right: 16px;
}

@media (max-width: 1199px) {
  .u-section-5 .u-dialog-1 {
    height: auto;
  }
}

@media (max-width: 767px) {
  .u-section-5 .u-dialog-1 {
    width: 540px;
  }

  .u-section-5 .u-container-layout-1 {
    padding-left: 30px;
    padding-right: 30px;
  }

  .u-section-5 .u-btn-1 {
    margin-top: 95px;
  }

  .u-section-5 .u-btn-2 {
    margin-top: 37px;
  }

  .u-section-5 .u-text-2 {
    margin-top: 56px;
  }
}

@media (max-width: 575px) {
  .u-section-5 .u-dialog-1 {
    width: 340px;
  }

  .u-section-5 .u-container-layout-1 {
    padding-left: 20px;
    padding-right: 20px;
  }

  .u-section-5 .u-btn-1 {
    margin-top: 85px;
  }

  .u-section-5 .u-btn-2 {
    margin-top: 62px;
  }

  .u-section-5 .u-text-2 {
    margin-top: 31px;
    margin-left: 10px;
  }
}</style></body>
</html>