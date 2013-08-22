<?php 
//REWRITE
add_filter('rewrite_rules_array','wp_insertMyRewriteRules');
add_filter('query_vars','wp_insertMyRewriteQueryVars');
add_filter('wp_loaded','flushRules');

// Remember to flush_rules() when adding rules
function flushRules(){
	global $wp_rewrite;
   	$wp_rewrite->flush_rules();
}

// Adding a new rule
function wp_insertMyRewriteRules($rules){
	$newrules = array();
	$newrules['api/([^/]+)/?$'] = 'index.php?api=$matches[1]';
	$newrules['api/([^/]+)/([^/]+)/?$'] = 'index.php?api=$matches[1]&pid=$matches[2]';
	$newrules['invoice/([^/]+)/?$'] = 'index.php?api=invoice&pid=$matches[1]';
	$newrules['press/([0-9]+)/?$'] = 'index.php?year=$matches[1]&post_type=press';
	$newrules['press/([^/]+)/page/([^/]+)/?$'] = 'index.php?year=$matches[1]&post_type=press&paged=$matches[2]';
	$newrules['logout?$'] = 'index.php?api=logout';
	
	return $newrules + $rules;
}
function wp_insertMyRewriteQueryVars($vars){
    array_push($vars, 'pid');
    array_push($vars, 'api');
    array_push($vars, 'press');
    array_push($vars, 'action');
    array_push($vars, 'ptype');
    return $vars;
}
//Stop wordpress from redirecting
remove_filter('template_redirect', 'redirect_canonical');
/*
if ( !is_user_logged_in() && ($_SERVER['HTTP_HOST'] != "10.0.1.197:8888") && ($_SERVER['HTTP_HOST'] != "localhost:8888")) {
	wp_redirect("http://no4clients.com");
	exit;
}
*/