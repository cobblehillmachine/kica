<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
</div>
<footer>
	<div id="footer-wrapper" class="mid-cont mobile-mid-cont">
		<div id="footer-cont">
			<div class="franklin-gothic-demi dark-brown company-name"><?php the_field("company_name", "user_2"); ?></div>
			<div id="address-numbers">
				<span class="address"><a target=_blank href="https://www.google.com/maps/place/<?php urlencode(the_field("address", "user_2")); ?>"><?php the_field("address", "user_2"); ?></a></span>
				<span class="toll-free-phone-number desktop"><?php the_field("toll_free_phone_number", "user_2"); ?><span>toll-free</span></span>
				<span class="phone-number desktop"><?php the_field("phone_number", "user_2"); ?></span>
				<span class="fax-number desktop"><?php the_field("fax_number", "user_2"); ?><span>fax</span></span>
			</div>
			<div class="kepler-italic email-address mobile"><a target=_blank href="mailto:<?php the_field("email_address", "user_2"); ?>"><?php the_field("email_address", "user_2"); ?></a></div>

			<div class="social desktop">
				<div class="social-icon weather">
					<div class="circle">
						<a alt="Check the Weather!" title="Check the Weather!" href="http://www.wunderground.com/weatherstation/WXDailyHistory.asp?ID=KSCKIAWA5" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/weather-icon.png"></a>
					</div>
				</div>
				<div class="social-icon newsletter">
					<div class="circle">
						<a alt="Email us" title="Email us!" href="mailto:<?php the_field("email_address", "user_2"); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/newsletter-icon.png"></a>
					</div>
				</div>
				<div class="social-icon facebook">
					<div class="circle">
						<a alt="Facebook" title="Facebook" title="Facebook"target=_blank href="<?php the_field("facebook_link", "user_2"); ?>" ><img src="<?php echo get_template_directory_uri(); ?>/images/facebook-icon.png"></a>
					</div>
				</div>
				<div class="social-icon">
					<div class="circle">
						<a alt="Twitter" title="Twitter" target=_blank href="<?php the_field("twitter_link", "user_2"); ?>" ><img src="<?php echo get_template_directory_uri(); ?>/images/twitter-icon.png"></a>
					</div>
				</div>
				<div class="social-icon">
					<div class="circle">
						<a alt="Instagram" title="Instagram" target=_blank href="<?php the_field("instagram_link", "user_2"); ?>" ><img src="<?php echo get_template_directory_uri(); ?>/images/instagram-icon.png"></a>
					</div>
				</div>
				<div class="social-icon last">
					<div class="circle">
						<a alt="YouTube" title="Youtube" target=_blank href="<?php the_field("youtube_link", "user_2"); ?>" ><img src="<?php echo get_template_directory_uri(); ?>/images/youtube-icon.png"></a>
					</div>
				</div>
			</div>

			<div class="kepler-italic email-address desktop"><a target=_blank href="mailto:<?php the_field("email_address", "user_2"); ?>"><?php the_field("email_address", "user_2"); ?></a></div>
			<span class="toll-free-phone-number mobile"><?php the_field("toll_free_phone_number", "user_2"); ?><span>toll-free</span></span>
			<span class="phone-number mobile"><?php the_field("phone_number", "user_2"); ?></span>
			<span class="fax-number mobile"><?php the_field("fax_number", "user_2"); ?><span>fax</span></span>

			<div class="social mobile">
				<div class="social-icon weather">
					<div class="circle">
						<a title="Check the Weather" title="Check the Weather!" href="http://www.wunderground.com/weatherstation/WXDailyHistory.asp?ID=KSCKIAWA5" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/weather-icon.png"></a>
					</div>
				</div>
				<div class="social-icon newsletter">
					<div class="circle">
						<a title="Email Us!" title="Email us!" href="mailto:<?php the_field("email_address", "user_2"); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/newsletter-icon.png"></a>
					</div>
				</div>
				<div class="social-icon facebook">
					<div class="circle">
						<a target=_blank title="Facebook" href="<?php the_field("facebook_link", "user_2"); ?>" ><img src="<?php echo get_template_directory_uri(); ?>/images/facebook-icon.png"></a>
					</div>
				</div>
				<div class="social-icon">
					<div class="circle">
						<a target=_blank title="Twitter" href="<?php the_field("twitter_link", "user_2"); ?>" ><img src="<?php echo get_template_directory_uri(); ?>/images/twitter-icon.png"></a>
					</div>
				</div>
				<div class="social-icon">
					<div class="circle">
						<a target=_blank title="Instagram" href="<?php the_field("instagram_link", "user_2"); ?>" ><img src="<?php echo get_template_directory_uri(); ?>/images/instagram-icon.png"></a>
					</div>
				</div>
				<div class="social-icon last">
					<div class="circle">
						<a target=_blank title="Youtube" href="<?php the_field("youtube_link", "user_2"); ?>" ><img src="<?php echo get_template_directory_uri(); ?>/images/youtube-icon.png"></a>
					</div>
				</div>
			</div>
			<div class="kepler-bold-italic">
				<span class="copyright"><?php the_field("copyright", "user_2"); ?></span>
				<span class="cobble-hill"><a href="http://cobblehilldigital.com" target=_blank>Site by Cobble Hill</a></span>
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
</footer>

</body>
</html>
