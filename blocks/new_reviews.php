<section class="container mt-5">
  <div class="row">
    <div class="col">
      <div class="h1-style">Отзывы</div>
      <div class="line line-blue"></div>
    </div>
  </div>
  <div class="row mt-5">
  <?php 
  $args = array(
    'post_type'  => 'otzivi',
    'post_status' => 'publish',
    'posts_per_page' => '3',
);
$query = new WP_Query( $args );
  foreach ($query->posts as $key => $value) {
  ?>
    <div class="col-lg-4">
      <div class="testimonial">
        <div class="testimonial-img"><img class="lazyloaded" src="<?php echo echo_first_image($value->ID, 'medium') ?>" alt="" data-was-processed="true" data-ll-status="loaded" data-fancybox="testimonials" data-src="<?php echo echo_first_image($value->ID, 'medium') ?>"></div>
        <div class="testimonial-desc">
          <div class="testimonial-info">
            <p><b><?php echo get_the_title($value->ID); ?></b></p>
            <!-- <p>Компания<a href=""> ссылка</a></p> -->
          </div>
          <p><?php echo get_the_excerpt($value->ID); ?></p>
          
        </div>
      </div>
    </div>
    <?php  } ?>
  </div>
  <div class="row justify-content-center mt-5 pb-5">
    <div class="col col-auto"><a class="btn btn-blue" href="/otzivi/">Все отзывы</a></div>
  </div>
</section>