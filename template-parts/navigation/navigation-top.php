<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
<!-- desktop nav -->
<div class="desktop-nav">
	<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'twentyseventeen' ); ?>">
		
		<!-- logo link -->
		<span class="logo-link"><?php get_template_part('svg/inline', 'logo-lean.svg'); ?></span>
		<!-- logo link -->

		<!-- menu button -->
		<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
			<?php echo twentyseventeen_get_svg( array( 'icon' => 'bars' ) ); echo twentyseventeen_get_svg( array( 'icon' => 'close' ) ); _e( 'Menu', 'twentyseventeen' ); ?>
		</button>
		<!-- menu button -->

		<!-- nav menu -->
		<?php wp_nav_menu( array(
			'theme_location' => 'top',
			'menu_id'        => 'top-menu',
			'items_wrap' => my_nav_wrap()
		) ); ?>
		<!-- nav menu -->
	</nav><!-- #site-navigation -->
	<div class="address">
		<a class="header-email" href="mailto:lara@visionarycreative.com.au" target="_blank">lara@visionarycreative.com.au</a>
		<a class="header-phone" href="tel:0400-332-296">0400 332 296</a>
	</div>
</div>


<!-- mobile nav -->
<div class="mobile-nav"><!--
	--><nav id="site-navigation" class="main-navigation mobile-nav-container" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'twentyseventeen' ); ?>"><!--
		--><span class="logo-link nav-column"><?php get_template_part('svg/inline', 'logo-lean.svg'); ?></span><!--
		--><button class="menu-toggle nav-column" aria-controls="top-menu" aria-expanded="false"><?php echo twentyseventeen_get_svg( array( 'icon' => 'bars' ) ); echo twentyseventeen_get_svg( array( 'icon' => 'close' ) ); _e( 'Menu', 'twentyseventeen' ); ?></button><!--
		--><div class="address nav-column"><!--
			--><a class="fa fa-envelope-o" href="mailto:lara@visionarycreative.com.au" target="_blank"></a><!--
			--><a class="fa fa-phone" href="tel:0400-332-296" target="_blank"></a><!--
		--></div><!--
	--></nav><!-- #site-navigation -->
	<!-- nav menu -->
	<?php wp_nav_menu( array(
		//'menu_class'		=> 'column one-third',
		'theme_location'	=> 'top',
		'menu_id'			=> 'top-menu',
		//'items_wrap'		=> my_nav_wrap()
	) ); ?>
	<!-- nav menu -->
</div>
