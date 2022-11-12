<?php 
	
	function landings_init(){
		register_setting( 'landings', 'landings' );
	}
	add_action( 'admin_init', 'landings_init' );
	
	function landings() {		
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
				settings_fields( 'landings' );
			?>
			<?php $options = get_option( 'landings' ); ?>

			<div class="wrap">
  				<h2>Landings Pages</h2>
                
                <div class="tituloConteudo">Landing Pages</div>
                	<div class="caixaconteudo"> 
                    <label>
                        <h3>35 Dicas para Merchandising:</h3>

                        <?php
                        /*
                        <label>
                            Assunto do E-mail do E-book:
                            <input name="landings[landingsLd1001]" style="width:100%" type="text" value="<?php esc_attr_e( $options['landingsLd1001'] ); ?>" />
                        </label>

                        <label>
                            TExto do E-mail do E-book:
                            <?php                                
                            $content = $options['landingsEb1001'];
                            $editor_id = 'landingsEb1';
                            $settings = array( 'textarea_name' => "landings[landingsEb1001]" );                               
                            wp_editor( $content, $editor_id, $settings );                                
                            ?>
                        </label> */ ?> 
                        <br/>
                        <br/>
                        <br/>
                        Pessoas cadastradas neste e-book:
                        <textarea style="width: 100%; height: 450px">
                            <?php 
                                //$wpdb->get_results("SELECT * FROM $wpdb->landings WHERE post_status = 'draft' AND post_author = 5 ");
                               global $wpdb;
                               $results = $wpdb->get_results("SELECT * FROM landings WHERE ebook = '1001' ");
                               
                                foreach ($results as $obj) {
                                    echo $obj->nome."; ".$obj->email."; ".$obj->ebook."; ".$obj->data.";   { ".$obj->array."}\n";
                                }

                             ?> 

                        </textarea>
                    </label>
                                        
                    <div class="saveLine">
                        <input name="submit" id="submit" class="button" value="Salvar alterações" type="submit">
                    </div>
                
                    <label>
                        <h3>30 DICAS PRÁTICAS DE ATENDIMENTO PARA O VAREJO:</h3>

                        <?php
                        /*
                        <label>
                            Assunto do E-mail do E-book:
                            <input name="landings[landingsLd1001]" style="width:100%" type="text" value="<?php esc_attr_e( $options['landingsLd1001'] ); ?>" />
                        </label>

                        <label>
                            TExto do E-mail do E-book:
                            <?php                                
                            $content = $options['landingsEb1001'];
                            $editor_id = 'landingsEb1';
                            $settings = array( 'textarea_name' => "landings[landingsEb1001]" );                               
                            wp_editor( $content, $editor_id, $settings );                                
                            ?>
                        </label> */ ?> 
                        <br/>
                        <br/>
                        <br/>
                        Pessoas cadastradas neste e-book:
                        <textarea style="width: 100%; height: 450px">
                            <?php 
                                //$wpdb->get_results("SELECT * FROM $wpdb->landings WHERE post_status = 'draft' AND post_author = 5 ");
                               global $wpdb;
                               $results = $wpdb->get_results("SELECT * FROM landings WHERE ebook = '1002' ");
                               
                                foreach ($results as $obj) {
                                    echo $obj->nome."; ".$obj->email."; ".$obj->ebook."; ".$obj->data.";   { ".$obj->array."}\n";
                                }

                             ?> 

                        </textarea>
                    </label>
                                        
                    <div class="saveLine">
                        <input name="submit" id="submit" class="button" value="Salvar alterações" type="submit">
                    </div>
                </div>
                
                
                
                
                
                
                
                
                
                
                
                
			</div>
		</form>
	<?php } ?>
