<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="page" class="site folio-page">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>

	<div class="site-content-contain">
		<div id="content" class="site-content">
			<!-- add skeleton responsive grid -->
			<div class="wrap container content-area">
				<main id="main" class="site-main" role="main">

					<?php
					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							//get_template_part( 'template-parts/post/content', get_post_format() );

						endwhile;

					else :

						get_template_part( 'template-parts/post/content', 'none' );

					endif;
					?>


<?php 

// the query
$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>

<?php 
$count =1;
// open div before
echo '<div class="row masonry image-holder">';

if ( $wpb_all_query->have_posts() ) : while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
	<div class="column-custom column one-half">
		<!-- thumbnail -->
		<?php if ( has_post_thumbnail() ) : ?>
		<?php the_post_thumbnail(); ?>
		<!-- background hover -->
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<div class="hover" style="background-color:<?php the_field( 'hover_color' ); ?>"></div>
		</a>
		<div class="info">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<h3><?php the_category(' / '); ?></h3>
		</div>
	</div>
	<?php endif; ?>

		<?php 
			//if($count % 2 == 0) {echo '</div><div class="row">';}

			$count++;
		?>

	<?php endwhile; ?>
	<!-- end of the loop -->

</div>

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</div>


					</main><!-- #main -->
				</div>
			</div><!-- .wrap -->

<?php get_footer(); ?>