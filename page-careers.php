<?php
/**
 * Template Name: Careers
 * Description: Used as a page template to show page contents, followed by a loop through the open positions.  
 */

remove_action ('genesis_loop', 'genesis_do_loop'); // Remove the standard loop
add_action( 'genesis_loop', 'custom_do_grid_loop' ); // Add custom loop

function custom_do_grid_loop() {  

  	
	
	
	// Intro Text (from page content)
	echo '<div class="page hentry entry whlr-careers">';
	echo '<header class="entry-header"><h1 class="entry-title">'. get_the_title() .'</h1></header>';

	
	if( have_posts() ):
	
		while( have_posts() ): the_post(); 
		
			echo '<div class="entry-content">' . get_the_content(); 
		
		endwhile;
		
	endif;


	$args = array(
		'post_type' => 'careers',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page' => -1
	);
	$loop = new WP_Query( $args );
	
	if( $loop->have_posts() ):
		echo '<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background" style="background-color:#ebc307;color:#ebc307">';
        echo '<div class="whlrCareers__container justify-content-between align-items-center">';
	
		while( $loop->have_posts() ): $loop->the_post(); global $post;
	
            
                $jp__title = get_field('jp__title');
                $jp__jobFile = get_field('jp__jobFile');

                ?>
                    <div class="row whlrCareers__post">
                        <div class="col-md-8 whlrCareers__post--position">
                            <p class="subTitle mb-0"><?php echo $jp__title; ?></p>
                        </div>
                        <div class="col-md-4 whlrCareers__post--description">
                            <a href="<?php echo $jp__jobFile; ?>" class="btn--whlr" target="_blank">View Job Description</a>
                        </div>
                    </div>
        
                <?php 
            
	
		
		endwhile;
        echo '</div>';

	endif;
	
	
	
	// -----------------
	
	
	
	echo '</div><!-- end .entry-content -->';
	echo '</div><!-- end .page .hentry .entry -->';
}
	
//* Remove the breadcrumb navigation
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );


//* Remove the post meta function
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );	
 
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
genesis();