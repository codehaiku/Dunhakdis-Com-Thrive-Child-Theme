<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package thrive
 */

?>
</div><!--.row-->
<?php if ( ! is_page_template('page-templates/canvas.php') ) { ?>
</div><!-- #content -->
<?php } ?>
</div><!--.row-->
</div><!--#page-container">-->
</div><!--#page-row-->
<style type="text/css">
	#mc_embed_signup{
		background: #232427;
		padding: 35px 0 50px 0;
		text-align: center;
		color: #c6d5de;
	}

	#mce-EMAIL {
		width: 300px;
	    margin: 0 auto;
	    display: block;
	    margin-bottom: 30px;
	    color: #232427;
	    background: white;
	    padding: 0 25px;
	    border-radius: 2px;
	}

	#mce-success-response {
		display: block;
		width: 300px;
		margin: 0 auto;
		margin-bottom: 35px;
		color: #8BC34A;
	}

	#mc_embed_signup div.mce_inline_error {
    margin: 0 0 30px 0;
    padding: 0;
    background-color: transparent;
    font-weight: bold;
    z-index: 1;
    color: red;
}
	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div class="row" id="mc_embed_signup">
	<div class="col-md-12">
		<!--Mailchimp-->
		<!-- Begin MailChimp Signup Form -->

		<div id="mc_embed_signup_cont">
		<form action="//dunhakdis.us7.list-manage.com/subscribe/post?u=9eb48d93c3b7fee868f0849a9&amp;id=3343da4770" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
		    <div id="mc_embed_signup_scroll">
			<h3 for="mce-EMAIL">Let's Connect!</h3>
			<p>Get <strong>Free</strong> Premium WordPress Themes, Plugins, or Tutorials. No Spam Allowed.</p>
			<div class="mc-field-group">
				<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="e.g. joseph@company.com" required>
			</div>
			<div id="mce-responses" class="clear">
				<div class="response" id="mce-error-response" style="display:none"></div>
				<div class="response" id="mce-success-response" style="display:none"></div>
			</div>
		    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
		    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_9eb48d93c3b7fee868f0849a9_3343da4770" tabindex="-1" value=""></div>
		    <div class="clear"><input type="submit" value="Get Premium Themes by E-mail" name="subscribe" id="mc-embedded-subscribe" class="btn"></div>
		    </div>
		</form>
		</div>

		<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>

		<!--End mc_embed_signup-->
		<!--Mailchimp end-->
	</div>
</div>
<div class="row">

	<?php if ( is_active_sidebar( 'sidebar-footer-area' ) ) { ?>

		<div id="thrive_footer_widget">
			<div class="container-fluid">
				<div class="row limiter">
					<div class="clearfix">
						<?php dynamic_sidebar('sidebar-footer-area'); ?>
					</div>
				</div>
			</div>
		</div>

	<?php } ?>

	<footer id="thrive_footer" class="site-footer" role="contentinfo">

		<div class="site-info">

			<div class="container-fluid">
				<div class="row">
					<div id="thrive_footer_copytext" class="col-xs-12">

						<?php

							$thrive_allowed_html_tags = array(
						    	'a' => array(
						        	'href' => array(),
						        	'title' => array()
						    	),
						    	'br' => array(),
						    	'em' => array(),
						    	'strong' => array(),
							);

						?>

						<?php $thrive_default_copytext = __( '&copy; [Your Website Name Here] 2015. All Rights Reserved.', 'thrive'); ?>

						<?php $thrive_copytext = get_option( 'thrive_footer_copyright', $thrive_default_copytext ); ?>

						<?php if ( !empty( $thrive_copytext ) ) { ?>

							<?php echo wp_kses( $thrive_copytext, $thrive_allowed_html_tags ); ?>

						<?php } else { ?>

							<?php echo wp_kses( $thrive_default_copytext, $thrive_allowed_html_tags ); ?>

						<?php } ?>

					</div> <!--.col-xs-12-->
					<div id="ssl-sign" style="position: relative;top: 10px;clear: both;">
						<span id="siteseal"><script type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=9DZPx6UUmRhpF1bdzH13ByKaqQd9Yj49sa2v6piFOlRLpCQ94NkEkmslv2Pj"></script></span>
					</div>
				</div> <!--.row-->
			</div><!--.container-fluid-->

		</div><!-- .site-info -->

	</footer><!-- #thrive_footer-->

</div><!--.row-->

</div><!--.site-content -(header.php)-->
</div><!-- #page-container-->
<?php do_action( 'thrive_after_body' ); ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</div><!--#thrive-global-wrapper-->
</body>
</html>
