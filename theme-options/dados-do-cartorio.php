<?php 
	function dadosCartorio_init(){
		register_setting( 'dadosCartorio', 'dadosCartorio' );
	}
	add_action( 'admin_init', 'dadosCartorio_init' );
	
	function dadosCartorio() {
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
        settings_fields( 'dadosCartorio' );
    ?>
    <?php $qroptions = get_option( 'dadosCartorio' ); ?>

	<div class="wrap">
    	
        
    
 
		<h3 class="titleSection">E-mails para contato</h3>
        <div class="bodySection">
            <div class="expandTitle">Fale Conosco</div>
            <div class="contentExpand">    	
                <label>
                    Enviar para o(s) seguintes endereço(s) do cartório:
                    <input id="ar1" name="dadosCartorio[emailcontato]" style="width:100%" type="text" value="<?php esc_attr_e( $qroptions['emailcontato'] ); ?>" />
                    <i style="font-size:11px">utilize , [vírgula] para adicionar mais de um e-mail: mail@mail.com, mail@mail.com, mail@mail.com</i>
                </label> 
                <br /><br />
                <h4>Configurações da Resposta Automática</h4>   
                <label>
                    Assunto do e-mail:
                    <input  name="dadosCartorio[emailcontato_assunto]" style="width:100%" type="text" value="<?php esc_attr_e( $qroptions['emailcontato_assunto'] ); ?>" />
                </label>        
                <label>
                    Título da respota automática:
                    <input  name="dadosCartorio[emailcontato_confTitle]" style="width:100%" type="text" value="<?php esc_attr_e( $qroptions['emailcontato_confTitle'] ); ?>" />
                </label>        
                <label>
                    Mensagem da respota automática:
                    <textarea name="dadosCartorio[emailcontato_confMsg]"><?php esc_attr_e( $qroptions['emailcontato_confMsg'] ); ?></textarea>
                </label>        
                <div class="saveLine">
                    <input name="submit" id="submit" class="button" value="Salvar alterações" type="submit">
                </div>
            </div>
            
            
            <div class="expandTitle">Trabalhe Conosco</div>
            <div class="contentExpand">    	
                <label>
                    Enviar para o(s) seguintes endereço(s) do cartório:
                    <input id="ar1" name="dadosCartorio[emailcurriculo]" style="width:100%" type="text" value="<?php esc_attr_e( $qroptions['emailcurriculo'] ); ?>" />
                    <i style="font-size:11px">utilize , [vírgula] para adicionar mais de um e-mail: mail@mail.com, mail@mail.com, mail@mail.com</i>
                </label>
                <br /><br />
                <h4>Configurações da Resposta Automática</h4>   
                <label>
                    Assunto do e-mail:
                    <input  name="dadosCartorio[emailcurriculo_assunto]" style="width:100%" type="text" value="<?php esc_attr_e( $qroptions['emailcurriculo_assunto'] ); ?>" />
                </label>         
                <label>
                    Título da respota automática:
                    <input  name="dadosCartorio[emailcurriculo_confTitle]" style="width:100%" type="text" value="<?php esc_attr_e( $qroptions['emailcurriculo_confTitle'] ); ?>" />
                </label>        
                <label>
                    Mensagem da respota automática:
                    <textarea name="dadosCartorio[emailcurriculo_confMsg]"><?php esc_attr_e( $qroptions['emailcurriculo_confMsg'] ); ?></textarea>
                </label>        
                <div class="saveLine">
                    <input name="submit" id="submit" class="button" value="Salvar alterações" type="submit">
                </div>
            </div>
            
            <?php /*
            <div class="expandTitle">Pesquisa de satisfação</div>
            <div class="contentExpand">    	
                <label>
                    Enviar para o(s) seguintes endereço(s) do cartório:
                    <input id="ar1" name="dadosCartorio[pesquisa1]" style="width:100%" type="text" value="<?php esc_attr_e( $qroptions['pesquisa1'] ); ?>" />
                    <i style="font-size:11px">utilize , [vírgula] para adicionar mais de um e-mail: mail@mail.com, mail@mail.com, mail@mail.com</i>
                </label> 
                <br /><br />
                <h4>Configurações da Resposta Automática</h4>   
                <label>
                    Assunto do e-mail:
                    <input  name="dadosCartorio[pesquisa1_assunto]" style="width:100%" type="text" value="<?php esc_attr_e( $qroptions['pesquisa1_assunto'] ); ?>" />
                </label>        
                <label>
                    Título da respota automática:
                    <input  name="dadosCartorio[pesquisa1_confTitle]" style="width:100%" type="text" value="<?php esc_attr_e( $qroptions['pesquisa1_confTitle'] ); ?>" />
                </label>        
                <label>
                    Mensagem da respota automática:
                    <textarea name="dadosCartorio[pesquisa1_confMsg]"><?php esc_attr_e( $qroptions['pesquisa1_confMsg'] ); ?></textarea>
                </label>        
                <div class="saveLine">
                    <input name="submit" id="submit" class="button" value="Salvar alterações" type="submit">
                </div>
            </div>
          
            
            <div class="expandTitle">Pedido de Testamento</div>
            <div class="contentExpand">    	
                <label>
                    Enviar para o(s) seguintes endereço(s) do cartório:
                    <input id="ar1" name="dadosCartorio[pedidotestamento]" style="width:100%" type="text" value="<?php esc_attr_e( $qroptions['pedidotestamento'] ); ?>" />
                    <i style="font-size:11px">utilize , [vírgula] para adicionar mais de um e-mail: mail@mail.com, mail@mail.com, mail@mail.com</i>
                </label> 
                <br /><br />
                <h4>Configurações da Resposta Automática</h4>   
                <label>
                    Assunto do e-mail:
                    <input  name="dadosCartorio[pedidotestamento_assunto]" style="width:100%" type="text" value="<?php esc_attr_e( $qroptions['pedidotestamento_assunto'] ); ?>" />
                </label>        
                <label>
                    Título da respota automática:
                    <input  name="dadosCartorio[pedidotestamento_confTitle]" style="width:100%" type="text" value="<?php esc_attr_e( $qroptions['pedidotestamento_confTitle'] ); ?>" />
                </label>        
                <label>
                    Mensagem da respota automática:
                    <textarea name="dadosCartorio[pedidotestamento_confMsg]"><?php esc_attr_e( $qroptions['pedidotestamento_confMsg'] ); ?></textarea>
                </label>        
                <div class="saveLine">
                    <input name="submit" id="submit" class="button" value="Salvar alterações" type="submit">
                </div>
            </div> 
			  */ ?>
        </div>
   
   		<br /><br />

 		<input name="submit" id="submit" class="button" value="Salvar alterações" type="submit">
  
	</div>
</form>
<?php } ?>