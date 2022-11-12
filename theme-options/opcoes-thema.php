<?php 
	
	function opcoesThema_init(){
		register_setting( 'opcoesThema', 'opcoesThema' );
	}
	add_action( 'admin_init', 'opcoesThema_init' );
	
	function opcoesThema() {		
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
				settings_fields( 'opcoesThema' );
			?>
			<?php $options = get_option( 'opcoesThema' ); ?>

			<div class="wrap">
  				<h2>Opções do tema</h2>
                <div class="tituloConteudo">Links rápidos homepage</div>
                <div class="caixaconteudo">
                	<p><strong>MODELO DE BANNER:</strong><br />
                    <a href="<?php echo get_template_directory_uri() ?>/psd/destaques-home.psd">Clique aqui para fazer o dowload do .psd</a> da imagem modelo para o banner desta sessão.</p>
                	<h4>Destaque 1</h4>                    
                    <label>
                        Link:
                        <input id="ar1" name="opcoesThema[dst1_link]" class="input" type="text" value="<?php esc_attr_e( $options['dst1_link'] ); ?>" />
                    </label>
                    <label>
                    	Imagem:
                        <div class="selecMedia">
                            <input class="aviso_url input" id="dst_img1" name="opcoesThema[dst1_img]" type="text" value="<?php esc_attr_e( $options['dst1_img'] ); ?>" placeholder="Cole aqui a url da imagem" />
                            <input id="dst_img1_btn" class="buttonFile" name="_dst1_img" type="button" value="Enviar banner"  data-visualizar="dst_img1_preview" />                            
                        </div>                       
                        <div class="linha">
                            <div class="col col_8">
                                <?php if( $options['dst1_img'] != null ) { ?>
                                    <div class="previewImg">
                                         <img id="dst_img1_preview" src="<?php esc_attr_e( $options['dst1_img'] ); ?>" />
                                    </div>
                                <?php } else { ?>
                                    <div class="previewImg">
                                         <img id="dst_img1_preview" src="<?php echo get_template_directory_uri() ?>/images/apple-touch-icon.png"/>
                                    </div>	
                                <?php } ?>
                            </div>                            
                        </div>
                    </label>
                    
                    <h4>Destaque 2</h4>                  
                    <label>
                        Link:
                        <input name="opcoesThema[dst2_link]" class="input" type="text" value="<?php esc_attr_e( $options['dst2_link'] ); ?>" />
                    </label>
                    <label>
                    	Imagem:
                        <div class="selecMedia">
                            <input class="aviso_url input" id="dst_img2" name="opcoesThema[dst2_img]" type="text" value="<?php esc_attr_e( $options['dst2_img'] ); ?>" placeholder="Cole aqui a url da imagem" />
                            <input id="dst_img2_btn" class="buttonFile" name="_dst2_img" type="button" value="Enviar banner" data-visualizar="dst_img2_preview" />                            
                        </div>                       
                        <div class="linha">
                            <div class="col col_8">
                                <?php if( $options['dst2_img'] != null ) { ?>
                                    <div class="previewImg">
                                         <img id="dst_img2_preview" src="<?php esc_attr_e( $options['dst2_img'] ); ?>" />
                                    </div>
                                <?php } else { ?>
                                    <div class="previewImg">
                                         <img id="dst_img2_preview" src="<?php echo get_template_directory_uri() ?>/images/apple-touch-icon.png"/>
                                    </div>	
                                <?php } ?>
                            </div>                            
                        </div>
                    </label>                                       
                    <div class="saveLine">
                        <input name="submit" id="submit" class="button" value="Salvar alterações" type="submit">
                    </div>
                </div>
			</div>
		</form>
	<?php } ?>
