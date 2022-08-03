<?php

/**
 * Template Name: Single Team Member Page
 * Description: Used as a page template to show single equipment post
 */



// Add Page Header
remove_action('genesis_after_header', 'showcase_page_header', 8 );
add_action( 'genesis_after_header', 'whlr_page_header', 8 );
function whlr_page_header() {
	$output = false;

		$image = get_post_thumbnail_id();


			$image = wp_get_attachment_image_src( $image, 'showcase_hero' );
			$background_image_class = 'with-background-image';
			$title = the_title( '<h2>', '</h2>', false );

			$output .= '<div class="page-header with-background-image"><div class="wrap"><img src="'. get_bloginfo('wpurl') . '/wp-content/uploads/whlr-bnr-7.jpg);" class="thumbnail" class="WHLR ' . $title . '">';
			$output .= '</div></div><script src="'.get_stylesheet_directory_uri().'/js/simpleParallax.js"></script><script>var image = document.getElementsByClassName("thumbnail");new simpleParallax(image);</script>';

	if( $output )
		echo $output;
}
remove_action ('genesis_loop', 'genesis_do_loop'); // Remove the standard loop
add_action( 'genesis_loop', 'custom_do_grid_loop' ); // Add custom loop
function custom_do_grid_loop() {

    $tm__job_title = get_field('tm__job_title');
    $tm__bio = get_field('tm__bio');
    $tm__headshot = get_field('tm__headshot');

	// Intro Text (from page content)
	echo '<div class="page hentry entry">';
	echo '<div class="entry-content">';
    ?>

    <div class="row">
        <div class="col-md-8">
            <h3 class="whlrTeam__title"><?php echo get_the_title(); ?></h3>
            <p class="subTitleTight"><?php echo $tm__job_title; ?></p>
            <?php echo $tm__bio; ?>
        </div>
        <div class="col-md-4">
            <img src="<?php echo $tm__headshot; ?>" class="aligncenter">
        </div>
    </div>
    <hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background" style="background-color:#ebc307;color:#ebc307">
    <h3 class="heading__3 mb-5 text-center">Wheeler Team</h3>

    <?php
    $args = array(
		'post_type' => 'team',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page' => -1,
        'post__not_in' => array( $post->ID )
        
	);

	$loop = new WP_Query( $args );
	
	if( $loop->have_posts() ):

        echo '<div class="whlrTeam__containerLinks d-grid">';
	
		while( $loop->have_posts() ): $loop->the_post(); global $post;
	
            
                $tm__job_title = get_field('tm__job_title');

                ?>
                    <div class="whlrTeam__memberLink">
                        <a href="<?php echo the_permalink(); ?>" class="btn--whlr">
                        <h3 class="whlrTeam__title"><?php echo get_the_title(); ?></h3>
                        <p class="subTitleTight"><?php echo $tm__job_title; ?></p>
                        </a>
                    </div>
        
                <?php 
            
	
		
		endwhile;
        echo '</div>';

	endif;

	echo '</div><!-- end .entry-content -->';
	echo '</div><!-- end .page .hentry .entry -->';
}

//* Remove the breadcrumb navigation
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

//* Remove the post info function
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

//* Remove the post meta function
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
genesis();
