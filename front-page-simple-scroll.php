<?php
/**
 * This file adds the home page to Kreativ theme
 */

// Kreativ front page init.

add_action( 'genesis_meta', 'kreativ_front_page_init' );
function kreativ_front_page_init() {
		// Enqueue scripts.
		add_action( 'wp_enqueue_scripts', 'kreativ_home_scripts' );
		function kreativ_home_scripts() {
			wp_enqueue_style( 'whlr-front-css', get_stylesheet_directory_uri() . '/css/style-front.css' );
			wp_enqueue_script( 'loco-js-home', get_stylesheet_directory_uri() . '/js/scroll.js');
			
		}

		// Add front-page body class.
		add_filter( 'body_class', 'kreativ_body_class' );
		function kreativ_body_class( $classes ) {
			$classes[] = 'front-page';
			return $classes;
		}

		// Force full width content layout.
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

		// Remove the default Genesis loop.
		remove_action( 'genesis_loop', 'genesis_do_loop' );

		// Add homepage widgets.
		add_action( 'genesis_loop', 'kreativ_front_page_widgets' );
}

// Add markup for front page widgets.
function kreativ_front_page_widgets() {
	?>
    <div class="homeSection__container">
		<section class="homeSection">
			<div class="homeSection__ic homeSection__ic--right" data-scrollama-index="0">
				<div class="homeSection__icImg">
					<div class="homeSection__icImgWrapper">
						<div class="image" style="background:linear-gradient(to bottom, blue 0%, red 100%);"></div>
						<div class="imagePlaceholder"></div>
					</div>
				</div>
				<div class="homeSection__icContent">
					<p class="homeSection__isContentSubTitle">Explore Properties</p>
					<h3 class="homeSection__isContentTitle">An Industry Leading REIT</h3>
					<p class="homeSection__isContentText">WHLR is a real estate investment trust that owns a portfolio of grocery-anchored shopping centers in secondary and tertiary markets from Florida to Massachusetts, totaling over approximately eight million square feet.</p>
					<div class="homeSection__isContentBtn">
						<a href="#" class="button button-alt pelement">View All Properties</a>
					</div>
				</div>
			</div>
		</section>
		<section class="homeSection" data-scrollama-index="0">
			<div class="homeSection__ic homeSection__ic--left">
				<div class="homeSection__icImg">
					<div class="homeSection__icImgWrapper">
						<div class="image" style="background:red;"></div>
						<div class="imagePlaceholder"></div>
					</div>
				</div>
				<div class="homeSection__icContent">
					<p class="homeSection__isContentSubTitle">investor information</p>
					<h3 class="homeSection__isContentTitle">Your Success Is Our Mission</h3>
					<p class="homeSection__isContentText">We believe in driving profitability for not only our tenants, but for our current and future investors. We carefully analyze markets, tenant-to-tenant relations, and strategic partnerships so that we can directly influence the success of our entire portfolio. </p>
					<div class="homeSection__isContentBtn">
						<a href="#" class="button button-alt pelement">View Investor Information</a>
					</div>
				</div>
			</div>
		</section>
	</div>
	<script>
		enterView({
	selector: '.homeSection__ic',
	enter: function(el) {
		el.classList.add('in-view');
	}
});
	</script>
	<?php

}

// Run the Genesis loop.
genesis();
