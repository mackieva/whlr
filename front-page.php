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
			wp_enqueue_script( 'loco-js-home', get_stylesheet_directory_uri() . '/js/locomotive-scroll.min.js');
			wp_enqueue_script( 'splide-js-home', get_stylesheet_directory_uri() . '/js/splide.min.js');
			
			//<script src='http://whlr.local/wp-content/themes/genesis-sample/js/js.js?ver=6.0' id='js-home-js'></script>
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
		<!-- WHLR AN REIT -->
		<section class="homeSection" data-scroll-section>
			<div class="homeSection__ic homeSection__ic--right" data-scroll>
				<div class="homeSection__icImg">
					<div class="homeSection__icImgWrapper" data-scroll-call="dynamicBackground" data-scroll-repeat>
						<div class="image" style="background-image:url(<?php echo get_bloginfo('wpurl') ?>/wp-content/themes/genesis-sample/images/240-W-Commonwealth-Blvd-Martinsville-VA-16.jpg);"></div>
						<div class="imagePlaceholder"></div>
					</div>
				</div>
				<div class="homeSection__icContent" data-scroll-sticky>
					<p class="homeSection__isContentSubTitle">Explore Properties</p>
					<h3 class="homeSection__isContentTitle">An Industry Leading REIT</h3>
					<p class="homeSection__isContentText">WHLR is a real estate investment trust that owns a portfolio of grocery-anchored shopping centers in secondary and tertiary markets from Florida to Massachusetts, totaling over approximately eight million square feet.</p>
					<div class="homeSection__isContentBtn">
						<a href="#" class="btn--whlr pelement">View All Properties</a>
					</div>
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
							<section class="homeSection" data-scroll-section>
								<div class="homeSection__ic homeSection__ic--left" data-scroll>
									<div class="homeSection__icImg">
										<div class="homeSection__icImgWrapper" data-scroll data-scroll-call="dynamicBackground" data-scroll-repeat>
											<div class="image" data-scroll style="background-image:url(<?php echo get_bloginfo('wpurl') ?>/wp-content/themes/genesis-sample/images/240-W-Commonwealth-Blvd-Martinsville-VA-16.jpg);"></div>
											<div class="imagePlaceholder"></div>
										</div>
									</div>
									<div class="homeSection__icContent" data-scroll-sticky>
										<p class="homeSection__isContentSubTitle">Featured Property</p>
										<h3 class="homeSection__isContentTitle">Property Title</h3>
										<p class="homeSection__isContentText">WHLR is a real estate investment trust that owns a portfolio of grocery-anchored shopping centers in secondary and tertiary markets from Florida to Massachusetts, totaling over approximately eight million square feet.</p>
										<div class="homeSection__isContentBtn">
											<a href="#" class="btn--whlr pelement">View All Properties</a><a href="#" class="btn--whlr btn--whlrAlt pelement">View All Properties</a>
										</div>
									</div>
								</div>
							</section>
						</li>
						<li class="splide__slide">
							<section class="homeSection" data-scroll-section>
								<div class="homeSection__ic homeSection__ic--left" data-scroll>
									<div class="homeSection__icImg">
										<div class="homeSection__icImgWrapper" data-scroll data-scroll-call="dynamicBackground" data-scroll-repeat>
											<div class="image" data-scroll style="background-image:url(<?php echo get_bloginfo('wpurl') ?>/wp-content/themes/genesis-sample/images/240-W-Commonwealth-Blvd-Martinsville-VA-16.jpg);"></div>
											<div class="imagePlaceholder"></div>
										</div>
									</div>
									<div class="homeSection__icContent" data-scroll-sticky>
										<p class="homeSection__isContentSubTitle">Featured Property</p>
										<h3 class="homeSection__isContentTitle">Property Title</h3>
										<p class="homeSection__isContentText">WHLR is a real estate investment trust that owns a portfolio of grocery-anchored shopping centers in secondary and tertiary markets from Florida to Massachusetts, totaling over approximately eight million square feet.</p>
										<div class="homeSection__isContentBtn">
											<a href="#" class="btn--whlr pelement">View All Properties</a><a href="#" class="btn--whlr btn--whlrAlt pelement">View All Properties</a>
										</div>
									</div>
								</div>
							</section>
						</li>
						<li class="splide__slide">
							<section class="homeSection" data-scroll-section>
								<div class="homeSection__ic homeSection__ic--left" data-scroll>
									<div class="homeSection__icImg">
										<div class="homeSection__icImgWrapper" data-scroll data-scroll-call="dynamicBackground" data-scroll-repeat>
											<div class="image" data-scroll style="background-image:url(<?php echo get_bloginfo('wpurl') ?>/wp-content/themes/genesis-sample/images/240-W-Commonwealth-Blvd-Martinsville-VA-16.jpg);"></div>
											<div class="imagePlaceholder"></div>
										</div>
									</div>
									<div class="homeSection__icContent" data-scroll-sticky>
										<p class="homeSection__isContentSubTitle">Featured Property</p>
										<h3 class="homeSection__isContentTitle">Property Title</h3>
										<p class="homeSection__isContentText">WHLR is a real estate investment trust that owns a portfolio of grocery-anchored shopping centers in secondary and tertiary markets from Florida to Massachusetts, totaling over approximately eight million square feet.</p>
										<div class="homeSection__isContentBtn">
											<a href="#" class="btn--whlr pelement">View All Properties</a><a href="#" class="btn--whlr btn--whlrAlt pelement">View All Properties</a>
										</div>
									</div>
								</div>
							</section>
						</li>
						<li class="splide__slide">
							<section class="homeSection" data-scroll-section>
								<div class="homeSection__ic homeSection__ic--left" data-scroll>
									<div class="homeSection__icImg">
										<div class="homeSection__icImgWrapper" data-scroll data-scroll-call="dynamicBackground" data-scroll-repeat>
											<div class="image" data-scroll style="background-image:url(<?php echo get_bloginfo('wpurl') ?>/wp-content/themes/genesis-sample/images/240-W-Commonwealth-Blvd-Martinsville-VA-16.jpg);"></div>
											<div class="imagePlaceholder"></div>
										</div>
									</div>
									<div class="homeSection__icContent">
										<p class="homeSection__isContentSubTitle">Featured Property</p>
										<h3 class="homeSection__isContentTitle">Property Title</h3>
										<p class="homeSection__isContentText">WHLR is a real estate investment trust that owns a portfolio of grocery-anchored shopping centers in secondary and tertiary markets from Florida to Massachusetts, totaling over approximately eight million square feet.</p>
										<div class="homeSection__isContentBtn">
											<a href="#" class="btn--whlr pelement">View All Properties</a><a href="#" class="btn--whlr btn--whlrAlt pelement">View All Properties</a>
										</div>
									</div>
								</div>
							</section>
						</li>
						<li class="splide__slide">
							<section class="homeSection" data-scroll-section>
								<div class="homeSection__ic homeSection__ic--left" data-scroll>
									<div class="homeSection__icImg">
										<div class="homeSection__icImgWrapper" data-scroll data-scroll-call="dynamicBackground" data-scroll-repeat>
											<div class="image" data-scroll style="background-image:url(<?php echo get_bloginfo('wpurl') ?>/wp-content/themes/genesis-sample/images/240-W-Commonwealth-Blvd-Martinsville-VA-16.jpg);"></div>
											<div class="imagePlaceholder"></div>
										</div>
									</div>
									<div class="homeSection__icContent">
										<p class="homeSection__isContentSubTitle">Featured Property</p>
										<h3 class="homeSection__isContentTitle">Property Title</h3>
										<p class="homeSection__isContentText">WHLR is a real estate investment trust that owns a portfolio of grocery-anchored shopping centers in secondary and tertiary markets from Florida to Massachusetts, totaling over approximately eight million square feet.</p>
										<div class="homeSection__isContentBtn">
											<a href="#" class="btn--whlr pelement">View All Properties</a><a href="#" class="btn--whlr btn--whlrAlt pelement">View All Properties</a>
										</div>
									</div>
								</div>
							</section>
						</li>
					</ul>
					<div class="splide__arrows"></div>
				</div>
			</div>
		</section>
		<!-- EXPLORE REGION ACCORDION -->
		<section class="homeSection" data-scroll-section>
			<div class="homeSection__ic homeSection__ic--right" data-scroll>
				<div class="homeSection__icImg">
					<div class="homeSection__icImgWrapper" data-scroll data-scroll-call="dynamicBackground" data-scroll-repeat>
						<div class="image" data-scroll style="background-image:url(<?php echo get_bloginfo('wpurl') ?>/wp-content/themes/genesis-sample/images/240-W-Commonwealth-Blvd-Martinsville-VA-16.jpg);"></div>
						<div class="imagePlaceholder"></div>
					</div>
				</div>
				<div class="homeSection__icContent" data-scroll-sticky>
					<div class="accordion accordion-flush" id="accordionRegionExplore">
						<div class="accordion-item">
							<h2 class="accordion-header" id="flush-headingOne">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
								North East
							</button>
							</h2>
							<div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="North East" data-bs-parent="#accordionRegionExplore">
							<div class="accordion-body">
								<a href="#" class="bth--whlr">Kentucky</a><a href="#" class="bth--whlr">Tennessee</a><a href="#" class="bth--whlr">North Carolina</a><a href="#" class="bth--whlr">Virginia</a><a href="#" class="bth--whlr">West Virginia</a>
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
							<div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
							</div>
						</div>
						<div class="accordion-item">
							<h2 class="accordion-header" id="flush-headingThree">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
								South East
							</button>
							</h2>
							<div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="South East" data-bs-parent="#accordionRegionExplore">
							<div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
							</div>
						</div>
						<div class="accordion-item">
							<h2 class="accordion-header" id="flush-headingThree">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
								Mid-West
							</button>
							</h2>
							<div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="Mid-West" data-bs-parent="#accordionRegionExplore">
							<div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- METRICS -->
		<section class="homeSection metrics" data-scroll-section>
			<div class="wrap">
				<div class="one-third first">
					<p class="bodyLrgCopy">76</p>
					<p class="bodySubCopy">Shopping Centers</p>
				</div>
				<div class="one-third borders">
					<p class="bodyLrgCopy">8 Million+</p>
					<p class="bodySubCopy">Square Feet</p>
				</div>
				<div class="one-third">
					<p class="bodyLrgCopy">14</p>
					<p class="bodySubCopy">States</p>
				</div>
			</div>
		</section>
		<!-- INVESTOR INFORMATION -->
		<section class="homeSection" data-scroll-section>
			<div class="homeSection__ic homeSection__ic--left" data-scroll>
				<div class="homeSection__icImg">
					<div class="homeSection__icImgWrapper" data-scroll data-scroll-call="dynamicBackground" data-scroll-repeat>
						<div class="image" data-scroll style="background-image:url(<?php echo get_bloginfo('wpurl') ?>/wp-content/themes/genesis-sample/images/240-W-Commonwealth-Blvd-Martinsville-VA-16.jpg);"></div>
						<div class="imagePlaceholder"></div>
					</div>
				</div>
				<div class="homeSection__icContent" data-scroll-sticky>
					<p class="homeSection__isContentSubTitle">investor information</p>
					<h3 class="homeSection__isContentTitle">Your Success Is Our Mission</h3>
					<p class="homeSection__isContentText">We believe in driving profitability for not only our tenants, but for our current and future investors. We carefully analyze markets, tenant-to-tenant relations, and strategic partnerships so that we can directly influence the success of our entire portfolio. </p>
					<div class="homeSection__isContentBtn">
						<a href="#" class="btn--whlr pelement">View Investor Information</a>
					</div>
				</div>
			</div>
		</section>
		<!-- PARTNERS -->
		<section class="homeSection">
			<h3 class="bodyLrgCopy text-center mb-3">Partners</h3>
			<div class="splide" id="splidePartners" role="group">
				<div class="splide__track">
					<ul class="splide__list">
						<li class="splide__slide"><img src="http://whlr.local/wp-content/uploads/big-lots.png" alt="" class="aligncenter"></li>
						<li class="splide__slide"><img src="http://whlr.local/wp-content/uploads/bjs.png" alt="" class="aligncenter"></li>
						<li class="splide__slide"><img src="http://whlr.local/wp-content/uploads/dollar-tree.png" alt="" class="aligncenter"></li>
						<li class="splide__slide"><img src="http://whlr.local/wp-content/uploads/food-lion.png" alt="" class="aligncenter"></li>
						<li class="splide__slide"><img src="http://whlr.local/wp-content/uploads/gabes.png" alt="" class="aligncenter"></li>
						<li class="splide__slide"><img src="http://whlr.local/wp-content/uploads/hobby-Lobby.png" alt="" class="aligncenter"></li>
						<li class="splide__slide"><img src="http://whlr.local/wp-content/uploads/kroger.png" alt="" class="aligncenter"></li>
						<li class="splide__slide"><img src="http://whlr.local/wp-content/uploads/lowes.png" alt="" class="aligncenter"></li>
						<li class="splide__slide"><img src="http://whlr.local/wp-content/uploads/marshalls.png" alt="" class="aligncenter"></li>
						<li class="splide__slide"><img src="http://whlr.local/wp-content/uploads/piggly-wiggly.png" alt="" class="aligncenter"></li>
						<li class="splide__slide"><img src="http://whlr.local/wp-content/uploads/planet-fitness.png" alt="" class="aligncenter"></li>
						<li class="splide__slide"><img src="http://whlr.local/wp-content/uploads/winn-dixie.png" alt="" class="aligncenter"></li>
					</ul>
				</div>
			</div>
		</section>
	</div>
	<script>
		document.addEventListener( 'DOMContentLoaded', function() {
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
