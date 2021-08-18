<!-- footer -->
</div>
</div>
<?php

?>
<footer class="footer">
	<section class="footer-top--wrap">
		<div class="container">
			<div class="row align-items-start">
				<div class="col-lg-2"><a href="/"><img src="<?php the_field('logo_futer', 'option'); ?>" alt=""></a></div>
				<div class="col-lg-7 row">
					<div style="width: 172px" >
						<ul class="ul-style margin-top-text">
							<li style="font-weight: bold;">Продукция</li>
							<li><a href="/">Пластиковые окна</a></li>
                            <li><a href="/aksessuari/">Аксессуары</a></li>
							<li><a href="/kalkulyator/">Калькулятор стоимости</a></li>
						</ul>
					</div>
					<div style="width: 240px">
						<ul class="ul-style margin-top-text">
							<li style="font-weight: bold;"><a href="/uslugi/">Услуги</a></li>
							<li><a href="/lodzhii-i-balkony/">Остекление балконов и лоджий</a></li>
							<li><a href="/osteklenie-kottedzhej/">Остекление коттеджей</a></li>
							<li><a data-fancybox href="#popup_bz" data-form="Закажите звонок">Бесплатный замер</a></li>
							<li><a href="/uslugi/montazh-i-otdelka/">Установка окон</a></li>
						</ul>
					</div>
					<div style="width: 240px">
						<ul class="ul-style margin-top-text">
							<li style="font-weight: bold;"><a href="/about/">О компании</a></li>
							<li><a href="/nashe-proizvodstvo/">Производство пластиковых окон</a></li>
							<li>Галлерея объектов</li>
							<li><a href="/otzivi/">Отзывы</a></li>
							<li><a target="blank" href="https://xn----7sbb1bdof2aca5k.xn--p1ai/wp-content/uploads/2021/02/tehnicheskie-usloviya_2014.pdf">Сертификаты и ТУ</a></li>
							<li><a href="/sales/">Скидки и акции</a></li>
							<li><a href="/stati/">Статьи</a></li>
							<li><a href="/shourum/">Контакты</a></li>
						</ul>
					</div>
					<!-- <ul class="ul-style"> -->
						<?php
						// wp_nav_menu([
						// 	'theme_location' => 'footer-nav',
						// 	'menu' => '',
						// 	'container' => false,
						// 	'echo' => true,
						// 	'fallback_cb' => 'wp_page_menu',
						// 	'items_wrap' => '%3$s',
						// 	'depth' => 0,
						// 	'walker' => '',
						// ]);

						?>

						<!-- <li><a href="/politika-konfidenczialnosti/">Политика конфиденциальности</a></li>
					</ul> -->
				</div>
				<div class="col-lg-3 footer-top--cont">
					<ul class="ul-style">
						<li class="call_phone_2"><a href="tel:<?php the_field('telefon', 'option'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/f1.png" alt=""><span><?php the_field('telefon', 'option'); ?></span></a>
						</li>
						<li><a href=""><img src="<?php bloginfo('template_url'); ?>/img/f2.png" alt=""><span><?php the_field('adres', 'option'); ?></span></a></li>
					</ul>
					<a class="a-style" href="/shourum/">Смотреть все адреса ></a>
				</div>
			</div>
		</div>
	</section>
	<section class="footer-bottom--wrap">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-auto"><a class="a-style" href="/">© 2021 САКСЭС</a></div>
				<div class="col-auto"><a class="a-style" href="/">Изготовление пластиковых окон в Нижнем Новгороде</a></div>
					<div class="col-12 display_footer-mobile"><a href="/uslugi/remont-okon/">Ремонт пластиковых окон</a></div>
					<div class="col-12 display_footer-mobile"><a href="/uslugi/ustanovka-i-montazh-plastikovyh-okon/">Установка пластиковых окон</a></div>
					<div class="col-12 display_footer-mobile"><a href="/uslugi/rassrochka/">Окна в рассрочку</a></div>
					<div class="col-12 display_footer-mobile"><a href="/osteklenie-kottedzhej/">Остекление коттеджей</a></div>
					<div class="col-12 display_footer-mobile"><a href="/lodzhii-i-balkony/">Остекление лоджий и балконов</a></div>
					<div class="col-12 display_footer-mobile"><a href="/calculator/">Калькулятор</a></div>
				<div class="col-auto hidden_footer-mobile"><a class="a-style" href="/politika-konfidenczialnosti/">Политика конфиденциальности</a></div>
				<div class="col-auto"><a class="a-style" href="/sitemap/">Карта сайта</a></div>
			</div>
		</div>
	</section>

