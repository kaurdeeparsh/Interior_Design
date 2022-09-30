<?php
/**
 * The template for displaying home page.
 *
 * Template Name: Custom Home Page
 *
 * @package Furniture Designs
 */
get_header(); ?>

<main id="main" role="main">
  <?php if( get_theme_mod('interior_designs_slider_arrows') != '' || get_theme_mod( 'interior_designs_mobile_media_slider', false) != ''){ ?>
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'interior_designs_slider_speed',3000)) ?>"> 
        <?php $interior_designs_slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'interior_designs_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $interior_designs_slider_pages[] = $mod;
            }
          }
          if( !empty($interior_designs_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $interior_designs_slider_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php if(has_post_thumbnail()){
                the_post_thumbnail();
              } else{?>
                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/images/slider.png" alt="" />
              <?php } ?>
              <div class="slider-content">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','furniture-interior' );?></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e('Next','furniture-interior'); ?></span>
        </a>
      </div>
      <div class="clearfix"></div>
    </section> 
  <?php }?>

  <?php do_action( 'interior_designs_after_slider' ); ?>

  <section id="contact-information">
    <div class="container">
      <div class="contact-outer-box">
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <?php if( get_theme_mod( 'interior_designs_call','' ) != '') { ?>
              <div class="contact-box">
                <?php if(get_theme_mod('interior_designs_phone_icon') != 'None'){?>
                  <i class="<?php echo esc_attr(get_theme_mod('interior_designs_phone_icon','fas fa-phone')); ?> mb-3"></i>
                <?php }?>              
                <p class="infotext mb-1"><?php echo esc_html( get_theme_mod('interior_designs_call_text','') ); ?></p>
                <p class="mb-1"><a href="tel:<?php echo esc_attr( get_theme_mod('interior_designs_call','')); ?>"><?php echo esc_html( get_theme_mod('interior_designs_call','') ); ?><span class="screen-reader-text"><?php esc_html_e( 'Phone Number','furniture-interior' );?></span></a></p>
              </div>
            <?php } ?>
          </div>
          <div class="col-lg-4 col-md-4">
            <?php if( get_theme_mod( 'interior_designs_location','' ) != '') { ?>
              <div class="contact-box">
                <?php if(get_theme_mod('interior_designs_location_icon') != 'None'){?>
                  <i class="<?php echo esc_attr(get_theme_mod('interior_designs_location_icon','fas fa-location-arrow')); ?> mb-3"></i>
                <?php }?>
                <p class="infotext mb-1"><?php echo esc_html( get_theme_mod('interior_designs_location_text','') ); ?></p>
                <p class="mb-1"><?php echo esc_html( get_theme_mod('interior_designs_location','') ); ?></p>
              </div>
            <?php } ?>
          </div>
          <div class="col-lg-4 col-md-4">
            <?php if( get_theme_mod( 'interior_designs_day','' ) != '') { ?>
              <div class="contact-box">
                <?php if(get_theme_mod('interior_designs_time_icon') != 'None'){?>
                  <i class="<?php echo esc_attr(get_theme_mod('interior_designs_time_icon','far fa-clock')); ?> mb-3"></i>
                <?php }?>
                <p class="infotext mb-1"><?php echo esc_html( get_theme_mod('interior_designs_time','') ); ?></p>
                <p class="mb-1"><?php echo esc_html( get_theme_mod('interior_designs_day','') ); ?></p>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php if( get_theme_mod( 'furniture_interior_project_post_big','' ) != '' || get_theme_mod( 'furniture_interior_project_post_1','' ) != '' || get_theme_mod( 'furniture_interior_project_post_2','' ) != '' || get_theme_mod( 'furniture_interior_title','' ) != '' || get_theme_mod( 'furniture_interior_paragraph','' ) != '') { ?>
    <section id="projects" class="py-5">
    	<div class="container">
      	<div class="row">
          <div class="col-lg-6 col-md-6">
            <?php if( get_theme_mod( 'furniture_interior_project_post_big','' ) != '') { ?>
              <?php
                $args = array( 'name' => get_theme_mod('furniture_interior_project_post_big',''));
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) :
                  while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="project-box">
                      <?php the_post_thumbnail(); ?><span class="screen-reader-text"><?php the_title(); ?></span>
                      <h3 class="text-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    </div>
                  <?php endwhile; 
                  wp_reset_postdata();?>
                  <?php else : ?>
                    <div class="no-postfound"></div>
                  <?php
              endif; ?>
            <?php }?>
          </div>
          <div class="col-lg-6 col-md-6">
            <?php if( get_theme_mod( 'furniture_interior_title','' ) != '') { ?>
              <h2 class="text-center"><?php echo esc_html( get_theme_mod('furniture_interior_title','') ); ?></h2>
            <?php }?>
            <?php if( get_theme_mod( 'furniture_interior_paragraph','' ) != '') { ?>
              <p class="text-center"><?php echo esc_html( get_theme_mod('furniture_interior_paragraph','') ); ?></p>
            <?php }?>
            <div class="project-box-inner">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <?php if( get_theme_mod( 'furniture_interior_project_post_1','' ) != '') { ?>
                    <?php
                      $args = array( 'name' => get_theme_mod('furniture_interior_project_post_1',''));
                      $query = new WP_Query( $args );
                      if ( $query->have_posts() ) :
                        while ( $query->have_posts() ) : $query->the_post(); ?>
                          <div class="project-box">
                            <?php the_post_thumbnail(); ?><span class="screen-reader-text"><?php the_title(); ?></span>
                            <h3 class="text-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                          </div>
                        <?php endwhile; 
                        wp_reset_postdata();?>
                        <?php else : ?>
                          <div class="no-postfound"></div>
                        <?php
                    endif; ?>
                  <?php }?>
                </div>
                <div class="col-lg-6 col-md-6">
                  <?php if( get_theme_mod( 'furniture_interior_project_post_2','' ) != '') { ?>
                    <?php
                      $args = array( 'name' => get_theme_mod('furniture_interior_project_post_2',''));
                      $query = new WP_Query( $args );
                      if ( $query->have_posts() ) :
                        while ( $query->have_posts() ) : $query->the_post(); ?>
                          <div class="project-box">
                            <?php the_post_thumbnail(); ?><span class="screen-reader-text"><?php the_title(); ?></span>
                            <h3 class="text-center"><a href="<?php the_permalink(); ?>"  ><?php the_title(); ?></a></h3>
                          </div>
                        <?php endwhile; 
                        wp_reset_postdata();?>
                        <?php else : ?>
                          <div class="no-postfound"></div>
                        <?php
                    endif; ?>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
    		</div>
    	</div>
    </section>
  <?php }?>

  <div id="content-ma" class="py-5">
  	<div class="container">
    	<?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
  	</div>
  </div>
</main>

<?php get_footer(); ?>