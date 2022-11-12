<?php /* ------------------------------------------------------------------------- */
/* ####################################################################### */
/* ------------------------------------------------------------------------ */
add_action( 'wp_login_failed', 'my_front_end_login_fail' );
function my_front_end_login_fail( $username ) {
     $referrer =  wp_get_referer();
     if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin')     ) {
          wp_redirect( "http://blog.gazinatacado.com.br/login/?login=failed" );
          exit;
     }
}


/* 0.0 LOGIN PAGE WP-ADMIN */
function custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('. get_bloginfo( 'template_directory' ) .'/images/loginlogo.png) !important; width: 320px !important; background-size: 320px !important }
    </style>';
}

add_action('login_head', 'custom_login_logo');

function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return wp_title('');
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
add_filter('login_errors',create_function('$a', "return null;"));

function my_login_stylesheet() 
{
    wp_enqueue_style( 'style-name', get_stylesheet_uri() );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );




//Insert ads after second paragraph of single post content.

/* add_filter( 'the_content', 'prefix_insert_post_ads' );

function prefix_insert_post_ads( $content ) {
	
	$ad_code = '
        			<a class="intensivoChamada" href="http://blog.gazinatacado.com.br/cadastro?acesso=conteudo" title="Intensivão de natal Gazin Atcado"></a>
        		';

	if ( is_single() && ! is_admin() ) {
		return prefix_insert_after_paragraph( $ad_code,1, $content );
	}
	
	return $content;
} */
 
// Parent Function that makes the magic happen
 
function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
	$closing_p = '</p>';
	$paragraphs = explode( $closing_p, $content );
	foreach ($paragraphs as $index => $paragraph) {

		if ( trim( $paragraph ) ) {
			$paragraphs[$index] .= $closing_p;
		}

		if ( $paragraph_id == $index + 1 ) {
			$paragraphs[$index] .= $insertion;
		}
	}
	
	return implode( '', $paragraphs );
}



/* ------------------------------------------------------------------------- */
/* ####################################################################### */
/* ------------------------------------------------------------------------ */
/* 0.0 ADMIN BAR */
show_admin_bar( true );

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}

/* ------------------------------------------------------------------------- */
/* ####################################################################### */
/* ------------------------------------------------------------------------ */
/* 0.0 HABILITANDO THEMA */
add_theme_support( 'post-thumbnails' );

/* ------------------------------------------------------------------------- */
/* ####################################################################### */
/* ------------------------------------------------------------------------ */
/* WIDGETS */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Sidebar Home',
		'id'            => 'home_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgetTitle">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

/* ------------------------------------------------------------------------- */
/* ####################################################################### */
/* ------------------------------------------------------------------------ */
/* MENU */
/* 1.0 HABILITANDO MENUS */
function register_my_menus() {
  register_nav_menus(
    array(
      'menutopo' => __( 'Menu Topo' ),  
	  'menufooter' => __( 'Menu Rodapé' ),
	  'sugestoesbusca' => __( 'Sugestões de Busca' )
    )
  );
}
add_action( 'init', 'register_my_menus' );



/* 2.0 MENU SELECT */

function wp_nav_menu_select( $args = array() ) {
 
    $defaults = array(
        'theme_location' => '',
        'menu_class' => 'select-menu',
    );
 
    $args = wp_parse_args( $args, $defaults );
 
    if ( ( $menu_locations = get_nav_menu_locations() ) && isset( $menu_locations[ $args['theme_location'] ] ) ) {
        $menu = wp_get_nav_menu_object( $menu_locations[ $args['theme_location'] ] );
 
        $menu_items = wp_get_nav_menu_items( $menu->term_id );
        ?>
            <select id="menu-<?php echo $args['theme_location'] ?>" class="<?php echo $args['menu_class'] ?>">
                <option value=""><?php _e( 'Navigation' ); ?></option>
                <?php foreach( (array) $menu_items as $key => $menu_item ) : ?>
                    <option value="<?php echo $menu_item->url ?>"><?php echo $menu_item->title ?></option>
                <?php endforeach; ?>
            </select>
        <?php
    }
 
    else {
        ?>
            <select class="menu-not-found">
                <option value=""><?php _e( 'Menu Not Found' ); ?></option>
            </option>
        <?php
    }
 
}




