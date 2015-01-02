<?php
	global $post;
?>
<div class="page-sidebar">
	<?php include('sidebar-action.php'); ?>
	<div class="parent-menu">
	<?php wp_nav_menu(array('menu'=>'blog-sidebar')); ?>
	</div>
</div>