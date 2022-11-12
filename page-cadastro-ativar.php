<?php 
if(isset($_GET["hash"])) {
    $hash = sanitize_text_field($_GET["hash"]);
    $ref = sanitize_text_field($_GET["ref"]);
}

get_header(); ?>

    
<div class="siteContent">             	
    <div class="siteCorpo limite"> 
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    	<h1 class="titulo"><?php the_title(); ?></h1>
	</div>
    	
    <div class="linha limite">
    	<div class="col col_12 col_lg_12 col_md_12 col_sm_12 pageContent">
        
        	<div class="entry" style="padding-top:0">
				
                <p>
                <?php 
                if(isset($_GET["hash"])) {
                    the_content();
                    echo "Conta ativada! Obrigado.<br/><br/><a class='button' href='".$ref."' style='color:#fff; text-decoration:none'>Confira o conteúdo exclusivo.</a>";
                } else { ?>

                    <p>Um e-mail com um código de ativação foi enviado para você.</p>

                    <p>Confirme sua caixa de entrada e clique no link enviado para ativar sua conta.</p>


                   <?php } ?>
                </p>
            </div>
        	
            
            
        </div>
        
        
        
        <div class="clear"></div>
        
       
        <br><br><br>
 
        
    <?php endwhile; else: ?>
    
    
    
    
    
        <p>Desculpe, não encontramos a página que procurava.</p>
    <?php endif; ?>
    
    	               
        
            
            
            
<?php get_footer(); ?>