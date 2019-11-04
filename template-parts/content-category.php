<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package flatone
 */

?>

<div class='col-md-4'>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php flatone_post_thumbnail(); ?>
		<dev class="title">
			<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

			?>
		</dev><!-- .entry-header -->

		<div class="excerpt">
			<?php 
				the_excerpt();
			?>
		</div>

	</div><!-- #post-<?php the_ID(); ?> -->
</div>

