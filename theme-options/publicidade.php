<?php 
	
	function adSet_init(){
		register_setting( 'adSet', 'adSet' );
	}
	add_action( 'admin_init', 'adSet_init' );
	
	function adSet() {		
		wp_enqueue_media();
	?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/grid.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/theme-options/adminTheme.css" type="text/css" media="all">
	<script src="<?php echo get_template_directory_uri() ?>/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
		var $qr = jQuery.noConflict();
	</script>
    <script src="<?php echo get_template_directory_uri() ?>/theme-options/adminjs.js"></script>
	<form method="post" action="options.php">
			<?php 
				settings_fields( 'adSet' );
			?>
			<?php $options = get_option( 'adSet' ); ?>

			<div class="wrap">
  				<h2>Opções de Publicidade</h2>
                
                <div class="tituloConteudo">Posições de publicidade</div>
                <div class="caixaconteudo">
                    <div class="expandTitle">Banner 1 -  após newsletter</div>
                    <div class="contentExpand">
                        <div class="expandTitle">Desktop</div>
                        <div class="contentExpand">
                            <div class="linha">      
                                <div class="col col_6">
                                     <p>A publicidade para desktop pode seguir qualquer padrão. O ideal é que seu tamanho não passe de 300x600px e seu peso não mais que 100kb.<br>
                                    Recomenda-se que se utilize qualquer um dos seguintes padrões de Display do IAB:<br>
                                    Arroba (300x250).<br>
                                    Meia Página (300x600)<br>
                                    Custom Gazin (300x450)<br>
                                    <br>
                                    Todos os demais formatos também são suportados.<br>
                                    Mais informações neste link <a href="http://www.iab.net/displayguidelines" target="_blank">IAB DisplayGUidelines</a><br>
									<br>
									<a href="<?php echo get_template_directory_uri() ?>/images/psds/banner-desktop.psd">Baixar modelo</a>
                                    
                                </div>
                                <div class="col col_6">  
                                    <h4>Banner:</h4>
                                    <label>
                                        <input type="checkbox" name="adSet[stAdCb1]" value="True" <?php if( isset( $options['stAdCb1']) ) { echo "checked"; }; ?>/> Ativo?
                                    </label>      	
                                    <label>
                                        Conteúdo do banner:
                                        <?php                                
                                        $content = $options['ctAdCb1'];
                                        $editor_id = 'ctAdCb1';
                                        $settings = array( 'textarea_name' => "adSet[ctAdCb1]" );								
                                        wp_editor( $content, $editor_id, $settings );                                
                                        ?>
                                    </label>                         
                                </div>                        
                            </div>
                            <div class="saveLine">
                                <input name="submit" id="submit" class="button" value="Salvar alterações" type="submit">
                            </div>
                        </div>
                        <div class="expandTitle">Responsivo</div>
                        <div class="contentExpand">  
                            <p>Publicidade para mobiles devem ser em .jpg ou .gif com no máximo 20kb no formato de 300x250px ou menor. <a href="<?php echo get_template_directory_uri() ?>/images/psds/banner-mobile.psd">Baixar modelo</a></p>
                            <label>
                                Link do banner:
                                <input name="adSet[adCb1Lk]" style="width:100%" type="text" value="<?php esc_attr_e( $options['adCb1Lk'] ); ?>" />
                                <i>Lembre-se de utilizar http:// e de inserir as tags do google para medir os clicks.</i>
                            </label>
                            <label>
                                Imagem:
                                <div class="selecMedia">
                                    <input class="aviso_url input" id="adcb1_img1" name="adSet[adcb1_img]" type="text" value="<?php esc_attr_e( $options['adcb1_img'] ); ?>" placeholder="Cole aqui a url da imagem" />
                                    <input id="adcb_img1_btn" class="buttonFile" name="_adcb1_img" type="button" value="Enviar foto"  data-visualizar="adcb_img1_preview" />                            
                                </div>                       
                                <div class="linha">
                                    <div class="col col_8">
                                        <?php if( isset( $options['adcb1_img']) ) { ?>
                                            <div class="previewImg">
                                                 <img id="adcb_img1_preview" src="<?php esc_attr_e( $options['adcb1_img'] ); ?>" />
                                            </div>
                                        <?php } else { ?>
                                            <div class="previewImg">
                                                 <img id="adcb_img1_preview" src="<?php echo get_template_directory_uri() ?>/images/apple-touch-icon.png"/>
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
                    
                    
                    
                    <div class="expandTitle">Banner 2 -  após vídeos</div>
                    <div class="contentExpand">
                        <div class="expandTitle">Desktop</div>
                        <div class="contentExpand">
                            <div class="linha">      
                                <div class="col col_6">
                                    <p>A publicidade para desktop pode seguir qualquer padrão. O ideal é que seu tamanho não passe de 300x600px e seu peso não mais que 100kb.<br>
                                    Recomenda-se que se utilize qualquer um dos seguintes padrões de Display do IAB:<br>
                                    Arroba (300x250).<br>
                                    Meia Página (300x600)<br>
                                    Custom Gazin (300x450)<br>
                                    <br>
                                    Todos os demais formatos também são suportados.<br>
                                    Mais informações neste link <a href="http://www.iab.net/displayguidelines" target="_blank">IAB DisplayGUidelines</a><br>
									<br>
									<a href="<?php echo get_template_directory_uri() ?>/images/psds/banner-desktop.psd">Baixar modelo</a>
                                    </p>
                                    
                                </div>
                                <div class="col col_6">  
                                    <h4>Banner:</h4>
                                    <label>
                                        <input type="checkbox" name="adSet[stAdCb2]" value="True" <?php if( isset( $options['stAdCb2']) ) { echo "checked"; }; ?>/> Ativo?
                                    </label>      	
                                    <label>
                                        Conteúdo do banner:
                                        <?php                                
                                        $content = $options['ctAdCb2'];
                                        $editor_id = 'ctAdCb2';
                                        $settings = array( 'textarea_name' => "adSet[ctAdCb2]" );								
                                        wp_editor( $content, $editor_id, $settings );                                
                                        ?>
                                    </label>                         
                                </div>                        
                            </div>
                            <div class="saveLine">
                                <input name="submit" id="submit" class="button" value="Salvar alterações" type="submit">
                            </div>
                        </div>
                        <div class="expandTitle">Responsivo</div>
                        <div class="contentExpand">  
                            <p>Publicidade para mobiles devem ser em .jpg ou .gif com no máximo 40kb no formato de 300x250px. <a href="<?php echo get_template_directory_uri() ?>/images/psds/banner-mobile.psd">Baixar modelo</a></p>
                            <label>
                                Link do banner:
                                <input name="adSet[adCb2Lk]" style="width:100%" type="text" value="<?php esc_attr_e( $options['adCb2Lk'] ); ?>" />
                                <i>Lembre-se de utilizar http:// e de inserir as tags do google para medir os clicks.</i>
                            </label>
                            <label>
                                Imagem:
                                <div class="selecMedia">
                                    <input class="aviso_url input" id="adcb2_img1" name="adSet[adcb2_img]" type="text" value="<?php esc_attr_e( $options['adcb2_img'] ); ?>" placeholder="Cole aqui a url da imagem" />
                                    <input id="adcb_img2_btn" class="buttonFile" name="_adcb2_img" type="button" value="Enviar foto"  data-visualizar="adcb_img2_preview" />                            
                                </div>                       
                                <div class="linha">
                                    <div class="col col_8">
                                        <?php if( isset( $options['adcb2_img']) ) { ?>
                                            <div class="previewImg">
                                                 <img id="adcb_img2_preview" src="<?php esc_attr_e( $options['adcb2_img'] ); ?>" />
                                            </div>
                                        <?php } else { ?>
                                            <div class="previewImg">
                                                 <img id="adcb_img2_preview" src="<?php echo get_template_directory_uri() ?>/images/apple-touch-icon.png"/>
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
                    
                </div>
                
                
                
                
			</div>
		</form>
	<?php } ?>
