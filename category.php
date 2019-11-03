<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package flatone
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<?php
				$category = get_queried_object();
				$pages = get_pages(array(
					'meta_query' => array(
						array(
							'key' => 'show_on_category', 
							'value' => $category->term_id, 
							'compare' => 'LIKE'
						)
					)
				));
				if (sizeof($pages) > 0) {
					foreach ($pages as $post) {
						get_template_part( 'template-parts/content', 'page' );
					}
				}
			?>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<header class="page-header">
							<?php
							$title = single_term_title('', false);
							echo '<h1>' . $title . '</h1>';
							the_archive_description( '<div class="archive-description">', '</div>' );
							?>
						</header><!-- .page-header -->
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<ul class="panel-category">
							<?php 
								wp_list_categories([
									'depth' => 1,
									'title_li' => ''
								]);
							?>
						</ul>
					</div>
					<div class="col-md-8">
						<?php 
						

							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content', 'category' );

							endwhile;

							the_posts_navigation();
						
						?>
					</div>
				</div>
			</div>

		<?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
