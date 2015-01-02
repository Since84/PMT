<?php
	global $post;
?>
<div class="page-sidebar">
	<?php include('sidebar-action.php'); ?>
	<div class="parent-menu">
	<?php
		global $post;
		if( empty($post->post_parent) ) {
		$parent = $post->ID;
		} else {
		$parent = $post->post_parent;
	} ?>
	<?php if(wp_list_pages("title_li=&child_of=$parent&echo=0" )): ?>
		<div>
		<ul>
	<?php wp_list_pages("title_li=&child_of=$parent" ); ?>
		</ul>
		</div>
	<?php endif; ?>
	</div>
</div>