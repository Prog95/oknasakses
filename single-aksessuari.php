<?php get_header(); ?>
<?php if ( function_exists( 'xandi_breadcrumbs' ) ) xandi_breadcrumbs(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
	<section class="image-container">
		<div class="container">
			<div class="row">
				<?php //echo get_the_post_thumbnail( get_the_ID(), 'thumbnail', array('class' => 'alignleft') ); ?>
			</div>
		</div>
	</section>
	<section class="access-singleWrapp">
<!--		<div class="container">-->
			<div class="">
				<?php if (get_field('czena')): ?>
					<section class="row">
						<div class="col-lg-6">
							<div class="access-single--img"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt=""></div>
						</div>
						<div class="col-lg-6">
							<div class="access-single--desc">
								<div class="access-single--desc-title">Стоимость: <p><?php the_field('czena'); ?></p></div>
								<?php if (get_field('czena_montazha')) { ?><p class="text-style">Монтаж: <?php the_field('czena_montazha'); ?></p><?php } ?>
							</div>
							<div class="access-single--bottom">
								<ul class="ul">
									<?php foreach (get_field('harakteristiki') as $key => $value) {
										?>
										<li>
											<div class="access-single--p">
												<p class="text-style"><?php echo $value['kolonka_1'] ?></p>
											</div>
											<div class="access-single--p">
												<p class="text-style"><?php echo $value['kolonka_2'] ?></p>
											</div>
										</li>
										<?php
									}
									?>
								</ul>
								<div class="phone-form">
									<?php echo do_shortcode('[contact-form-7 id="1801" title="Купить(акссесуары)"]'); ?>
									<p class="text-style">Отправляя данную форму, вы соглашаетесь на обработку <a href="">персональных данных</a></p>
								</div>
							</div>
						</div>
					</section>
				<?php endif; ?>
				<section class="row access-single--text">
					<div class="col">
						<?php the_content(); ?>
					</div>
				</section>
				<section class="row access-single--upgrade">
					<div class="col">
						<div class="h3-style"><?php the_field('zagolovok'); ?></div>
					</div>
				</section>
				<section class="row access-single--items">
					<?php foreach (get_field('preimushhestva') as $key => $value) {
						?>
						<div class="col-lg-12">
							<div class="access-single--item">
								<div class="access-single--itemImg" style="background-image: url(<?php echo $value['kartinka'] ?>)"></div>
								<div class="access-single--itemText">
									<div class="access-single--itemText-title"><?php echo $value['zagolovok'] ?></div>
									<p class="text-style"><?php echo $value['tekst'] ?></p>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</section>
			</div>
<!--		</div>-->
	</section>
	<?php if (get_field('spisok_s_markerami')) { ?>
		<section class="adven">
			<div class="container">
				<div class="paddThree">
					<div class="row">
						<div class="col">
							<div class="h3-style"><?php the_field('zagolovok3'); ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<ul class="ul ul-arrows">
								<?php foreach (get_field('spisok_s_markerami') as $key => $value) {
									?>
									<li>
										<p><?php echo $value['tekst'] ?></p>
									</li>
									<?php
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>
<?php endwhile; else : ?>
	<p>Записей нет.</p>
<?php endif; ?>

<?php get_footer(); ?>