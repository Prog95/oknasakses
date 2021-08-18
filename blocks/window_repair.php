<style>
.service-items li {
    font-weight: 400!important;
    line-height: 24px!important;
}
</style>

<section class="service">
  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="text-style--two text-center" style="color: black; margin-top: 40px"><?php the_field('zagolovok'); ?></h3>
      </div>
    </div>
  </div>
</section>



        <div class="repair-services container">

            <?php foreach(get_field('uslugi') as $row){ ?>
            <div class="repair-services_item <?php if (get_page_link() != "https://xn----7sbb1bdof2aca5k.xn--p1ai/uslugi/remont-okon/"){echo "repair-services_item2";}?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="repair-services_item-img <?php if (get_page_link() != "https://xn----7sbb1bdof2aca5k.xn--p1ai/uslugi/remont-okon/"){echo "repair-services_item-img2";}?>">
                            <img src="<?php echo $row['fon'] ?>" >
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="repair-services_item-block <?php if (get_page_link() != "https://xn----7sbb1bdof2aca5k.xn--p1ai/uslugi/remont-okon/"){echo "repair-services_item-block2";}?>">
                            <div class="service-item--text"><strong><?php echo $row['nazvanie'] ?></strong></div>
                            <?php echo $row['tekst']; ?>
                            <div class="service-item--btn"><a class="btn btn-blue" <?php if (!$row['raskryvaetsya']) { ?> data-fancybox href="#popup2" data-form="Перезвоните мне"<?php } ?> >
		                            <?php if (get_page_link() == "https://xn----7sbb1bdof2aca5k.xn--p1ai/uslugi/remont-okon/"){echo "Вызвать мастера";}else{echo "Заказать";}?>
	                            </a></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <button class="repair-services_item-all" id="repair-services_item-all">
	            Показать все <?php if (get_page_link() == "https://xn----7sbb1bdof2aca5k.xn--p1ai/uslugi/remont-okon/"){echo "услуги";}else{echo "москитные сетки";}?>
            </button>
        </div>

<!--<div class="container">-->
<!--<section class="service-items ui accordion">-->
  <?php foreach(get_field('uslugi') as $row){ ?>
  <div class="service-item--wrap">


<!--    <div class="repair-services container">-->
<!--        <div class="repair-services_item">-->
<!--            <div class="row">-->
<!--                <div class="col-md-6">-->
<!--                    <div class="repair-services_item-img">-->
<!--                        <img src="--><?php //echo $row['fon'] ?><!--" >-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                 <div class="col-md-6">-->
<!--                     <div class="repair-services_item-block">-->
<!--                          <div class="service-item--text">--><?php //echo $row['nazvanie'] ?><!--</div>-->
<!--                          --><?php //echo $row['tekst']; ?>
<!--                          <div class="service-item--btn"><a class="btn btn-blue" --><?php //if (!$row['raskryvaetsya']) { ?><!-- data-fancybox="" href="#popup2" --><?php //} ?><!-- >подробнее</a></div>-->
<!--                     </div>-->
<!--                 </div>-->
<!--           </div>-->
<!--        </div>-->
<!--    </div>-->





    <?php if ($row['raskryvaetsya']) { ?>
        <div class="content">
      <div class="container">
        <div class="row">
          <div class="col">
            <div><?php echo $row['podzagolovok'] ?></div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row justify-content-center">
        <?php foreach($row['obekty'] as $obekty){ ?>
          <div class="col-lg-4 col-md-6 access-item">
            <div class="access-item--top">
              <div class="h-style"><?php echo $obekty['zagolovok'] ?></div><a class="access-img" href="" style="background-image: url(<?php echo $obekty['izobrazhenie'] ?>/*/*)"></a>*/*/
                           <p><?php echo $obekty['tekst'] ?></p>
            </div>
            <div class="access-item--link"><a target="<?php echo $obekty['knopka']['target'] ?>" class="btn btn-orange" href="<?php echo $obekty['knopka']['url'] ?>"><?php echo $obekty['knopka']['title'] ?></a></div>
          </div>
        <?php } ?>
        </div>
      </div>

    </div>
    <?php } ?>



  </div>
  <?php } ?>
<!--</section>-->
<!--</div>-->