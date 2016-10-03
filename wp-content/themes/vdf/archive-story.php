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
			<!--div class="content-wrap general-info"-->
				<?php if ( CFS()->get('story_cover') ) : ?>
					<div class="content-wrap general-info flex">
					<div class="book-covers">
						<img src="<?php echo CFS()->get('story_cover'); ?>" alt=""/>
					</div>
				<?php else : ?>
				<div class="content-wrap general-info">
				<?php endif; ?>
				<div class="write-up">
					<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
				</div>
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

<?php get_sidebar();?>
<?php get_footer(); ?>
