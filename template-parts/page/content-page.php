<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="">
		<!-- if using sidebar -->
		<?php if( get_field('right_column') ): ?>
			<div class="container">
				<div class="row">
					<div class="columns seven">
						<?php the_title( '<h3>', '</h3>' ); ?>
						<?php the_content(); ?>
					</div>
					<div class="columns five">
						<?php the_field('right_column'); ?>
					</div>
				</div>
			</div>

		<?php else :
			the_title( '<h3>', '</h3>' );
			the_content();

		endif; ?>
		<!-- if using sidebar -->
	</div><!-- .entry-content -->
</article><!-- #post-## -->
