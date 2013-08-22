<?php
//medium
update_option('medium_size_w', '430');
update_option('medium_size_h', '276');
update_option('medium_crop', '1');
//large
update_option('large_size_w', '700');
update_option('large_size_h', '450');
update_option('large_crop', '1');
//facebook
update_option('facebook_size_w', '200');
update_option('facebook_size_h', '200');
update_option('facebook_crop', '1');


function gallery_sizes(){
	$sizes = array('thumbnail', 'medium', 'large', 'facebook');
	return $sizes;
}
add_filter('intermediate_image_sizes', 'gallery_sizes');