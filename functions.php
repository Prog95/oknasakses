<?php
require_once('include/classes.php');
require_once('include/ajax-responses.php');

//Remove admin bar
add_filter( 'show_admin_bar', '__return_false' );

// Функция миниатюр
add_theme_support('post-thumbnails');
add_image_size('post-thumbAll', '9999', '500', true);

// Загружаемые стили и скрипты
function my_scripts_method() {
	wp_deregister_script( 'jquery' );
	wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '2.1.4', false);
	wp_enqueue_script( 'jquery' );
}


add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
function load_style_script () {
	require_once ABSPATH . 'wp-admin/includes/file.php';
	$file_list = list_files( (get_template_directory()) );
	if ($file_list) foreach( $file_list as $file ){
		$matches = array();
		$re = '/.*\/success-dvwb(.*\/(.*)\.(.*\.|)(css|js))/m';
		preg_match_all($re, $file, $matches, PREG_PATTERN_ORDER, 0);
		// print_r($matches);
		if (!isset($matches[4][0])) continue;
		if($matches[4][0] == 'css') {
			wp_enqueue_style( $matches[2][0].'.css', get_template_directory_uri() . $matches[1][0], array(), NULL);
		} else if($matches[4][0] == 'js') {
			wp_enqueue_script( $matches[2][0].'.js', get_template_directory_uri() . $matches[1][0], array(), NULL, true);
		}
	}
}


add_filter( 'lazyblock/plitka-s-cenami/frontend_allow_wrapper', '__return_false' );
add_filter( 'lazyblock/element-plitki/frontend_allow_wrapper', '__return_false' );

// Загружаем стили и скрипты
add_action('wp_enqueue_scripts', 'load_style_script');

// Включаем меню
register_nav_menu('top-nav', 'Main Navigation');
register_nav_menu('sub-nav', 'Sub Navigation');
register_nav_menu('footer-nav', 'FAQ Navigation');

register_nav_menu('popup-nav-col-1.1', 'Всплывающее окно позиция 1.1');
register_nav_menu('popup-nav-col-1.2', 'Всплывающее окно позиция 1.2');
register_nav_menu('popup-nav-col-2.1', 'Всплывающее окно позиция 2.1');
register_nav_menu('popup-nav-col-2.2', 'Всплывающее окно позиция 2.2');
register_nav_menu('popup-nav-col-3.1', 'Всплывающее окно позиция 3.1');
register_nav_menu('popup-nav-col-3.2', 'Всплывающее окно позиция 3.2');
register_nav_menu('mobile-popup-nav', 'Мобильное меню');

register_nav_menu('popup-nav-bottom', 'Всплывающее окно позиция внизу');




if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page('Settings');
	
}
 /* actions */
add_action('wp_ajax_nopriv_custom_register', 'custom_register_new_user');
// add_action('wp_ajax_custom_register', 'custom_register_new_user');
add_action('wp_ajax_nopriv_custom_login', 'custom_login');
add_action('wp_ajax_update_pd', 'update_pd');
add_action('wp_ajax_update_email_pass', 'update_email_pass');
add_action('wp_ajax_update_email_op', 'update_email_op');

//class magomra_walker_nav_menu extends Walker_Nav_Menu {
//
//	// add classes to ul sub-menus
//	function start_lvl( &$output, $depth = 0, $args = array() ) {
//		// depth dependent classes
//		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
//		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
//		$classes = array(
//			'nav nav-level-' . ($display_depth + 1) );
//		$class_names = implode( ' ', $classes );
//
//		// build html
//		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
//	}
//
//	// add main/sub classes to li's and links
//	 function start_el( &$output, $item, $depth = 0, $args = array() , $id = 0 ) {
//		global $wp_query;
//		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
//
//		// depth dependent classes
//		$depth_classes = array(
//			( $depth == 0 ? 'nav-item' : 'nav-item' ),
//			( $depth >=2 ? 'nav-item' : '' ),
//			( $depth % 2 ? 'nav-item' : 'nav-item' ),
//			'' . $depth
//		);
//		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
//
//		// passed classes
//		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
//		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
//
//		// build html
//		$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
//
//		// link attributes
//		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
//		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
//		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
//		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
//		$attributes .= ' class="nav-link"';
//
//		$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
//			$args->before,
//			$attributes,
//			$args->link_before,
//			apply_filters( 'the_title', $item->title, $item->ID ),
//			$args->link_after,
//			$args->after
//		);
//
//		// build html
//		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
//	}
//}
//
//// И там, где нужно выводим меню так:
//function magomra_nav_menu( $menu_id ) {
//	// main navigation menu
//	$args = array(
//		'theme_location'    => $menu_id,
//		'container'     => false,
//		'conatiner_class'   => 'top-navigation',
//		'menu_class'        => 'menu main-menu menu-depth-0 menu-even',
//		'echo'          => true,
//		'items_wrap'        => '%3$s',
//		'depth'         => 10,
//		'walker'        => new magomra_walker_nav_menu
//	);
//
//	// print menu
//	wp_nav_menu( $args );
//}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'is-active ';
    }
    return $classes;
}

