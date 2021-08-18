<section class="accessSlider">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="h3-style"><?php the_field('zagolovok'); ?></div>
      </div>
    </div>
  </div>
  <div class="paddFor">
    <div class="swiper-container">
      <div class="swiper-wrapper">
      <?php foreach (get_field('tovary') as $key => $value) { ?>
        <div class="swiper-slide">
          <div class="access-item">
            <div class="access-item--top"><a class="access-img" href="" style="background-image: url(<?php echo get_the_post_thumbnail_url($value->ID) ?>)"></a>
              <div class="h-style"><?php echo $value->post_title; ?></div>
              <p><?php echo $value->post_excerpt; ?></p>
            </div>
            <div class="access-item--link"><a class="btn btn-blue" href="#popup2<?php //echo get_the_permalink($value->ID);  ?>">подробнее</a></div>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>
<!-- 
<section class="calcPrice">
  <div class="container">
    <div class="row">
      <div class="col">
        <h2>Рассчитайте точную стоимость окон за 3 минуты</h2>
        <p>Выберите — куда вам нужны окна</p>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-4"><a class="calcPrice-wrapper" href="">
          <div class="line"></div>
          <div class="calcPrice-item">
            <div class="calcPrice-img" style="background-image: url(http://success.dvwb.ru/wp-content/themes/success-dvwb/img/c1.jpg)"></div>
            <div class="calcPrice-desc">
              <p><b>Квартира</b></p>
            </div>
          </div></a></div>
      <div class="col-lg-4"><a class="calcPrice-wrapper" href="">
          <div class="line"></div>
          <div class="calcPrice-item">
            <div class="calcPrice-img" style="background-image: url(http://success.dvwb.ru/wp-content/themes/success-dvwb/img/c2.jpg)"></div>
            <div class="calcPrice-desc">
              <p><b>Квартира</b></p>
            </div>
          </div></a></div>
      <div class="col-lg-4"><a class="calcPrice-wrapper" href="">
          <div class="line"></div>
          <div class="calcPrice-item">
            <div class="calcPrice-img" style="background-image: url(http://success.dvwb.ru/wp-content/themes/success-dvwb/img/c3.jpg)"></div>
            <div class="calcPrice-desc">
              <p><b>Квартира</b></p>
            </div>
          </div></a></div>
    </div>
  </div>
</section> -->
