<?php  get_header(); ?>
<?php if ( function_exists( 'xandi_breadcrumbs' ) ) xandi_breadcrumbs(); ?>
<section class="sales">
  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="h1-style">Акции и скидки на пластиковые окна</h1>
        <div class="line line-blue"></div>
      </div>
    </div>
		<?php if ( have_posts() ) : ?>	

    <div class="row sales-items">
			<?php  while ( have_posts() ) : the_post(); ?>
      <div class="col-lg-4 col-md-6">
        <div class="sales-item">
          <div class="sales-item--top"><a class="sales-item--img" href="<?php the_permalink(); ?>" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></a>
            <div class="line line-big"></div>
            <div class="sales-item--desc">
              <div><?php the_title(); ?></div>
              <p class="text-style"><?php the_excerpt(); ?> </p>
              <!-- <p class="text-style"><?php the_excerpt(); ?> 
              Доступно еще <?php 
              $a = new DateTime('now');
              $b = new DateTime(get_field('data_okonchaniya'));
              // var_dump($b);
              // echo (strtotime(get_field('data_okonchaniya')) - time()) / (1000);
              $diff = $a->diff($b); 
              $interval = $a->diff($b);
              // var_dump($interval);
              if($interval->invert) {
                echo 'Акция окончена';

              }else {
                echo $interval->format('%a дней');
              }
              // echo $diff['y'] ?  ' '.$diff['y'].' год'   : '';
              // echo $diff['m'] ?  ' '.$diff['m'].' месяц' : '';
              // echo $diff['d'] ?  ' '.$diff['d'].' дней' : '';
              // echo $diff['h'] ?  ' '.$diff['h'].' часов' : '';
              // echo $diff['i'] ?  ' '.$diff['i'].' минут' : '';

              ?></p> -->
              <p class="text-small"><?php the_field('usloviya'); ?></p>
            </div>
          </div>
          <div class="sales-item--bottom"><a class="btn btn-white" href="<?php the_permalink(); ?>">подробнее</a></div>
        </div>
			</div>
			<?php endwhile; ?>
		</div>
		<?php else : ?>
			<p>Акций нет.</p>
		<?php endif; ?>
  </div>
</section>


<?php get_footer(); ?>