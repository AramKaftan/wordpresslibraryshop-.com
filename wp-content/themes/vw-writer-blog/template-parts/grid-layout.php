<?php
/**
 * The template part for displaying grid-layout
 *
 * @package VW Writer Blog
 * @subpackage vw-writer-blog
 * @since VW Writer Blog 1.0
 */
?>
<div class="col-md-6 col-lg-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="<?php if( get_theme_mod( 'vw_writer_blog_animation', true) != '') { ?> post-main-box wow zoomInDown delay-1000" data-wow-duration="2s"<?php } else { ?> post-main-box <?php } ?>">
	      	<div class="box-image">
	          	<?php 
		            if(has_post_thumbnail() && get_theme_mod( 'vw_writer_blog_featured_image_hide_show',true) != '') { 
		              the_post_thumbnail(); 
		            }
	          	?>
	        </div>
	        <h3 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
	        <div class="new-text">
	          	<div class="entry-content">
	          		<p>
			          <?php $excerpt = get_the_excerpt(); echo esc_html( vw_writer_blog_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_writer_blog_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('vw_writer_blog_excerpt_suffix','') ); ?>
			        </p>
	          	</div>
	        </div>
	        <?php if( get_theme_mod('vw_writer_blog_button_text','READ MORE') != ''){ ?>
		        <div class="content-bttn">
		          <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small"><?php echo esc_html(get_theme_mod('vw_writer_blog_button_text',__('READ MORE','vw-writer-blog')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_writer_blog_button_text',__('READ MORE','vw-writer-blog')));?></span></a><i class="<?php echo esc_attr(get_theme_mod('vw_writer_blog_blog_button_icon','fas fa-long-arrow-alt-right')); ?>"></i>
		        </div>
		    <?php }?>
	    </div>
	    <div class="clearfix"></div>
  	</article>
</div>