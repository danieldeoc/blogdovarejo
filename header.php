<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    $currentpage = $_SERVER['REQUEST_URI'];
    if("/varejista/"==$currentpage) { ?>
        <title>Marketing de Varejo Online e Dicas para Varejistas</title>
        <meta name="description" content="Encontre Dicas para Varejo, marketing de varejo e dicas para varejistas online no Blog do Varejo">
    <?php } else{ ?>
        <title><?php wp_title(''); ?></title>
    <?php } ?>
	
    <meta name="subject" content="<?php wp_title(''); ?>">
    <meta name="copyright"content="Gazin - Blog do Varejo &copy; 2016">
    <meta name="language" content="PT-BR">
    <meta name="Classification" content="Systems">
    <meta name="author" content="Blog do Varejo - por Gazin atacado">
    <meta name="designer" content="Daniel de Oliveira Carvalho">
    <meta name="owner" content="Blog do Varejo - por Gazin atacado">
    <meta name="url" content="http://blog.gazinatacado.com.br/">
    <meta name="identifier-URL" content="http://blog.gazinatacado.com.br/">   
    <meta name="coverage" content="Brazil">
    <meta name="distribution" content="Brazil">   
	
    
    
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/images/favicon.png" />
    <link href="<?php echo get_template_directory_uri() ?>/images/apple-touch-icon.png" rel="apple-touch-icon" />
    <link href="<?php echo get_template_directory_uri() ?>/images/apple-touch-icon-76x76.png" rel="apple-touch-icon" sizes="76x76" />
    <link href="<?php echo get_template_directory_uri() ?>/images/apple-touch-icon-120x120.png" rel="apple-touch-icon" sizes="120x120" />
    <link href="<?php echo get_template_directory_uri() ?>/images/apple-touch-icon-152x152.png" rel="apple-touch-icon" sizes="152x152" />
    <link href="<?php echo get_template_directory_uri() ?>/images/apple-touch-icon-180x180.png" rel="apple-touch-icon" sizes="180x180" />
    <link href="<?php echo get_template_directory_uri() ?>/images/icon-hires.png" rel="icon" sizes="192x192" />
    <link href="<?php echo get_template_directory_uri() ?>/images/icon-normal.png" rel="icon" sizes="128x128" />
    
    <meta property="fb:app_id" content="481773385276169" />
    <meta property="fb:admins" content="your_fb_admin_id" />
     
    <!-- if page is content page -->
    <?php if (is_single()) { ?>
        <meta property="og:url" content="<?php the_permalink() ?>"/>
        <meta property="og:title" content="<?php single_post_title(''); ?>" />
        <meta property="og:description" content="<?php echo get_the_excerpt(); ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="<?php if (function_exists('wp_get_attachment_thumb_url')) {echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); }?>" />
	<?php } else if (is_page()) { ?>
        <meta property="og:url" content="<?php the_permalink() ?>"/>
        <meta property="og:title" content="<?php single_post_title(''); ?>" />
        <meta property="og:description" content="<?php bloginfo('description'); ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="<?php echo get_template_directory_uri() ?>/images/logo.png" />        
     
    <!-- if page is others -->
    <?php } else if( is_category() ) { ?>
		<meta property="og:url" content="<?php the_permalink() ?>"/>
        <meta property="og:title" content="<?php printf( __( '%s', 'portobelo-escriba' ), single_cat_title( '', false )); ?>" />
        <meta property="og:description" content="<?php echo wp_strip_all_tags( category_description()); ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="<?php echo get_template_directory_uri() ?>/images/logo.png" />
	 <?php } else if( is_tag() ) { ?>
		<meta property="og:url" content="<?php the_permalink() ?>"/>
        <meta property="og:title" content="<?php printf( __( '%s', 'portobelo-escriba' ), single_cat_title( '', false )); ?>" />
        <meta property="og:description" content="<?php bloginfo('description'); ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="<?php echo get_template_directory_uri() ?>/images/logo.png" />
	<?php } else if( is_author() ) { ?>    
		<meta property="og:url" content="<?php the_permalink() ?>"/>
        <meta property="og:title" content="Pra ver em Londres: posts de <?php echo get_the_author_meta( 'nickname'); ?>" />
        <meta property="og:description" content="<?php  echo get_the_author_meta( 'description'); ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="<?php echo get_template_directory_uri() ?>/images/logo.png" />
	
	<?php } else { ?>
        <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
        <meta property="og:description" content="<?php bloginfo('description'); ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="<?php echo get_template_directory_uri() ?>/images/logo.png" /> 
	<?php } ?>
    
    
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" async media="screen" />
    <!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/ie8.css" />
	<![endif]-->    
    <?php
	$GLOBALS['sidebar'] = true;
	 wp_head() ?>
    <!-- Hotjar Tracking Code for http://blog.gazinatacado.com.br -->
    <!-- Hotjar Tracking Code for blog.gazinatacado.com.br -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:344692,hjsv:5};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
    </script>

