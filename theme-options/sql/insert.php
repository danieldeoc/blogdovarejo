<?php 
	define('WP_USE_THEMES', false);
	require('../../../../../wp-blog-header.php');
	$table = htmlspecialchars($_GET["table"]);	
	$stack = array();	
	foreach ($_POST as $key => $value) {	
		$keystring = htmlspecialchars($key);
		$stack[$keystring] = htmlspecialchars($value);
    }
	$wpdb->insert($table, $stack);	
	if ( $wpdb->show_errors() ){
		echo '<div class="error">';
		$wpdb->show_errors();
		echo '</div>';
	} else {
		echo "<div>Cadastro efetuado com sucesso!</div>";	
	}	
?> 