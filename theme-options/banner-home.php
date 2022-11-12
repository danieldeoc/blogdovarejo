<?php 
	
	function bannerhome_init(){
		register_setting( 'bannerhome', 'bannerhome' );
	}
	add_action( 'admin_init', 'bannerhome_init' );
	
	function bannerhome() {
		?>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<?php 
		 wp_enqueue_media();
		 
		 
			
?>
<form method="post" action="options.php"> 
		
			<?php 
				settings_fields( 'bannerhome' );
			?>
			<?php $options = get_option( 'bannerhome' ); ?>

<div class="wrap">
  <h2>Porto Belo - Banner Home</h2>
  <style>
        .tablebanner{ background:#e4e4e4; padding:5px}
        </style>
  <table class="form-table tablebanner">
    <tbody>
    	
    
    	<!-- banner 1 -->
    	<tr>
        	<td style="width:250px">
	        	Banner 1:
            </td>
            <td class="n1atv">
            	<input id="bn1_status" name="bannerhome[bn1_status]" type="radio" value="ativo" onclick="checaBanner(1)" <?php if( $options['bn1_status'] == "ativo") { echo " checked"; }  ?> /> Ativo | 
                <input id="bn1_status" onclick="checaBanner(1)" name="bannerhome[bn1_status]" type="radio" value="Inativo" <?php if( $options['bn1_status'] == "Inativo") { echo " checked"; }  ?> /> Inativo
               
            </td>
        </tr>
        <tr class="n1data" style="display:none">
        	<td>
	        	Link Banner 1:
            </td>
            <td>
            	<input id="bn1_link" name="bannerhome[bn1_link]" type="text" value="<?php esc_attr_e( $options['bn1_link'] ); ?>" />
            </td>
        </tr>
        <tr class="n1data" style="display:none">
        	<td>
	        	Fundo Banner 1:
            </td>
            <td>
            	<input id="_bn1_fundo" name="bannerhome[bn1_fundo]" type="text" value="<?php esc_attr_e( $options['bn1_fundo'] ); ?>" />
                <input id="_bn1_fundo" class="buttonFile" name="_bn1_fundo" type="button" value="Enviar fundo" />
                
            </td>
        </tr>
        <tr class="n1data" style="display:none">
        	<td>
	        	Banner 1:
            </td>
            <td>
            	<input id="_bn1" name="bannerhome[bn1]" type="text" value="<?php esc_attr_e( $options['bn1'] ); ?>" />
                <input id="_bn1" class="buttonFile" name="_bn1" type="button" value="Enviar banner" />
                
                
            </td>
        </tr>
        <?php if($options['bn1']  != null ) { ?>
        <tr class="n1data" style="display:none">
        	<td>Preview:</td>
        	<td><div style="width:450px; height:220px; text-align:center; background:url(<?php esc_attr_e( $options['bn1_fundo'] ); ?>) center center no-repeat; background-size:cover">
            	<img src="<?php esc_attr_e( $options['bn1'] ); ?>" width="85%" style="margin:25px auto" />
            </div></td>
        
        </tr>
		<?php } ?>
        <!-- fim banner 1 -->
   </tbody>
   </table>
   
   <table class="form-table tablebanner">
    <tbody>     
        <!-- banner 2 -->
    	<tr>
        	<td style="width:250px">
	        	Banner 2:
            </td>
            <td class="n2atv">
            	<input id="bn2_status" name="bannerhome[bn2_status]" type="radio" value="ativo" onclick="checaBanner(2)" <?php if( $options['bn2_status'] == "ativo") { echo " checked"; }  ?> /> Ativo | 
                <input id="bn2_status" onclick="checaBanner(2)" name="bannerhome[bn2_status]" type="radio" value="Inativo" <?php if( $options['bn2_status'] == "Inativo") { echo " checked"; }  ?> /> Inativo                
            </td>
        </tr>
        <tr class="n2data" style="display:none">
        	<td>
	        	Link Banner 2:
            </td>
            <td>
            	<input id="bn2_link" name="bannerhome[bn2_link]" type="text" value="<?php esc_attr_e( $options['bn2_link'] ); ?>" />
            </td>
        </tr>
        <tr class="n2data" style="display:none">
        	<td>
	        	Fundo Banner 2:
            </td>
            <td>
            	<input id="_bn2_fundo" name="bannerhome[bn2_fundo]" type="text" value="<?php esc_attr_e( $options['bn2_fundo'] ); ?>" />
                <input id="_bn2_fundo" class="buttonFile" name="_bn2_fundo" type="button" value="Enviar fundo" />
                
            </td>
        </tr>
        <tr class="n2data" style="display:none">
        	<td>
	        	Banner 2:
            </td>
            <td>
            	<input id="_bn2" name="bannerhome[bn2]" type="text" value="<?php esc_attr_e( $options['bn2'] ); ?>" />
                <input id="_bn2" class="buttonFile" name="_bn2" type="button" value="Enviar banner" />
                
                
            </td>
        </tr>
        <?php if($options['bn2']  != null ) { ?>
        <tr class="n2data" style="display:none">
        	<td>Preview:</td>
        	<td><div style="width:450px; height:220px; text-align:center; background:url(<?php esc_attr_e( $options['bn2_fundo'] ); ?>) center center no-repeat; background-size:cover">
            	<img src="<?php esc_attr_e( $options['bn2'] ); ?>" width="85%" style="margin:25px auto" />
            </div></td>
        
        </tr>
		<?php } ?>
        <!-- fim banner 2 -->
        
    </tbody>
   </table>
   
   <table class="form-table tablebanner">
    <tbody>      
        <!-- banner 3 -->
    	<tr>
        	<td style="width:250px">
	        	Banner 3:
            </td>
            <td class="n3atv">
            	<input id="bn3_status" name="bannerhome[bn3_status]" type="radio" value="ativo" onclick="checaBanner(3)" <?php if( $options['bn3_status'] == "ativo") { echo " checked"; }  ?> /> Ativo | 
                <input id="bn3_status" onclick="checaBanner(3)" name="bannerhome[bn3_status]" type="radio" value="Inativo" <?php if( $options['bn3_status'] == "Inativo") { echo " checked"; }  ?> /> Inativo
                
            </td>
        </tr>
        <tr class="n3data" style="display:none">
        	<td>
	        	Link Banner 3:
            </td>
            <td>
            	<input id="bn3_link" name="bannerhome[bn3_link]" type="text" value="<?php esc_attr_e( $options['bn3_link'] ); ?>" />
            </td>
        </tr>
        <tr class="n3data" style="display:none">
        	<td>
	        	Fundo Banner 3:
            </td>
            <td>
            	<input id="_bn3_fundo" name="bannerhome[bn3_fundo]" type="text" value="<?php esc_attr_e( $options['bn3_fundo'] ); ?>" />
                <input id="_bn3_fundo" class="buttonFile" name="_bn3_fundo" type="button" value="Enviar fundo" />
                
            </td>
        </tr>
        <tr class="n3data" style="display:none">
        	<td>
	        	Banner 3:
            </td>
            <td>
            	<input id="_bn3" name="bannerhome[bn3]" type="text" value="<?php esc_attr_e( $options['bn3'] ); ?>" />
                <input id="_bn3" class="buttonFile" name="_bn3" type="button" value="Enviar banner" />
                
                
            </td>
        </tr>
        <?php if($options['bn3']  != null ) { ?>
        <tr class="n3data" style="display:none">
        	<td>Preview:</td>
        	<td><div style="width:450px; height:220px; text-align:center; background:url(<?php esc_attr_e( $options['bn3_fundo'] ); ?>) center center no-repeat; background-size:cover">
            	<img src="<?php esc_attr_e( $options['bn3'] ); ?>" width="85%" style="margin:25px auto" />
            </div></td>
        
        </tr>
		<?php } ?>
        <!-- fim banner 1 -->
     </tbody>
   </table>
   
   <table class="form-table tablebanner">
    <tbody>     
        
        <!-- banner 4 -->
    	<tr>
        	<td style="width:250px">
	        	Banner 4:
            </td>
            <td class="n4atv">
            	<input id="bn4_status" name="bannerhome[bn4_status]" type="radio" value="ativo" onclick="checaBanner(4)" <?php if( $options['bn4_status'] == "ativo") { echo " checked"; }  ?> /> Ativo | 
                <input id="bn4_status" onclick="checaBanner(4)" name="bannerhome[bn4_status]" type="radio" value="Inativo" <?php if( $options['bn4_status'] == "Inativo") { echo " checked"; }  ?> /> Inativo                
            </td>
        </tr>
        <tr class="n4data" style="display:none">
        	<td>
	        	Link Banner 4:
            </td>
            <td>
            	<input id="bn4_link" name="bannerhome[bn4_link]" type="text" value="<?php esc_attr_e( $options['bn4_link'] ); ?>" />
            </td>
        </tr>
        <tr class="n4data" style="display:none">
        	<td>
	        	Fundo Banner 4:
            </td>
            <td>
            	<input id="_bn4_fundo" name="bannerhome[bn4_fundo]" type="text" value="<?php esc_attr_e( $options['bn4_fundo'] ); ?>" />
                <input id="_bn4_fundo" class="buttonFile" name="_bn4_fundo" type="button" value="Enviar fundo" />
                
            </td>
        </tr>
        <tr class="n4data" style="display:none">
        	<td>
	        	Banner 4:
            </td>
            <td>
            	<input id="_bn4" name="bannerhome[bn4]" type="text" value="<?php esc_attr_e( $options['bn4'] ); ?>" />
                <input id="_bn4" class="buttonFile" name="_bn4" type="button" value="Enviar banner" />
                
                
            </td>
        </tr>
        <?php if($options['bn4']  != null ) { ?>
        <tr class="n4data" style="display:none">
        	<td>Preview:</td>
        	<td><div style="width:450px; height:220px; text-align:center; background:url(<?php esc_attr_e( $options['bn4_fundo'] ); ?>) center center no-repeat; background-size:cover">
            	<img src="<?php esc_attr_e( $options['bn4'] ); ?>" width="85%" style="margin:25px auto" />
            </div></td>
        
        </tr>
		<?php } ?>
        <!-- fim banner 1 -->
        
        
        
        
    </tbody>
  </table>
  <input name="submit" id="submit" class="button" value="Salvar alterações" type="submit">
  
</div>
<script type="text/javascript">
$(document).ready(function(){
	var _custom_media = true,
	_orig_send_attachment = wp.media.editor.send.attachment;
 
	$('.buttonFile').click(function(e) {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);
		var id = button.attr('id').replace('_button', '');
		_custom_media = true;
		wp.media.editor.send.attachment = function(props, attachment){
			if ( _custom_media ) {
				$("#"+id).val(attachment.url);
			} else {
				return _orig_send_attachment.apply( this, [props, attachment] );
			};
		}
 
		wp.media.editor.open(button);
		return false;
	});
 
	$('.add_media').on('click', function(){
		_custom_media = false;
	});
});

                	function checaBanner(n){
						var check = $(".n"+n+"atv input:checked").val();
						if(check == "ativo"){
							$(".n"+n+"data").show()
						} else {
							$(".n"+n+"data").css('display','none')
						}						
					}
					
					$(document).ready(function(){
						checaBanner('1');	
						checaBanner('2');	
						checaBanner('3');	
						checaBanner('4');	
					});
					
					
                </script>
</form>
<?php

		
		
		

}?>
