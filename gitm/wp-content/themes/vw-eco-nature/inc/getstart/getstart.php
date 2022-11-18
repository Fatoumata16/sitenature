<?php
//about theme info
add_action( 'admin_menu', 'vw_eco_nature_gettingstarted' );
function vw_eco_nature_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Eco Nature', 'vw-eco-nature'), esc_html__('About VW Eco Nature', 'vw-eco-nature'), 'edit_theme_options', 'vw_eco_nature_guide', 'vw_eco_nature_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_eco_nature_admin_theme_style() {
   wp_enqueue_style('vw-eco-nature-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-eco-nature-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_eco_nature_admin_theme_style');

//guidline for about theme
function vw_eco_nature_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-eco-nature' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Eco Nature Theme', 'vw-eco-nature' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-eco-nature'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Eco Nature at 20% Discount','vw-eco-nature'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-eco-nature'); ?> ( <span><?php esc_html_e('vwpro20','vw-eco-nature'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( VW_ECO_NATURE_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-eco-nature' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="vw_eco_nature_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-eco-nature' ); ?></button>
			<button class="tablinks" onclick="vw_eco_nature_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-eco-nature' ); ?></button>
			<button class="tablinks" onclick="vw_eco_nature_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-eco-nature' ); ?></button>
			<button class="tablinks" onclick="vw_eco_nature_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'vw-eco-nature' ); ?></button>
			<button class="tablinks" onclick="vw_eco_nature_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'vw-eco-nature' ); ?></button>
			<button class="tablinks" onclick="vw_eco_nature_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-eco-nature' ); ?></button>
		</div>

		<!-- Tab content -->
		<?php
			$vw_eco_nature_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_eco_nature_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Eco_Nature_Plugin_Activation_Settings::get_instance();
				$vw_eco_nature_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-eco-nature-recommended-plugins">
				    <div class="vw-eco-nature-action-list">
				        <?php if ($vw_eco_nature_actions): foreach ($vw_eco_nature_actions as $key => $vw_eco_nature_actionValue): ?>
				                <div class="vw-eco-nature-action" id="<?php echo esc_attr($vw_eco_nature_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_eco_nature_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_eco_nature_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_eco_nature_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-eco-nature'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_eco_nature_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-eco-nature' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('VW Eco Nature focuses perfectly on nature and is an eco-friendly theme of premium level having the multipurpose capabilities as a result making it a perfect fit for the conservation, landscaping as well as businesses related to solar energy and sectors like agriculture. It is a perfect theme with responsiveness, perfection having the personalization options. It is SEO friendly with the optimised codes making it perfect for the sectors like animal husbandry apart from bio produce. It is animated and has bootstrap feature making it good for the nature photographers as well as nature oriented businesses. VW Eco nature theme is a perfect choice for the lawn servicing businesses and the landscaping companies because of its modern looks, the customization options alongwith luxurious touch. It is also good for the gardener business apart from various agriculture companies and one can craft the exceptional website related to the lawn services. If you want to make a website related to the environmental project blog, VW Eco Themes is a good choice having some genuine features like translation readiness and clean code.','vw-eco-nature'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-eco-nature' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-eco-nature' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_ECO_NATURE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-eco-nature' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-eco-nature'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-eco-nature'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-eco-nature'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-eco-nature'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-eco-nature'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_ECO_NATURE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-eco-nature'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-eco-nature'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-eco-nature'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_ECO_NATURE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-eco-nature'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-eco-nature' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-eco-nature'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_eco_nature_topbar') ); ?>" target="_blank"><?php esc_html_e('Topbar Settings','vw-eco-nature'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_eco_nature_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Section','vw-eco-nature'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_eco_nature_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-eco-nature'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-eco-nature'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-admin-customizer"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=vw_eco_nature_typography') ); ?>" target="_blank"><?php esc_html_e('Typography','vw-eco-nature'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_eco_nature_blog_post') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-eco-nature'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_eco_nature_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-eco-nature'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_eco_nature_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-eco-nature'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-eco-nature'); ?></a>
								</div> 
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-eco-nature'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-eco-nature'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-eco-nature'); ?></span><?php esc_html_e(' Go to ','vw-eco-nature'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-eco-nature'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-eco-nature'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-eco-nature'); ?></span><?php esc_html_e(' Go to ','vw-eco-nature'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-eco-nature'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-eco-nature'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-eco-nature'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vw-eco-nature/" target="_blank"><?php esc_html_e('Documentation','vw-eco-nature'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Eco_Nature_Plugin_Activation_Settings::get_instance();
				$vw_eco_nature_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-eco-nature-recommended-plugins">
				    <div class="vw-eco-nature-action-list">
				        <?php if ($vw_eco_nature_actions): foreach ($vw_eco_nature_actions as $key => $vw_eco_nature_actionValue): ?>
				                <div class="vw-eco-nature-action" id="<?php echo esc_attr($vw_eco_nature_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_eco_nature_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_eco_nature_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_eco_nature_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-eco-nature'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_eco_nature_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'vw-eco-nature' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-eco-nature'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','vw-eco-nature'); ?></span></b></p>
	              	<div class="vw-eco-nature-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-eco-nature'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

	            <div class="block-pattern-link-customizer">
	              	<div class="link-customizer-with-block-pattern">
							<h3><?php esc_html_e( 'Link to customizer', 'vw-eco-nature' ); ?></h3>
							<hr class="h3hr">
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-eco-nature'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_eco_nature_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-eco-nature'); ?></a>
									</div>
								</div>
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-eco-nature'); ?></a>
									</div>
									
									<div class="row-box2">
										<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_eco_nature_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-eco-nature'); ?></a>
									</div>
								</div>

								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_eco_nature_blog_post') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-eco-nature'); ?></a>
									</div>
									 <div class="row-box2">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_eco_nature_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-eco-nature'); ?></a>
									</div> 
								</div>
								
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_eco_nature_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-eco-nature'); ?></a>
									</div>
									 <div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-eco-nature'); ?></a>
									</div> 
								</div>
							</div>
					</div>	
				</div>
	        </div>
		</div>

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Eco_Nature_Plugin_Activation_Settings::get_instance();
			$vw_eco_nature_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-eco-nature-recommended-plugins">
				    <div class="vw-eco-nature-action-list">
				        <?php if ($vw_eco_nature_actions): foreach ($vw_eco_nature_actions as $key => $vw_eco_nature_actionValue): ?>
				                <div class="vw-eco-nature-action" id="<?php echo esc_attr($vw_eco_nature_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_eco_nature_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_eco_nature_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_eco_nature_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-eco-nature' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-eco-nature-pattern-page">
		    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-eco-nature'); ?></a>
	    		</div>

	    		<div class="link-customizer-with-guternberg-ibtana">
					<h3><?php esc_html_e( 'Link to customizer', 'vw-eco-nature' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-eco-nature'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_eco_nature_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-eco-nature'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-eco-nature'); ?></a>
							</div>
							
							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_eco_nature_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-eco-nature'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_eco_nature_blog_post') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-eco-nature'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_eco_nature_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-eco-nature'); ?></a>
							</div> 
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_eco_nature_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-eco-nature'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-eco-nature'); ?></a>
							</div> 
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = VW_Eco_Nature_Plugin_Activation_Woo_Products::get_instance();
				$vw_eco_nature_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-eco-nature-recommended-plugins">
					    <div class="vw-eco-nature-action-list">
					        <?php if ($vw_eco_nature_actions): foreach ($vw_eco_nature_actions as $key => $vw_eco_nature_actionValue): ?>
					                <div class="vw-eco-nature-action" id="<?php echo esc_attr($vw_eco_nature_actionValue['id']);?>">
				                        <div class="action-inner plugin-activation-redirect">
				                            <h3 class="action-title"><?php echo esc_html($vw_eco_nature_actionValue['title']); ?></h3>
				                            <div class="action-desc"><?php echo esc_html($vw_eco_nature_actionValue['desc']); ?></div>
				                            <?php echo wp_kses_post($vw_eco_nature_actionValue['link']); ?>
				                        </div>
					                </div>
					            <?php endforeach;
					        endif; ?>
					    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'vw-eco-nature' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-eco-nature-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','vw-eco-nature'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','vw-eco-nature'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','vw-eco-nature'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','vw-eco-nature'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','vw-eco-nature'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','vw-eco-nature'); ?></span></b></p>
	              	<div class="vw-eco-nature-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','vw-eco-nature'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','vw-eco-nature'); ?></span></p>
			    </div>
			<?php } ?>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-eco-nature' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Eco nature WordPress Theme is a fine theme full of features like the CTA, responsive nature, retina ready, user-friendliness and by the end of the day, it is professional with personalization options making it a perfect fit green theme for farm produce and solar energy businesses. It is a sophisticated theme with fast page load time and the clean code apart from being animated and having the bootstrap framework making it fit for the environmental project blog website. Eco nature WordPress theme has the testimonial section, banner and besides this, it is not only interactive but stunning as well. It is modern, luxurious and translation ready making it good for global agriculture business websites or for the lawn services. It has the optimised codes as well as the faster page load time. It is a mobile friendly theme and you can create best of websites related to small or big agro businesses or gardener companies.','vw-eco-nature'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_ECO_NATURE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-eco-nature'); ?></a>
					<a href="<?php echo esc_url( VW_ECO_NATURE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-eco-nature'); ?></a>
					<a href="<?php echo esc_url( VW_ECO_NATURE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-eco-nature'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-eco-nature' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-eco-nature'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-eco-nature'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-eco-nature'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-eco-nature'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-eco-nature'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-eco-nature'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-eco-nature'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-eco-nature'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-eco-nature'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-eco-nature'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-eco-nature'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-eco-nature'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-eco-nature'); ?></td>
								<td class="table-img"><?php esc_html_e('13', 'vw-eco-nature'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-eco-nature'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-eco-nature'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-eco-nature'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-eco-nature'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-eco-nature'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-eco-nature'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-eco-nature'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_ECO_NATURE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-eco-nature'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-eco-nature'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-eco-nature'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_ECO_NATURE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-eco-nature'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-eco-nature'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-eco-nature'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_ECO_NATURE_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-eco-nature'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-eco-nature'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-eco-nature'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_ECO_NATURE_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-eco-nature'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-eco-nature'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-eco-nature'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_ECO_NATURE_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-eco-nature'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-eco-nature'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-eco-nature'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_ECO_NATURE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-eco-nature'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>