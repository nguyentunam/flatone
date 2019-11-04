<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package flatone
 */

	$post_category = get_the_category()[0];

?>

<?php
	$pages = get_posts([
		'post_type' => 'page',
		'meta_query' => [
			[
				'key' => 'show_on_category',
				'value' => $post_category->term_id,
				'compare' 	=> 'LIKE'
			]
		],
		'post_status' => 'publish',
	]);

	if (sizeof($pages) > 0) {
		$page = $pages[0];

		$temp = $post;

		foreach ($pages as $post) {
			// var_dump($post);
			// echo "<hr/>";
			get_template_part( 'template-parts/content', 'page' );
		}

		$post = $temp;
	}
?>


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<header class="page-header">
				<?php
				$title = $post_category->name;
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
						'title_li' => '',
						'current_category' => $post_category->term_id
					]);
				?>
			</ul>
		</div>
		<div class="col-md-8">
			<?php
				if (sizeof($pages) > 0) {
					$temp = $post;
					foreach ($pages as $post) {
						the_field('description');
					}
					$post = $temp;
				}
			?>

			<div class=''>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry-header">
						<?php
						if ( is_singular() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;

						if ( 'post' === get_post_type() ) :
							?>
							<div class="entry-meta">
								<?php
								// flatone_posted_on();
								// flatone_posted_by();
								?>
							</div>
						<?php endif; ?>
						</div>

					<?php //flatone_post_thumbnail(); ?>

					<div class="entry-content">
						<?php
						the_content( sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'flatone' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						) );

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'flatone' ),
							'after'  => '</div>',
						) );
						?>
					</div><!-- .entry-content -->

					<div class="entry-footer">
						<?php //flatone_entry_footer(); ?>
						</div><!-- .entry-footer -->
				</div><!-- #post-<?php the_ID(); ?> -->
	
			</div>
		</div>
	</div>
</div>

