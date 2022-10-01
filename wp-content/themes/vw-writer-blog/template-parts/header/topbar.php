<?php
/**
 * The template part for header
 *
 * @package VW Writer Blog 
 * @subpackage vw_writer_blog
 * @since VW Writer Blog 1.0
 */
?>

<div id="topbar">
  <div class="container">
    <div class="row bg-home">
      <div class="email col-lg-4 col-md-4 align-self-center">
        <?php if( get_theme_mod( 'vw_writer_blog_mail') != '') { ?>
          <div class="row">
            <div class="col-lg-2 col-md-2"><i class="<?php echo esc_attr(get_theme_mod('vw_writer_blog_mail_adress_icon','fas fa-envelope-open')); ?>"></i></div>
            <div class="col-lg-10 col-md-10">
              <p class="infotext"><?php echo esc_html( get_theme_mod('vw_writer_blog_mail_text','')); ?></p>
              <p><a href="mailto:<?php echo esc_attr(get_theme_mod('vw_writer_blog_mail',''));?>"><?php echo esc_html(get_theme_mod('vw_writer_blog_mail',''));?></a></p>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="logo col-lg-4 col-md-4 align-self-center">
        <?php if ( has_custom_logo() ) : ?>
          <div class="site-logo"><?php the_custom_logo(); ?></div>
        <?php endif; ?>
        <?php $blog_info = get_bloginfo( 'name' ); ?>
          <?php if ( ! empty( $blog_info ) ) : ?>
            <?php if ( is_front_page() && is_home() ) : ?>
              <?php if( get_theme_mod('vw_writer_blog_logo_title_hide_show',true) != ''){ ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
              <?php } ?>
            <?php else : ?>
              <?php if( get_theme_mod('vw_writer_blog_logo_title_hide_show',true) != ''){ ?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
              <?php } ?>
            <?php endif; ?>
          <?php endif; ?>
          <?php
            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) :
          ?>
          <?php if( get_theme_mod('vw_writer_blog_tagline_hide_show',true) != ''){ ?>
            <p class="site-description">
              <?php echo esc_html($description); ?>
            </p>
          <?php } ?>
        <?php endif; ?>
      </div>
      <div class="call col-lg-4 col-md-4 align-self-center">
        <?php if( get_theme_mod( 'vw_writer_blog_call' ) != '') { ?>
          <div class="row">
            <div class="col-lg-10  col-md-10">
              <p class="infotext"><?php echo esc_html( get_theme_mod('vw_writer_blog_call_text','') ); ?></p>
              <p><a href="tel:<?php echo esc_attr( get_theme_mod('vw_writer_blog_call','') ); ?>"><?php echo esc_html(get_theme_mod('vw_writer_blog_call',''));?></a></p>
            </div>
            <div class="col-lg-2  col-md-2"><i class="<?php echo esc_attr(get_theme_mod('vw_writer_blog_phone_number_icon','fas fa-phone')); ?>"></i></div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>