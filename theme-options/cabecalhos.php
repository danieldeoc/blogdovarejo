<?php 
	
	function cabecalhoSet_init(){
		register_setting( 'cabecalhoSet', 'cabecalhoSet' );
	}
	add_action( 'admin_init', 'cabecalhoSet_init' );
	
	function cabecalhoSet() {		
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
				settings_fields( 'cabecalhoSet' );
			?>
			<?php $options = get_option( 'cabecalhoSet' ); ?>

			<div class="wrap">
  				<h2>Opções do Cabeçalho</h2>
                <div class="tituloConteudo">Frase topo</div>
                	<div class="caixaconteudo">     	
                    <label>
                        Frase topo:
                        <input name="cabecalhoSet[fraseAutor]" style="width:100%" type="text" value="<?php esc_attr_e( $options['fraseAutor'] ); ?>" />
                    </label>
                    <div class="saveLine">
                        <input name="submit" id="submit" class="button" value="Salvar alterações" type="submit">
                    </div>
                </div>
                
                <div class="tituloConteudo">Menu</div>
                	<div class="caixaconteudo">     	
                    Para editar o menu Institucional, acima da barra vermelha, <a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php">clique aqui</a> e selecione o Menu Institucional.<br>
                    <br>
					Para editar o menu topo, <a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php">clique aqui</a> e selecione o Menu Topo.
                </div>
                
                
                
                
                <div class="tituloConteudo">Slider topo Home</div>
                	<div class="caixaconteudo"> 
                    
                    <div class="duasColunas"> 
                        <h3>Slider de últimos posts</h3>
                        <label>
                            <input type="checkbox" name="cabecalhoSet[stSlider]" value="True" <?php if( isset( $options['stSlider']) ) { echo "checked"; }; ?>/> Ativo?
                        </label>                        
                    </div>
                    <div style="clear:both"></div>
                    <div class="saveLine">
                        <input name="submit" id="submit" class="button" value="Salvar alterações" type="submit">
                    </div>
                </div>
                
                <div class="tituloConteudo">Últimos vídeos</div>
                	<div class="caixaconteudo"> 
                    
                    <div class="duasColunas"> 
                        <h3>Lista de últimos vídeos</h3>
                        <label>
                            <input type="checkbox" name="cabecalhoSet[stVids]" value="True" <?php if( isset( $options['stVids']) ) { echo "checked"; }; ?>/> Ativo?
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
