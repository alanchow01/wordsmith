<?php
/**
* Template part for displaying page content in single-story.php.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Wordsmith
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
		<header class="entry-header">
			<?php /*
			<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large' ); ?>
			*/?>
			<?php if (has_post_thumbnail() ): ?>
				<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
				<div class="post-pict"  style="background: url('<?php echo $thumb[0];?>') no-repeat 0 50%; background-size: cover;">
				</div>

			<?php else: ?>
				<div class="no-post-image"></div>
			<?php endif; ?>

			<div class="post-credits">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<div class="entry-meta">
					<?php feistner_posted_on(); ?>
				</div><!-- .entry-meta -->
			</div>
		</header><!-- .entry-header -->
		<div class="blog-post-wrapper">
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
				'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->
			<footer class="entry-footer">
				<?php feistner_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>
	</article><!-- #post-## -->
