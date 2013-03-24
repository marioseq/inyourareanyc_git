<?php

// Setup
require_once( dirname(__FILE__) . '/setup.php' );

// Insert comments after excerpt if available
function swisscomments_after () {
	
	global $post;

	$count = get_comments_number();
	if ($count == 0) {
		return '';
	
	} else { 
		?>
			<span class="post-comments sc swiss"><?php comments_popup_link('0 comments', '1 reply','% replies', 'comments-link', ''); ?></span>
		<?php 
	}

}
add_action ('pagelines_loop_after_excerpt','swisscomments_after');


// Autoset some colors
$mud_pallette = array(
	'bodybg'           => '#FFFFFF',
	'text_primary'     => '#3D3D3D',
	'headercolor'      => '#6E0000',
	'linkcolor'        => '#6E0000',
	'blog_layout_mode' => 'blog',
	'metabar_clip'     => '[post_date] [post_edit]',
	'metabar_standard' => '[post_date] [post_edit]'
);
foreach ($mud_pallette as $key => $value) {
	pl_default_setting( array(
		'key' => $key, 
		'value' => $value
		) 
	);
}