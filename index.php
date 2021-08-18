<?php get_header(); ?>
<?php if ( function_exists( 'xandi_breadcrumbs' ) ) xandi_breadcrumbs(); ?>
<section class="page-block">
  <div class="container">
    <div class="row">
	<?php if (is_category()) {?>
	<h1>Полезные статьи о пластиковых окнах</h1>
    <?}?>
    <?php

    if ( have_posts() ) {
      $i = 0;
      while ( have_posts() ) {
        the_post();
    ?>
    <?php get_template_part('parts/blog', 'preview'); ?>
    <?php
    if($i == 4) {
          $i=0;


          ?>

    </div>
  </div>
</section>
<?php get_template_part('parts/consult'); ?>
<section class="page-block">
<div class="container">
  <div class="row">
          <?php
        }
      } // end while?>
<div style="font-size: 20px; margin-bottom: 50px">
	<?the_posts_pagination();?>
</div>




  <?  } // end if
?>


<?php

?>
<!--	<section class="pagination" style="background-color: white;">-->
<!--		<div class="wp-pagenavi" role="navigation">--><?php //the_posts_pagination() ?><!--</div>-->
<!--	</section>-->
<?

?>


<?
//if (!(is_category())){
//	if ( have_posts() ) {
//		while (have_posts()) {
//			the_post();
//			get_template_part('parts/useful-articles', 'preview');
//		}
//
//	}
//}
if (!is_category()){
	?>
    <div class="container">
	<h2>Полезные статьи о пластиковых окнах</h2>
	<?
$args = array( 'posts_per_page' => 10 );
$lastposts = get_posts( $args );
?>
<div id="sliader" class="slaider">
<!--	<div class="row">-->
	<?
foreach( $lastposts as $post ){
	?>
	<?
	setup_postdata($post); // устанавливаем данные
	$postId = $post->ID;
	if (get_post_meta($postId, 'useful', 1) == 1) { ?>
		<div class="col-lg-6">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4" style="margin-top: 25px">
				<a href="<?php the_permalink() ?>"><? the_post_thumbnail('thumbnail')?></a></div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<h2><a href="<?php the_permalink() ?>" title="Ссылка на: <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('F jS, Y') ?> Автор: <?php the_author_posts_link() ?></small>
				<?the_excerpt();?>

			</div>
		</div>
		</div>

		<?
	}
	?>

	<?php
}
?>

<!--	</div>-->
    </div>
		</div>
	<?
wp_reset_postdata(); // сброс
}


 ?>

    </div>
  </div>
</section>

<?php



?>

<?php //get_template_part('parts/seo', 'text');  ?>
<?php get_footer(); ?>