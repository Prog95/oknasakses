<?php

// Create id attribute allowing for custom "anchor" value.

?>
<section class="cottageSlider sliderStyle window" >
	<div class="swiper-container">
		<div class="swiper-wrapper">
		<?php foreach (get_field('slajdy') as $key => $value) { ?>
			<div style="background-image: url(<?php echo $value['fon']; ?>)" class="swiper-slide">
				<div class="container">
					<div class="paddOne">
						<div class="row">
							<div class="col-lg-7">
								<div class="cottageSlider-desc">
                <?php if($value['tip_slajda'] == 'Слайд с кнопкой(Список с иконками)'){ ?>
									<div class="h1-style"><?php echo $value['zagolovok'] ?></div>
									<ul class="ul">
										<?php foreach ($value['punkty'] as $v) { ?>
										<li class="block-icon">
											<div class="block-icon--img"><img src="<?php echo $v['ikonka'] ?>" alt=""></div>
											<div class="block-icon--text">
												<div class="text-style"><?php echo $v['zagolovok'] ?></div>
												<p class="text-style"><?php echo $v['tekst'] ?></p>
											</div>
										</li>
										<?php	} ?>
									</ul>
									
									<?php if($value['knopka']) { ?>
									<div class="window-btn"><a style="max-width:200px" class="btn btn-blue" href="<?php echo $value['knopka']['url'] ?>"><?php echo $value['knopka']['title'] ?></a></div>
									<?php } ?>
                <?php } else if($value['tip_slajda'] == 'Слайд с формой(Список)'){ ?>
                  <div class="cottageSlider-desc">
                      <div class="h1-style"><?php echo $value['zagolovok'] ?></div>
                      <ul class="ul">
                        <?php foreach ($value['spisok'] as $v) { ?>
                        <li>
                          <div class="text-style"><?php echo $v['zagolovok'] ?></div>
                          <p><?php echo $v['podzagolovok'] ?></p>
                        </li>
                        <?php	} ?>
                      </ul>
                      <?php if($value['forma']) { ?>
                        <div class="phone-form">
                          <?php echo do_shortcode($value['forma']); ?>
<!--                          <p class="text-style">Отправляя данную форму, вы соглашаетесь на обработку <a href="/politika-konfidenczialnosti/">персональных данных</a></p>-->
                        </div>
                      <?php	} ?>
                    </div>
                <?php } else { ?>
                  <div class="cottageSlider-desc">
                    <div class="text-style--two"><?php echo $value['zagolovok'] ?></div>
                    <div class="h1-style"><?php echo $value['tekst'] ?></div>
                    <p class="text-small"><?php echo $value['melkij_tekst'] ?></p>
                    <?php if($value['forma']) { ?>
                      <div class="phone-form">
                        <?php echo do_shortcode($value['forma']); ?>
                        <p class="text-style">Отправляя данную форму, вы соглашаетесь на обработку <a href="/politika-konfidenczialnosti/">персональных данных</a></p>
                      </div>
                    <?php	} ?>
                  </div>
                <?php } ?>
                </div>
							</div>
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
</section>