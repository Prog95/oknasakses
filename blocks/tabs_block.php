<section class="loggia-solution">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="h3-style"><?php the_field('zagolovok'); ?></div>
      </div>
    </div>
    <div class="col-paddingOne">
      <div class="row ui cataloge-menu top attached tabular menu">
        <?php
        $tabs = get_field('taby');
        foreach ($tabs as $key => $tab) { ?>
        <div class="col-lg-4 item <?php if(!$key) echo 'active'; ?>" data-tab="<?php echo $key; ?>">
          <div class="item-text">
            <div><?php echo  $tab['zagolovok'] ?></div>
            <p class="text-small"><?php echo $tab['podzagolovok'] ?></p>
          </div>
        </div>
        <?php }
        ?>
      </div>
    </div>
    <?php foreach ($tabs as $key => $tab) { ?>
    <div class="ui bottom attached tab segment <?php if(!$key) echo 'active'; ?>" data-tab="<?php echo $key; ?>">
      <div class="row loggia-solution--desc"> 
        <div class="col-lg-6">
          <div class="content">
            <?php echo wpautop($tab['kontent']); ?>
            <div><?php echo $tab['pered_czenoj']; ?>  <span class="text-blue"><?php echo $tab['czena']; ?></span></div>
            <?php echo do_shortcode('[contact-form-7 id="572" title="Перезвоните мне"]'); ?>
            <p class="text-small"><?php echo $tab['melkij_tekst']; ?> </p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="loggia-solution--img" style="background-image: url(<?php echo $tab['kartinka']; ?>)"></div>
        </div>
      </div>
      <div class="line"></div>
      <div class="row loggia-property">
        <?php foreach ($tab['ikonki'] as $value) { ?>
        <div class="col-lg-4">
          <div class="property-item">
            <div class="property-item--img"><img src="<?php echo $value['ikonka'] ?>" alt=""></div>
            <div><?php echo $value['zagolovok'] ?></div>
            <p><?php echo $value['tekst'] ?></p>
          </div>
        </div>
        <?php } ?>
      </div>
      <!-- <div class="row loggia-btn justify-content-center">
        <div class="col-auto"><a class="btn btn-blue" href="<?php echo $tab['knopka']['url'] ?>"><?php echo $tab['knopka']['title'] ?></a></div>
      </div> -->
    </div>
    <?php }
        ?>
  </div>
</section>