<?php
//about theme info
add_action( 'admin_menu', 'vw_writer_blog_gettingstarted' );
function vw_writer_blog_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Writer Blog', 'vw-writer-blog'), esc_html__('About VW Writer Blog', 'vw-writer-blog'), 'edit_theme_options', 'vw_writer_blog_guide', 'vw_writer_blog_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_writer_blog_admin_theme_style() {
   wp_enqueue_style('vw-writer-blog-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-writer-blog-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_writer_blog_admin_theme_style');

//guidline for about theme
function vw_writer_blog_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-writer-blog' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Writer Blog Theme', 'vw-writer-blog' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-writer-blog'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Writer Blog at 20% Discount','vw-writer-blog'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-writer-blog'); ?> ( <span><?php esc_html_e('vwpro20','vw-writer-blog'); ?></span> ) </h4>
			<div class="info-link">
				<a href="<?php echo esc_url( VW_WRITER_BLOG_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-writer-blog' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="vw_writer_blog_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-writer-blog' ); ?></button>	
			<button class="tablinks" onclick="vw_writer_blog_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-writer-blog' ); ?></button>
			<button class="tablinks" onclick="vw_writer_blog_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-writer-blog' ); ?></button>  
			<button class="tablinks" onclick="vw_writer_blog_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'vw-writer-blog' ); ?></button>
		  	<button class="tablinks" onclick="vw_writer_blog_open_tab(event, 'writer_pro')"><?php esc_html_e( 'Get Premium', 'vw-writer-blog' ); ?></button>
		  	<button class="tablinks" onclick="vw_writer_blog_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-writer-blog' ); ?></button>
		</div>

		<!-- Tab content -->
		<?php
			$vw_writer_blog_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_writer_blog_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Writer_Blog_Plugin_Activation_Settings::get_instance();
				$vw_writer_blog_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-writer-blog-recommended-plugins">
				    <div class="vw-writer-blog-action-list">
				        <?php if ($vw_writer_blog_actions): foreach ($vw_writer_blog_actions as $key => $vw_writer_blog_actionValue): ?>
				                <div class="vw-writer-blog-action" id="<?php echo esc_attr($vw_writer_blog_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_writer_blog_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_writer_blog_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_writer_blog_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-writer-blog'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_writer_blog_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-writer-blog' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('VW Writer Blog is a clean, sleek, modern and intuitive WordPress theme for people dealing with literature. This multipurpose theme is useful for book shops, online book stores, eBook portals, libraries, reading clubs, literary clubs as well as for writers, authors, journalists, editors, publishers, online course providers, online libraries, book hubs and similar websites concerned with literature, reading and books. It can also be used for writing literature blogs and to start an online store for selling music, movies and video games. It is thoughtfully crafted to cover all aspects of a literary website with attention to fine details. This bookstore and writer WordPress theme is readily responsive, cross-browser compatible and translation ready to fulfil the growing demands of present day users. It is a search engine optimized theme to easily divert traffic towards your site by ranking higher in search results. VW Writer Blog proposes for a profound customization to give your website a personalized feel. It has used social media icons to make your content reach maximum people. Banners and sliders bring vastness to the website. It follows standard coding rules yielding a bug-free and secure website.','vw-writer-blog'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-writer-blog' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-writer-blog' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_WRITER_BLOG_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-writer-blog' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-writer-blog'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-writer-blog'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-writer-blog'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-writer-blog'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-writer-blog'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_WRITER_BLOG_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-writer-blog'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-writer-blog'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-writer-blog'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_WRITER_BLOG_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-writer-blog'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-writer-blog' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-writer-blog'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_writer_blog_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-writer-blog'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_writer_blog_topbar') ); ?>" target="_blank"><?php esc_html_e('Topbar Section','vw-writer-blog'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_writer_blog_articles_section') ); ?>" target="_blank"><?php esc_html_e('Featured Articles','vw-writer-blog'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-writer-blog'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-writer-blog'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_writer_blog_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-writer-blog'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_writer_blog_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-writer-blog'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_writer_blog_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-writer-blog'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_writer_blog_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-writer-blog'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-writer-blog'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-writer-blog'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-writer-blog'); ?></span><?php esc_html_e(' Go to ','vw-writer-blog'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-writer-blog'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-writer-blog'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-writer-blog'); ?></span><?php esc_html_e(' Go to ','vw-writer-blog'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-writer-blog'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-writer-blog'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-writer-blog'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vw-writer-blog/" target="_blank"><?php esc_html_e('Documentation','vw-writer-blog'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Writer_Blog_Plugin_Activation_Settings::get_instance();
				$vw_writer_blog_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-writer-blog-recommended-plugins">
				    <div class="vw-writer-blog-action-list">
				        <?php if ($vw_writer_blog_actions): foreach ($vw_writer_blog_actions as $key => $vw_writer_blog_actionValue): ?>
				                <div class="vw-writer-blog-action" id="<?php echo esc_attr($vw_writer_blog_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_writer_blog_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_writer_blog_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_writer_blog_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-writer-blog'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_writer_blog_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'vw-writer-blog' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-writer-blog'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','vw-writer-blog'); ?></span></b></p>
	              	<div class="vw-writer-blog-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-writer-blog'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />		
	            </div>

	            <div class="block-pattern-link-customizer">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-writer-blog' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-writer-blog'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_writer_blog_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-writer-blog'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-writer-blog'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_writer_blog_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-writer-blog'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_writer_blog_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-writer-blog'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_writer_blog_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-writer-blog'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_writer_blog_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-writer-blog'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-writer-blog'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
	        </div>
		</div>

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Writer_Blog_Plugin_Activation_Settings::get_instance();
			$vw_writer_blog_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-writer-blog-recommended-plugins">
				    <div class="vw-writer-blog-action-list">
				        <?php if ($vw_writer_blog_actions): foreach ($vw_writer_blog_actions as $key => $vw_writer_blog_actionValue): ?>
				                <div class="vw-writer-blog-action" id="<?php echo esc_attr($vw_writer_blog_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_writer_blog_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_writer_blog_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_writer_blog_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-writer-blog' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-writer-blog-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-writer-blog'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
					<h3><?php esc_html_e( 'Link to customizer', 'vw-writer-blog' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-writer-blog'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_writer_blog_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-writer-blog'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-writer-blog'); ?></a>
							</div>
							
							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_writer_blog_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-writer-blog'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_writer_blog_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-writer-blog'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_writer_blog_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-writer-blog'); ?></a>
							</div> 
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_writer_blog_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-writer-blog'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-writer-blog'); ?></a>
							</div> 
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = VW_Writer_Blog_Plugin_Activation_Woo_Products::get_instance();
				$vw_writer_blog_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-writer-blog-recommended-plugins">
					    <div class="vw-writer-blog-action-list">
					        <?php if ($vw_writer_blog_actions): foreach ($vw_writer_blog_actions as $key => $vw_writer_blog_actionValue): ?>
					                <div class="vw-writer-blog-action" id="<?php echo esc_attr($vw_writer_blog_actionValue['id']);?>">
				                        <div class="action-inner plugin-activation-redirect">
				                            <h3 class="action-title"><?php echo esc_html($vw_writer_blog_actionValue['title']); ?></h3>
				                            <div class="action-desc"><?php echo esc_html($vw_writer_blog_actionValue['desc']); ?></div>
				                            <?php echo wp_kses_post($vw_writer_blog_actionValue['link']); ?>
				                        </div>
					                </div>
					            <?php endforeach;
					        endif; ?>
					    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'vw-writer-blog' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-writer-blog-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','vw-writer-blog'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','vw-writer-blog'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','vw-writer-blog'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','vw-writer-blog'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','vw-writer-blog'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','vw-writer-blog'); ?></span></b></p>
	              	<div class="vw-writer-blog-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','vw-writer-blog'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','vw-writer-blog'); ?></span></p>
			    </div>
			<?php } ?>
		</div>
		
		<div id="writer_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-writer-blog' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('This WordPress themes for writers has a sleek and chic design with stunning and alluring look and strong foundation of its base. It can be used by writers, authors, journalists, editors and anyone concerned with literature world to instantly start blogging the thoughts and ideas that come to their minds without worrying about the tons of responsibilities that come with a website. The theme is for multiple purposes and can also be used by online book stores, eBook portals, book shops, publishing units, libraries, online media library, reading clubs, online discussion forums, book hubs and stores selling online movies, music and video games. Its typography is given special attention to enhance readability which should always be a priority in a writer theme. This WordPress themes for writers with vast space keeps you focused on content. Though it is a premium theme that comes packed with some plugins but still it loads fast enhancing user experience.','vw-writer-blog'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_WRITER_BLOG_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-writer-blog'); ?></a>
					<a href="<?php echo esc_url( VW_WRITER_BLOG_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-writer-blog'); ?></a>
					<a href="<?php echo esc_url( VW_WRITER_BLOG_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-writer-blog'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-writer-blog' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-writer-blog'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-writer-blog'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-writer-blog'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-writer-blog'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-writer-blog'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-writer-blog'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-writer-blog'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-writer-blog'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-writer-blog'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-writer-blog'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-writer-blog'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-writer-blog'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-writer-blog'); ?></td>
								<td class="table-img"><?php esc_html_e('8', 'vw-writer-blog'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-writer-blog'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-writer-blog'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-writer-blog'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-writer-blog'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-writer-blog'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-writer-blog'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-writer-blog'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_WRITER_BLOG_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-writer-blog'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-writer-blog'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-writer-blog'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_WRITER_BLOG_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-writer-blog'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-writer-blog'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-writer-blog'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_WRITER_BLOG_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-writer-blog'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-writer-blog'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-writer-blog'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_WRITER_BLOG_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-writer-blog'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-writer-blog'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-writer-blog'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_WRITER_BLOG_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-writer-blog'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-writer-blog'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-writer-blog'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_WRITER_BLOG_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-writer-blog'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>