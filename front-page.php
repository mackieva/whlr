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
			wp_enqueue_style( 'loco-front-css', get_stylesheet_directory_uri() . '/css/locomotive-scroll.css' );
			wp_enqueue_style( 'splide-front-css', get_stylesheet_directory_uri() . '/css/splide.min.css' );
			wp_enqueue_style( 'whlr-front-css', get_stylesheet_directory_uri() . '/css/style-front.css' );
			wp_enqueue_script( 'plax-js', get_stylesheet_directory_uri() . '/js/simpleParallax.min.js');
			wp_enqueue_script( 'loco-js-home', get_stylesheet_directory_uri() . '/js/locomotive-scroll.min.js');
			wp_enqueue_script( 'splide-js-home', get_stylesheet_directory_uri() . '/js/splide.min.js');
		}

		// Add front-page body class.
		add_filter( 'body_class', 'kreativ_body_class' );
		function kreativ_body_class( $classes ) {
			$classes[] = 'front-page is-native-scroll y-scroll off loaded';
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
    <div class="homeSection__container" data-scroll-container>
		<!-- <div class="cursor-dot"></div>
		<div class="cursor-dot-outline"></div> -->
		<!-- WHLR AN REIT -->
		<section class="homeSection homeSection--first " data-scroll-section>
			<div class="row">
				<div class="col-md-6 d-flex justify-content-center align-items-center">
					<div class="homeSection__icContent" data-scroll>
						<p class="homeSection__isContentSubTitle">Explore Properties</p>
						<h3 class="homeSection__isContentTitle">An Industry Leading REIT</h3>
						<p class="homeSection__isContentText">WHLR is a real estate investment trust that owns a portfolio of grocery-anchored shopping centers in secondary and tertiary markets from Florida to Massachusetts, totaling over approximately eight million square feet.</p>
						<div class="homeSection__isContentBtn">
							<a href="#" class="btn--whlr pelement">View All Properties</a>
						</div>
					</div>
				</div>
				<div class="col-md-6 homeSection__imgWrapper" data-scroll>
					<img src="<?php echo get_bloginfo('wpurl') ?>/wp-content/themes/genesis-sample/images/img-demo.jpg" alt="Eplore Properties" class="laxx homeSection__img">
					<div class="imgPlaceholder"></div>
				</div>
			</div>
			<a
              class="scroll-hint goToPos"
              href="javascript:;"
              data-target=".scrollTo"
              data-offset="150"
            >
              <div class="scroll-hint__label">Scroll to explore</div>
            </a>
		</section>
		<!-- FEATURE PROPRETY SLIDER -->
		<section class="homeSection" data-scroll-section>
			<div class="splide" id="splideFeatured" role="group">
				<div class="splide__track">
					<ul class="splide__list">
						<li class="splide__slide">
								<div class="row">
									<div class="col-md-6 splide__slide--imgContainer">
										<img src="<?php echo get_bloginfo('wpurl') ?>/wp-content/uploads/img-demo.jpg" alt="Explore Properties - Village of Martinsville" class="laxx">
										<div class="imgPlaceholder"></div>
									</div>
									<div class="col-md-6 d-flex justify-content-center align-items-center">
										<div class="homeSection__icContent" data-scroll>
											<p class="homeSection__isContentSubTitle">Featured Property</p>
											<h3 class="homeSection__isContentTitle">Village of Martinsville</h3>
											<p class="homeSection__isContentText">WHLR is a real estate investment trust that owns a portfolio of grocery-anchored shopping centers in secondary and tertiary markets from Florida to Massachusetts, totaling over approximately eight million square feet.</p>
											<div class="homeSection__isContentBtn">
												<a href="#" class="btn--whlr pelement">Leasing Application</a><a href="#" class="btn--whlr btn--whlrAlt pelement">Property Details</a>
											</div>
										</div>
									</div>
								</div>
						</li>
						<li class="splide__slide">
								<div class="row">
									<div class="col-md-6 splide__slide--imgContainer"">
										<img src="<?php echo get_bloginfo('wpurl') ?>/wp-content/uploads/ft-howard.jpg" alt="Explore Properties - t. Howard Square" class="laxx">
										<div class="imgPlaceholder"></div>
									</div>
									<div class="col-md-6 d-flex justify-content-center align-items-center">
										<div class="homeSection__icContent" data-scroll>
											<p class="homeSection__isContentSubTitle">Featured Property</p>
											<h3 class="homeSection__isContentTitle">Ft. Howard Square</h3>
											<p class="homeSection__isContentText">Located in one of Savannah's fastest growing submarkets, this fully-leased center is anchored by a number of large national tenants - Harbor Freight Tools, Goodwill, and Bealls Outlet.</p>
											<div class="homeSection__isContentBtn">
												<a href="#" class="btn--whlr pelement">Leasing Application</a><a href="#" class="btn--whlr btn--whlrAlt pelement">Property Details</a>
											</div>
										</div>
									</div>
								</div>
						</li>
						<li class="splide__slide">
								<div class="row">
									<div class="col-md-6 splide__slide--imgContainer"">
										<img src="<?php echo get_bloginfo('wpurl') ?>/wp-content/uploads/franklin-village.jpg" alt="Explore Properties - Franklin Village Shopping Center" class="laxx">
										<div class="imgPlaceholder"></div>
									</div>
									<div class="col-md-6 d-flex justify-content-center align-items-center">
										<div class="homeSection__icContent" data-scroll>
											<p class="homeSection__isContentSubTitle">Featured Property</p>
											<h3 class="homeSection__isContentTitle">Franklin Village Shopping Center</h3>
											<p class="homeSection__isContentText">As one of several fully leased centers in WHLR's portfolio, a 1/2 mile from Armstrong County Memorial Hospital, the area's largest employer.</p>
											<div class="homeSection__isContentBtn">
												<a href="#" class="btn--whlr pelement">Leasing Application</a><a href="#" class="btn--whlr btn--whlrAlt pelement">Property Details</a>
											</div>
										</div>
									</div>
								</div>
						</li>
					</ul>
					<div class="splide__arrows"></div>
				</div>
			</div>
		</section>
		<!-- EXPLORE REGION ACCORDION -->
		<section class="homeSection" data-scroll-section>
			<div class="row">
				<div class="col-md-6 d-flex justify-content-center align-items-center">
					<div class="homeSection__icContent" data-scroll>
						<p class="homeSection__isContentSubTitle">Explore Regions</p>
						<div class="accordion accordion-flush" id="accordionRegionExplore">
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingOne">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
									North East
								</button>
								</h2>
								<div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="North East" data-bs-parent="#accordionRegionExplore">
									<div class="accordion-body explore-region-body">
										<div class="row">
											<div class="col-sm-6"><a href="#" class="btn--whlr">Maryland <i role="img" aria-label="GitHub" class="bi-geo-alt-fill"></i></a></div>
											<div class="col-sm-6"><a href="#" class="btn--whlr">New Jersey <i role="img" aria-label="GitHub" class="bi-geo-alt-fill"></i></a></div>
											<div class="col-sm-6"><a href="#" class="btn--whlr">Pennsylvania <i role="img" aria-label="GitHub" class="bi-geo-alt-fill"></i></a></div>
											<div class="col-sm-6"><a href="#" class="btn--whlr">Connecticut <i role="img" aria-label="GitHub" class="bi-geo-alt-fill"></i></a></div>
											<div class="col-sm-6"><a href="#" class="btn--whlr">Massachusets <i role="img" aria-label="GitHub" class="bi-geo-alt-fill"></i></a></div>
										</div>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingTwo">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
									Mid-Atlantic
								</button>
								</h2>
								<div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="Mid-Atlantic" data-bs-parent="#accordionRegionExplore">
									<div class="accordion-body explore-region-body">
										<div class="row">
											<div class="col-sm-6"><a href="#" class="btn--whlr">Kentucky <i role="img" aria-label="GitHub" class="bi-geo-alt-fill"></i></a></div>
											<div class="col-sm-6"><a href="#" class="btn--whlr">Tennessee <i role="img" aria-label="GitHub" class="bi-geo-alt-fill"></i></a></div>
											<div class="col-sm-6"><a href="#" class="btn--whlr">North Carolina <i role="img" aria-label="GitHub" class="bi-geo-alt-fill"></i></a></div>
											<div class="col-sm-6"><a href="#" class="btn--whlr">Virginia <i role="img" aria-label="GitHub" class="bi-geo-alt-fill"></i></a></div>
											<div class="col-sm-6"><a href="#" class="btn--whlr">West Virginia <i role="img" aria-label="GitHub" class="bi-geo-alt-fill"></i></a></div>
										</div>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingThree">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
									South East
								</button>
								</h2>
								<div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="South East" data-bs-parent="#accordionRegionExplore">
									<div class="accordion-body explore-region-body">
										<div class="row">
											<div class="col-sm-6"><a href="#" class="btn--whlr">Alabama <i role="img" aria-label="Alabama" class="bi-geo-alt-fill"></i></a></div>
											<div class="col-sm-6"><a href="#" class="btn--whlr">Georgia <i role="img" aria-label="Georgia" class="bi-geo-alt-fill"></i></a></div>
											<div class="col-sm-6"><a href="#" class="btn--whlr">North Carolina <i role="img" aria-label="North Carolina" class="bi-geo-alt-fill"></i></a></div>
											<div class="col-sm-6"><a href="#" class="btn--whlr">South Carolina <i role="img" aria-label="South Carolina" class="bi-geo-alt-fill"></i></a></div>
										</div>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingThree">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
									Mid-West
								</button>
								</h2>
								<div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="Mid-West" data-bs-parent="#accordionRegionExplore">
									<div class="accordion-body explore-region-body">
										<div class="row">
											<div class="col-sm-6"><a href="#" class="btn--whlr">Oklahoma <i role="img" aria-label="Oklahoma" class="bi-geo-alt-fill"></i></a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 homeSection__imgWrapper" data-scroll>
					<img src="<?php echo get_bloginfo('wpurl') ?>/wp-content/themes/genesis-sample/images/img-demo-2.jpg" alt="Eplore Properties" class="laxx homeSection__img">
					<div class="imgPlaceholder"></div>
				</div>
			</div>
		</section>
		<!-- METRICS -->
		<section class="homeSection metrics" data-scroll-section>
			<div class="row" data-scroll>
				<div class="col-md-4 firstStat">
					<p class="bodyXLrgCopy">76</p>
					<p class="bodySubCopy">Shopping Centers</p>
				</div>
				<div class="col-md-4 borders secondStat">
					<p class="bodyXLrgCopy">8 Million+</p>
					<p class="bodySubCopy">Square Feet</p>
				</div>
				<div class="col-md-4 thirdStat">
					<p class="bodyXLrgCopy">14</p>
					<p class="bodySubCopy">States</p>
				</div>
			</div>
			<div class="row flex justify-content-center pt-5 statBtn">
				<div class="col-md-4">
					<a href="#" class="btn--whlr">View Our Leasing Summary</a>
				</div>
			</div>
		</section>
		<!-- INVESTOR INFORMATION -->
		<section class="homeSection" data-scroll-section>
			<div class="row">
				<div class="col-md-6 homeSection__imgWrapper" data-scroll>
					<img src="<?php echo get_bloginfo('wpurl') ?>/wp-content/themes/genesis-sample/images/img-demo-3.jpg" alt="Eplore Properties" class="laxx homeSection__img">
					<div class="imgPlaceholder"></div>
				</div>
				<div class="col-md-6 d-flex justify-content-center align-items-center">
					<div class="homeSection__icContent" data-scroll>
						<p class="homeSection__isContentSubTitle">Investor Information</p>
						<h3 class="homeSection__isContentTitle">Your Success Is Our Mission</h3>
						<p class="homeSection__isContentText">We believe in driving profitability for not only our tenants, but for our current and future investors. We carefully analyze markets, tenant-to-tenant relations, and strategic partnerships so that we can directly influence the success of our entire portfolio. </p>
						<div class="homeSection__isContentBtn">
							<a href="#" class="btn--whlr pelement">View Investor Information</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- PARTNERS -->
		<section class="homeSection">
			<h3 class="bodyLrgCopy text-center mb-5">Partners</h3>
			<div class="splide" id="splidePartners" role="group">
				<div class="splide__track">
					<ul class="splide__list">
						<li class="splide__slide"><img src="<?php echo get_bloginfo('wpurl') ?>/wp-content/uploads/big-lots.png" alt="Big Lots" class="aligncenter"></li>
						<li class="splide__slide"><img src="<?php echo get_bloginfo('wpurl') ?>/wp-content/uploads/bjs.png" alt="BJs" class="aligncenter"></li>
						<li class="splide__slide"><img src="<?php echo get_bloginfo('wpurl') ?>/wp-content/uploads/dollar-tree.png" alt="Dollar Tree" class="aligncenter"></li>
						<li class="splide__slide"><img src="<?php echo get_bloginfo('wpurl') ?>/wp-content/uploads/food-lion.png" alt="Food Lion" class="aligncenter"></li>
						<li class="splide__slide"><img src="<?php echo get_bloginfo('wpurl') ?>/wp-content/uploads/gabes.png" alt="Gabes" class="aligncenter"></li>
						<li class="splide__slide"><img src="<?php echo get_bloginfo('wpurl') ?>/wp-content/uploads/hobby-Lobby.png" alt="Hobby Lobby" class="aligncenter"></li>
						<li class="splide__slide"><img src="<?php echo get_bloginfo('wpurl') ?>/wp-content/uploads/kroger.png" alt="Kroger" class="aligncenter"></li>
						<li class="splide__slide"><img src="<?php echo get_bloginfo('wpurl') ?>/wp-content/uploads/lowes.png" alt="Lowes" class="aligncenter"></li>
						<li class="splide__slide"><img src="<?php echo get_bloginfo('wpurl') ?>/wp-content/uploads/marshalls.png" alt="Marshalls" class="aligncenter"></li>
						<li class="splide__slide"><img src="<?php echo get_bloginfo('wpurl') ?>/wp-content/uploads/piggly-wiggly.png" alt="Piggly Wiggly" class="aligncenter"></li>
						<li class="splide__slide"><img src="<?php echo get_bloginfo('wpurl') ?>/wp-content/uploads/planet-fitness.png" alt="Planet Fitness" class="aligncenter"></li>
						<li class="splide__slide"><img src="<?php echo get_bloginfo('wpurl') ?>/wp-content/uploads/winn-dixie.png" alt="Winn Dixie" class="aligncenter"></li>
					</ul>
				</div>
			</div>
		</section>
	</div>
	<script>
		document.addEventListener( 'DOMContentLoaded', function() {
			var images = document.querySelectorAll('.laxx');
			new simpleParallax(images);
			var scroll = new LocomotiveScroll();
			new Splide( '#splidePartners', {
				autoplay: 'true',
				type: 'loop',
				perPage: 4,
                perMove: 1,
				padding:40,
				pagination:false,
				arrows:false,
				interval:2000,
				lazyLoad:'nearby',
			} ).mount();
			new Splide( '#splideFeatured', {
				autoplay: 'true',
				type: 'fade',
				perPage: 1,
                perMove: 1,
				pagination:false,
				lazyLoad:'nearby',
			} ).mount();
		} );
	</script>
	<?php

}

// Run the Genesis loop.
genesis();
