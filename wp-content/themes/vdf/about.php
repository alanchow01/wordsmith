<?php
/**
*
* Template Name: About Page
*
*/

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		//$upload_path = content_url() . '/uploads/';
		$loop = CFS()->get('about_sections');
		foreach($loop as $row) : ?>
		<?php if ( !$row['section_image'] ): ?>
			<section class="post-section">
				<div class="content-wrap author-info">
					<?php echo $row['content'];?>
				</div>
			</section>
		<?php else: ?>
			<section class="post-section"style="background: #227722 url('<?php echo $row['section_image']?>') no-repeat 0 50%; background-size: cover;">
			</section>
			<section class="post-section">
				<div class="content-wrap author-info">
					<?php echo $row['content'];?>
				</div>
			</section>
		<?php endif;?>
	<?php endforeach; ?>
	
</main><!-- #main -->
</div><!-- #primary -->

<?php include_once 'inc/svg-paths.php' ?>

<?php
get_footer();
