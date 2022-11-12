<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title(''); ?></title>    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/plugins/foundation-5.2.0.custom/css/normalize.css" media="screen" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/plugins/foundation-5.2.0.custom/css/foundation.css" media="screen" />
   	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
       
    <script src="<?php echo get_template_directory_uri() ?>/plugins/foundation-5.2.0.custom/js/vendor/modernizr.js"></script>
    
    
</head>
<body>
<div class="not-found-page">
	<h1>
        <a href="<?php echo home_url(); ?>" title="<?php wp_title(''); ?>">
            <img src="<?php echo get_bloginfo('template_directory');?>/images/logo.png" alt="<?php wp_title(''); ?>" />
        </a>
    </h1>
    <h2>Ops! Erro 404. <br>Página não encontrada.</h3>
    <p>
    	Parece que você chegou ao nosso site pelo link de uma<br> página que não existe mais ou acessou algum link ou url inválido.<br /><br>
        <a href="<?php echo home_url(); ?>" class="button ico med red">Leve-me para a home<span><span class="icon icoSeta"></span></span></a>
    </p>
    
     
</div>
<script src="<?php echo get_template_directory_uri() ?>/js/jquery.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/plugins/foundation-5.2.0.custom/js/foundation.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/plugins/foundation-5.2.0.custom/js/foundation/foundation.offcanvas.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/site.js"></script>
<script type="text/javascript">
	/* ------------------------- */
	/* LANDED SCRIPT */
	
	// LD.S = Landed Script = Scripts que se encontram no footer
	// SC = Script = Javascript no arquivo site.js
	// PHP.F = Função php do functions.php do thema
	
	/* LD.S 1.0 - SCRIPTS MENU - PHP.F 2.1 */
	

</script>
<?php 
        wp_footer();
        $options = get_option( 'dadosThema' );
    ?>
    <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        
        ga('create', '<?php echo $options['analytics'] ?>', 'auto');
        ga('require', 'displayfeatures');
        ga('send', 'pageview'); 
    </script>
</body>
</html>
