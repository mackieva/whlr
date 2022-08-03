<?php
/**
 * Template Name: Team
 * Description: Used as a page template to show page contents, followed by a loop through the team leaders.  
 * 
 */


remove_action ('genesis_loop', 'genesis_do_loop'); // Remove the standard loop
add_action( 'genesis_loop', 'custom_do_grid_loop' ); // Add custom loop

function custom_do_grid_loop() {  

  	
	
	
	// Intro Text (from page content)
	echo '<div class="page hentry entry leadership-team">';
	echo '<header class="entry-header"><h1 class="entry-title">'. get_the_title() .'</h1></header>';
	
	if( have_posts() ):
	
		while( have_posts() ): the_post(); 
		
			echo '<div class="entry-content">' . get_the_content(); 
		
		endwhile;
		
	endif;


	$args = array(
		'post_type' => 'team',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page' => -1
	);
	$loop = new WP_Query( $args );
	
	if( $loop->have_posts() ):

        echo '<div class="whlrTeam__container">';
	
		while( $loop->have_posts() ): $loop->the_post(); global $post;
	
            
                $tm__job_title = get_field('tm__job_title');
                $tm__bio = get_field('tm__bio');
                $tm__headshot = get_field('tm__headshot');

                ?>
                    <div class="whlrTeam__member">
                        <?php if( !empty($tm__headshot) ):  ?>
                            <img src="<?php echo $tm__headshot; ?>" class="aligncenter">
                        <?php  endif;  ?> 
                        <h3 class="whlrTeam__title"><?php echo get_the_title(); ?></h3>
                        <p class="subTitleTight"><?php echo $tm__job_title; ?></p>
                        <?php
                            $trimmed_text = wp_trim_excerpt_modified( $tm__bio, 15 );
                            $last_space = strrpos( $trimmed_text, ' ' );
                            $modified_trimmed_text = substr( $trimmed_text, 0, $last_space );
                            echo $modified_trimmed_text . '...';
                        ?>
                        <p><a href="<?php echo the_permalink(); ?>" class="btn--whlr">View Full Biography</a></p>
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

//* Remove the post info function
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

//* Remove the post meta function
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );	
 
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
genesis();