function user_image_b64($b64image, $title) {

	if (isset($b64image)) {
	  $upload_dir       = wp_upload_dir();

	  // @new
	  $upload_path      = str_replace( '/', DIRECTORY_SEPARATOR, $upload_dir['path'] ) . DIRECTORY_SEPARATOR;

	  $img = $b64image;
	  $re = '/data:image\/*(\w*);base64/m';
	  preg_match_all($re, $img, $matches, PREG_SET_ORDER, 0);
	  $ext = $matches[0][1];
	  $img = str_replace('data:image/'.$ext.';base64,', '', $img);
	  $img = str_replace(' ', '+', $img);

	  $decoded          = base64_decode($img) ;

	  $filename         = 'user_pic.'.$ext;

	  $hashed_filename  = md5( $filename . microtime() ) . '_' . $filename;

	  // @new
	  $image_upload     = file_put_contents( $upload_path . $hashed_filename, $decoded );

	  //HANDLE UPLOADED FILE
	  if( !function_exists( 'wp_handle_sideload' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
	  }
	  // Without that I'm getting a debug error!?
	  if( !function_exists( 'wp_get_current_user' ) ) {
		require_once( ABSPATH . 'wp-includes/pluggable.php' );
	  }
	  // @new
	  $file             = array();
	  $file['error']    = '';
	  $file['tmp_name'] = $upload_path . $hashed_filename;
	  $file['name']     = $hashed_filename;
	  $file['type']     = 'image/'.$ext;
	  $file['size']     = filesize( $upload_path . $hashed_filename );

	  // upload file to server
	  // @new use $file instead of $image_upload
	  $file_return      = wp_handle_sideload( $file, array( 'test_form' => false ) );
	  $filename = $file_return['file'];
	  $attachment = array(
	   'post_mime_type' => $file_return['type'],
	   'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
	   'post_content' => '',
	   'post_status' => 'inherit',
	   'guid' => $wp_upload_dir['url'] . '/' . basename($filename)
	   );
	  $attach_id = wp_insert_attachment( $attachment, $filename );
	  require_once(ABSPATH . 'wp-admin/includes/image.php');
	  $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
	  wp_update_attachment_metadata( $attach_id, $attach_data );
	  return $attach_id;
	}
}
	

function extract_request($data){
	if (isset($data) && is_array($data)){
		$array = [];
		foreach ($data as $value) {
			$array[$value['name']] = $value['value'];
		}
		return $array;
	} else {
		return false;
	}
}
if (isset($_GET['deleteacc'])){
	require_once(ABSPATH.'wp-admin/includes/user.php');
	$user_id = get_current_user_id();
	wp_logout();
	var_dump($user_id);
	var_dump(wp_delete_user( $user_id, 1 ));
	wp_redirect( home_url() ); 
	exit;
}

add_action('wp_ajax_nopriv_ajax_order_form', 'send_email');
add_action('wp_ajax_ajax_order_form', 'send_email');

add_action('wp_ajax_nopriv_lead', 'send_email');
add_action('wp_ajax_lead', 'send_email');

add_action('wp_ajax_nopriv_form_request', 'send_email');
add_action('wp_ajax_form_request', 'send_email');

function send_email() {
	$message  = __('Форма обратной связи') . "<br><br>";
	foreach ($_POST as $key => $value) {
		$message .= $key.' : '.$value.' <br><br>';
	}
	$headers = array('Content-Type: text/html; charset=UTF-8');
	wp_mail(get_option('admin_email'), 'ФОРМА на сайте' , $message, $headers);
}


add_action('wp_ajax_nopriv_ajax_trans', 'ajax_trans');
add_action('wp_ajax_ajax_trans', 'ajax_trans');

function ajax_trans() {
	$message  = __('Форма обратной связи') . "<br><br>";
	foreach ($_POST as $key => $value) {
		$message .= $key.' : '.$value.' <br><br>';
	}
	$headers = array('Content-Type: text/html; charset=UTF-8');
	wp_mail(get_option('admin_email'), 'Трансфер' , $message, $headers);
}

add_action('wp_ajax_nopriv_reviews', 'reviews');
add_action('wp_ajax_reviews', 'reviews');

function reviews() {
	parse_str($_POST['form'], $data);
	$images = array();
	foreach ($_POST['gallery'] as $key => $value) {
		$images[] =  user_image_b64($value, 'review_img');
	}
	$post_data = array(
		'post_title'    => 'Новый отзыв',
		'post_content'  => $data['mess'],
		'post_status'   => 'pending',
		'post_type'     => 'reviews'
	);
	// Вставляем запись в базу данных
	$post_id = wp_insert_post( $post_data );
	update_field('автор', $data['name'], $post_id);
	update_field('галерея', $images, $post_id);
}

add_filter( 'render_block', function( $block_content, $block ) {
    // Target core/* and core-embed/* blocks.
    if ( preg_match( '~^core/|core-embed/~', $block['blockName'] ) && 'core/group' == $block['blockName'] ) {
		// var_dump( $block['blockName']);
       $block_content = sprintf( '<section class="payment-textWrap">
	   <div class="container">
		 <div class="paddOne">
		   <div class="row">
			 <div class="col">
			   <div class="content">%s          </div>
	   </div>
	 </div>
   </div>
 </div>
</section>', $block_content );
    }
    return $block_content;
}, PHP_INT_MAX - 1, 2 );


function register_acf_block_types() {

    // register a testimonial block.
	acf_register_block_type(array(
        'name'              => 'slider_wind',
        'title'             => __('Слайдер окна'),
        'description'       => __(''),
        'render_template'   => '/blocks/slider_wind.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
		'keywords'          => array( ),
		'mode' 				=> 'edit'
	));
	
	acf_register_block_type(array(
        'name'              => 'slider_access',
        'title'             => __('Слайдер товары'),
        'description'       => __(''),
        'render_template'   => '/blocks/slider_access.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
		'keywords'          => array( ),
		'mode' 				=> 'edit'
	));
	
	acf_register_block_type(array(
        'name'              => 'tabs',
        'title'             => __('Табер'),
        'description'       => __(''),
        'render_template'   => '/blocks/tabs_block.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
		'keywords'          => array( ),
		'mode' 				=> 'edit'
	));
	acf_register_block_type(array(
        'name'              => 'slider_cottage',
        'title'             => __('Слайдер коттедж'),
        'description'       => __(''),
        'render_template'   => '/blocks/slider_cottage.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
		'keywords'          => array( ),
		'mode' 				=> 'edit'
	));
	acf_register_block_type(array(
        'name'              => 'slider_sales',
        'title'             => __('Слайдер акция'),
        'description'       => __(''),
        'render_template'   => '/blocks/slider_sales.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
		'keywords'          => array( ),
		'mode' 				=> 'edit'
	));
	acf_register_block_type(array(
        'name'              => 'window_repair',
        'title'             => __('Ремонт Окон'),
        'description'       => __(''),
        'render_template'   => '/blocks/window_repair.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
		'keywords'          => array( ),
		'mode' 				=> 'edit'
	));
	acf_register_block_type(array(
        'name'              => 'new_reviews',
        'title'             => __('Три отзыва'),
        'description'       => __(''),
        'render_template'   => '/blocks/new_reviews.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
		'keywords'          => array( ),
		'mode' 				=> 'edit'
	));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}


add_filter( 'wpcf7_before_send_mail', 'wpcf7_before_send_mail_start_function' );
function wpcf7_before_send_mail_start_function($cf7){
	if($cf7->id != 230) return;
	$mail=$cf7->prop('mail');
	if($mail){
		// var_dump($_POST);
		// die();
		$post_data = array(
			'post_title'    => $_POST['your-title'].' '.$_POST['your-number'].' '.$_POST['your-name'],
			'post_type'		=> 'otzivi',
			'post_content'  => $_POST['your-message'],
			'post_status'   => 'pending',
			'post_author'   => 1,
		);
		// var_dump($post_data);
		// die();
		// Вставляем данные в БД
		$post_id = wp_insert_post( wp_slash($post_data) );
		if($post_id) {
			update_field('vrach', $_POST['your-doctor'], $post_id);
			update_field('telefon', $_POST['your-tel'], $post_id);
			update_field('email', $_POST['your-email'], $post_id);
		}
		// $mail['body'].="\n\rС уважением Help-WP.ru"; // допишем в конец тела писма текст
		// $cf7->set_properties(array('mail'=>$mail));
		// var_dump($_POST);
		// die();
	}
}
add_filter( 'getarchives_where','my_custom_post_type_archive_where',10,2);
function my_custom_post_type_archive_where($where,$args){  
    $post_type  = isset($args['post_type'])  ? $args['post_type']  : 'post';  
    $where = "WHERE post_type = '$post_type' AND post_status = 'publish'";
    return $where;  
}

function tinymce_config_59772( $init ) {
	// Don't remove line breaks
	$init['remove_linebreaks'] = false; 
	// Convert newline characters to BR tags
	$init['convert_newlines_to_brs'] = true; 
	// Do not remove redundant BR tags
	$init['remove_redundant_brs'] = false;
 
	// Pass $init back to WordPress
	return $init;
 }
 add_filter('tiny_mce_before_init', 'tinymce_config_59772');


 add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
 function prefix_disable_gutenberg($current_status, $post_type)
 {
	 // Use your post type key instead of 'product'
	 if ($post_type === 'otzivi') return false;
	 return $current_status;
 }
 function echo_first_image ($postID, $size = 'thumbnail')
 {                   
	 $args = array(
	 'numberposts' => 1,
	 'order'=> 'ASC',
	 'post_mime_type' => 'image',
	 'post_parent' => $postID,
	 'post_status' => null,
	 'post_type' => 'attachment'
	 );
 
	 $attachments = get_children( $args );
 
	 //print_r($attachments);

	 if ($attachments) {
		 foreach($attachments as $attachment) {
			 //$image_attributes = wp_get_attachment_image_src( $attachment->ID, $size )  ? wp_get_attachment_image_src( $attachment->ID, $size ) : wp_get_attachment_image_src( $attachment->ID, $size );

			 echo wp_get_attachment_url( $attachment->ID, $size );

		 }
	 }
 }



/*
add_action( 'wpcf7_mail_sent', 'your_wpcf7_mail_sent_function' );
function your_wpcf7_mail_sent_function( $contact_form ) {
	/*$title = $contact_form->title;
	$posted_data = $contact_form->posted_data;
	//Вместо "Контактная форма 1" необходимо указать название Вашей контактной формы
	if ('Перезвоните мне' == $title ) {
	$submission = WPCF7_Submission::get_instance();
	$posted_data = $submission->get_posted_data();
	//далее мы перехватывает введенные данные в Contact Form 7
	//перехватываем поле [your-name]
	$firstName = $posted_data['your-name'];
	//перехватываем поле [your-message]
	$message = $posted_data['your-message'];
	//в данном примере рассмотрены два поля. Как перехватывать остальные поля
	//читайте ниже.*/

/*
	$b24_id_user_from = 2130;
	$b24_id_user_to = 247; // id пользователя Б24, на кого назначим лид (247 - Корпоротенок саксес)

	$form_id = $contact_form->id;

	//Перезвоните мне
	if($form_id == 572) {
		$submission = WPCF7_Submission::get_instance();
		$posted_data = $submission->get_posted_data();

		$values = array(
			'PHONE' => $posted_data['your-tel'],
			'SHOURUM' => $posted_data['shourum'],
		);

		//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/tpn.log', print_r($values, true));

		$b24_params = array(

		    'fields' => [
		    	"TITLE" => $contact_form->title,
		        //"NAME" => htmlspecialchars($values['NAME']),
		        "PHONE" => [
		            [
		                'VALUE' => htmlspecialchars($values['PHONE']),
		                'VALUE_TYPE' => 'WORK'
		            ]
		        ],

		        "STATUS_ID" => "NEW",
		        "OPENED" => "Y", //доступен для всех
		        "ASSIGNED_BY_ID" => $b24_id_user_to,
		        "COMMENTS" => 
		        	'Шоурум - <b>'.htmlspecialchars($values['SHOURUM']).':</b>',

		        'UF_CRM_1449663155' => 'окна-саксэс.рф', //адрес сайта
		        'UF_CRM_1488520490' => 184, // метка для отчетности (Окна)
		        'UF_CRM_1567593007113' => 328, // направление ( Окна (СПК) )
		        'UF_CRM_1449498510' => 'Нижний Новгород', // город
		    ],
		    'params' => [
		        "REGISTER_SONET_EVENT" => "Y" 
		    ]	
		);

		$bitrix = new Bitrix24();
		$bitrix->send($b24_params, $b24_id_user_from);

	}

	//Письмо генеральному директору
	if($form_id == 607) {
		$submission = WPCF7_Submission::get_instance();
		$posted_data = $submission->get_posted_data();

		$values = array(
			'NAME' => $posted_data['your-name'],
			'PHONE' => $posted_data['your-tel'],
			'EMAIL' => $posted_data['your-email'],
			'CONTRACT' => $posted_data['your-doc'],
			'LETTER_TITLE' => $posted_data['your-namerew'],
			'LETTER_TEXT' => $posted_data['textarea-490'],
			'LETTER_ADD' => $posted_data['file-89'],
		);


		$b24_params = array(

		    'fields' => [
		    	"TITLE" => $contact_form->title,
		        "NAME" => htmlspecialchars($values['NAME']),
		        //"LAST_NAME" => htmlspecialchars($values['LAST_NAME']),
		        "EMAIL" => [
		            [
		                'VALUE' => htmlspecialchars($values['EMAIL']),
		                'VALUE_TYPE' => 'WORK'
		            ]
		        ],
		        "PHONE" => [
		            [
		                'VALUE' => htmlspecialchars($values['PHONE']),
		                'VALUE_TYPE' => 'WORK'
		            ]
		        ],
		        //"COMPANY_TITLE" => htmlspecialchars($arResult['R']->GV(2)),
		        //"WEB_WORK" => htmlspecialchars($arResult['R']->GV(7)),

		        "STATUS_ID" => "NEW",
		        "OPENED" => "Y", //доступен для всех
		        "ASSIGNED_BY_ID" => $b24_id_user_to,
		        "COMMENTS" => 
		        	'Договор № - <b>'.htmlspecialchars($values['CONTRACT']).':</b><br>'.
		        	'<b>'.htmlspecialchars($values['LETTER_TITLE']).':</b><br>'.htmlspecialchars($values['LETTER_TEXT']),
		        //"SOURCE_ID " => "COMPANY"

		        'UF_CRM_1449663155' => 'окна-саксэс.рф', //адрес сайта
		        'UF_CRM_1488520490' => 184, // метка для отчетности (Окна)
		        'UF_CRM_1567593007113' => 328, // направление ( Окна (СПК) )
		        'UF_CRM_1449498510' => 'Нижний Новгород', // город
		    ],
		    'params' => [
		        "REGISTER_SONET_EVENT" => "Y" 
		    ]	
		);

		//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/tpn_gen.log', print_r($b24_params, true));

		$bitrix = new Bitrix24();
		$bitrix->send($b24_params, $b24_id_user_from);


	}




}*/

function xandi_breadcrumbs() {

	/* === ОПЦИИ BREADCRUMBS === */
	$text['home']     = 'Пластиковые окна в Нижнем Новгороде'; // текст ссылки "Главная"
	$text['category'] = '%s'; // текст для страницы рубрики
	$text['search']   = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
	$text['tag']      = 'Записи с тегом "%s"'; // текст для страницы тега
	$text['author']   = 'Статьи автора %s'; // текст для страницы автора
	$text['404']      = 'Ошибка 404'; // текст для страницы 404
	$text['page']     = 'Страница %s'; // текст 'Страница N'
	$text['cpage']    = 'Страница комментариев %s'; // текст 'Страница комментариев N'

	$wrap_before    = '<div class="container"><div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
	$wrap_after     = '</div></div><!-- .breadcrumbs -->'; // закрывающий тег обертки
	$sep            = '<span class="breadcrumbs__separator"> › </span>'; // разделитель между "крошками"
	$before         = '<span class="breadcrumbs__current">'; // тег перед текущей "крошкой"
	$after          = '</span>'; // тег после текущей "крошки"

	$show_on_home   = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
	$show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
	$show_current   = 1; // 1 - показывать название текущей страницы, 0 - не показывать
	$show_last_sep  = 1; // 1 - показывать последний разделитель, когда название текущей страницы не отображается, 0 - не показывать
	/* === КОНЕЦ ОПЦИЙ === */

	global $post;
	$home_url       = home_url('/');
	$link           = '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
	$link          .= '<a class="breadcrumbs__link" href="%1$s" itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="%1$s"><span itemprop="name">%2$s</span></a>';
	$link          .= '<meta itemprop="position" content="%3$s" />';
	$link          .= '</span>';
	$parent_id      = ( $post ) ? $post->post_parent : '';
	$home_link      = sprintf( $link, $home_url, $text['home'], 1 );

	if ( is_home() || is_front_page() ) {

		if ( $show_on_home ) echo $wrap_before . $home_link . $wrap_after;

	} else {

		$position = 0;

		echo $wrap_before;

		if ( $show_home_link ) {
			$position += 1;
			echo $home_link;
		}

		if ( is_category() ) {
			$parents = get_ancestors( get_query_var('cat'), 'category' );
			foreach ( array_reverse( $parents ) as $cat ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
			}
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				$cat = get_query_var('cat');
				echo $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_current ) {
					if ( $position >= 1 ) echo $sep;
					echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
				} elseif ( $show_last_sep ) echo $sep;
			}

		} elseif ( is_search() ) {
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				if ( $show_home_link ) echo $sep;
				echo sprintf( $link, $home_url . '?s=' . get_search_query(), sprintf( $text['search'], get_search_query() ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_current ) {
					if ( $position >= 1 ) echo $sep;
					echo $before . sprintf( $text['search'], get_search_query() ) . $after;
				} elseif ( $show_last_sep ) echo $sep;
			}

		} elseif ( is_year() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . get_the_time('Y') . $after;
			elseif ( $show_home_link && $show_last_sep ) echo $sep;

		} elseif ( is_month() ) {
			if ( $show_home_link ) echo $sep;
			$position += 1;
			echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
			if ( $show_current ) echo $sep . $before . get_the_time('F') . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( is_day() ) {
			if ( $show_home_link ) echo $sep;
			$position += 1;
			echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . $sep;
			$position += 1;
			echo sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
			if ( $show_current ) echo $sep . $before . get_the_time('d') . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( is_single() && ! is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$position += 1;
				$post_type = get_post_type_object( get_post_type() );
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->labels->name, $position );
				if ( $show_current ) echo $sep . $before . get_the_title() . $after;
				elseif ( $show_last_sep ) echo $sep;
			} else {
				$cat = get_the_category(); $catID = $cat[0]->cat_ID;
				$parents = get_ancestors( $catID, 'category' );
				$parents = array_reverse( $parents );
				$parents[] = $catID;
				foreach ( $parents as $cat ) {
					$position += 1;
					if ( $position > 1 ) echo $sep;
					echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
				}
				if ( get_query_var( 'cpage' ) ) {
					$position += 1;
					echo $sep . sprintf( $link, get_permalink(), get_the_title(), $position );
					echo $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
				} else {
					if ( $show_current ) echo $sep . $before . get_the_title() . $after;
					elseif ( $show_last_sep ) echo $sep;
				}
			}

		} elseif ( is_post_type_archive() ) {
			$post_type = get_post_type_object( get_post_type() );
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . $post_type->label . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}

		} elseif ( is_attachment() ) {
			$parent = get_post( $parent_id );
			$cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
			$parents = get_ancestors( $catID, 'category' );
			$parents = array_reverse( $parents );
			$parents[] = $catID;
			foreach ( $parents as $cat ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
			}
			$position += 1;
			echo $sep . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
			if ( $show_current ) echo $sep . $before . get_the_title() . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( is_page() && ! $parent_id ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . get_the_title() . $after;
			elseif ( $show_home_link && $show_last_sep ) echo $sep;

		} elseif ( is_page() && $parent_id ) {
			$parents = get_post_ancestors( get_the_ID() );
			foreach ( array_reverse( $parents ) as $pageID ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
			}
			if ( $show_current ) echo $sep . $before . get_the_title() . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( is_tag() ) {
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				$tagID = get_query_var( 'tag_id' );
				echo $sep . sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}

		} elseif ( is_author() ) {
			$author = get_userdata( get_query_var( 'author' ) );
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				echo $sep . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . sprintf( $text['author'], $author->display_name ) . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}

		} elseif ( is_404() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . $text['404'] . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( has_post_format() && ! is_singular() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			echo get_post_format_string( get_post_format() );
		}

		echo $wrap_after;

	}
} // end of dimox_breadcrumbs()



