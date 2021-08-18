<?php get_header(); ?>
<?php if ( function_exists( 'xandi_breadcrumbs' ) ) xandi_breadcrumbs(); ?>
<?php 
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post(); 
    ?>
<section class="location">
  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="text-style--two">Шоурум 
          <p class="text-blue"><?php the_title(); ?></p>
        </h1>
      </div>
    </div>
  </div>
</section>
<section class="center location-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <?php if($list = get_field('raspisanie')) {
         ?>
        <div class="center-cont">
          <div class="center-img"><img src="<?php bloginfo('template_url'); ?>/img/c1.png" alt=""></div>
          <div class="center-text">
            <ul class="ul">
              <?php foreach ($list as $key => $value) { ?>
              <li>
                <p><?php echo $value['tekst'] ?></p>
              </li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <?php } ?>
        <?php if($list = get_field('telefon')) {
         ?>
        <div class="center-cont">
          <div class="center-img"><img src="<?php bloginfo('template_url'); ?>/img/c2.png" alt=""></div>
          <div class="center-text">
            <ul class="ul">
              <?php foreach ($list as $key => $value) { ?>
              <li>
                <p><b><a href="tel:<?php echo $value['telefon'] ?>"><?php echo $value['telefon'] ?></a></b></p>
              </li>
              <?php if($value['besplatnyj_zvonok']) echo '<li>
                <p>по России звонок бесплатный</p>
              </li>'; ?>
              <?php } ?>
            </ul>
          </div>
        </div>
        <?php } ?>
        <?php /*<div class="center-cont">
          <div class="center-img"><img src="<?php bloginfo('template_url'); ?>/img/c3.png" alt=""></div>
          <div class="center-text">
            <ul class="ul">
              <li>
                <p><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
              </li>
            </ul>
          </div>
        </div>
        */ ?>
        <div class="center-cont">
          <div class="center-img"><img src="<?php bloginfo('template_url'); ?>/img/c4.png" alt=""></div>
          <div class="center-text">
            <ul class="ul">
              <li>
                <p><?php the_field('adres'); ?></p>
              </li>
            </ul>
          </div>
        </div>
        <div class="center-desc">
          <p><?php the_field('poyasnenie'); ?></p>
        </div>
        <div class="">
        <div class="h3-style pers-man">Ваш персональный менеджер</div>
        <div class="info-card">
          <div class="info-avatar" style="background-image: url(<?php the_field('foto'); ?>)"></div>
          <div class="info-desc">
            <div class="fio"><?php the_field('fio'); ?></div>
            <p><?php the_field('status'); ?></p><a class="btn btn-orange" data-fancybox="" href="#popup2">бесплатная консультация</a>
          </div>
        </div>
        <?php /* <p class="info-p text-small">или задайте вопросы по <a href="">электронной почте</a></p> */ ?>
        <div class="content">
          <?php the_content(); ?>
        </div>
      </div>
      </div>
      <div class="col-lg-6">
        <div class="row ui cataloge-menu top attached tabular menu">
          <div class="col-lg-4 col-md-4 col-sm-4 item active" data-tab="1">
            <div class="item-text">
              <p>Как проехать</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 item" data-tab="2">
            <div class="item-text">
              <p>Вид с улицы</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 item" data-tab="3">
            <div class="item-text">
              <p>Наш офис</p>
            </div>
          </div>
        </div>
        <div class="ui bottom attached tab segment active" data-tab="1">
          <div class="center-bg">
            <div id="map2" 
              data-lat="<?php the_field('lat'); ?>" 
              data-lng="<?php the_field('lng'); ?>"
              data-title="<?php the_title(); ?>" 
              data-text="<?php the_field('adres'); ?>" ></div>
          </div>
        </div>
        <div class="ui bottom attached tab segment" data-tab="2">
          <div class="center-bg" style="background-image: url(<?php the_field('vid_s_uliczy'); ?>)"></div>
        </div>
        <div class="ui bottom attached tab segment" data-tab="3">
          <div class="center-bg" style="background-image: url(<?php the_field('foto_ofisa'); ?>)"></div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="info">
  <div class="container">
    <div class="row">
      
      <?php if($list = get_field('obrazczy')) {
         ?>
      <div class="col-lg-6">
        <h3 class="h3-style">В шоуруме <?php the_title(); ?><br>представлены следующие образцы:</h3>
        <ul class="ul ul-black">
          <?php foreach ($list as $key => $value) { ?>
          <li>
            <h4><?php echo $value['nazvanie'] ?></h4>
            <p><?php echo $value['opisanie'] ?></p>
          </li>
          <?php } ?>
        </ul>
      <?php } ?>
    </div>
  </div>
</section>
<?php
      } // end while
    } // end if
    ?>
<?php get_footer(); ?>