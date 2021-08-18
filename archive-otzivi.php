<?php  get_header(); ?>
<?php if ( function_exists( 'xandi_breadcrumbs' ) ) xandi_breadcrumbs(); ?>
<?php if ( have_posts() ) : ?>
<section class="reviews" style="background-image: url(<?php bloginfo('template_url'); ?>/img/rev.png)">
  <div class="container">
    <div class="paddOne">
      <div class="row">
        <div class="col">
          <h1 class="text-style--two">Отзывы о наших пластиковых окнах</h1>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="reviews-dates">
            <?php //var_dump(get_month_link(2019, 12)); ?>
            <ul class="ul">
            <?php
            $args = array(
                'post_type'    => 'otzivi',
                'type'         => 'monthly',
                'echo'         => 0
            );
            echo wp_get_archives($args); ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="row reviews-items">
			<?php  while ( have_posts() ) : the_post(); ?>
				<div class="col-lg-4 col-md-6">
          <div class="reviews-item">
             <div class="reviews-item-title"><?php the_title(); ?></div>
            <div class="reviews-item-img">
              <a class="reviews-item-more-link" data-fancybox="" href="<?php echo get_the_post_thumbnail_url(); ?>" >
                <img src="<?php echo get_the_post_thumbnail_url(); ?>">
              </a>              
               <?php if( get_the_post_thumbnail_url()) { ?><a class="reviews-item-more" data-fancybox="" href="<?php echo get_the_post_thumbnail_url(); ?>" ><img src="<?php bloginfo('template_url'); ?>/img/maximize.png"></a><?php } ?>
            </div>
            <div class="reviews-item-text"><?php the_content(); ?></div> 
          </div>
        </div>

			<?php endwhile; ?>
      </div>
<!--	    --><?//the_posts_pagination();?>
      <div class="reviews-feedback">
        <div class="row">
          <div class="col">
            <h2 class="text-style--two">Оставить отзыв</h2>
          </div>
        </div>
        <div class="feedback">
          <div class="paddOne">
						<?php echo do_shortcode('[contact-form-7 id="230" title="Отзыв"]'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php else : ?>
	<p>Записей нет.</p>
<?php endif; ?>

<?php get_footer(); ?>