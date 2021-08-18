<?php

// Create id attribute allowing for custom "anchor" value.

?>
<section class="cottageSlider sliderStyle" style="background-image: url(<?php the_field('fon'); ?>)">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php foreach (get_field('slajdy') as $key => $value) { ?>
				<div class="swiper-slide">
					<div class="paddOne">
						<div class="row">
							<div class="col-lg-7 col-md-12">
								<div class="cottageSlider-desc">
									<div class="h1-style"><?php echo $value['zagolovok'] ?></div>
									<ul class="ul">
										<?php foreach ($value['punkty'] as $v) { ?>
										<li>
                                            <div class="text-style"><?php echo $v['zagolovok'] ?></div>
                                            <p><?php echo $v['tekst'] ?></p>
										</li>
										<?php	} ?>
									</ul>
									<?php if($value['forma']) { ?>
										<div class="phone-form">
											<?php echo do_shortcode($value['forma']); ?>
											<p class="text-style">Отправляя данную форму, вы соглашаетесь на обработку <a href="">персональных данных</a></p>
										</div>
									<?php } else if($value['knopka']) { ?>
									<div class="window-btn"><a class="btn btn-blue" href="<?php echo $value['knopka']['url'] ?>"><?php echo $value['knopka']['title'] ?></a></div>
									<?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="cottageSlider-img"><img src="<?php echo $value['izobrazhenie'] ?>" alt=""></div>
                            </div>
						</div>
					</div>
				</div>
            <?php } ?>
            

          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next"><i class="fas fa-angle-right"></i></div>
          <div class="swiper-button-prev"><i class="fas fa-angle-left"></i></div>
        </div>
      </div>
    </div>
  </div>
</section>