/* ------------------------------------------------------------------------- */
/* ####################################################################### */
/* ------------------------------------------------------------------------ */
/* CONSTRUTOR DE EMAILS */
/* 1.0 HABILITANDO MENUS */

function mailBuilder($title, $msg){	
	str_replace("'","&quot;",$msg);

	$mmm = '<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#f2f2f2">';	
  	$mmm .= '<tr>';
    $mmm .= 	'<td style="padding:15px">';
	$mmm .= 		'<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">';
    $mmm .= 			'<tr>';
    $mmm .= 				'<th height="91"><img src="http://blog.gazinatacado.com.br/wp-content/uploads/2016/11/topogazin.gif" alt="'.wp_title('').'" width="600" height="91" border="0" longdesc="'.home_url().'" /></th>';
    $mmm .= 			'</tr>';
    $mmm .= 			'<tr>';
    $mmm .= 				'<td bgcolor="#FFFFFF" style="padding:25px; background:#fff">';
	$mmm .= 		   			'<h2 style="font-family:Arial, Helvetica, sans-serif; font-size:24px; color:#1188ba">'.$title.'</h2>';
	$mmm .= 					'<div style="font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size:14px; line-height:1.5em; color:#666">'.$msg.'</div></td>';
	$mmm .= 				'</tr><tr><td height="59" style="background:#1188ba">&nbsp;</td></tr>';
	$mmm .= 		'</table>';
	$mmm .= 	'</td>';
	$mmm .= 	'</tr></table>';
	
	return $mmm;

};



function confirmaEnvio($confTitle,$confMsg,$sendTop,$titleEmail){
	
	$to = $sendTop;
	$subject = $titleEmail;
	$headers = "Content-type: text/html \n";
	$headers .= "Reply-To: ".$sendTop." \n";
	$headers .= "Return-Path: ".wp_title('')." <".$sendTop.">\n";
	
	$message = mailBuilder($confTitle, $confMsg);
	
	$sent = wp_mail($to, $subject, $message, $headers);
};

/* ------------------------------------------------------------------------- */
/* ####################################################################### */
/* ------------------------------------------------------------------------ */
/* 3.0 SCRIPTS */

