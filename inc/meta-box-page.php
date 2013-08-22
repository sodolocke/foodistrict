<?php 
function page_settings_add_custom_box() {
	if ( function_exists( 'add_meta_box' )) {
		add_meta_box( 'page_settings_sectionid', __( 'Details', 'page_settings_textdomain' ), 'page_settings_inner_custom_box', 'page', 'normal', 'high' );
	};
	
}
function page_settings_inner_custom_box() {
	global $post;
	echo '<input type="hidden" name="page_settings_noncename" id="page_settings_noncename" value="' . 
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	
//GET META
	$fb_description = get_post_meta( $post->ID, '_fb_description', true );
	
	echo "<strong>FB Description :</strong><br />";
	echo "<textarea name=\"fb_description\" style=\"width:100%;height:100px;\">$fb_description</textarea>";
	echo "<br /><br /><strong>Excerpt :</strong><br />";
	
	
}
function page_settings_save_postdata( $post_id ) {
  if (isset( $_POST['page_settings_noncename'] )){
	  if ( !wp_verify_nonce( $_POST['page_settings_noncename'], plugin_basename(__FILE__) )) {
	    return $post_id;
	  }
  } else {
	  return $post_id;
  }
  
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return $page_id;

  // Check permissions
  if ( isset($_POST['page_type']) && $_POST['page_type'] == 'page' ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
      return $post_id;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
      return $post_id;
  }
  extract( $_POST );
  if (isset( $fb_description )) update_post_meta($post_id, "_fb_description", $fb_description);
  
}

add_action('admin_menu', 'page_settings_add_custom_box');
add_action('save_post', 'page_settings_save_postdata');