<?php get_header(); ?>
<?php if ( function_exists( 'xandi_breadcrumbs' ) ) xandi_breadcrumbs(); ?>
<section class="container">
	<section class="access-single">
		<div class="container">
			<div class="row">
				<div class="col">
					<h1 class="h1-style"><p><?php the_title(); ?></p> <?php the_field('zagolovok1'); ?></h1>
					<div class="line"></div>
				</div>
			</div>
		</div>
	</section>
</section>

<?php if(get_the_ID() == 2671){?>
<div id="blog1201">
<?php } else {?>
<!--<div class="container">-->
<?php } ?>	
	<div class="">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; else : ?>
			<p>Записей нет.</p>
		<?php endif; ?>
<!--	</div>-->
</div>
<?php get_footer(); ?>
