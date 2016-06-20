<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wordsmith
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
							$args = array('post_type' => 'novels', 'posts_per_page' => -1);
							$all_stories = get_posts( $args );
							?>
							<?php if ( have_posts() ) : ?>
							<?php foreach($all_stories as $post) : setup_postdata( $post ); ?>
								<div class="fp-posts">
								<p><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
								<p><?php the_content(); ?></p>
							</div>
							<?php endforeach; wp_reset_postdata(); ?>
							<?php else : ?>
							<?php get_template_part( 'template-parts/content', 'none' ); ?>
							<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
