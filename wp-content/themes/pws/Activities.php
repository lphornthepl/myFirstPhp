<?php
/*
Template Name: Activities
*/
get_header();
?>
<div class="container">
	<div class="row">
	<?php
	
		// WP_Query arguments
		$args = array (
			'post_type'			=> 'activity',
			'post_status'		=> 'publish',
			'posts_per_page'	=> '50',
		);
		
		// The Query
		$temp = $wp_query;
		$wp_query= null;
		$wp_query = new WP_Query( $args );
		while ($wp_query->have_posts()) : $wp_query->the_post(); 
		$activity_name = get_field('name');
		$activity_thumb = get_field('thumbnail');
		?>
			<div class="col-lg-4">
				<div class="activity-card">
					<div class="activity-thumb">
						<img class="thumb-img" src="<?php echo $activity_thumb['url']; ?>">
					</div>
					<div class="activity-name">
						<h3><?php echo $activity_name ?></h3>
					</div>
				</div>
			</div>
		<?php
		// print_r($activity_name);
		// print_r($activity_thumb['url']);

				endwhile;
				get_footer();
				?>
	</div>
</div>
	
<style>
	:root {
		--black-12: rgba(0, 0, 0, .12);
	}
	.activity-card {
		width: 100%;
		border: 1px solid var(--black-12);
		border-radius: 8px;
		margin-bottom: 32px;
	}
	.activity-thumb {
		filter: grayscale(60%);
		transition: all 1s;
		overflow: hidden;
		background-clip: border-box;
	}
	.activity-thumb:hover {
		filter: grayscale(0%);
	}
	.thumb-img {
		height: 200px;
		width: auto;
		transform: scale(1);
		transition: all 1s;
	}
	.thumb-img:hover {
		height: 200px;
		width: auto;
		transform: scale(1.1);
	}
	.activity-name {
		padding: 8px;
	}
</style>

