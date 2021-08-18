<?php get_header(); ?>
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
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; else : ?>
	<p>Записей нет.</p>
<?php endif; ?>

<?php get_footer(); ?>