add_action( 'wp_ajax_send_form_calc', 'theme_send_form_calc' );
add_action( 'wp_ajax_nopriv_send_form_calc', 'theme_send_form_calc' );
function theme_send_form_calc() {
	$res = array(
		'status' => 'error'
	);
	if( !empty($_POST['model']) ) {
		$headers = array(
			'content-type: text/html',
		);
		$model = json_decode( stripcslashes($_POST['model']), true );
		$building = array(
			1 => 'Квартира',
			2 => 'Частный дом',
			3 => 'Офисное здание',
		);
		$climb = array(
			1 => 'Не нужен',
			2 => 'Пассажирский лифт',
			3 => 'Грузовой лифт',
			4 => 'Лифта нет',
		);
		$mounting = array(
			1 => 'Не нужен',
			2 => 'Нужен с демонтажом',
			3 => 'Нужен без демонтажа',
		);
		$delivery = array(
			1 => 'Не нужна',
			2 => 'По Нижнему Новгороду',
			3 => 'По Нижегородской области',
		);
		$requirements = array(
			1 => 'Минимум',
			2 => 'Стандарт',
			3 => 'Максимум',
		);

		$modifications = array(
			1 => 'Откидная',
			2 => 'Поворотно-откидная',
			3 => 'Глухая',
			4 => 'Поворотная',
		);

		$accessories = array(
			1 => 'Подоконник',
			2 => 'Отливы',
			3 => 'Откосы',
			4 => 'Москитная сетка',
			5 => 'Детский замок',
		);
		
		if( !empty($model['building']) ) $model['building'] = $building[$model['building']];
		if( !empty($model['supplements']['climb']) ) $model['supplements']['climb'] = $climb[$model['supplements']['climb']];
		if( !empty($model['supplements']['mounting']) ) $model['supplements']['mounting'] = $mounting[$model['supplements']['mounting']];
		if( !empty($model['supplements']['delivery']) ) $model['supplements']['delivery'] = $delivery[$model['supplements']['delivery']];

		if( !empty($model['requirements']['noiseIsolation']) ) $model['requirements']['noiseIsolation'] = $requirements[$model['requirements']['noiseIsolation']];
		if( !empty($model['requirements']['lightTransmission']) ) $model['requirements']['lightTransmission'] = $requirements[$model['requirements']['lightTransmission']];
		if( !empty($model['requirements']['burglaryResistance']) ) $model['requirements']['burglaryResistance'] = $requirements[$model['requirements']['burglaryResistance']];
		if( !empty($model['requirements']['heatSaving']) ) $model['requirements']['heatSaving'] = $requirements[$model['requirements']['heatSaving']];
		if( !empty($model['windows']) ) {
			foreach ($model['windows'] as $key => $window) {
				if( !empty($window['modifications']) ) {
					foreach ($window['modifications'] as $m_key => $modification) {
						$model['windows'][$key]['modifications'][$m_key] = $modifications[$modification];
					}
				}
				if( !empty($window['accessories']) ) {
					foreach ($window['accessories'] as $a_key => $accessory) {
						$model['windows'][$key]['accessories'][$a_key] = $accessories[$accessory];
					}
				}
			}
		}
		$msg = '';
		ob_start(); ?>

		<?php if( !empty($model['tel']) ) { ?>
		<p><b>Номер телефона</b> - <?= $model['tel']; ?></p>
		<?php } ?>
        <?php if( !empty($model['customer_name']) ) { ?>
            <p><b>Имя</b> - <?= $model['customer_name']; ?></p>
        <?php } ?>
		<?php if( !empty($model['hash']) ) { ?>
		<p><b>Номер расчета</b> - <?= $model['hash']; ?></p>
		<?php } ?>
		<?php if( !empty($model['building']) ) { ?>
		<p><b>Тип здания</b> - <?= $model['building']; ?></p>
		<?php } ?>
		<?php if( !empty($model['requirements']) ) { ?>
		<p><b>Опции здания:</b></p>
		<ul>
			<?php if( !empty($model['requirements']['noiseIsolation']) ) { ?>
			<li>Шумоизоляция – <?= $model['requirements']['noiseIsolation']; ?></li>
			<?php } ?>
			<?php if( !empty($model['requirements']['lightTransmission']) ) { ?>
			<li>Светопропускание – <?= $model['requirements']['lightTransmission']; ?></li>
			<?php } ?>
			<?php if( !empty($model['requirements']['burglaryResistance']) ) { ?>
			<li>Взломостойкость – <?= $model['requirements']['burglaryResistance']; ?></li>
			<?php } ?>
			<?php if( !empty($model['requirements']['heatSaving']) ) { ?>
			<li>Теплосбережение - <?= $model['requirements']['heatSaving']; ?></li>
			<?php } ?>
		</ul>
		<?php } ?>
		<?php if( !empty($model['windows']) ) { ?>
		<p><b>Список окон:</b></p>
			<?php foreach ($model['windows'] as $key => $window) { ?>
			<p><b>Окно №<?= $key+1; ?></b> – <?= $window['width']; ?>x<?= $window['height']; ?>мм, <?= $window['name']; ?> <?= !empty($window['modifications']) ? "(".implode(', ', $window['modifications']).")" : ''; ?>, цвет <?= $window['color'];?><?= !empty($window['accessories']) ? ", ".implode(', ', $window['accessories']) : ''; ?></p>
			<?php } ?>
		<?php } ?>
		<?php if( !empty($model['supplements']) ) { ?>
		<p><b>Дополнительные опции:</b></p>
		<ul>
			<?php if( !empty($model['supplements']['delivery']) ) { ?>
			<li>Доставка – <?= $model['supplements']['delivery']; ?></li>
			<?php } ?>
			<?php if( !empty($model['supplements']['mounting']) ) { ?>
			<li>Монтаж – <?= $model['supplements']['mounting']; ?></li>
			<?php } ?>
			<?php if( !empty($model['supplements']['climb']) ) { ?>
			<li>Подъем – <?= $model['supplements']['climb']; ?></li>
			<?php } ?>
		</ul>
		<?php } ?>
		<?php $msg = ob_get_clean();
		$res['status'] = wp_mail(get_option('admin_email'), 'Рассчитать номер - '.$model['hash'], $msg, $headers);
        // Данные для отправки
        $b24_data = array(
            'phone' => $model['tel'],
            'name' => $model['customer_name'],
            'comment' => strip_tags($msg, '<b>, <ul>, </li>'),
            'form' => 'Калькулятор',
            'source_id' => 18,
            'site' => 'окна-саксэс.рф',
            'direct' => 328, // Направление ОКНА
            'url' => strtok($_SERVER['HTTP_REFERER'], '?'),
            'utm_source' => $_COOKIE['utm_source'],
            'utm_medium' => $_COOKIE['utm_medium'],
            'utm_campaign' => $_COOKIE['utm_campaign'],
            'utm_term' => $_COOKIE['utm_term'],
            'utm_content' => $_COOKIE['utm_content'],
            'site_key' => $_COOKIE['site_key_comagic'],
            'visitor_id' => $_COOKIE['visitor_id_comagic'],
            'hit_id' => $_COOKIE['hit_id_comagic'],
            'session_id' => $_COOKIE['session_id_comagic'],
            'consultant_server_url' => $_COOKIE['consultant_server_url_comagic'],
        );
        // Отправка данных
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://anton.pinscherweb.ru/005/vorota-success.ru/index.php',
            CURLOPT_POSTFIELDS => http_build_query($b24_data),
        ));
        curl_exec($curl);
        curl_close($curl);

	}
	wp_send_json( $res );
}

