<?php 
	define('WP_USE_THEMES', false);
	require('../../../../../wp-blog-header.php');
	$table = htmlspecialchars($_GET["table"]);	
	$value = htmlspecialchars($_GET["id"]);
	global $wpdb;
    $drafts = $wpdb->get_row("SELECT * FROM ".$table." WHERE id = ".$value);
	if ( $wpdb->show_errors() ){
		echo '<div class="error">';
		$wpdb->show_errors();
		echo '</div>';
	} else {
		echo "{";
		while (list ($key, $val) = each ($drafts) ) {
			echo $key;
			echo ":'";
			echo htmlspecialchars_decode($val);
			echo "',";
		};
		echo "}";		
	}	
?> 