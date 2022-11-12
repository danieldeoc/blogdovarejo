<?php 
if(isset($_GET["login"])) {
    $login = sanitize_text_field($_GET["login"]);
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
				<?php the_content(); ?>
                <?php 
                    if( $login == "failed"){ ?>
                        <div class='erroMsgcad'>Login ou senha incorretos, tente novamente.</div>
                    <?php };
					$args = array(
						'remember'       => true,
						'redirect'       => home_url(),
						'label_username' => __( 'Username' ),
						'label_password' => __( 'Password' ),
						'label_remember' => __( 'Permanecer Logado' ),
						'label_log_in'   => __( 'Acessar' ),
					);				
					wp_login_form($args); ?>
                
                    <div class="recSenha">
                        <a href="<?php echo home_url(); ?>/wp-login.php?action=lostpassword">Não lembra sua senha? Clique aqui!</a>
                        <br/>
                        <br/>
                        <br/>
                        Não tem conta?<br/>
                        <a class="button" style="color:#fff; text-decoration:none" href="<?php echo home_url(); ?>/cadastro">Cadastre-se</a>
                    </div>
                
            </div>
        	
            
            
        </div>
        
        
        
        <div class="clear"></div>
        
       
        <br><br><br>
 
        
    <?php endwhile; else: ?>
    
    
    
    
    
        <p>Desculpe, não encontramos a página que procurava.</p>
    <?php endif; ?>
    
    	               
        
            
            
            
<?php get_footer(); ?>