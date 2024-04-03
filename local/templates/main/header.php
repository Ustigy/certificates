<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
        <!-- title of site -->
        <title>Trave</title>
		<?$APPLICATION->ShowHead()?>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="<?=SITE_TEMPLATE_PATH?>/logo/favicon.png"/>


		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/font-awesome.min.css');?>
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/animate.css');?>
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/flaticon.css');?>
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/bootstrap.min.css');?>
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/style.css');?>
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/responsive.css');?>
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/custom.css');?>

		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery.js');?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/popper.min.js');?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/bootstrap.min.js');?>
		<?$APPLICATION->AddHeadScript('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js');?>
		<?$APPLICATION->AddHeadScript('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js');?>
		<?$APPLICATION->AddHeadScript('https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js');?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/custom.js');?>

    </head>
	<div id='panel'><?$APPLICATION->ShowPanel();?></div>
	
	<body id="page-top">
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
	
		<!--top-area start -->
		<section class="top-area">
			<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
				<div class="container">
					<a class="navbar-brand js-scroll-trigger" href="#page-top">trave</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fa fa-bars"></i>
					</button><!--/button-->
					<div class="collapse navbar-collapse nav-responsive-list" id="navbarResponsive">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link js-scroll-trigger" href="#home">home</a>
							</li><!--/.nav-item-->
							<li class="nav-item">
								<a class="nav-link js-scroll-trigger" href="#about">about</a>
							</li><!--/.nav-item-->
							<li class="nav-item">
								<a class="nav-link js-scroll-trigger" href="#contact">contact</a>
							</li><!--/.nav-item-->
							<li class="nav-item">
								<a class="nav-link js-scroll-trigger" href="#">login</a>
							</li><!--/.nav-item-->
						</ul><!--/ul-->
					</div><!--/.collapse-->
				</div><!--/.container-->
			</nav><!--/nav-->
		</section><!--/.top-area-->
		<!--top-area end -->