function my_enqueue_assets() {
 	wp_enqueue_script( 'jquery',  get_stylesheet_directory_uri() . 'jquery-1.11.1.min', array(), '1.0.0', true);
	wp_enqueue_script( 'site',  get_stylesheet_directory_uri() . '/js/site.js');
    wp_enqueue_script( 'ajax-pagination',  get_stylesheet_directory_uri() . '/js/ajax-pagination.js', array(), '1.0.0', true);
	 wp_enqueue_script( 'btg360',  'http://i.btg360.com.br/lc.js', array(), '1.0.0', true);
	wp_localize_script( 'site', 'wpbrecomind', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        
		
	global $wp_query;
	wp_localize_script( 'ajax-pagination', 'ajaxpagination', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'query_vars' => json_encode( $wp_query->query )
	));
	
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_assets' );


/* ------------------------------------------------------------------------- */
/* ####################################################################### */
/* ------------------------------------------------------------------------ */
/* FACNYBOXONPOST */

function give_linked_images_class($content) {

  $classes = 'fancybox'; // separate classes by spaces - 'img image-link'

  // check if there are already a class property assigned to the anchor
  if ( preg_match('/<a.*? class=".*?"><img/', $content) ) {
    // If there is, simply add the class
    $content = preg_replace('/(<a.*? class=".*?)(".*?><img)/', '$1 ' . $classes . '$2', $content);
  } else {
    // If there is not an existing class, create a class property
    $content = preg_replace('/(<a.*?)><img/', '$1 class="' . $classes . '" ><img', $content);
  }
  return $content;
}

add_filter('the_content','give_linked_images_class');

/* ------------------------------------------------------------------------- */
/* ####################################################################### */
/* ------------------------------------------------------------------------ */
/* 3.0 PAGINACAO */


function wp_infinitepaginate(){ 
    $loopFile       = $_POST['loop_file'];
    $paged          = $_POST['page_no'];
    $id           	= $_POST['id'];
    $type           = $_POST['type'];
    $color          = $_POST['color'];
    $name           = $_POST['name'];
    $posts_per_page = get_option('posts_per_page');
    $tipoPost 		= $_POST['tipopost'];
    $postNum 		= $_POST['postNum'];

    $category = false;
	$categoryColor = $color;
	$categoryName = $name;
 
    # Load the posts
    if($type == "tag"){
		$post = new WP_Query(array('tag_id' => $id, 'paged' => $paged, 'post_status' => 'publish' )); 
	} else if($type == "category"){
		$category = true;
		$post = new WP_Query(array('cat' => $id, 'paged' => $paged, 'post_status' => 'publish' ));
	} else if($type == "search"){		
		$post = new WP_Query(array('s' => $name, 'paged' => $paged, 'post_status' => 'publish' ));
	} else if($type == "home"){		
		$post = new WP_Query(array('paged' => $paged, 'post_status' => 'publish', 'cat' => '-1754' ));
		
	} else if($type == "varejista"){		
		$post = new WP_Query(array('cat' => '-1131,-1133', 'paged' => $paged, 'post_status' => 'publish' ));
    } else {
		$post = new WP_Query(array('paged' => $paged, 'post_status' => 'publish' )); 

    }

    	$zeraMargem2 = 4;
		$options = get_option( 'bnCats' );
		
					
        if ( $post->have_posts() ){ 
					
			while ( $post->have_posts() ) : $post->the_post(); 
				$tipoPost = $tipoPost + 1;
				$postNum = $postNum + 1;
				$zeraMargem2 = $zeraMargem2 + 1;
				$votes = get_post_meta($post->ID, "wpb_recomind_count", true);
				$votes = ($votes == "") ? 0 : $votes;
				$video = get_post_meta($post->ID, "youtube", true);
				
				if ( has_post_thumbnail() ) {
					$postThumbed = "postThumbed";
				} else {
					$postThumbed = "";
				}
				
				if( $tipoPost == 7) {
					$tipoPost = 1;
				}
				
				$title = get_the_title();
				$limit = "75";
				if( strlen($title) < 65 ){
					$pad=" ";
				} else {
					$pad="...";	
				}
				
				$categoria = get_the_category();
				$idCategoria = $categoria[0]->term_id;
				
				if( $category == "true"){
					$nomeCategoria = $categoryName;
				} else {
					$nomeCategoria = $categoria[0]->cat_name;
				}
				
				if( $category == "true"){
					$corCategoria = $categoryColor;
				} else {
					$corCategoria = $options['colorCat'.$idCategoria];
				}
				
				?>
				
				<?php if( $tipoPost == 1) { ?>              
					<li class="col col_8 col_lg_8 col_md_6 col_sm_12 <?php echo $postThumbed ?> bigMateria" style="border-bottom-color:<?php echo $corCategoria ?>">
				<?php  } else if( $tipoPost == 2) { ?>
					<li class="col col_4 col_lg_4 col_md_6 col_sm_12" style="border-bottom-color:<?php echo $corCategoria ?>">
				<?php  } else { 
					if( $zeraMargem2 == 7){
						?>
							<li class="col col_3 col_lg_3 col_md_6 col_sm_12" style="margin-left:0; border-bottom-color:<?php echo $corCategoria ?>">
						<?php } else if( $zeraMargem2 == 9){
							?>
								<li class="col col_3 col_lg_3 col_md_6 col_sm_12 zera800" style="border-bottom-color:<?php echo $corCategoria ?>">
							
					 <?php  } else { ?>
							<li class="col col_3 col_lg_3 col_md_6 col_sm_12" style="border-bottom-color:<?php echo $corCategoria ?>">
					   
				 <?php 
				 };
				}?>
				
				
					<div class="mainCategoryMarkup" style="background:<?php echo $corCategoria ?>">
						<?php 
						echo $nomeCategoria; ?>
					</div>
					
					<?php if ($video != "" ) { 
						 ?>
						<div class="featureImage preLoadImage"  data-image="http://img.youtube.com/vi/<?php echo $video; ?>/0.jpg">
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"></a>
						</div>
						<h3 class="text-left">
							<a href="<?php the_permalink() ?>">
								<?php
									$title = substr($title, 0, $limit) . $pad;
									echo $title;
								?>
							</a>
						</h3> 
						<div class="data-post">
							Por <?php echo get_the_author(); ?> | <?php the_time('j/m/y') ?></span>
						</div>

						
					<?php }  else if(has_post_thumbnail() ) {
						$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );                    
					?>
						<div class="featureImage preLoadImage"  data-image="<?php echo $feat_image; ?>">
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"></a>
						</div>
						<h3 class="text-left">
							<a href="<?php the_permalink() ?>">
								<?php
									$title = substr($title, 0, $limit) . $pad;
									echo $title;
								?>
							</a>
						</h3> 
						<div class="data-post">
							Por <?php echo get_the_author(); ?> | <?php the_time('j/m/y') ?></span>
						</div>
						
					<?php } else { ?>
						<br>
						<h3 class="text-left">
							<a href="<?php the_permalink() ?>">
								<?php
									$title = substr($title, 0, $limit) . $pad;
									echo $title;
								?>
							</a>
						</h3>  
						<div class="data-post">
							Por <?php echo get_the_author(); ?> | <strong><?php the_time('j/m/y') ?></strong>
						</div>
					<?php } ?>
					
					<?php if ( $tipoPost == 1 || !has_post_thumbnail() ) { ?>
						<div class="excerptBox">
							<a href="<?php the_permalink() ?>">
							 <?php 
							 $excerpt = get_the_excerpt();
							 echo substr($excerpt, 0, 225);
							 if( strlen($excerpt) > 225 ){
								echo '... &raquo; <i>continue lendo</i>';	 
							}
							?>
							</a>
						</div>                        
					<?php } ?>
					<div class="postSocialData">                    	
						<div class="postRecomendation sprites">
							<?php echo $votes; ?>
						</div>
						<div class="postComments sprites">
							<?php comments_number( "0", "1", "%" ); ?>
						</div>
					</div>
					<div class="triangulo" style="border-bottom-color:<?php echo $corCategoria ?>"></div>
					<div class="clear controlerLoadMore" data-postNum="<?php echo $postNum; ?>" data-tipoPost="<?php echo $tipoPost; ?>"></div>
				</li>				
				<?php
					if($type != "search"){
						if( $postNum == 12){
							echo "<li class='fullLi'>";
							include(TEMPLATEPATH.'/zona1.php');
							echo "</li>";
						} else if( $postNum == 18){
							echo "<li class='fullLi'>";
							include(TEMPLATEPATH.'/zona3.php');
							echo "</li>";	
						};	
					};
			endwhile;		
		} else { ?>
       		<div class="sem-posts">Puxa! Acabou? Ainda não. Tem muito <a href="<?php echo home_url(); ?>">mais aqui</a>.</div>
        	<style type="text/css">.carregaMaisPosts { display:none !important}</style>
 	<?php };
 	die();
}
add_action('wp_ajax_infinite_scroll', 'wp_infinitepaginate');           // for logged in user
add_action('wp_ajax_nopriv_infinite_scroll', 'wp_infinitepaginate');    // if user not logged in



