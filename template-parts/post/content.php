<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if ( is_sticky() && is_home() ) :
			echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
		endif;
	?>

	<div class="container">
		<div class="row">
			<div class="column one-half">
				<a class="title-click open-content" href="javascript:void(0);">
					<h1 class="title"><?php echo the_title(); ?><?php get_template_part('svg/inline', 'plus.svg'); ?></h1>
				</a>
			</div>
			<div class="column one-half">
				
			</div>
		</div>
	</div>

	

	<div class="entry-content">
		<div class="hidden-content">
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
					get_the_title()
				) );
			?>
		</div>

		<?php if( have_rows('images') ): ?>

			<?php while( have_rows('images') ): the_row(); 
				// vars
				$image = get_sub_field('image');
				?>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />

			<?php endwhile; ?>

		<?php endif; ?>

	</div><!-- .entry-content -->
</article><!-- #post-## -->