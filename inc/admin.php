<?php
function custom_admin_css() {
	echo "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"".get_bloginfo( 'template_url' )."/style-admin.css\" />";
}
add_action('admin_head', 'custom_admin_css');