</footer>

<!--<div class="popup" id="popup1" style="display:none">-->
<!--	<div class="h3-style">Письмо генеральному директору</div>-->
<!---->
<!--	--><?php //echo do_shortcode('[contact-form-7 id="607" html_class="col-paddingOne" title="Письмо генеральному директору"]'); ?>
<!--</div>-->
<div class="popup" id="popup2" style="display:none">
	<div class="h3-style">Оставить заявку</div>
	<p style="text-align: center;">Мы свяжемся с вами в ближайшее время</p>
	<div class="phone-form">
		<?php echo do_shortcode('[contact-form-7 id="572" title="Перезвоните мне"]'); ?>

	</div>
	<div class="row">
		<div class="col">
			<p class="text-small">Оставляя свои контактные данные, вы подтверждаете свое совершеннолетие, соглашаетесь на
				<a href="/privacy/">обработку персональных данных в соответствии с Правовой информацией</a></p>
		</div>
	</div>
</div>

<div class="popup" id="popup_bz" style="display:none">
	<div class="h3-style">Оставьте заявку на бесплатный замер</div>
	<p style="text-align: center;">Мы свяжемся с вами в ближайшее время</p>
	<div class="phone-form">
		<?php echo do_shortcode('[contact-form-7 id="2549" title="Вызвать замерщика"]'); ?>

	</div>
	<div class="row">
		<div class="col">
			<p class="text-small">Оставляя свои контактные данные, вы подтверждаете свое совершеннолетие, соглашаетесь на
				<a href="/privacy/">обработку персональных данных в соответствии с Правовой информацией</a></p>
		</div>
	</div>
</div>

<div class="popup" id="popup_uz_price" style="display:none">
	<div class="h3-style">Оставить заявку</div>
	<p style="text-align: center;">Мы свяжемся с вами в ближайшее время</p>
	<div class="phone-form">
		<?php echo do_shortcode('[contact-form-7 id="2558" title="Узнать стоимость"]'); ?>

	</div>
	<div class="row">
		<div class="col">
			<p class="text-small">Оставляя свои контактные данные, вы подтверждаете свое совершеннолетие, соглашаетесь на
				<a href="/privacy/">обработку персональных данных в соответствии с Правовой информацией</a></p>
		</div>
	</div>
</div>

</div>
<script>
	$(function () {
		console.log('Готовим данные для CoMagic');
		// Данные для CoMagic
		var credentials = Comagic.getCredentials();
		for (var field in credentials) {
			if (credentials.hasOwnProperty(field)) {
				document.cookie = field + '_comagic=' + credentials[field];
			}
		}
	});
</script>
<?php wp_footer() ?>
<!--<script>-->
<!--	(function(w,d,u){-->
<!--		var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);-->
<!--		var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);-->
<!--	})(window,document,'https://cdn-ru.bitrix24.ru/b1007157/crm/site_button/loader_6_4vp61m.js');-->
<!--</script>-->
<script type="text/javascript">
	document.addEventListener('wpcf7mailsent', function (event) {
		if ('572' == event.detail.contactFormId) {
			dataLayer.push({
				'event': 'GAEvent',
				'eventCategory': 'form',
				'eventAction': 'success',
				'eventLabel': 'application'
			});

		}

		if ('230' == event.detail.contactFormId) {
			dataLayer.push({
				'event': 'GAEvent',
				'eventCategory': 'form',
				'eventAction': 'success',
				'eventLabel': 'feedback'
			});
		}

		if ('607' == event.detail.contactFormId) {
			dataLayer.push({
				'event': 'GAEvent',
				'eventCategory': 'form',
				'eventAction': 'success',
				'eventLabel': 'letter'
			});
		}
		if ('2549' == event.detail.contactFormId) {
			dataLayer.push({  'event' : 'GAEvent',  'eventCategory' : 'form',  'eventAction' : 'success',  'eventLabel' : 'window_measurement'});
		}
		if ('2703' == event.detail.contactFormId) {
			dataLayer.push({  'event' : 'GAEvent',  'eventCategory' : 'form',  'eventAction' : 'success',  'eventLabel' : 'window_measurement'});
		}
		if ('2554' == event.detail.contactFormId) {
			dataLayer.push({  'event' : 'GAEvent',  'eventCategory' : 'form',  'eventAction' : 'success',  'eventLabel' : 'ask_question_glass'  });
		}
		if ('2553' == event.detail.contactFormId) {
			dataLayer.push({  'event' : 'GAEvent',  'eventCategory' : 'form',  'eventAction' : 'success',  'eventLabel' : 'ask_question_lamination'  });
		}
		if ('2558' == event.detail.contactFormId) {
			dataLayer.push({  'event' : 'GAEvent',  'eventCategory' : 'form',  'eventAction' : 'success',  'eventLabel' : 'calculate_cost'  });
		}
	}, false);
