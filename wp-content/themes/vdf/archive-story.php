<?php
/**
* The template for displaying story archive pages.
*
* @link https://codex.wordpress.org/Template_Hierarchy
* Template Name: Stories Archive
* @package Wordsmith
*/

get_header(); ?>

<div id="primary" class="content-area flex">
	<main id="main" class="site-main" role="main">
		<section class="posts post-section">
			<div class="content-wrap general-info">
				<?php
				$id = 159;
				$post = get_post( $id );
				$content = apply_filters('the_content', $post->post_content);
				echo $content; ?>
			</div>
		</section>
		<?php
		if ( have_posts() ) : ?>

		<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post(); ?>
		<section class="posts post-section">
			<div class="content-wrap general-info">

				<?php /*
				* Include the Post-Format-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Format name) and that will be used instead.
				*/
				get_template_part( 'template-parts/content', get_post_format() ); ?>
			</div>
		</section>
	<?php endwhile;

	the_posts_navigation();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif; ?>
</main><!-- #main -->
</div><!-- #primary -->
<?php include_once 'inc/svg-paths.php' ?>

<?php //get_sidebar();?>
<?php get_footer(); ?>