</head>
<body>


    <div id="avisoNavegador" style="display:none">    	
        <h3>Seu navegador esta desatualizado.</h3>
        <p>Você esta tentando acessar o nosso site com um navegador muito antigo. Por favor, atualize seu navegador:</p>
        <div class="text-center">
            <a href="https://www.google.com/intl/en/chrome/browser/" target="_blank" class="sprites chrome">
            </a>
            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie" target="_blank" class="sprites ie">
            </a>
            <a href="http://www.mozilla.org/en-US/firefox/new/" target="_blank" class="sprites firefox">        
            </a>
            <a href="http://www.opera.com/pt-br" target="_blank" class="sprites opera">
            </a>
            <a href="https://www.apple.com/safari/" target="_blank" class="sprites safari">
            </a>
        </div>
        <span class="fechaAvisoNavegador">Continuar navegando mesmo assim.</span>
    </div>
    <div class="atualizeIe8" style="display:none">
        Você esta acessando nosso site a partir do IE8 que esta desatualizado. Atualize seu navegador para que você tenha acesso a todos os recursos.
        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie" target="_blank" class="sprites ie"></a>
    </div>
	

	<?php    	
		//get_template_part('components/popups/popups' );
		$options = get_option( 'cabecalhoSet' );
	?>
    
    <!-- div class="feeedback">
    	Feedback
    </div -->
    
    <div class="buscaResponsive">    	
        <div class="closeResponsive closeSearch"></div>
    	<div class="clear"></div>
        <form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Procurar por..." />
            <input type="submit" class="sprites" id="searchsubmit" />
        </form>
        <h3 class="sectionTitle">Nossas Sugestões</h3>
        <?php wp_nav_menu( array('theme_location' => 'sugestoesbusca'));?>
    </div>
    
    
    <div class="menuResponsive">    	
        <div class="closeResponsive closeMenu"></div>

        <div class="loginBarMobile">
            <div class="limite"> 
            <a href="http://www.gazinatacado.com.br/" target="_blank" title="ir para o site da Gazin Atacado">Ir para o site da Gazin Atacado</a>
            <br/><br/>
            <?php if(is_user_logged_in()){ 
                $user = wp_get_current_user();
                $nameUser = $user->user_login;
                echo "<span>Bem vindo ".$nameUser.", acesse a <a href='http://blog.gazinatacado.com.br/category/intensivo-natal-gazin-atacado/'>área restrita aqui</a> ou <a href='".wp_logout_url( home_url() )."'>faça logout</a>.&nbsp; &nbsp; </span>";
            } else { ?>
                <span>Acesse o conteúdo exclusivo do Blog do Varejo. <a href="<?php echo home_url(); ?>/login">Efetue Login</a> ou <a href="<?php echo home_url(); ?>/cadastro">Cadastre-se</a></span>
                
            <?php }; ?>
            </div>
        </div> 

    	<div class="clear"></div>
        <?php wp_nav_menu( array('theme_location' => 'menutopo'));?>
        
        <a href="<?php echo home_url(); ?>/e-books/" class="ebooksCall"><img src="<?php echo get_bloginfo('template_directory');?>/images/estrutura/ebooks.png" alt="E-books de venda gratuitos" /></a>
    </div>
    
    
    
	<div class="site">
        <div class="site-content">
        
        

        <div class="boxHeader">
        	<header <?php if( is_home()){ echo "class='home'"; }; ?>>



            	<?php
					if( !is_home()){
					if(is_category('1131') || in_category('1131')){
						echo '<div class="header homeTop hotelaria" >';
					} else {
						echo '<div class="header homeTop" >';
					};
					};
				?>
                
            	<div class="header homeTop" > 
                    <div class="loginBar">
                        <div class="limite"> 
                        &nbsp; &nbsp; <a href="http://www.gazinatacado.com.br/" target="_blank" title="ir para o site da Gazin Atacado">Ir para o site da Gazin Atacado</a>

                        <?php if(is_user_logged_in()){ 
                            $user = wp_get_current_user();
                            $nameUser = $user->user_login;
                            echo "<span class='right'>Bem vindo ".$nameUser.", acesse a <a href='http://blog.gazinatacado.com.br/category/intensivo-natal-gazin-atacado/'>área restrita aqui</a> ou <a href='".wp_logout_url( home_url() )."'>faça logout</a>.&nbsp; &nbsp; </span>";
                        } else { ?>
                            <span class="right">Acesse o conteúdo exclusivo do Blog do Varejo. <a href="<?php echo home_url(); ?>/login">Efetue Login</a> ou <a href="<?php echo home_url(); ?>/cadastro">Cadastre-se</a>&nbsp; &nbsp; </span>
                            
                        <?php }; ?>
                        </div>
                    </div>                   
                    <div class="limite"> 
                    	<div class="sprites menuResponsiveCall"></div>
                        <div class="sprites searchResponsiveCall"></div>
                        
                    	<h1>
                        
                            <?php
								if( !is_home()){
								if(is_category('1131') || in_category('1131')){ ?>
                                    <a href="<?php echo home_url(); ?>/category/hotelaria/">
									<img src="<?php echo get_bloginfo('template_directory');?>/images/estrutura/bloghotelaria-branca.png" alt="<?php wp_title(''); ?>" />
                                    </a>
								<?php } else { ?>
                                    <a href="<?php echo home_url(); ?>">
									<img src="<?php echo get_bloginfo('template_directory');?>/images/logo.png" alt="<?php wp_title(''); ?>" />
                                    </a>
								<?php };
								} else { ?>
                                    <a href="<?php echo home_url(); ?>">
									<img src="<?php echo get_bloginfo('template_directory');?>/images/logo.png" alt="<?php wp_title(''); ?>" />
                                    </a>
							<?php }
							?>
                            
                            
                        
                         </h1>
                        
                       
                                                
                        <?php wp_nav_menu( array( 'theme_location' => 'menutopo' ) ); 
						
						/*
						if ( is_user_logged_in() ) { 
							$current_user = wp_get_current_user(); 
							echo '<div class="nomeUser">'.$current_user->user_firstname.'<a href="'.wp_logout_url(home_url()).'" class="sair">sair</a></div>';
						 } else { ?>
							<a href="<?php bloginfo('wpurl'); ?>/login" class="sprites aceseConta"></a>
						<?php } */	?>
                        
                        
                         
                                             
                        <form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Procurar por..." />
                            <input type="submit" class="sprites" id="searchsubmit" />
                        </form>
                        
                        <a class="ebooks sprites" href="<?php echo home_url(); ?>/e-books/" title="Veja os E-books do Blog do Varejo"></a>
                        <div class="clear"></div>
                    </div>
                </div>
            </header> 
        </div>     