</script>

<!-- calltouch code -->
<script>
document.addEventListener('wpcf7mailsent', function(e){
    var m = jQuery(e.target);
    var fio = m.find('input[name*="name"],input[placeholder*="Имя"],input[placeholder*="имя"],input[placeholder*="зовут"]').val(); 
    var phone = m.find('input[name*="phone"],input[name*="your-tel"],input[type="tel"],input[placeholder*="Телефон"],input[placeholder*="телефон"]').val(); 
    var mail = m.find('input[name*="email"],input[type="your-email"],input[placeholder*="mail"]').val();
    var ct_site_id = '41920';
    var sub = 'Заявка c окна-саксэс.рф';
    var ct_sessionId = window.call_value_i258xilz;
    if (/uslugi\/remont-okon/.test(document.location.href))  { 
        ct_site_id = '41919';
        sub = 'Заявка c окна-саксэс.рф/uslugi/remont-okon';
        ct_sessionId = window.call_value_1bmh05u6;
    };
    
    var ct_data = {             
        fio: fio,
        phoneNumber: phone,
        email: mail,
        subject: sub,
        requestUrl: location.href,
        sessionId: ct_sessionId 
    };
    console.log(ct_data);
    if (!!phone || !!mail){
        jQuery.ajax({  
          url: 'https://api.calltouch.ru/calls-service/RestAPI/requests/'+ct_site_id+'/register/',
          dataType: 'json', type: 'POST', data: ct_data, async: false
        }); 
    }
});
</script>
<script>
jQuery(document).on("click", '.calculation button', function() { 
	var m = jQuery(this).closest('.calculation'); 
	var fio = m.find('input#customer_name').val(); 
	var phone = m.find('input#telefon').val(); 
	var mail = m.find('input#email').val(); 
	var ct_site_id = '41920';
	var sub = 'Калькулятор c окна-саксэс.рф';
	var ct_data = {             
		fio: fio,
		phoneNumber: phone,
		email: mail,
		subject: sub,
		requestUrl: location.href,
		sessionId: window.call_value_i258xilz
	};
	var ct_valid = !!phone;
	console.log(ct_data,ct_valid);
	if (ct_valid && !window.ct_snd_flag){
		window.ct_snd_flag = 1; setTimeout(function(){ window.ct_snd_flag = 0; }, 20000);
		jQuery.ajax({  
		  url: 'https://api.calltouch.ru/calls-service/RestAPI/requests/'+ct_site_id+'/register/', 
		  dataType: 'json', type: 'POST', data: ct_data, async: false
		}); 
	}
});
</script>
<script>
jQuery(document).on('wpcf7mailsent', function(e) {
    var m = jQuery(e.target);
    var fio = m.find('input[name*="name"],input[placeholder*="Имя"]').val();
    var phone = m.find('input[name*="tel"],input[type*="tel"]').val();
    var mail = m.find('input[name*="email"],input[type*="email"]').val();
    var ct_site_id = '41919';
    var sub = 'Закажите звонок';
    var ct_data = {            
        fio: fio,
        phoneNumber: phone,
        email: mail,
        subject: sub,
        requestUrl: location.href,
        sessionId: window.call_value
    };
    console.log(ct_data);
    if (!!phone){
        jQuery.ajax({ 
          url: 'https://api.calltouch.ru/calls-service/RestAPI/requests/'+ct_site_id+'/register/',
          dataType: 'json', type: 'POST', data: ct_data, async: false
        });
    }
});
</script>

<!-- calltouch code -->
</body>

</html>