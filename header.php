<!DOCTYPE html>
<?php global $header;
$header = get_field('шапка', 'option');
$Url_Sait = explode("/", get_permalink());
?>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta id="viewport" name="viewport" content="width=414, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
	<title>
        <?
        if (is_404()) {
            echo '404 - Страница не найдена';
        } else {
            echo wp_title();
        }
        ?>
    </title>
	<script>
		//mobile viewport hack
		(function () {

			function apply_viewport() {
				if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {

					var ww = window.screen.width;
					var mw = 480; // min width of site
					var ratio = ww / mw; //calculate ratio
					var viewport_meta_tag = document.getElementById('viewport');
					if (ww < mw) { //smaller than minimum size
						viewport_meta_tag.setAttribute('content', 'initial-scale=' + ratio + ', maximum-scale=' + ratio * 1.4 + ', minimum-scale=' + ratio + ', user-scalable=yes, width=' + mw);
					} else { //regular size
						viewport_meta_tag.setAttribute('content', 'initial-scale=1.0, maximum-scale=1, minimum-scale=1.0, user-scalable=yes, width=' + ww);
					}
				}
			}

			//ok, i need to update viewport scale if screen dimentions changed
			window.addEventListener('resize', function () {
				apply_viewport();
			});

			apply_viewport();
		}());

	</script>
	<script type="text/javascript">
		var __cs = __cs || [];
		__cs.push(["setCsAccount", "KEigScOVMLy3uwI_1s0G9TbMokQmFwqn"]);
	</script>
	<script type="text/javascript" async src="https://app.comagic.ru/static/cs.min.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=8b895ac3-ebcc-4ad7-bee0-7a2bba6b5767&lang=ru_RU&wizard=planograf" type="text/javascript"></script>
<!--	--><?// if ($Url_Sait[3] == "stati"):?>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<!--	--><?// endif;?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N8K96Z5');</script>
<!-- End Google Tag Manager -->

    <!-- calltouch -->
<script type="text/javascript">
if (/uslugi\/remont-okon/.test(document.location.href)) {
    (function(w,d,n,c){w.CalltouchDataObject=n;w[n]=function(){w[n]["callbacks"].push(arguments)};if(!w[n]["callbacks"]){w[n]["callbacks"]=[]}w[n]["loaded"]=false;if(typeof c!=="object"){c=[c]}w[n]["counters"]=c;for(var i=0;i<c.length;i+=1){p(c[i])}function p(cId){var a=d.getElementsByTagName("script")[0],s=d.createElement("script"),i=function(){a.parentNode.insertBefore(s,a)};s.type="text/javascript";s.async=true;s.src="https://mod.calltouch.ru/init.js?id="+cId;if(w.opera=="[object Opera]"){d.addEventListener("DOMContentLoaded",i,false)}else{i()}}})(window,document,"ct","1bmh05u6");
    } else if (/aksessuari\/moskitni-setki/.test(document.location.href)) {
    (function(w,d,n,c){w.CalltouchDataObject=n;w[n]=function(){w[n]["callbacks"].push(arguments)};if(!w[n]["callbacks"]){w[n]["callbacks"]=[]}w[n]["loaded"]=false;if(typeof c!=="object"){c=[c]}w[n]["counters"]=c;for(var i=0;i<c.length;i+=1){p(c[i])}function p(cId){var a=d.getElementsByTagName("script")[0],s=d.createElement("script"),i=function(){a.parentNode.insertBefore(s,a)};s.type="text/javascript";s.async=true;s.src="https://mod.calltouch.ru/init.js?id="+cId;if(w.opera=="[object Opera]"){d.addEventListener("DOMContentLoaded",i,false)}else{i()}}})(window,document,"ct","1bmh05u6");
    } else {
    (function(w,d,n,c){w.CalltouchDataObject=n;w[n]=function(){w[n]["callbacks"].push(arguments)};if(!w[n]["callbacks"]){w[n]["callbacks"]=[]}w[n]["loaded"]=false;if(typeof c!=="object"){c=[c]}w[n]["counters"]=c;for(var i=0;i<c.length;i+=1){p(c[i])}function p(cId){var a=d.getElementsByTagName("script")[0],s=d.createElement("script"),i=function(){a.parentNode.insertBefore(s,a)};s.type="text/javascript";s.async=true;s.src="https://mod.calltouch.ru/init.js?id="+cId;if(w.opera=="[object Opera]"){d.addEventListener("DOMContentLoaded",i,false)}else{i()}}})(window,document,"ct","i258xilz");
    };
