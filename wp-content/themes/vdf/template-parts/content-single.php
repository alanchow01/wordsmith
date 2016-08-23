<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wordsmith
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<div class="content-wrap">

	<header class="entry-header">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php $backgroundImg = the_post_thumbnail( 'large' ); ?>
			<div style="background: url('<?php echo $backgroundImg; ?>'); height: 100px;" >
		<?php endif; ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php feistner_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

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
