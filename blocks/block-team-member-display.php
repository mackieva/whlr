<?php
//Variables
$team_member = block_value( 'team-member-display' );

// The Query
$the_query = new WP_Query( 
    array( 
        'post_type' => 'team'
        ) 
);

// The Loop
if ($the_query->have_posts()) {
    while ($the_query->have_posts()) {
        $the_query->the_post();
        $tm__job_title = get_field(tm__job_title);
        ?>

        <div class="whlr-teamMember">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            <h3><?php $tm__job_title ?></h3>
            <a class="gcb-game-reviews__button" href="<?php the_permalink(); ?>">Read Review</a>
        </div>
        <?php
    }
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();
?>