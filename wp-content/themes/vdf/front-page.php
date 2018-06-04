<?php
/**
* The main template file.
*
* @package Wordsmith
*/

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		$id = 111; //58; //111;
		$post = get_post( $id );
		$content = apply_filters('the_content', $post->post_content);
		?>
		<section class="post-section">
			<div class="content-wrap general-info">
				<h1><?php echo $post->post_title; ?></h1>
				<?php echo $content; ?>
			</div>
		</section>

		<?php
		$args = array('post_type' => 'novels', 'posts_per_page' => -1);
		$all_stories = get_posts( $args );
		?>

		<?php if ( have_posts() ) : ?>
			<?php foreach($all_stories as $post) : setup_postdata( $post ); ?>
				<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

				<section class="post-section" style="background-color: rgba(0,0,0,0.8); background: linear-gradient(rgba(0,0,0,0.8)0%,rgba(0,0,0,0)100%), url('<?php echo $thumb[0];?>') no-repeat 0 50%; background-size: cover, cover;">
					<div class="content-wrap flex">
						<?php if ( CFS()->get('book_cover') ) : ?>
							<div class="book-covers">
								<img src="<?php echo CFS()->get('book_cover'); ?>" alt="" />
							</div>
					<?php endif; ?>
					<div class="write-up">
						<h2><?php the_title(); ?></h2>
						<span class="byline">
							<?php
							$values = CFS()->get( 'book_status' );
							foreach ( $values as $key => $label ) {
								echo $label;
							}
							?></span>
							<?php the_content(); ?>
						</div>
						<?endforeach; ?>
					</div>
				</section>
			<?php endforeach; wp_reset_postdata(); ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
		<?php
		$id = 547; //56; //113;
		$post = get_post( $id );
		$content = apply_filters('the_content', $post->post_content);
		?>
		<section class="post-section">
			<div class="content-wrap general-info">
				<h2><?php echo $post->post_title; ?></h2>
				<?php echo $content; ?>
			</div>
		</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php include_once 'inc/svg-paths.php' ?>

<?php
get_sidebar();
get_footer();