add_filter( 'excerpt_more', 'new_excerpt_more' );
function new_excerpt_more( $more ){
    global $post;
    return ' <a href="'. get_permalink($post) . '">Далее</a>';
}

add_filter( 'category_link', function($a){
    return str_replace( 'category/', '', $a );
}, 99 );


add_action('after_setup_theme', 'theme_register_nav_menu');
function theme_register_nav_menu(){
    add_theme_support( 'post-thumbnails' );
}










add_action('admin_init', 'my_extra_fields', 1);

function my_extra_fields() {
	add_meta_box( 'extra_fields', 'Полезные статьи', 'extra_fields_box_func', 'post', 'normal', 'high'  );
}

function extra_fields_box_func( $post ){
	?>
	<p>
		<label><input type="checkbox" name="useful" value="1" <?php  checked( get_post_meta($post->ID, 'useful', 1), 1 )?> /> Добавить в блок полезные статьи</label>
	</p>
	<?php
}
add_action( 'save_post', 'save_book_meta' );
function save_book_meta( $post_id) {
	if ( isset( $_REQUEST['useful'] ) ) {
		update_post_meta( $post_id, 'useful', TRUE );
	} else {
		update_post_meta( $post_id, 'useful', FALSE );
	}
}

add_filter('excerpt_length', function(){

	// Для постов с рубрикой 1
	if (is_category()) {
		return 55;
	}
	// Значение по умолчанию
	return 20;
});


add_action('pre_get_posts', 'codernote_pre_get_posts');
function codernote_pre_get_posts( $query ) {
	if ( $query->is_main_query() && !$query->is_feed() && !is_admin() ) {
		$query->set( 'paged', str_replace( '/', '', get_query_var( 'page' ) ) );
	}
}
function codernote_request($query_string ) {
	if ( isset( $query_string['page'] ) ) {
		if ( ''!=$query_string['page'] ) {
			if ( isset( $query_string['name'] ) ) {
				unset( $query_string['name'] ); }
		}
	}
	return $query_string;
}
add_filter('request', 'codernote_request');