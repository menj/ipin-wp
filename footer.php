<footer class="container">
	<div class="text-center">&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url() ?>" title="Home"><?php bloginfo('name') ?></a> - <?php bloginfo('description') ?> <?php if (is_home()) { ?><?php } ?></div>
</footer>

<div id="scrolltotop"><a href="#"><i class="fa fa-chevron-up"></i><br /><?php _e('Top', 'ipin'); ?></a></div>

<?php wp_footer(); ?>

</body>
</html>