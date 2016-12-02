<?php
/**
 * Template Name: Documentation
 */

get_header();

if( have_posts() ){
	while( have_posts() ){
		the_post();
		// using the WordPress loop, we'll display the post content here
		// inorder for page builder to work, you need the page builder's shortcode
		// right into the textarea wherein you compose your blog
		?>

	<?php do_action( 'thrive_before_page_content' ); ?>

	<div class="container-fluid" id="thrive-template-documentation-header">

		<div class="row limiter">

			<header class="content-header">

				<span class="thrive-theme-documentation">
					<?php echo __( 'THEME DOCUMENTATION', 'thrive' ); ?>
				</span>

				<?php the_title('<h1 class="entry-title">', '</h1>' ); ?>

			</header><!-- .entry-header -->

		</div>

	</div>

	<div class="container-fluid" id="thrive-template-documentation-content">

		<div class="row limiter">

			<div id="content-right-col" class="col-md-4">

				<div id="secondary" class="widget-area" role="complementary">

					<aside id="thrive-page-navigation" class="sidebar-widgets">

						<?php if( !$post->post_parent ) {

								$child_pages = wp_list_pages(
									array(
										'title_li'	=> '',
										'child_of'	=> $post->ID,
										'echo'			=> 0
										)
									);

							} else {

								if( $post->ancestors ) {

									$ancestors = end( $post->ancestors );

									$child_pages = wp_list_pages(
										array(
											'title_li'		=> '',
											'child_of'		=> $ancestors,
											'echo'			=> 0
										)
									);
								}

							} // end !$post->post_parent

						$ancestors = get_post_ancestors( $post );

						//var_dump($child_pages);

						$parent = end( $ancestors );

						$parent_link = get_permalink( $parent );

						$parent_title = get_the_title( $parent );

						if ( $child_pages ) { ?>

							<nav role="navigation">

								<ol>

									<li class="page_item parent_manu page_item_has_children">

										<a href="<?php echo esc_url( $parent_link ); ?>"><?php echo esc_html( $parent_title ); ?></a>

										<ol class="children">

											<?php

												$unordered_list_tag = array( "<ul", "/ul>" );

												$ordered_list_tag = array( "<ol", "/ol>" );

												$child_pages = str_replace( $unordered_list_tag, $ordered_list_tag, $child_pages );

												echo $child_pages;

											?>

										</ol>

									</li>

								</ol>

							</nav>

						<?php } ?>

					</aside>


				</div>

			</div>

			<div id="content-left-col" class="col-md-8">

				<div id="primary" class="content-area thrive-page-document">
					<main id="main" class="site-main" role="main">

						<article id="post-<?php the_ID(); ?>" <?php post_class(array('thrive-card', 'mg-bottom-15', 'thrive-archives')); ?>>

							<div id="bcn_thrive" class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
								<?php if(function_exists('bcn_display'))
								{
									bcn_display();
								}?>
							</div>

							<div class="entry-content">

								<?php
									/* translators: %s: Name of current post */
									the_content( sprintf(
										wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'thrive' ), array( 'span' => array( 'class' => array() ) ) ),
										the_title( '<span class="screen-reader-text">"', '"</span>', false )
									) );
								?>

								<?php
									wp_link_pages( array(
										'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'thrive' ),
										'after'  => '</div>',
									) );
								?>
							</div><!-- .entry-content -->

							<?php if( current_user_can('administrator') || current_user_can('editor') || current_user_can('author') ) {  ?>

								<footer class="entry-footer">
									<?php edit_post_link( esc_html__( 'Edit', 'thrive' ), '<span class="edit-link">', '</span>' ); ?>
								</footer><!-- .entry-footer -->

							<?php } ?>

						</article><!-- #post-## -->

					</main>
				</div>

				<?php
					$pagelist = get_pages( 'sort_column=menu_order&sort_order=asc&parent=-1' );

					$pages = array();

					foreach ( $pagelist as $page ) {

					   $pages[] += $page->ID;

					}

					$current = array_search( get_the_ID(), $pages );
					$prevID = $pages[ $current - 1 ];
					$nextID = $pages[ $current + 1 ];
				?>

				<div class="thrive-page-navigation">

					<?php if (!empty($prevID)) { ?>

						<a href="<?php echo esc_url( get_permalink( $prevID ) ); ?>" class="button prev" title="<?php echo esc_attr( get_the_title( $prevID ) ); ?>"><i class="material-icons md-24">arrow_back</i>Previous</a>

					<?php }

					if (!empty($nextID)) { ?>

							<a href="<?php echo esc_url( get_permalink( $nextID ) ); ?>" class="button next" title="<?php echo esc_attr( get_the_title( $nextID ) ); ?>">Next<i class="material-icons md-24">arrow_forward</i></a>

					<?php } ?>

				</div><!-- .thrive-page-navigation -->

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			</div>

			<script type="text/javascript">

				/*
				 Sticky-kit v1.1.2 | WTFPL | Leaf Corcoran 2015 | http://leafo.net
				*/
				(function(){var b,f;b=this.jQuery||window.jQuery;f=b(window);b.fn.stick_in_parent=function(d){var A,w,J,n,B,K,p,q,k,E,t;null==d&&(d={});t=d.sticky_class;B=d.inner_scrolling;E=d.recalc_every;k=d.parent;q=d.offset_top;p=d.spacer;w=d.bottoming;null==q&&(q=0);null==k&&(k=void 0);null==B&&(B=!0);null==t&&(t="is_stuck");A=b(document);null==w&&(w=!0);J=function(a,d,n,C,F,u,r,G){var v,H,m,D,I,c,g,x,y,z,h,l;if(!a.data("sticky_kit")){a.data("sticky_kit",!0);I=A.height();g=a.parent();null!=k&&(g=g.closest(k));
				if(!g.length)throw"failed to find stick parent";v=m=!1;(h=null!=p?p&&a.closest(p):b("<div />"))&&h.css("position",a.css("position"));x=function(){var c,f,e;if(!G&&(I=A.height(),c=parseInt(g.css("border-top-width"),10),f=parseInt(g.css("padding-top"),10),d=parseInt(g.css("padding-bottom"),10),n=g.offset().top+c+f,C=g.height(),m&&(v=m=!1,null==p&&(a.insertAfter(h),h.detach()),a.css({position:"",top:"",width:"",bottom:""}).removeClass(t),e=!0),F=a.offset().top-(parseInt(a.css("margin-top"),10)||0)-q,
				u=a.outerHeight(!0),r=a.css("float"),h&&h.css({width:a.outerWidth(!0),height:u,display:a.css("display"),"vertical-align":a.css("vertical-align"),"float":r}),e))return l()};x();if(u!==C)return D=void 0,c=q,z=E,l=function(){var b,l,e,k;if(!G&&(e=!1,null!=z&&(--z,0>=z&&(z=E,x(),e=!0)),e||A.height()===I||x(),e=f.scrollTop(),null!=D&&(l=e-D),D=e,m?(w&&(k=e+u+c>C+n,v&&!k&&(v=!1,a.css({position:"fixed",bottom:"",top:c}).trigger("sticky_kit:unbottom"))),e<F&&(m=!1,c=q,null==p&&("left"!==r&&"right"!==r||a.insertAfter(h),
				h.detach()),b={position:"",width:"",top:""},a.css(b).removeClass(t).trigger("sticky_kit:unstick")),B&&(b=f.height(),u+q>b&&!v&&(c-=l,c=Math.max(b-u,c),c=Math.min(q,c),m&&a.css({top:c+"px"})))):e>F&&(m=!0,b={position:"fixed",top:c},b.width="border-box"===a.css("box-sizing")?a.outerWidth()+"px":a.width()+"px",a.css(b).addClass(t),null==p&&(a.after(h),"left"!==r&&"right"!==r||h.append(a)),a.trigger("sticky_kit:stick")),m&&w&&(null==k&&(k=e+u+c>C+n),!v&&k)))return v=!0,"static"===g.css("position")&&g.css({position:"relative"}),
				a.css({position:"absolute",bottom:d,top:"auto"}).trigger("sticky_kit:bottom")},y=function(){x();return l()},H=function(){G=!0;f.off("touchmove",l);f.off("scroll",l);f.off("resize",y);b(document.body).off("sticky_kit:recalc",y);a.off("sticky_kit:detach",H);a.removeData("sticky_kit");a.css({position:"",bottom:"",top:"",width:""});g.position("position","");if(m)return null==p&&("left"!==r&&"right"!==r||a.insertAfter(h),h.remove()),a.removeClass(t)},f.on("touchmove",l),f.on("scroll",l),f.on("resize",
				y),b(document.body).on("sticky_kit:recalc",y),a.on("sticky_kit:detach",H),setTimeout(l,0)}};n=0;for(K=this.length;n<K;n++)d=this[n],J(b(d));return this}}).call(this);

			</script>

			<script type="text/javascript">

				jQuery(document).ready(function($) {
					"use strict";

					$(window).scroll(function() {

						var masthead_height = $( '#masthead' ).innerHeight();

						var sidebar_width = $( '#secondary' ).outerWidth();

						if ( $( this ).scrollTop() > masthead_height ) {

							$( '#thrive-page-navigation' ).trigger("sticky_kit:recalc");

							$( '#thrive-page-navigation' ).addClass('thrive_nav_is_sticky');

							$( '#thrive-page-navigation' ).removeClass('thrive_nav_is_not_sticky');

					  	} else {

							$( '#thrive-page-navigation' ).trigger("sticky_kit:recalc");

							$( '#thrive-page-navigation' ).removeClass('thrive_nav_is_sticky');

							$( '#thrive-page-navigation' ).addClass('thrive_nav_is_not_sticky');

					  	}

					}); //w.scroll


						var offset_top = 10, margin = 15;

						if ( $('#wpadminbar').length > 0 ) {

							offset_top = parseInt( $('#wpadminbar').height() );
						} else {
							margin = 5;
						}

						offset_top += margin;

						$( '#thrive-page-navigation' ).stick_in_parent({
							offset_top: offset_top,
							parent: '#content'
						}).on('sticky_kit:bottom', function(e) {
						    /*$(this).parent().css({
								position: 'fixed',
								bottom: $('#thrive_footer').outerHeight() + 'px'
							});*/
							$(this).parent().parent().css('position', 'static');
						}).on('sticky_kit:unbottom', function(e) {
						    $(this).parent().parent().css('position', 'relative');
						})


					$( window ).load(function() {

						// Gets the width of the device.
						var device_width = $( window ).width();

						if ( ( device_width <= 991 ) ) {

							$( '#content-right-col' ).insertBefore( '#content-left-col' );

							$( '#thrive-page-navigation' ).trigger("sticky_kit:detach");

						}

					});


						$( window ).on( 'resize', function( event ) {

							// Gets the width of the device.
							var device_width = $( window ).width();

							var sidebar_width = $( '#secondary' ).outerWidth();

							if ( ( device_width <= 1600 ) ) {

								// $( '#content-left-col' ).insertBefore( '#content-right-col' );

								$( '#thrive-page-navigation' ).css( 'width', sidebar_width + 'px' );

							}

							if ( ( device_width <= 991 ) ) {

								// $( '#content-right-col' ).insertBefore( '#content-left-col' );

								$( '#thrive-page-navigation' ).trigger("sticky_kit:detach");

							}

						});


					$( '#toggle-add, #toggle-remove' ).click(function() {

						$( '#thrive-page-navigation' ).css( 'width', '31.33%' );

						setTimeout( function() {

							var sidebar_width = $( '#secondary' ).width();

							$( '#thrive-page-navigation' ).css( 'width', sidebar_width + 'px' );

			            }, 380 );

					}); // click


					// Sub-menu navigation
				    $( '#thrive-page-navigation ol li ol.children li.page_item_has_children > a' ).after( '<span id="thrive_nav_btn" class="pages-menu-toggle material-icons md-24">remove</span>' );

				    $('.pages-menu-toggle').on('click', function(e) {

				        e.preventDefault();

				        if ( $( this ).parent().hasClass( 'active' ) ) {

				            $( this ).parent().removeClass( 'active' );

							$( this ).text( 'remove' );

				        } else {

				            $( this ).parent().addClass( 'active' );

							$( this ).text( 'add' );

				        }

						$( '#thrive-page-navigation' ).trigger("sticky_kit:recalc");

				    });

				}); //d.ready

			</script>

		</div>

	</div>

	<?php } ?>

<?php }
get_footer();
?>
