<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package flatone
 */

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
		
			// show category header
			flatone_category_header();

			get_template_part( 'template-parts/content', get_post_type() );

			echo '<div class="container" ><div class="row" ><div class="col-md-4" ></div><div class="col-md-8" >';

			// the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			echo '</div></div></div>';



		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
