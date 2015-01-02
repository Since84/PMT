<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package Spark_Fourteen
 * @since Spark Fourteen 1.0
 */
?>

	<footer class="footer">
		<div class="container">

			<div class="footer-main">
				<?php wp_nav_menu( array( 'menu' => 'nav' ) ); ?>
				<span class="copyright">Copyright &copy;  
					<script language="JavaScript" type="text/javascript">
						now = new Date
						theYear=now.getYear()
						if (theYear < 1900)
							theYear=theYear+1900
						document.write(theYear)
					</script>
					Professional Massage Therapy. All rights reserved.
				</span>
				<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Website Credits' ) ) ); ?>">Website Credits</a>
			</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>