/* ------------------------------------------------------------------------- */
/* ####################################################################### */
/* ------------------------------------------------------------------------ */
/* LAZYLOAD */

function add_lazyload($content) {

    $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
    $dom = new DOMDocument();
    @$dom->loadHTML($content);

    foreach ($dom->getElementsByTagName('img') as $node) {  
        $oldsrc = $node->getAttribute('src');
		$oldw = $node->getAttribute('width');
		$oldh = $node->getAttribute('height');
        $node->setAttribute("data-original", $oldsrc );
		$node->setAttribute("data-w", $oldw );
		$node->setAttribute("data-h", $oldh );
        $newsrc = ''.get_template_directory_uri().'/images/estrutura/preload.gif';
        $node->setAttribute("width", "30");
		$node->setAttribute("height", "30");
		$node->setAttribute("src", $newsrc);
    }
    $newHtml = preg_replace('/^<!DOCTYPE.+?>/', '', str_replace( array('<html>', '</html>', '<body>', '</body>'), array('', '', '', ''), $dom->saveHTML()));
    return $newHtml;
}
add_filter('the_content', 'add_lazyload');

/* ------------------------------------------------------------------------- */
/* ####################################################################### */
/* ------------------------------------------------------------------------ */
/* BREADCRUMBS */
function qt_custom_breadcrumbs() {
 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '&raquo;'; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  global $post;
  $homeLink = get_bloginfo('url');
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<div id="breadcrumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
 
  } else {
 
    echo '<div id="breadcrumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . '' . single_cat_title('', false) . '' . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Resultado da busca para "' . get_search_query() . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Tags: "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Posts de ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Pagigna') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
} // end qt_custom_breadcrumbs()


