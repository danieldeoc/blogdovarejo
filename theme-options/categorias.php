<?php 
	
	function bnCats_init(){
		register_setting( 'bnCats', 'bnCats' );
	}
	add_action( 'admin_init', 'bnCats_init' );
	
	function bnCats() {		
		wp_enqueue_media();
	?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/grid.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/theme-options/adminTheme.css" type="text/css" media="all">
	<script src="<?php echo get_template_directory_uri() ?>/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
		var $qr = jQuery.noConflict();
	</script>
    <script src="<?php echo get_template_directory_uri() ?>/theme-options/adminjs.js"></script>
	<form id="coresForm" method="post" action="options.php">
			<?php 
				settings_fields( 'bnCats' );
			?>
			<?php $options = get_option( 'bnCats' ); ?>
				<script type="text/javascript">
                	function checkaCores(){
						jQuery('.caixaconteudo input').each(function(){
							if( jQuery(this).val() == "#000000" ){
								jQuery(this).val("#3898f4")
							}	
						});
						jQuery("#submitFinal").click()	
					}
                
                </script>
			<div class="wrap">
  				<h2>Opções de Categorias</h2>
                
                
                <div class="caixaconteudo">
                    <h3>Cores das categorias</h3>
                    <label>
                        Cor padrão:
                        <input id="bnCats[bnCatsMain]" name="bnCats[colorCatsMain]" style="width:100%" type="color" value="<?php esc_attr_e( $options['colorCatsMain'] ); ?>" />
                    </label>
                    <div class="saveLine">
                        <input name="submit" id="submit" class="button" value="Salvar alterações" onClick="checkaCores()">
                    </div>
                          <input name="submit" id="submitFinal" class="button" value="Salvar alterações" type="submit" style=" display:none">  
                            
                    
                    
                <?php
					$args = array(
					  'orderby' => 'name',
					  'order' => 'ASC'
					);
					$categories = get_categories($args);
					foreach($categories as $category) { ?>
                        <label>
							<?php echo $category->name ?>:
                            <input id="bnCats<?php echo $category->term_id?>" name="bnCats[colorCat<?php echo $category->term_id?>]" style="width:100%" type="color" value="<?php esc_attr_e( $options['colorCat'.$category->term_id] ); ?>" />
                        </label>                            
                        
                    <?php } ?>
                    <div class="saveLine">
                            <input name="submit" id="submit" class="button" value="Salvar alterações" onClick="checkaCores()">
                        </div>
                </div>
                
                
                
			</div>
		</form>
	<?php } ?>
