<?php
/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<!-- show full page image on home if selected as YES in options -->
    
<?php if( get_field('full_page_image', 'option') ): ?>    
<div class="custom-header">

    <div class="custom-header-media">
        <?php the_custom_header_markup(); ?>
    </div>

    <?php get_template_part( 'template-parts/header/site', 'branding-2' ); ?>

</div><!-- .custom-header -->  
<?php endif; ?>