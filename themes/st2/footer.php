<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SimpleTruth2.0
 */

?>

	</div>
	<!-- #content -->

	<footer id="site-footer" class="site-footer" role="contentinfo">




		<nav id="social-menu" class="social-menu">
			<ul>
				<li>
					<a target='_blank' href="https://www.linkedin.com/company/simple-truth">
						<?php echo file_get_contents( get_stylesheet_directory_uri().'/img/linkedin.svg'); ?>
					</a>
				</li>
				<li>
					<a  target='_blank' href="https://www.facebook.com/yoursimpletruth/">
						<?php echo file_get_contents( get_stylesheet_directory_uri().'/img/facebook.svg'); ?>
					</a>
				</li>
				<li>
					<a  target='_blank' href="https://twitter.com/yoursimpletruth">
						<?php echo file_get_contents( get_stylesheet_directory_uri().'/img/twitter.svg'); ?>
					</a>
				</li>
				<li>
					<a  target='_blank' href="https://www.instagram.com/yoursimpletruth/">
						<?php echo file_get_contents( get_stylesheet_directory_uri().'/img/instagram.svg'); ?>
					</a>
				</li>
			</ul>
		</nav>

		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/wbenc.png" class="women-owned" width="66" height="29">
		<p class="copyright">&copy; <?php echo date('Y'); ?> Simple Truth Communication Partners. <span>All Rights Reserved.</span></p>
		<nav id="footer-menu" class="footer-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
		</nav>
		<!-- #site-navigation -->
	</footer>
	<!-- #colophon -->
</div>
	<!-- #wrapper -->
	</div>
	<!-- #page -->

	<?php wp_footer(); ?>
	
<script type="text/javascript" language="javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24017121-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();



//additional tracking
  vtid = 106699;document.write(unescape("%3Cscript src='" + document.location.protocol + "//code.visitor-track.com/VisitorTrack.js' type='text/javascript'%3E%3C/script%3E"));

</script>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-T3H8W2" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T3H8W2');</script>
<!-- End Google Tag Manager -->


		</body>

		</html>
