<?php
/**
*
* Template Name: About Page
*
*/

get_header(); ?>

<div id="primary" class="content-area tab">
	<main id="main" class="site-main" role="main">
<?php
$loop = CFS()->get('about_sections');
foreach($loop as $row) : ?>
					<?php
					$values = $row['image_placement']; ?>
					<?php foreach($values as $key=>$position): ?>
						<?php if ($position === 'Right'): ?>
							<section class="post-section content-first">
								<div class="content-wrap general-info">
									<?php echo $row['content']; ?>
								</div>
							</section>
							<section class="post-section img-sec">
								<div class="post-img-wrap skew-left" style="background: #227722 url('<?php echo $row['section_image']?>') no-repeat 0 50%; background-size: cover;">
								</div>
							</section>

						<?php else: ?>

						<section class="post-section img-first">
							<div class="post-img-wrap skew-right" style="background: #227722 url('<?php echo $row['section_image']?>') no-repeat 0 50%; background-size: cover;">
							</div>
						</section>
							<section class="post-section content-sec">
								<div class="content-wrap general-info">
									<?php echo $row['content']; ?>
								</div>
							</section>
						<?php endif; ?>
					<?php endforeach; ?>
<?php endforeach; ?>
</main>
</div>

<div id="primary" class="content-area mobile">
	<main id="main" class="site-main" role="main">
		<?php
		$loop = CFS()->get('about_sections');
		foreach($loop as $row) : ?>
				<section class="post-section">
					<div class="post-img-wrap" style="background: #227722 url('<?php echo $row['section_image']?>') no-repeat 0 50%; background-size: cover;">
					</div>
				</section>
			<section class="post-section">
				<div class="content-wrap general-info">
					<?php echo $row['content'];?>
				</div>
			</section>
	<?php endforeach; ?>
</main><!-- #main -->
</div><!-- #primary -->

<?php include_once 'inc/svg-paths.php' ?>

<?php
get_footer();