/* ------------------------------------------------------------------------- */
/* ####################################################################### */
/* ------------------------------------------------------------------------ */
/* MAIS LIDOS */

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);





if(is_home()){
	add_post_meta($post_id, $meta_key, $meta_value, $unique);	
}



/* ------------------------------------------------------------------------- */
/* ####################################################################### */
/* ------------------------------------------------------------------------ */
/* MAIS LIDOS */
add_action( 'wp_ajax_nopriv_wpbrecomind', 'wpbrecomind' );
add_action( 'wp_ajax_wpbrecomind', 'wpbrecomind' );
function wpbrecomind() {
    $postID = $_POST['page'];
    $count_key = 'wpb_recomind_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 1;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '1');
    }else{
        if($count=='0'){
            $count = 1;
        }

        $count = $count + 1;;
        update_post_meta($postID, $count_key, $count);
    }
	$votes = get_post_meta($postID, $count_key, true);
	echo $votes;
}

/* ------------------------------------------------------------------------- */
/* ####################################################################### */
/* ------------------------------------------------------------------------ */
/* OPÇÕES DO THEMA */
	
	//add settings page to menu
	function add_settings_page() {	
		add_theme_page( 'Cabeçalho', 'Cabeçalho', 'manage_options', 'cabecalhoSet', 'cabecalhoSet');
		add_theme_page( 'Rodapé', 'Rodapé', 'manage_options', 'rodSet', 'rodSet');
		add_theme_page( 'Publicidade', 'Publicidade', 'manage_options', 'adSet', 'adSet');
		add_theme_page( 'Categorias', 'Categorias', 'manage_options', 'bnCats', 'bnCats');
		//add_theme_page( 'Landing Pages', 'Landing Pages', 'manage_options', 'landings', 'landings');

		//add_theme_page( 'Avisos Pop-ups', 'Avisos Pop-ups', 'manage_options', 'avisos', 'avisospopups');
		add_theme_page( 'Endereço e E-mails', 'Endereço e E-mails', 'manage_options', 'dadosCartorio', 'dadosCartorio');
		add_theme_page( 'Analytics, SEO e Tema', 'Analytics, SEO e Tema', 'manage_options', 'dadosThema', 'dadosThema');


		add_users_page( 'Lista Intensivão Gazin', 'Lista Intensivão Gazin', 'edit_users', 'listausuarios', 'listausuarios');
		
		
	}

	//add actions
	add_action( 'admin_menu', 'add_settings_page' );
	
	//CABECALHO
	require_once('theme-options/cabecalhos.php');	
	//RODAPE
	require_once('theme-options/rodape.php');
	//PUBLICIDADE
	require_once('theme-options/publicidade.php');
	
	//CATEGORIAS
	require_once('theme-options/categorias.php');
	//Landings Pages
	//require_once('theme-options/landings.php');
	
	//OPCOES POPUPS
	//require_once('theme-options/avisos.php');
		//OPCOES BANNER HOME
	require_once('theme-options/dados-do-cartorio.php');
	// include websystems
	require_once('theme-options/dados-thema.php');

	require_once('theme-options/lista-usuarios.php');

	
	
