<?php 
	
	function rodSet_init(){
		register_setting( 'rodSet', 'rodSet' );
	}
	add_action( 'admin_init', 'rodSet_init' );
	
	function rodSet() {		
		wp_enqueue_media();
	?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/theme-options/adminTheme.css" type="text/css" media="all">
	<script src="<?php echo get_template_directory_uri() ?>/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
		var $qr = jQuery.noConflict();
	</script>
    <script src="<?php echo get_template_directory_uri() ?>/theme-options/adminjs.js"></script>
	<form method="post" action="options.php">
			<?php 
				settings_fields( 'rodSet' );
			?>
			<?php $options = get_option( 'rodSet' ); ?>

			<div class="wrap">
  				<h2>Opções do Rodapé</h2>
                
                <div class="tituloConteudo">Copyright</div>
                	<div class="caixaconteudo"> 
                    <label>
                        Frase 1:
                        <input name="rodSet[copyFr1]" style="width:100%" type="text" value="<?php esc_attr_e( $options['copyFr1'] ); ?>" />
                    </label>
                                        
                    <div class="saveLine">
                        <input name="submit" id="submit" class="button" value="Salvar alterações" type="submit">
                    </div>
                </div>
                
                <div class="tituloConteudo">Menu</div>
                	<div class="caixaconteudo"> 
					Para editar o menu do rodapé, <a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php">clique aqui</a> e selecione o Menu Rodapé.
                </div>
                
                <div class="tituloConteudo">Redes sociais</div>
                	<div class="caixaconteudo"> 
                    
                    <div class="duasColunas"> 
                        <h3>Facebook:</h3>
                        <label>
                            <input type="checkbox" name="rodSet[stFace]" value="True" <?php if( isset( $options['stFace']) ) { echo "checked"; }; ?>/> Ativo?
                        </label>   	
                        <label>
                            Link para:
                            <input name="rodSet[lkFace]" style="width:100%" type="text" value="<?php esc_attr_e( $options['lkFace'] ); ?>" />
                        </label>
                        
                        
                        <h3>Twitter:</h3>
                        <label>
                            <input type="checkbox" name="rodSet[stTwitter]" value="True" <?php if( isset( $options['stTwitter']) ) { echo "checked"; }; ?>/> Ativo?
                        </label>   	
                        <label>
                            Link para:
                            <input name="rodSet[lkTwitter]" style="width:100%" type="text" value="<?php esc_attr_e( $options['lkTwitter'] ); ?>" />
                        </label>
                        
                       
                        
                        <h3>Google +:</h3>
                        <label>
                            <input type="checkbox" name="rodSet[stPlus]" value="True" <?php if( isset( $options['stPlus']) ) { echo "checked"; }; ?>/> Ativo?
                        </label>   	
                        <label>
                            Link para:
                            <input name="rodSet[lkPlus]" style="width:100%" type="text" value="<?php esc_attr_e( $options['lkPlus'] ); ?>" />
                        </label>
                    </div>
                    <div class="duasColunas">
                        <h3>Youtube:</h3>
                        <label>
                            <input type="checkbox" name="rodSet[stTube]" value="True" <?php if( isset( $options['stTube']) ) { echo "checked"; }; ?>/> Ativo?
                        </label>   	
                        <label>
                            Link para:
                            <input name="rodSet[lkTube]" style="width:100%" type="text" value="<?php esc_attr_e( $options['lkTube'] ); ?>" />
                        </label>
                        
                         <h3>LinkedIn:</h3>
                        <label>
                            <input type="checkbox" name="rodSet[stLinked]" value="True" <?php if( isset( $options['stLinked']) ) { echo "checked"; }; ?>/> Ativo?
                        </label>   	
                        <label>
                            Link para:
                            <input name="rodSet[lkLinked]" style="width:100%" type="text" value="<?php esc_attr_e( $options['lkLinked'] ); ?>" />
                        </label>
                        
                        <h3>RSS:</h3>
                        <label>
                            <input type="checkbox" name="rodSet[stRss]" value="True" <?php if( isset( $options['stRss']) ) { echo "checked"; }; ?>/> Ativo?
                        </label>   	
                        <label>
                            Link para:
                            <input name="rodSet[lkRss]" style="width:100%" type="text" value="<?php esc_attr_e( $options['lkRss'] ); ?>" />
                        </label>
                    </div>
                    <div style="clear:both"></div>
                    
                                        
                    
                    <div class="saveLine">
                        <input name="submit" id="submit" class="button" value="Salvar alterações" type="submit">
                    </div>
                </div>
                
                
                
                
                
                
                
                
			</div>
		</form>
	<?php } ?>
