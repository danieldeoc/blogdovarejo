<?php 
	
	function dadosThema_init(){
		register_setting( 'dadosThema', 'dadosThema' );
	}
	add_action( 'admin_init', 'dadosThema_init' );
	
	function dadosThema() {		
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
				settings_fields( 'dadosThema' );
			?>
			<?php $options = get_option( 'dadosThema' ); ?>

			<div class="wrap">
  				<h2>Home</h2>

  				<div class="tituloConteudo">Vídeo</div>
                <div class="caixaconteudo">  
                	 <label>
                        Título do vídeo na Home:
                        <input name="dadosThema[nomevideo]" class="input" type="text" value="<?php esc_attr_e( $options['nomevideo'] ); ?>" />
                    </label>    	
                    <label>
                        URL Youtube:
                        <input name="dadosThema[homevideo]" class="input" type="text" value="<?php esc_attr_e( $options['homevideo'] ); ?>" />
                    </label> 
                    <div class="saveLine">
                        <input name="submit" id="submit" class="button" value="Salvar alterações" type="submit">
                    </div>
                </div>
                
                <div class="tituloConteudo">Analytics</div>
                <div class="caixaconteudo">     	
                    <label>
                        Código:
                        <input name="dadosThema[analytics]" class="input" type="text" value="<?php esc_attr_e( $options['analytics'] ); ?>" />
                    </label> 
                    <div class="saveLine">
                        <input name="submit" id="submit" class="button" value="Salvar alterações" type="submit">
                    </div>
                </div>
                
                
			</div>
		</form>
	<?php } ?>