/* ------------------------------------------------------------------------- */
/* ####################################################################### */
/* ------------------------------------------------------------------------ */
/* REGISTRO DE NOVOS USUARIOS */

	



	add_role('Varejista', __( 'Varejista' ),  array(
        'read'         => true
		)
	);
	add_role('Hoteleiro', __( 'Hoteleiro' ),  array(
        'read'         => true
		)
	);
	
	
	function registration_validation( $username, $password, $email, $area, $first_name )  {
		global $reg_errors;
		$reg_errors = new WP_Error;
		
		if ( empty( $username ) || empty( $password ) || empty( $email ) ) {
			$reg_errors->add('field', 'Preencha todos os campos obrigatórios, marcados com *');
		}
		
		if ( 4 > strlen( $username ) ) {
			$reg_errors->add( 'username_length', 'Nome de usuário muito curto, precisa ter ao menos 4 letras.' );
		}
		
		if ( username_exists( $username ) )
			$reg_errors->add('user_name', 'Desculpe, o nome de usuário já existe.');
			
		if ( ! validate_username( $username ) ) {
			$reg_errors->add( 'username_invalid', 'O nome de usuário informado não é válido. Não utilize espaço, nem caracteres especiais, nem números nem ç ou acentuação.' );
		}
		
		if ( 5 > strlen( $password ) ) {
			$reg_errors->add( 'password', 'Sua senha deve ter ao menos 5 caracteres.' );
		}
		
		if ( !is_email( $email ) ) {
			$reg_errors->add( 'email_invalid', 'Este e-mail não é válido.' );
		}
		
		if ( email_exists( $email ) ) {
			$reg_errors->add( 'email', 'Este e-mail já esta em uso.' );
		}
		
		if ( is_wp_error( $reg_errors ) ) {
	 
			foreach ( $reg_errors->get_error_messages() as $error ) {
				echo '<div class="erroMsg2 limite">'.$error.'</div>';			 
			}
	 
		}
		
	}


	function complete_registration() {
		
		
		global $reg_errors, $username, $password, $email, $area, $first_name, $last_name;
		if ( 1 > count( $reg_errors->get_error_messages() ) ) {
			$userdata = array(
				'user_login'    =>   $username,
				'user_email'    =>   $email,
				'user_pass'     =>   $password,
				'first_name'    =>   $first_name,
				'last_name'     =>   $last_name,
				'role'     		=>   $area
			);
			$user = wp_insert_user( $userdata );
			
			/* wp_set_current_user($user);
			wp_set_auth_cookie($user);
				// You can change home_url() to the specific URL,such as 
			//wp_redirect( 'http://www.wpcoke.com' );
			wp_redirect( home_url() );
			exit; */
			
			
			echo 'Cadastro efetuado. Confirme seu cadastro efetuando login.';
			$args = array(
				'remember'       => true,
				'redirect'       => home_url(),
				'label_username' => __( 'Username' ),
				'label_password' => __( 'Password' ),
				'label_remember' => __( 'Permanecer Logado' ),
				'label_log_in'   => __( 'Acessar' ),
			);				
			wp_login_form($args);
			echo '<style type="text/css">.formMeio {display:none}</style>'; 
			
		}
	}


	function custom_registration_function() {
		if ( isset($_POST['submit'] ) ) {
			registration_validation(
				$_POST['username'],
				$_POST['password'],
				$_POST['email'],
				$_POST['area'],
				$_POST['fname'],
				$_POST['lname']
			);
			 
			// sanitize user form input
			global $username, $password, $email, $area, $first_name, $last_name;
			$username   =   sanitize_user( $_POST['username'] );
			$password   =   esc_attr( $_POST['password'] );
			$email      =   sanitize_email( $_POST['email'] );
			$area	    =   sanitize_text_field( $_POST['area'] );
			$first_name =   sanitize_text_field( $_POST['fname'] );
			$last_name  =   sanitize_text_field( $_POST['lname'] );
	 
			// call @function complete_registration to create the user
			// only when no WP_error is found
			complete_registration(
				$username,
				$password,
				$email,
				$area,
				$first_name,
				$last_name
			);
		} else {
			$username   =   "";
			$password   =   "";
			$email      =   "";
			$area    =   "";
			$first_name =   "";
			$last_name  =   "";
			
		};
			registration_form();
		
	}

	function registration_form() {	
			
			?>
			<form class="formMeio" action="<?php  $_SERVER['REQUEST_URI'] ?>" method="post">
			<div class="linha">
				<div class="col col_6 col_md_12 col_sm_12">
					<label for="firstname">Nome</label>
					<input type="text" name="fname" value="<?php if(isset($_POST['fname']) ){  echo esc_attr($_POST['fname']); } ?>">
				</div>
				 
				<div class="col col_6 col_md_12 col_sm_12">
					<label for="website">Sobrenome</label>
					<input type="text" name="lname" value="<?php if(isset($_POST['lname']) ){  echo esc_attr($_POST['lname']); } ?>">
				</div>
			</div>
			
			<div class="linha">
				<div class="col col_6 col_md_12 col_sm_12">
					<label for="username"><strong>Nome de Usuário</strong>: <strong>*</strong></label>
					<input type="text" name="username" maxlength="10" value="<?php if(isset($_POST['username']) ){  echo esc_attr($_POST['username']); } ?>">
				</div>
				 
				<div class="col col_6 col_md_12 col_sm_12">
					<label for="password">Senha: <strong>*</strong></label>
					<input type="password" name="password" value="<?php  if(isset($_POST['password']) ){  echo esc_attr($_POST['password']); } ?>">
				</div>
			
			</div>
			<div class="linha">		 
				<div class="col col_12 col_md_12 col_sm_12">
					<label for="email">E-mail <strong>*</strong></label>
					<input type="text" name="email" value="<?php  if(isset($_POST['email']) ){  echo esc_attr($_POST['email']); } ?>">
				</div>
			</div>
			 
			 
			
			<div class="linha">		 
				<div class="col col_12 col_md_12 col_sm_12">
					<?php if( isset($_POST['area']) ){
						$area = esc_attr($_POST['area']);
					} else {
						if( isset($_GET["area"]) ){
							$area = htmlspecialchars($_GET["area"]);
						} else {
							$area = "";		
						}
						
					}?>
					<label for="area">Área*:</label>
					<select name="area">
						<option value="Varejista" <?php if($area == "Varejista") { echo 'selected="selected"';} ?> >Varejista</option>
						<option value="Hoteleiro" <?php if($area == "Hoteleiro") { echo 'selected="selected"';} ?>>Hoteleiro</option>                
					</select>
				</div>
			</div>		
			 
<button type="submit" name="submit">Cadastre-se</button>
			</form>
			<?php
		}



		// Register a new shortcode: [cr_custom_registration]
		add_shortcode( 'cadastre-se', 'custom_registration_shortcode' );
		 
		// The callback function that will replace [book]
		function custom_registration_shortcode() {
			ob_start();
			custom_registration_function();
			return ob_get_clean();
		}
	
	


	// FORMATS

		// register custom post type 'my_custom_post_type'
		function add_posttype_slug_template( $single_template ){
		    if( is_singular( ) && in_category( 'Intensivão de Natal Gazin Atacado' ) ){
		        $single_template = locate_template( 'single-paywall.php' );
		    }
		    return $single_template;
		}
		add_filter( 'single_template', 'add_posttype_slug_template' );
		



	
	
	
?>