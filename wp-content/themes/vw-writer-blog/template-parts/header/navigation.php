<?php
/**
 * The template part for header
 *
 * @package VW Writer Blog 
 * @subpackage vw_writer_blog
 * @since VW Writer Blog 1.0
 */
?>
<div id="header" class="menubar">
  <div class="header-menu <?php if( get_theme_mod( 'vw_writer_blog_sticky_header', false) != '' || get_theme_mod( 'vw_writer_blog_stickyheader_hide_show', false) != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
  	<div class="container">
      <?php if(has_nav_menu('primary')){ ?>
        <div class="toggle-nav mobile-menu">
          <button onclick="vw_writer_blog_menu_open_nav()" class="responsivetoggle"><i class="<?php echo esc_attr(get_theme_mod('vw_writer_blog_res_open_menu_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','vw-writer-blog'); ?></span></button>
        </div>
      <?php } ?>
  		<div id="mySidenav" class="nav sidenav">
        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'vw-writer-blog' ); ?>">
          <?php 
            if(has_nav_menu('primary')){
              wp_nav_menu( array( 
                'theme_location' => 'primary',
                'container_class' => 'main-menu clearfix' ,
                'menu_class' => 'clearfix',
                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                'fallback_cb' => 'wp_page_menu',
              ) ); 
            }
          ?>
          <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="vw_writer_blog_menu_close_nav()"><i class="<?php echo esc_attr(get_theme_mod('vw_writer_blog_res_close_menus_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','vw-writer-blog'); ?></span></a>
        </nav>
      </div>
  	</div>
  </div>
</div>