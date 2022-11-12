<?php 
		
		
		// Chama o banco do WP e seleciona os resultados: poupups ativos com data inicial maior que agora e agora menor que a data final
		global $wpdb;		
		$drafts = $wpdb->get_results("SELECT * FROM popups WHERE status = 'ativo' AND  NOW() >= dataini AND  NOW() <= datafim "); 
		
		// verifica se trouxe alguma coisa
		if ( $drafts ){
			
			// para cada popup executa o loop
			foreach ( $drafts as $draft ) {
				echo '<div id="id_'.$draft->id.'" class="popup">';
					if($draft->type == "banner" ){ ?>
						
                        <div class="imagecontainer" style="max-width:<?php echo $draft->width ?>px">
							<div class="closePopup">x</div>
							<a href="<?php echo $draft->linkurl ?>" target="<?php echo $draft->target ?>">
								<img src="<?php echo $draft->url ?>" alt="<?php echo $draft->nome ?>" />
							</a>
						</div>
                        
					<?php } else { ?>
						<div class="popupText" style="max-width:<?php echo $draft->size?>px; background-color:<?php echo $draft->color?>">
							<div class="closePopup">x</div>
							<?php 
								
								$text = htmlspecialchars_decode($draft->texto);
								echo stripslashes($text) ?>							
						</div>
					<?php };
					if ($draft->bloq == "bloqueante") echo '<div class="overlay"></div>';
				echo '</div>';
				?>
                <script type="text/javascript">
                	noshowMore = false;
                </script>
                <?php
				// verifica se a exibição será única ou continua e cria um cookie se necessário
				if ($draft->freq == "unica") { ?>				
					<script type="text/javascript">
                        if(localStorage.getItem("<?php echo "popup_".$draft->id?>")){
							console.log('1')
                            document.getElementById("<?php echo "id_".$draft->id?>").style.display = 'none';
							jQuery("#<?php echo "id_".$draft->id?>").remove();
							noshowMore = true;
                        } else {
							console.log('1')
                            localStorage.setItem("<?php echo "popup_".$draft->id?>", "true");
                        }
                    </script>
                <?php } ;
				
				// verifica se a exibição será única ou continua e cria um cookie se necessário
				if ($draft->out == "sim") { ?>				
					<script type="text/javascript">
					if( noshowMore == true){
					
					} else {
						console.log('a')
							document.getElementById("<?php echo "id_".$draft->id?>").style.display = 'none';
							jQuery(document).mouseleave(function(){
								if( noshowMore == false){
									console.log('e')
									noshowMore = true;
									document.getElementById("<?php echo "id_".$draft->id?>").style.display = 'block';
									jQuery(".popup").each(function(){
										jQuery(this).find('img').load(function(){
											var w = jQuery(this).width();
											var h = jQuery(this).height();	
											jQuery(this).parents('.imagecontainer').css('margin','0 0 0 -'+ (w/2) +'px');										  
										});						  
									});
									jQuery(".popupText").each(function(){
										var w = jQuery(this).width();
										var h = jQuery(this).height();	
										jQuery(this).css('margin','0 0 0 -'+ (w/2) +'px');						
									});	
								};
							});
						
					}
							</script>
                <?php } ;
					
				// oculta o popup após o tempo determinado
				if ($draft->hide != "Nunca") { ?>
					<script type="text/javascript">
                        setTimeout(function(){
                            jQuery("#id_<?php echo $draft->id ?>").fadeOut() }, <?php echo $draft->hide ?>);
                        
                    </script>	
                <?php };
			};?>
			<style type="text/css">
			
				.popup							{}
				.popup .overlay					{ position:fixed; z-index:1000000; left:0; top:0; right:0; bottom:0; background:#000; background:rgba(0,0,0,0.5);}
				.popup .imagecontainer,
				.popup .popupText				{ position:fixed; width:90%; z-index:1000001; left:50%; top:55px; -moz-border-radius:8px; border-radius:8px;}
				.popup .imagecontainer img		{ width:100%}
				.popup .closePopup				{ position:absolute; right:0; top:0; background:#fff; padding:0 12px 5px; font-size:23px; color:#454545;
												-moz-border-radius:100%; border-radius:100%; cursor:pointer; margin:-20px -20px 0 0;
												-webkit-box-shadow: 0 1px 1px 1px rgba(0,0,0,0.3); box-shadow: 0 1px 1px 1px rgba(0,0,0,0.3);}
				.popup .closePopup:hover		{ background-color:#900; color:#fff}
            </style>
            <script type="text/javascript">
				jQuery(document).on('click','.closePopup', function(){
					jQuery(this).parents('.popup').fadeOut()			   
				});
				
				jQuery(document).ready(function(){
						
					
					jQuery(".popup").each(function(){
						jQuery(this).find('img').load(function(){
							var w = jQuery(this).width();
							var h = jQuery(this).height();	
							jQuery(this).parents('.imagecontainer').css('margin','0 0 0 -'+ (w/2) +'px');										  
						});						  
					});
					jQuery(".popupText").each(function(){
						var w = jQuery(this).width();
						var h = jQuery(this).height();	
						jQuery(this).css('margin','0 0 0 -'+ (w/2) +'px');						
					});	
					
					jQuery(window).resize(function(){
						central();	 
					});
					
					function central(){
						jQuery(".popup img").each(function(){
							var w = jQuery(this).width();
							jQuery(this).parents('.imagecontainer').css('margin','0 0 0 -'+ (w/2) +'px');										  
												  
						});
						jQuery(".popupText").each(function(){
							var w = jQuery(this).width();
							var h = jQuery(this).height();	
							jQuery(this).css('margin','0 0 0 -'+ (w/2) +'px');						
						});	
					}
				});
				
            </script>
<?php }; ?>