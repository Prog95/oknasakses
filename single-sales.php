<?php  get_header(); ?>
<?php if ( function_exists( 'xandi_breadcrumbs' ) ) xandi_breadcrumbs(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
    <?php the_content(); ?>
<?php endwhile; else : ?>
	<p>Записей нет.</p>
<?php endif; ?>

<?php get_footer(); ?>