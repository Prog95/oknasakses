<?php
/*
Template Name: Page Slider
*/
?>
<?php get_header(); ?>
<?php if (function_exists('xandi_breadcrumbs')) xandi_breadcrumbs(); ?>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	<div class="container">
			<h1><?php the_title(); ?></h1>
	</div>
		<?php the_content(); ?>
	<?php endwhile; ?>
<?php else : ?>
	<p>.</p>
<?php endif; ?>
<?php get_footer(); ?>
