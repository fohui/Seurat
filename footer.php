	<!-- BEGIN #footer -->
	<p id="footer"> 
		<span class="float">&copy; 2015 <?php bloginfo('name'); ?>
			&nbsp;&nbsp;|&nbsp;&nbsp;Powered By 
			<a rel="external" title="wordPress主页" class="link" href="http://wordpress.org/">WordPress</a>
			&nbsp;&nbsp;|&nbsp;&nbsp;Design By fohui&nbsp;&nbsp;|&nbsp;&nbsp;
			&nbsp;&nbsp;Code By <a href="http://www.fohui14.com/wp/">fohui</a>&nbsp;&nbsp;|&nbsp;&nbsp;<?php wp_loginout(); ?>
		</span> 
	</p>
	<!-- END #footer -->
<?php wp_footer(); ?>
<script>
	window.onload = function(){
		$("#loader").hide();
	}
</script>
</body>
<!-- END body -->
</html>