</script>
<!-- calltouch -->



	<?php wp_head(); ?>
<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(28366046, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/28366046" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
</head>
<body class="home">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N8K96Z5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="page">
	<div class="wrapper">
		<div class="header-mobile__menu" id="mobile-menu" style="display: none">
			<ul>
				<li><a href="#">Test</a></li>
				<li class="current-menu-item"><a href="#">Test 2</a></li>
				<li><a href="#"><i class="fas fa-sign-in-alt"></i>Login</a></li>
				<li><a href="#"><i class="fas fa-user-plus"></i>Register</a></li>
			</ul>
			<ul class="icon-top">
				<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
				<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
				<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
			</ul>
			<div class="header-mobile__tel"><a href="tel: 866-812-6190"><i
							class="fas fa-phone-alt mr-3"></i>111-111-1111</a></div>
			<div class="header-mobile__auth-wrapper">
				<div class="container-fluid">
					<div class="row gutter-lg justify-content-center align-items-center">
						<div class="col-auto"><a class="header-mobile__link" href="#"><i class="fas fa-cog"></i></a></div>
						<div class="col-auto"><a class="header-mobile__avatar" href="#" style="background-image: none"></a></div>
						<div class="col-auto"><a class="header-mobile__link" href="#"><i class="fas fa-users"></i></a></div>
					</div>
				</div>
			</div>
		</div>

		<header class="header">
			<section class="header-top--wrap">
				<div class="container">
					<div class="header-top">
						<div class="row justify-content-between align-items-center">
							<div class="col-md-10">
								<ul class="ul-style">
									<?php
									wp_nav_menu([
										'theme_location' => 'top-nav',
										'menu' => '',
										'container' => false,
										'echo' => true,
										'fallback_cb' => 'wp_page_menu',
										'items_wrap' => '%3$s',
										'depth' => 0,
										'walker' => '',
									]);
									?>
									<li><a data-fancybox href="#popup1">Написать директору</a></li>
								</ul>
							</div>
							<div class="col-md-2 header-top--wrapper">
								<div class="header-top--menu burger-wrap">
									<div class="burger"><span></span></div>
									<p>меню</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="header-center">
				<div class="container">
					<div class="row justify-content-between align-items-center align-items-md-center">
						<div class="col-lg-auto col-md-2 col-sm-2 col-xs-2 header-center--logo">
							<a href="/">
								<img class="logo" style="max-width:230px" src="<?php the_field('logo', 'option'); ?>" alt="">
                                <img class="logo-sm" style="max-width:230px" src="<?php bloginfo('template_url'); ?>/img/logo-sm.png" alt="">
							</a>
						</div>
						<div class="col-lg-7 header-center--menu">
							<ul class="ul-style">
								<li>
									<a href="/shourum">
										<svg viewBox="0 0 100 100" class="icon shape-2928989">
											<use xlink:href="<?php bloginfo('template_url'); ?>/img/sprite/symbol/sprite.svg#2928989"></use>
										</svg>
										<span>Адреса офисов</span>
									</a>
								</li>
								<!-- <li><a href="/oplata-onlajn/"><img src="<?php bloginfo('template_url'); ?>/img/h2.png" alt=""><span>Бесплатный<br/> вызов замерщика</span></a></li> -->
								<li><a data-fancybox href="#popup_bz" data-form="Закажите звонок">
										<svg viewBox="0 0 100 100" class="icon shape-3126238">
											<use xlink:href="<?php bloginfo('template_url'); ?>/img/sprite/symbol/sprite.svg#3126238"></use>
										</svg>
										<span>Бесплатный<br/> вызов	замерщика</span>
									</a>
								</li>
								<li >
									<a data-fancybox='' href="#popup2">
										<svg viewBox="0 0 100 100" class="icon shape-3026405">
											<use xlink:href="<?php bloginfo('template_url'); ?>/img/sprite/symbol/sprite.svg#3026405"></use>
										</svg>
										<span>Бесплатная<br/> диагностика
											микроклимата</span>
									</a>
								</li>
								<li>
									<a href="/calculator/">
										<svg viewBox="0 0 100 100" class="icon shape-2502152">
											<use xlink:href="<?php bloginfo('template_url'); ?>/img/sprite/symbol/sprite.svg#2502152"></use>
										</svg>
										<span>Калькулятор</span>
									</a>
								</li>
							</ul>
						</div>
                        <div class="header-center--menu-sm col-sm-7 col-md-7 col-xs-7 text-center call_phone_1">
                            <a class="a-style" href="tel:<?php the_field('telefon', 'option'); ?>"><?php the_field('telefon', 'option'); ?></a>
                        </div>
						<div class="col-lg-auto col-sm-3 col-md-3 col-xs-3 header-center--call">
							<div class="call"><div class="call_phone_1"><a class="a-style" href="tel:<?php the_field('telefon', 'option'); ?>"><?php the_field('telefon', 'option'); ?></a></div>
								<p>или <a data-fancybox href="#popup2" data-form="Закажите звонок">закажите звонок</a></p>
								<div class="social-block">
									<a target="_blank" href="https://vk.com/sakses.okna"><i class="fab fa-vk"></i></a>
									<a target="_blank" href="https://www.instagram.com/sakses.okna/"><i class="fab fa-instagram"></i></a>
									<a target="_blank" href="https://www.facebook.com/sakses.okna/"><i class="fab fa-facebook-square"></i></div></a>
							</div>

                            <div class="header-center--menu-sm">
                                <ul class="ul-style">

	                                <li class="zam_display">

		                                <a href="tel:<?php the_field('telefon', 'option'); ?>">
			                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			                                     width="60px" height="70px" viewBox="-74 0 100 100" style="enable-background:new -74 0 100 100;" xml:space="preserve">
<path d="M21.2,71.7L9.1,59.5c-2-2-4.7-3.2-7.2-3.2c-2.7,0-5.1,1.1-7.2,3.2l-7,7c-0.3-0.2-0.7-0.4-1-0.5c0,0-0.1,0-0.1-0.1l-0.1-0.1
	c-0.9-0.6-1.9-1.2-3.1-1.7c-6.1-3.8-11.8-9.1-17.6-16.2c-2.7-3.4-4.6-6.4-6.1-9.7l0,0c1.6-1.3,2.8-2.6,3.7-3.6l3.1-3.1
	c2.4-2.2,3.6-4.7,3.6-7.3c0-2.7-1.2-5.2-3.5-7.6l-9.5-9.5c-0.9-0.9-1.8-1.8-2.8-2.7c-2-1.9-4.5-3-7.1-3c-2.9,0-5.3,1-7.5,3.2
	l-7.3,7.3c-2.9,2.7-4.6,6.1-5,10.3l0,0.1c-0.2,5.2,0.6,10,2.8,16c3.5,9.4,8.8,18.2,16.7,27.9C-42.8,77.8-31.2,86.8-18.3,93l0.3,0.1
	c3.8,1.7,11,4.9,19,5.4l1.1,0c5.3,0,9.3-1.7,12.6-5.3c1.2-1.4,2.5-2.7,3.6-3.9c0.9-0.7,1.5-1.4,2.1-2.1l0.8-0.8l0.2-0.2
	C25.6,81.6,25.6,76,21.2,71.7z M17.7,82.8l-1,1L16.6,84c-0.5,0.6-0.9,1.1-1.4,1.5l-0.3,0.3c-1.2,1.2-2.6,2.6-4,4.2
	c-2.3,2.5-4.9,3.6-8.8,3.6H1.3c-7-0.5-13.4-3.3-17.2-5l-0.2-0.1C-28.4,82.6-39.5,74-49.2,63c-7.6-9.2-12.6-17.6-15.9-26.4
	c-2-5.5-2.7-9.5-2.5-14c0.3-2.9,1.4-5.2,3.4-7l7.4-7.4c1.2-1.2,2.4-1.7,3.9-1.7c1.3,0,2.5,0.6,3.6,1.6l0.1,0.1
	c0.9,0.8,1.8,1.7,2.7,2.6l9.5,9.5c1.8,1.8,2.1,3.2,2.1,4c0,0.8-0.2,2-2.1,3.7l-3.2,3.2c-1.1,1.2-2.4,2.5-4.1,3.9l-0.2,0.2l-0.2,0.3
	c-0.9,1.2-1,2.3-0.5,3.9l0.1,0.4l0.1,0.4c1.7,3.7,3.8,7.1,6.8,10.9c6.2,7.6,12.4,13.3,19,17.4l0.3,0.2c0.8,0.4,1.6,0.8,2.3,1.2
	c0.3,0.3,0.7,0.5,1,0.6c0.4,0.2,0.7,0.3,0.9,0.5l0.7,0.5h0.2l0.3,0.1c0.6,0.2,1,0.2,1.3,0.2c1,0,1.9-0.4,2.8-1.3l7.5-7.5
	c1.2-1.2,2.3-1.7,3.7-1.7c1.5,0,2.9,0.9,3.7,1.7l12.2,12.2C20.1,77.7,20.2,80.2,17.7,82.8z" fill="#023e7c"/>
</svg>
		                                </a>

	                                </li>
	                                <li><div class="zam_display">
			                                <a data-fancybox href="#popup_bz" data-form="Закажите звонок">
			                                   <svg viewBox="0 0 100 100" class="icon shape-3126238" width="60px" height="70px">
				                                <use xlink:href="<?php bloginfo('template_url'); ?>/img/sprite/symbol/sprite.svg#3126238"></use>
			                                </svg>
		                                    </a>
		                                </div></li>
                                    <li style="position: relative; bottom: 5px">
                                        <a href="/calculator/">
                                            <svg viewBox="0 0 100 100" class="icon shape-2502152">
                                                <use xlink:href="<?php bloginfo('template_url'); ?>/img/sprite/symbol/sprite.svg#2502152"></use>
                                            </svg>
                                            <span>Калькулятор</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

							<div class="header-top--menu burger-wrap">
								<div class="burger"><span></span></div>
								<p>меню</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="header-bottom--wrap">
				<div class="container">
					<div class="header-bottom">
						<ul class="ul-style">
							<div class="col-lg-auto col-sm-4 col-xs-6 header-center--logo">
								<a href="/"><img style="max-width:50px" src="<?php bloginfo('template_url'); ?>/img/logo-sm.png" alt=""></a>
							</div>
							<?php
							wp_nav_menu([
								'theme_location' => 'sub-nav',
								'menu' => '',
								'container' => true,
								'echo' => true,
								'fallback_cb' => 'wp_page_menu',
								'items_wrap' => '%3$s',
								'depth' => 0,
								'walker' => '',
							]);
							?>
							<div class="header-top--menu burger-wrap">
								<div class="burger"><span></span></div>
								<p>меню</p>
							</div>
						</ul>
					</div>
				</div>
			</section>

<!--			<section class="header-calc">-->
<!--				<div class="container">-->
<!--					<div class="row align-items-center justify-content-center">-->
<!--						<div class="col header-calc--link"><a href=""><img src="--><?php //bloginfo('template_url'); ?><!--/img/h4.png" alt=""><span>Калькулятор</span></a>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--			</section>-->
		</header>
		<section class="nav">
			<div class="container nav-top">
                <div class="row">
                    <div class="col-lg-12 col-md-8 col-sm-7">
				<div class="row nav-text-des">
					<div class="col-lg-3">
						<div class="nav-block">
							<div class="menu-main-title"><?php echo get_term(get_nav_menu_locations()['popup-nav-col-1.1'], 'nav_menu')->name; ?></div>
							<ul>
								<?php
								wp_nav_menu([
									'theme_location' => 'popup-nav-col-1.1',
									'menu' => '',
									'container' => false,
									'echo' => true,
									'fallback_cb' => 'wp_page_menu',
									'items_wrap' => '%3$s',
									'depth' => 0,
									'walker' => '',
								]);
								?>
							</ul>
						</div>
<!--						<div class="nav-block">-->
<!--							<div class="menu-main-title">--><?php //echo get_term(get_nav_menu_locations()['popup-nav-col-1.2'], 'nav_menu')->name; ?><!--</div>-->
<!--							<ul>-->
<!--								--><?php
//								wp_nav_menu([
//									'theme_location' => 'popup-nav-col-1.2',
//									'menu' => '',
//									'container' => false,
//									'echo' => true,
//									'fallback_cb' => 'wp_page_menu',
//									'items_wrap' => '%3$s',
//									'depth' => 0,
//									'walker' => '',
//								]);
//								?>
<!--							</ul>-->
<!--						</div>-->
					</div>
					<div class="col-lg-3">
						<div class="nav-block">
							<div class="menu-main-title"><?php echo get_term(get_nav_menu_locations()['popup-nav-col-2.1'], 'nav_menu')->name; ?></div>
							<ul>
								<?php
								wp_nav_menu([
									'theme_location' => 'popup-nav-col-2.1',
									'menu' => '',
									'container' => false,
									'echo' => true,
									'fallback_cb' => 'wp_page_menu',
									'items_wrap' => '%3$s',
									'depth' => 0,
									'walker' => '',
								]);
								?>
							</ul>
						</div>
                    </div>
                        <div class="col-lg-3">
						<div class="nav-block">
							<div class="menu-main-title"><?php echo get_term(get_nav_menu_locations()['popup-nav-col-2.2'], 'nav_menu')->name; ?></div>
							<ul>
								<?php
								wp_nav_menu([
									'theme_location' => 'popup-nav-col-2.2',
									'menu' => '',
									'container' => false,
									'echo' => true,
									'fallback_cb' => 'wp_page_menu',
									'items_wrap' => '%3$s',
									'depth' => 0,
									'walker' => '',
								]);
								?>
							</ul>
						</div>
                        </div>
<!--						<a class="nav-banner" href="">-->
<!--							<div>Исследование микроклимата <p>в подарок</p>-->
<!--							</div>-->
<!--						</a>-->

					<div class="col-lg-3">
						<div class="nav-block">
							<div class="menu-main-title"><?php echo get_term(get_nav_menu_locations()['popup-nav-col-3.1'], 'nav_menu')->name; ?></div>
							<ul>
								<?php
								wp_nav_menu([
									'theme_location' => 'popup-nav-col-3.1',
									'menu' => '',
									'container' => false,
									'echo' => true,
									'fallback_cb' => 'wp_page_menu',
									'items_wrap' => '%3$s',
									'depth' => 0,
									'walker' => '',
								]);
								?>
							</ul>
						</div>
<!--						<div class="nav-block">-->
<!--							<div class="menu-main-title">--><?php //echo get_term(get_nav_menu_locations()['popup-nav-col-3.2'], 'nav_menu')->name; ?><!--</div>-->
<!--							<ul>-->
<!--								--><?php
//								wp_nav_menu([
//									'theme_location' => 'popup-nav-col-3.2',
//									'menu' => '',
//									'container' => false,
//									'echo' => true,
//									'fallback_cb' => 'wp_page_menu',
//									'items_wrap' => '%3$s',
//									'depth' => 0,
//									'walker' => '',
//								]);
//								?>
<!--							</ul>-->
<!--						</div>-->
					</div>
				</div>
                    </div>
                    <div class="col-lg-12 col-md-4 col-sm-5">
                <div class="header-center--menu header-center--menu-dop">
                    <ul class="ul-style ul-style_mb">
                        <li>
                            <a href="/shourum">
                                <svg viewBox="0 0 100 100" class="icon shape-2928989">
                                    <use xlink:href="<?php bloginfo('template_url'); ?>/img/sprite/symbol/sprite.svg#2928989"></use>
                                </svg>
                                <span>Адреса офисов</span>
                            </a>
                        </li>
                        <!-- <li><a href="/oplata-onlajn/"><img src="<?php bloginfo('template_url'); ?>/img/h2.png" alt=""><span>Бесплатный<br/> вызов замерщика</span></a></li> -->
                        <li><a data-fancybox href="#popup_bz" data-form="Закажите звонок">
                                <svg viewBox="0 0 100 100" class="icon shape-3126238">
                                    <use xlink:href="<?php bloginfo('template_url'); ?>/img/sprite/symbol/sprite.svg#3126238"></use>
                                </svg>
                                <span>Бесплатный<br/> вызов	замерщика</span>
                            </a>
                        </li>
                        <li>
                            <a data-fancybox href="#popup2" data-form="Бесплатная диагностика микроклимата">
                                <svg viewBox="0 0 100 100" class="icon shape-3026405">
                                    <use xlink:href="<?php bloginfo('template_url'); ?>/img/sprite/symbol/sprite.svg#3026405"></use>
                                </svg>
                                <span>Бесплатная<br/> диагностика
											микроклимата</span>
                            </a>
                        </li>
                        <li>
                            <a href="/calculator/">
                                <svg viewBox="0 0 100 100" class="icon shape-2502152">
                                    <use xlink:href="<?php bloginfo('template_url'); ?>/img/sprite/symbol/sprite.svg#2502152"></use>
                                </svg>
                                <span>Калькулятор</span>
                            </a>
                        </li>
                    </ul>
                </div>
                    </div>
                </div>
			</div>
<!--			<div class="container nav-bottom">-->
<!--				<div class="row">-->
<!--					<div class="col-lg-12 nav-bottom--icons">-->
<!--						<ul class="ul-style">-->
<!--							<li><a href="/shourum"><img src="--><?php //bloginfo('template_url'); ?><!--/img/h1.png" alt=""><span>Адреса офисов</span></a></li>-->
<!--							<li><a href="/oplata-onlajn/"><img src="--><?php //bloginfo('template_url'); ?><!--/img/h2.png" alt=""><span>Оплата онлайн</span></a></li>-->
<!--							<li><a href=""><img src="--><?php //bloginfo('template_url'); ?><!--/img/h3.png" alt=""><span>Личный кабинет</span></a></li>-->
<!--							<li><a href=""><img src="--><?php //bloginfo('template_url'); ?><!--/img/h4.png" alt=""><span>Калькулятор</span></a></li>-->
<!--						</ul>-->
<!--					</div>-->
<!--					<div class="col-lg-12">-->
<!--						<ul class="ul-style nav-bottom--text">-->
<!--							--><?php
//							wp_nav_menu([
//								'theme_location' => 'popup-nav-bottom',
//								'menu' => '',
//								'container' => false,
//								'echo' => true,
//								'fallback_cb' => 'wp_page_menu',
//								'items_wrap' => '%3$s',
//								'depth' => 0,
//								'walker' => '',
//							]);
//							?>
<!--						</ul>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
			<div class="mobile_menu">
				<ul>
					<?php
					wp_nav_menu([
						'theme_location' => 'mobile-popup-nav',
						'menu' => '',
						'container' => false,
						'echo' => true,
						'fallback_cb' => 'wp_page_menu',
						'items_wrap' => '%3$s',
						'depth' => 0,
						'walker' => '',
					]);
					?>
				</ul>
			</div>
			<div class="social_media_block">
                 <a href="https://vk.com/sakses.okna">
	                 <img height="70px" src="<?php bloginfo('template_url'); ?>/img/svg/icon-vk-social.svg" alt="">
                 </a>
				<a href="https://www.instagram.com/sakses.okna/">
					<img height="60px" src="<?php bloginfo('template_url'); ?>/img/svg/icon-instagram.svg" alt="">
				</a>
				<a href="https://www.facebook.com/sakses.okna/">
					<img height="60px" src="<?php bloginfo('template_url'); ?>/img/svg/icon-facebook.svg" alt="">
				</a>
				<a href="https://www.youtube.com/channel/UCpEGaqDk732N8YjC1zZB5UA">
					<img height="70px" src="<?php bloginfo('template_url'); ?>/img/svg/icon-youtube.svg" alt="">
				</a>
			</div>
		</section>
		<div class="all-wrapper">