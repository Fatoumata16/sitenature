<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_eco_nature_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_eco_nature_slider_hide_show', false) != '' || get_theme_mod( 'vw_eco_nature_resp_slider_hide_show', false) != '') { ?>

    <section id="slider">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'vw_eco_nature_slider_speed',4000)) ?>">
        <?php $vw_eco_nature_slider_pages = array();
          for ( $count = 1; $count <= 3; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_eco_nature_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $vw_eco_nature_slider_pages[] = $mod;
            }
          }
          if( !empty($vw_eco_nature_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $vw_eco_nature_slider_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php if(has_post_thumbnail()){
                the_post_thumbnail();
              } else{?>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/block-patterns/images/banner.png" alt="" />
              <?php } ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1 class=" wow slideInUp delay-1000" data-wow-duration="3s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <p class="wow slideInDown delay-1000" data-wow-duration="2s"><?php $excerpt = get_the_excerpt(); echo esc_html( vw_eco_nature_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_eco_nature_slider_excerpt_number','30')))); ?></p>
                  <?php if( get_theme_mod('vw_eco_nature_slider_button_text','READ MORE') != ''){ ?>
                    <div class=" more-btn wow slideInDown delay-1000" data-wow-duration="2s">
                      <a href="<?php echo esc_url(get_permalink()); ?>"><i class="<?php echo esc_attr(get_theme_mod('vw_eco_nature_before_slider_button_icon','fas fa-plus')); ?>"></i><?php echo esc_html(get_theme_mod('vw_eco_nature_slider_button_text',__('READ MORE','vw-eco-nature')));?><i class="<?php echo esc_attr(get_theme_mod('vw_eco_nature_after_slider_button_icon','fas fa-angle-right')); ?>"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_eco_nature_slider_button_text',__('READ MORE','vw-eco-nature')));?></span></a>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
            <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
          <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-eco-nature' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-eco-nature' );?></span>
        </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php } ?>

  <?php do_action( 'vw_eco_nature_after_slider' ); ?>

  <section id="serv-section" class="wow rollIn delay-1000" data-wow-duration="2s">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <?php if( get_theme_mod( 'vw_eco_nature_section_title') != '') { ?>
            <h2><?php echo esc_html(get_theme_mod('vw_eco_nature_section_title',''));?></h2>
          <?php }?>        
          <?php
            $vw_eco_nature_catData =  get_theme_mod('vw_eco_nature_our_services','');
            if($vw_eco_nature_catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html($vw_eco_nature_catData,'vw-eco-nature'))); ?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>          
            <div class="serv-box">
              <div class="row">
                <div class="col-lg-3 col-md-3">
                  <?php the_post_thumbnail(); ?>
                </div>
                <div class="col-lg-9 col-md-9">
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h4>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_eco_nature_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_eco_nature_services_excerpt_number','30')))); ?></p>
                </div>
              </div>
            </div>
            <?php endwhile;
            wp_reset_postdata();
          } ?>
        </div>
        <div class="col-lg-4 col-md-4">
          <?php $vw_eco_nature_service_pages = array();
            for ( $count = 0; $count <= 0; $count++ ) {
              $mod = absint( get_theme_mod( 'vw_eco_nature_about_page' ));
              if ( 'page-none-selected' != $mod ) {
                $vw_eco_nature_service_pages[] = $mod;
              }
            }
            if( !empty($vw_eco_nature_service_pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $vw_eco_nature_service_pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                $count = 0;
                while ( $query->have_posts() ) : $query->the_post(); ?>
                  <div class="about-box">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                    <?php the_post_thumbnail(); ?>
                  </div>
                <?php $count++; endwhile; ?>
              <?php else : ?>
                  <div class="no-postfound"></div>
              <?php endif;
            endif;
            wp_reset_postdata();
          ?>
        </div>
      </div>
    </div>
  </section>

  <?php do_action( 'vw_eco_nature_after_second_section' ); ?>

  <div class="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
