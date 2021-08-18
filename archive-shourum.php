<?php get_header();?>
<?php if ( function_exists( 'xandi_breadcrumbs' ) ) xandi_breadcrumbs(); ?>
<?php

$post_object = get_field('czentralnyj_shourum', 'options');

if( $post_object ):

  // override $post
  $post = $post_object;
  setup_postdata( $post );

  ?>
<!-- <section class="center">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
      <div class="h3-style cont-title">Центральный офис-шоурум</div>
        <?php if($list = get_field('raspisanie')) {
         ?>
        <div class="center-cont">
          <div class="center-img"><img src="<?php bloginfo('template_url'); ?>/img/c1.png" alt=""></div>
          <div class="center-text">
            <ul class="ul">
              <?php foreach ($list as $key => $value) { ?>
              <li>
                <p><?php echo $value['tekst'] ?></p>
              </li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <?php } ?>
        <?php if($list = get_field('telefon')) {
         ?>
        <div class="center-cont">
          <div class="center-img"><img src="<?php bloginfo('template_url'); ?>/img/c2.png" alt=""></div>
          <div class="center-text">
            <ul class="ul">
              <?php foreach ($list as $key => $value) { ?>
              <li>
                <p><b><a href="tel:<?php echo $value['telefon'] ?>"><?php echo $value['telefon'] ?></a></b></p>
              </li>
              <?php if($value['besplatnyj_zvonok']) echo '<li>
                <p>по России звонок бесплатный</p>
              </li>'; ?>
              <?php } ?>
            </ul>
          </div>
        </div>
        <?php } ?>     
        <div class="center-cont">
          <div class="center-img"><img src="<?php bloginfo('template_url'); ?>/img/c4.png" alt=""></div>
          <div class="center-text">
            <ul class="ul">
              <li>
                <p><?php the_field('adres'); ?></p>
              </li>
            </ul>
          </div>
        </div>
        <div class="center-desc">
          <p><?php the_field('poyasnenie'); ?></p>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="row ui cataloge-menu top attached tabular menu">
          <div class="col-lg-4 col-md-4 col-sm-4 item active" data-tab="1">
            <div class="item-text">
              <p>Как проехать</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 item" data-tab="2">
            <div class="item-text">
              <p>Вид с улицы</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 item" data-tab="3">
            <div class="item-text">
              <p>Наш офис</p>
            </div>
          </div>
        </div>
        <div class="ui bottom attached tab segment active" data-tab="1">
          <div class="center-bg">
            <div id="map2"
              data-lat="<?php the_field('lat'); ?>"
              data-lng="<?php the_field('lng'); ?>"
              data-title="<?php the_title(); ?>"
              data-text="<?php the_field('adres'); ?>" ></div>
          </div>
        </div>
        <div class="ui bottom attached tab segment" data-tab="2">
          <div class="center-bg" style="background-image: url(<?php the_field('vid_s_uliczy'); ?>)"></div>
        </div>
        <div class="ui bottom attached tab segment" data-tab="3">
          <div class="center-bg" style="background-image: url(<?php the_field('foto_ofisa'); ?>)"></div>
        </div>
      </div>
    </div>
  </div>
</section> -->
<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
<?
global $wp_query;
$wp_query->query['posts_per_page'] = -1;
query_posts($wp_query->query);
?>
<section class="locations">
  <div class="container-fluid locations-wrap">
    <!-- <div class="locations-map">
      <div id="map"></div>
    </div> -->
    <div class="container locations-items--wrap">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <h1 class="text-style--two">Контакты</h1>
<!-- Новый блок -->
          <div class="contact-tab-wrap">
            <?php $terms = get_terms( array(
              'taxonomy'  => 'locations',
              'parent'    => 0,
              'orderby'   => 'id', 
              'order'     => 'ASC',
            ) ); ?>
            <div class="ui cataloge-menu top attached tabular menu contact-tabs">
              <?php foreach ($terms as $key => $term) { ?>
                <div class="item<?= $key == 0 ? ' active' : ''; ?>" data-tab="loc_<?= $term->term_id; ?>"><?= $term->name; ?></div>
              <?php } ?>
            </div>
            <?php foreach ($terms as $key => $term) { ?>
            <div class="ui attached tab segment<?= $key == 0 ? ' active' : ''; ?>" data-tab="loc_<?= $term->term_id; ?>">
                <div class="row locations-items">  
                    <div class="col-lg-6 col-md-12">
                      <div class="row locations-items">
                        <?php 
                        $args = array(
                          // Type & Status Parameters
                          'post_type'   => 'shourum',
                          'post_status' => 'publish',     
                          'order'               => 'DESC',
                          'orderby'             => 'date',
                          // Taxonomy Parameters
                          'tax_query' => array(
                            'relation' => 'AND',
                            array(
                              'taxonomy'         => $term->taxonomy,
                              'field'            => 'term_id',
                              'terms'            => array( $term->term_id ),
                              'include_children' => true,
                              'operator'         => 'IN',
                            ),
                          ),
                        );
                        
                        $query = new WP_Query( $args );
                        
                        if ( $query->have_posts() ) { 
                          while ( $query->have_posts() ) { $query->the_post(); ?>
                              <div class="col-lg-6 col-md-12 location-item locations-item--wrap"
                              data-lat="<?php the_field('lat'); ?>"
                              data-lng="<?php the_field('lng'); ?>"
                              data-title="<?php the_title(); ?>"
                              data-text="<?php the_field('adres'); ?>"
                              >
                                <a href="<?php the_permalink(); ?>" class="locations-item ">
                                  <div class="locations-desc">
                                    <h4><?php the_title(); ?></h4>
                                    <p><?php the_field('adres'); ?></p>
                                  </div>
                                    <i class="fas fa-angle-right"></i>
                                </a>
                              </div>
                              <?php
                          } // end while
                        } // end if 
                        wp_reset_query();
                        ?>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                       <div class="locations-map">
                          <div class="map">
                            <?php $map = get_field('maps', $term->taxonomy."_".$term->term_id); 
                            echo $map; ?>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
            <?php } ?>
          </div>


          <!-- <div class="row locations-items">
          <?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post();
    ?>
            <div class="col-lg-6 col-md-12 location-item locations-item--wrap"
            data-lat="<?php the_field('lat'); ?>"
            data-lng="<?php the_field('lng'); ?>"
            data-title="<?php the_title(); ?>"
            data-text="<?php the_field('adres'); ?>"
            >
              <a href="<?php the_permalink(); ?>" class="locations-item">
                <div class="locations-desc">
                  <h4><?php the_title(); ?></h4>
                  <p><?php the_field('adres'); ?></p>
                </div><i class="fas fa-angle-right"></i>
              </a>
            </div>
            <?php
      } // end while
    } // end if
    ?>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
