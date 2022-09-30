<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package VW Interior Designs
 */

get_header(); ?>

<main id="maincontent" role="main">
    <div class="middle-align container">
        <?php
            $vw_interior_designs_theme_lay = get_theme_mod( 'vw_interior_designs_theme_options','Right Sidebar');
            if($vw_interior_designs_theme_lay == 'Left Sidebar'){ ?>
                <div class="row">
                    <div class="col-md-4 col-lg-4" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
                    <div id="our-services" class="services col-md-8 col-lg-8">
                        <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Results For: %s','vw-interior-designs'), esc_html( get_search_query() ) ); ?></h1> 
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/content',get_post_format()); 
                            endwhile;

                            else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                        <?php if( get_theme_mod( 'vw_interior_designs_blog_pagination_hide_show',true) != '') { ?>
                            <div class="navigation">
                              <?php vw_interior_designs_blog_posts_pagination(); ?>
                              <div class="clearfix"></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="clearfix"></div>
            <?php }else if($vw_interior_designs_theme_lay == 'Right Sidebar'){ ?>
                <div class="row">
                    <div id="our-services" class="services col-md-8 col-lg-8"> 
                        <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Results For: %s','vw-interior-designs'), esc_html( get_search_query() ) ); ?></h1>
                        <?php if ( have_posts() ) :
                        /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/content',get_post_format()); 
                            endwhile;

                            else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                        <?php if( get_theme_mod( 'vw_interior_designs_blog_pagination_hide_show',true) != '') { ?>
                            <div class="navigation">
                              <?php vw_interior_designs_blog_posts_pagination(); ?>
                              <div class="clearfix"></div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-4 col-lg-4" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
                </div>
            <?php }else if($vw_interior_designs_theme_lay == 'One Column'){ ?>
                <div id="our-services" class="services">
                    <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Results For: %s','vw-interior-designs'), esc_html( get_search_query() ) ); ?></h1>
                    <?php if ( have_posts() ) :
                    /* Start the Loop */
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content',get_post_format()); 
                        endwhile;

                        else :
                            get_template_part( 'no-results' ); 
                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'vw_interior_designs_blog_pagination_hide_show',true) != '') { ?>
                        <div class="navigation">
                          <?php vw_interior_designs_blog_posts_pagination(); ?>
                          <div class="clearfix"></div>
                        </div>
                    <?php } ?>
                </div>
            <?php }else if($vw_interior_designs_theme_lay == 'Three Columns'){ ?>
                <div class="row">
                    <div class="col-md-3 col-lg-3" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
                    <div id="our-services" class="services col-md-6 col-lg-6">
                        <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Results For: %s','vw-interior-designs'), esc_html( get_search_query() ) ); ?></h1>
                        <?php if ( have_posts() ) :
                        /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/content',get_post_format());
                            endwhile;

                            else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                        <?php if( get_theme_mod( 'vw_interior_designs_blog_pagination_hide_show',true) != '') { ?>
                            <div class="navigation">
                              <?php vw_interior_designs_blog_posts_pagination(); ?>
                              <div class="clearfix"></div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-3 col-lg-3" id="sidebar"><?php dynamic_sidebar('sidebar-2');?></div>
                </div>
            <?php }else if($vw_interior_designs_theme_lay == 'Four Columns'){ ?>
                <div class="row">
                    <div class="col-md-3 col-lg-3" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
                    <div id="our-services" class="services col-md-3 col-lg-3">
                        <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Results For: %s','vw-interior-designs'), esc_html( get_search_query() ) ); ?></h1>
                        <?php if ( have_posts() ) :
                        /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/content',get_post_format());
                            endwhile;

                            else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                        <?php if( get_theme_mod( 'vw_interior_designs_blog_pagination_hide_show',true) != '') { ?>
                            <div class="navigation">
                              <?php vw_interior_designs_blog_posts_pagination(); ?>
                              <div class="clearfix"></div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-3 col-lg-3" id="sidebar"><?php dynamic_sidebar('sidebar-2');?></div>
                    <div class="col-md-3 col-lg-3" id="sidebar"><?php dynamic_sidebar('sidebar-3');?></div>
                </div>
            <?php }else if($vw_interior_designs_theme_lay == 'Grid Layout'){ ?>
                <div class="row">
                    <div id="our-services" class="services col-md-9 col-lg-9">
                        <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Results For: %s','vw-interior-designs'), esc_html( get_search_query() ) ); ?></h1>
                        <div class="row">
                            <?php if ( have_posts() ) :
                            /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/grid-layout' ); 
                                endwhile;

                                else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                        </div>
                        <?php if( get_theme_mod( 'vw_interior_designs_blog_pagination_hide_show',true) != '') { ?>
                            <div class="navigation">
                              <?php vw_interior_designs_blog_posts_pagination(); ?>
                              <div class="clearfix"></div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-3 col-lg-3" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
                </div>
            <?php }else {?>
                <div class="row">
                    <div id="our-services" class="services col-md-8 col-lg-8"> 
                        <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Results For: %s','vw-interior-designs'), esc_html( get_search_query() ) ); ?></h1>
                        <?php if ( have_posts() ) :
                        /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/content',get_post_format()); 
                            endwhile;

                            else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                        <?php if( get_theme_mod( 'vw_interior_designs_blog_pagination_hide_show',true) != '') { ?>
                            <div class="navigation">
                              <?php vw_interior_designs_blog_posts_pagination(); ?>
                              <div class="clearfix"></div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-4 col-lg-4" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
                </div>
            <?php } ?>
        <div class="clearfix"></div>
    </div>
</main>

<?php get_footer(); ?>