<?php 
	
	function avisospopups_init(){
		register_setting( 'avisospopups', 'avisospopups' );
	}
	add_action( 'admin_init', 'avisospopups_init' );
	
	function avisospopups() {
		wp_enqueue_media();
	?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/theme-options/adminTheme.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/grid.css" type="text/css" media="all">
	<script src="<?php echo get_template_directory_uri() ?>/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
		var $qr = jQuery.noConflict();
	</script>
    <script src="<?php echo get_template_directory_uri() ?>/theme-options/adminjs.js"></script>
    
    
	<form method="post" action="popups/insert.php"> 		
		<?php 
            //settings_fields( 'avisos' );
            //$options = get_option( 'avisos' );
        ?>
		<div class="wrap">
        	<h2>Cadastro de Pop-ups</h2>
            
            
            <div class="mensagelist"></div>
                <table class="listTable" cellpadding="0" cellspacing="0">
                    <caption>Pop-ups cadastrados</caption>
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Nome</th>
                            <th>Bloqueante?</th>
                            <th>Data inicial</th>
                            <th>Data final</th>
                            <th>Tipo</th>
                            <th>Img</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody id="the-list">
            	<?php
					global $wpdb;
                	$drafts = $wpdb->get_results("SELECT * FROM popups");
					date_default_timezone_set("Brazil/East");
					if ( $drafts ){ ?>
                    	
                    <?php
						foreach ( $drafts as $draft ) { ?>
                        
                        	<tr id="ln_<?php echo $draft->id; ?>">
                            	<td style="text-align:center; width:20px">
                                	<?php if ( $draft->status == "ativo" && date("Y-m-d h:i") <= $draft->datafim) {
											echo '<img src="'.get_template_directory_uri().'/images/estrutura/itemon.png" title="ativo" />' ;
										} else {
											echo '<img src="'.get_template_directory_uri().'/images/estrutura/itemoff.png" title="ativo" />' ;
										} ?>
                                </td>
                                <td>
                                	<?php echo $draft->nome; ?>
                                </td>
                                <td>
                                	<?php echo $draft->bloq; ?>
                                </td>
                                <td>
                                	<?php echo $draft->dataini; ?>
                                </td>
                                <td>
                                	<?php echo $draft->datafim; ?>
                                </td>
                                <td>
                                	<?php echo $draft->type; ?>
                                </td>                                
                                <td>
                                	<img src="<?php echo $draft->url; ?>" width="100" />
                                </td>
                                <td style="width:55px">
                                	<a onclick="populateForm('popups','<?php echo $draft->id; ?>', this)">
                                    	<img src="<?php echo get_template_directory_uri() ?>/images/estrutura/edit.png" title="Editar" style="cursor:pointer" />
                                    </a> &nbsp; 
                                    <a onclick="deletaItem('popups',{id:<?php echo $draft->id; ?>}, <?php echo $draft->id; ?>)">
                                    	<img src="<?php echo get_template_directory_uri() ?>/images/estrutura/del.png" title="Editar" style="cursor:pointer" />
                                    </a>
								</td>
                            </tr>
							
					<?php	} ?>
                    		
					<?php } else { ?>
                    	 <tr>
                            <td colspan="9">
                                Nenhum registro encontrado.
                            </td>
                        </tr>
				<?php } ?>
                	</tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9">
                                <input class="button addNew" value="Adicionar novo pop-up" type="button" />
                            </td>
                        </tr>
                    </tfoot>
                </table>
            
            
                <div class="cadastroBox" style="display:none">            	
                    <div class="tituloConteudo">Pop-up</div>
                    <div class="caixaconteudo">   
                    	
                        <div class="mensagelist"></div>
                    
                    	<div class="linha">
                            <div class="col col_8">
                            	<input type="hidden" id="id" value="" />
                                <label>
                                    Nome para o pop-up:
                                    <input class="aviso_nome" required="required" name="nome" type="text" />
                                </label>
                            </div>
                            <div class="col col_4">
                            	<div class="radioLabel">
                                    <strong>Status do aviso:</strong>
                                    <label>                
                                        <input class="aviso_status" checked="checked" name="status" type="radio" value="ativo"  /> Ativo
                                    </label>
                                    <label>
                                        <input class="aviso_status" name="status" type="radio" value="Inativo" /> Inativo
                                    </label> 
                                </div> 
                            </div>
                        </div>                    	
                        <div class="linha">									
                            <div class="col col_3">
                                Exibir a partir de:<br />
                                <input class="aviso_dataini" type="date" name="exibirdataini" value="<?php echo date("Y-m-d") ?>" />
                            </div>
                            <div class="col col_3"><br />
                                <input class="aviso_horaini" type="time" name="exibirhoraini" value="<?php echo date("h:i") ?>" />
                            </div>
                            <div class="col col_3">
                                Exibir até:<br />
                                <input class="aviso_datafim" type="date" name="exibirdatafim" value="<?php echo date("Y-m-d") ?>" />
                            </div>
                            <div class="col col_3"><br />
                                <input class="aviso_horafim" type="time" name="exibirhorafim" value="23:59" />
                            </div>
                        </div>                        
                        
                        
                        <div class="linha">
                        	<div class="col col_12">
                            	
                                <div class="radioLabel">
                                    <strong>Tipo de pop-up:</strong>
                                    <label>                
                                        <input  class="aviso_type" name="avisos[type]" type="radio" value="banner"/> Banner
                                    </label>
                                    <label>
                                        <input  class="aviso_type" name="avisos[type]" type="radio" value="texto" /> Texto
                                    </label>                   
                                </div>
                            
                            </div>
                        </div>
                        
                        <div id="popupimage" class="subInfoBox" style="display:none">
                        	<h4>Enviar pop-up de imagem.</h4>
                            <label>
                            	<div class="linha">
                                    <div class="col col_12">
                                        Selecione a imagem para o pop-up:
                                        <div class="selecMedia">
                                            <input class="aviso_url input" id="avs_aviso1" name="avisos[aviso1]" type="text" value="<?php esc_attr_e( $options['dst1_img'] ); ?>" placeholder="Cole aqui a url da imagem" />
                                            <input id="avs_aviso1_btn" class="buttonFile" name="_aviso1_img" type="button" value="Enviar imagem" data-visualizar="avs_aviso1_preview" />                            
                                        </div> 
                                        <i><a href="<?php echo get_bloginfo('template_directory');?>/modelo-popup.psd">Baixar modelo de pop-up .psd / photoshop.</a></i>
                                	</div>
                                </div>
                                <div class="linha">
                                    <div class="col col_3">
                                        <strong>Largura da imagem: <span id="sizePx">650</span> </strong><br />
                                        <input type="range" class="previewAdjust aviso_imglarg" name="points" min="200" max="1000" value="300"  data-visualizar="avs_aviso1_preview">
                                        <i style="font-size:11px">Caso queira, ajuste a largura do popup, a altura sera ajustada proporcionalmente.</i>
                                    </div>
                                    <div class="col col_6">
                                          <label>
                                            Link do pop-up:
                                            <input class="aviso_link" name="avisos[avisos_link]" type="text" />
                                            <i style="font-size:11px">Deixe em branco caso o pop-up não tenha link</i>
                                        </label>  
                                    </div>
                                    <div class="col col_3">
                                        <div class="radioLabel">
                                            <strong>Abrir link em:</strong>
                                            <label>                
                                                <input class="aviso_target" name="avisos[avisos_dest]" type="radio" value="_blank" /> Nova página
                                            </label>
                                            <label>
                                                <input class="aviso_target" checked="checked" name="avisos[avisos_dest]" type="radio" value="_self" /> Mesma Página
                                            </label> 
                                        </div>
                                    </div>
                                </div>
                                <div class="linha">
                                    <div class="col col_12">
                                    	<div class="pop-upDemonstrer"> 
											<?php if($options['aviso1']  != null ) { ?>
                                                <div class="popupImg">
                                                	<div class="closePopup">x</div>
                                                     <img id="avs_aviso1_preview" src="<?php esc_attr_e(  $options['aviso1']  ); ?>" />
                                                </div>
                                            <?php } else { ?>
                                                <div class="popupImg">
                                                	<div class="closePopup">x</div>
                                                     <img id="avs_aviso1_preview" src="<?php echo get_bloginfo('template_directory');?>/images/logo.png" width="300" />
                                                </div>	
                                            <?php } ?>
                                        </div>
                                    </div>
                               </div>                               
                               <br />                                
                            </label>                
                        </div>
                        
                        
                        <div id="popuptext" style="display:none" class="subInfoBox">
                        	<h4>Pop-up de texto</h4>
                            
                            <div class="linha">
                            	<div class="col col_12">
                                	<label>
                                        Texto do popup:
                                        <?php
										
										$content = '';
										$editor_id = 'textoaviso';
										
										wp_editor( $content, $editor_id );
										
										?>
                                        <!-- textarea name="textoaviso" class="aviso_text"></textarea -->
                                    </label>  
                                </div>
                            </div>
                            <div class="linha">
                            	<div class="col col_6">
                                	<label>
                                        Cor de fundo do popup:
                                        <input type="color" name="coraviso" class="aviso_color" value="#FFFFFF" />
                                    </label>
                                </div>
                                <div class="col col_6">
                                  	<label>
                                        <strong>Largura do pop-up: <span id="sizepopup">650</span> </strong><br />
                                        <input type="range" class="popupAdjust aviso_larg popupWidth" name="largaviso" id="popupavisolarg" min="200" max="1000" value="650">
                                        <i style="font-size:11px">Caso queira, ajuste a largura do popup, a altura sera ajustada proporcionalmente.</i>                    
                                    </label>
                                </div>
                            </div>
                            <div class="linha">
                            	<div class="col col_12">
                                	<input class="button atualizaPopup" style="width:auto; margin:15px 0" value="Atualizar popup" type="button">
                                    <div class="pop-upDemonstrer">                            			
                                        <div class="popupText">
                                            <div class="closePopup">x</div>
                                            <div id="ct">
                                            <a href="#" target="#">
                                                texto do popup
                                            </a>
                                            </div>
                                        </div>                            
                            		</div>                                
                                </div>
                            </div>
                            
                        </div>
                        
                        
                        <div class="linha">
                        	<div class="col col_12">        
            		            <a id="exibaAvancadas">Exibir opções avançadas</a>
    		                    <div id="advanced" style="display:none" class="subInfoBox">
                        	<h4>Opções Avançadas</h4>
                            <div class="linha">
	                        <div class="col col_3">
                            	<div class="radioLabel">
                                    <strong>Tipo de pop-up:</strong>
                                    <br />
                                    <label>                
                                        <input class="aviso_bloq" name="avisos[avisos_type]" type="radio" value="bloqueante"  /> Bloqueante
                                    </label><br />
                                    <label>
                                        <input class="aviso_bloq" checked="checked" name="avisos[avisos_type]" type="radio" value="livre" /> Não bloqueante
                                    </label> <br />
                                    <i style="font-size:11px">Um pop-up bloqueante irá apresentar um fundo preto translúcido sobre o site impendindo que o usuário navegue para outras páginas antes de fechar o popup</i>
                                </div>
                            </div>
                            <div class="col col_3">                            	
                                <div class="radioLabel">
                                    <strong>Frequência:</strong>
                                    <br />
                                    <label>                
                                        <input checked="checked" class="aviso_freq" name="freq" type="radio" value="sempre" /> Todas as vezes que a página carregar
                                    </label>
                                    <label>
                                        <input class="aviso_freq" name="freq" type="radio" value="unica" /> Exibir somente uma vez
                                    </label> <br />
                                    <i style="font-size:11px">O pop-up pode ser exibido todas as vezes que o usuário entrar no site ou somente quando ele entrar pela primeira vez.</i>
                                </div>                            
                            </div>
                            <div class="col col_3">
                            	<label>
                                    <strong>Ocultar após:</strong><br />
                                    <select  class="aviso_hide" name="ocultarem">
                                        <option value="5000">5 seg</option>
                                        <option value="10000">10 seg</option>
                                        <option value="15000">15 seg</option>
                                        <option value="30000">30 seg</option>
                                        <option value="60000">60 seg</option>
                                        <option value="120000">120 seg</option>
                                        <option value="240000">240 seg</option>
                                        <option value="360000">360 seg</option>
                                        <option value="Nunca" selected="selected">Nunca</option>
                                    </select><br />
                                    <i style="font-size:11px">O pop-up fechará automaticamente após o tempo determinado.</i>
                                </label>
                            </div>
                        </div>
                        	                         
                       		<!-- label>
                            <strong>Selecione as páginas e categorias para exibir o popup</strong>
                            <div class="linha">
                                <div class="col col_3">
                                    Selecione as páginas:
                                    <select class="aviso_pages" name="pages"  multiple size="6"> 
                                        <option value="home" selected="selected">Home Page</option> 
                                        <?php 
                                            $pages = get_pages(); 
                                                foreach ( $pages as $page ) {
                                                $option = '<option value="'.$page->ID.'">';
                                                $option .= $page->post_title;
                                                $option .= '</option>';
                                                echo $option;
                                            }
                                        ?>
                                    </select>                        
                                </div>
                                <div class="col col_3">
                                    Selecione os posts:<br />
                                    <select class="aviso_posts" name="posts" id="page_id"  multiple size="6">
                                        <option value="Nenhum" selected="selected">Nenhum</option>
                                    <?php
                                    global $post;
                                    $args = array( 'numberposts' => -1);
                                    $posts = get_posts($args);
                                    foreach( $posts as $post ) : setup_postdata($post); ?>
                                            <option value="<?php echo $post->ID; ?>"><?php the_title(); ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </div> 
                                <div class="col col_3">
                                    Selecione as categorias:
                                    <select class="aviso_categorias" name="categori"  multiple size="6">
                                        <option value="Nenhum" selected="selected">Nenhum</option>
                                        <?php 
                                            $categories = get_categories(); 
                                            foreach ($categories as $category) {
                                                $option = '<option value="'.$category->term_id.'">';
                                                $option .= $category->cat_name;
                                                $option .= ' ('.$category->category_count.')';
                                                $option .= '</option>';
                                                echo $option;
                                            }
                                        ?>
                                    </select>
                                </div>
                                 <div class="col col_3">
                                 Selecione as tags:
                                    <select class="aviso_tags" name="tags"  multiple size="6">
                                        <option value="Nenhum" selected="selected">Nenhum</option>
                                        <?php $tag = wp_tag_cloud('format=array' );
                                        foreach($tag as $tagkey => $tagvalue){
                                            $cleanedup = strip_tags($tagvalue);
                                            echo "<option value='".$tagkey."'>".$cleanedup."</option>";
                                        }
        
                                        ?>	
                                    </select>
                                </div>
                                                   
                            </div>                    
                            <i style="font-size:11px">Dica: segure control e clique em vários itens para selecionar mais de um.</i>
                        </label -->
                            
                        </div>
	                        </div>
                        </div>
                        <div class="saveLine">
                            <input name="submit" id="submitCadastra" class="button button-primary button-large" value="Cadastrar popup" type="button" onclick="submitForm()">
                            <input name="submit" id="submitAltera" class="button button-primary button-large" value="Salvar alterações" type="button" onclick="updateForm()" style="display:none">
                        </div> 
                        
                
                    </div>
                    
                </div>
                
                <script>
                	function submitForm(){
						$qr("#textoaviso").val( tinymce.activeEditor.getContent() );
						
						var nome = $qr(".aviso_nome").val();
						var status = $qr(".aviso_status:checked").val();
						var dataini = $qr(".aviso_dataini").val() + " " + $qr(".aviso_horaini").val();
						var datafim = $qr(".aviso_datafim").val() + " " + $qr(".aviso_horafim").val();
						var linkVal = $qr(".aviso_link").val();
						var target = $qr(".aviso_target:checked").val();
						var bloq = $qr(".aviso_bloq:checked").val();
						var freq = $qr(".aviso_freq:checked").val();
						var hide = $qr(".aviso_hide").val();
						var pages = $qr(".aviso_pages").val();
						var posts = $qr(".aviso_posts").val();
						var cats = $qr(".aviso_categorias").val();
						var tags = $qr(".aviso_tags").val();
						var type = $qr(".aviso_type:checked").val();
						var url = $qr(".aviso_url").val();
						var imglarg = $qr(".aviso_imglarg").val();
						var text = $qr("#textoaviso").val();
						var color = $qr(".aviso_color").val();
						var larg = $qr(".aviso_larg").val();						
						/* var pages = pages.toString();
						var posts = posts.toString();
						var cats = cats.toString();
						var tags = tags.toString(); */
						
						var pages = "";
						var posts = "";
						var cats = "";
						var tags = "";
						
						addItem('popups', {nome:nome, status: status, dataini: dataini, datafim: datafim, linkurl:linkVal, target:target, bloq:bloq, freq:freq, hide:hide,  pages:pages, posts:posts, cat:cats, tags:tags, type:type, url:url, width:imglarg, texto:text, color:color, size:larg } )
					}
					
					
					function updateForm(){
						$qr("#textoaviso").val( tinymce.activeEditor.getContent() );
						
						var id = $qr("#id").val();
						
						var nome = $qr(".aviso_nome").val();
						var status = $qr(".aviso_status:checked").val();
						var dataini = $qr(".aviso_dataini").val() + " " + $qr(".aviso_horaini").val();
						var datafim = $qr(".aviso_datafim").val() + " " + $qr(".aviso_horafim").val();
						var linkVal = $qr(".aviso_link").val();
						var target = $qr(".aviso_target:checked").val();
						var bloq = $qr(".aviso_bloq:checked").val();
						var freq = $qr(".aviso_freq:checked").val();
						var hide = $qr(".aviso_hide").val();
						var pages = $qr(".aviso_pages").val();
						var posts = $qr(".aviso_posts").val();
						var cats = $qr(".aviso_categorias").val();
						var tags = $qr(".aviso_tags").val();
						var type = $qr(".aviso_type:checked").val();
						var url = $qr(".aviso_url").val();
						var imglarg = $qr(".aviso_imglarg").val();
						var text = $qr("#textoaviso").val();
						var color = $qr(".aviso_color").val();
						var larg = $qr(".aviso_larg").val();
						
						if( type == "banner" ){
							$qr("#textoaviso").val("");
							$qr(".aviso_color").val("");
							$qr(".aviso_larg").val("");
							
						} else {
							$qr(".aviso_imglarg").val("");
							$qr(".aviso_url").val("");
							$qr(".aviso_link").val("");
						}
						
						/* var pages = pages.toString();
						var posts = posts.toString();
						var cats = cats.toString();
						var tags = tags.toString(); */
						
						var pages = "";
						var posts = "";
						var cats = "";
						var tags = "";
						
						upItem('popups', {id:id, nome:nome, status: status, dataini: dataini, datafim: datafim, linkurl:linkVal, target:target, bloq:bloq, freq:freq, hide:hide,  pages:pages, posts:posts, cat:cats, tags:tags, type:type, url:url, width:imglarg, texto:text, color:color, size:larg }, id )
					}
					
					function polpulateIt(data){
						$qr("#submitCadastra").hide();
						$qr("#submitAltera").show();
						
						
						var data = eval("("+data+")");
						
						
						$qr("#id").val(data.id);
						$qr(".aviso_nome").val( data.nome);
						$qr("input[value="+data.status+"]").attr("checked","checked");
						
						var dataini = data.dataini.split(" ");
						$qr(".aviso_dataini").val(dataini[0])
						$qr(".aviso_horaini").val(dataini[1]);
						
						var datafim = data.datafim.split(" ");
						$qr(".aviso_datafim").val(datafim[0])
						$qr(".aviso_horafim").val(datafim[1]);
						
						
						$qr(".aviso_link").val(data.linkurl);
						$qr("input[value="+data.target+"]").attr("checked","checked");
						$qr("input[value="+data.bloq+"]").attr("checked","checked");
						$qr("input[value="+data.freq+"]").attr("checked","checked");
						$qr(".aviso_hide").val(data.hide);
						
						var pages = data.pages.split(",")
						$qr(".aviso_pages").val(pages);
						
						var posts = data.posts.split(",")
						$qr(".aviso_posts").val(posts);
						
						var cat = data.cat.split(",")
						$qr(".aviso_categorias").val(cat);						
						var tags = data.tags.split(",")
						$qr(".aviso_tags").val(tags);
						$qr("input[value="+data.type+"]").attr("checked","checked");						
						if( data.type == "banner"){
							$qr("#popupimage").slideDown();	
							$qr("#popuptext").slideUp();							
							$qr("#avs_aviso1_preview").attr("src", data.url).css('width',data.width);
							centraliza(".popupImg");
							$qr("#sizePx").html(data.width)
							$qr(".aviso_url").val(data.url);
							$qr(".aviso_imglarg").val(data.width);							
						} else if( data.type == "texto"){
							$qr("#popuptext").slideDown();	
							$qr("#popupimage").slideUp();
							
							$qr(".popupText #ct").html(data.texto)
							$qr(".popupText").css({'background': data.color, 'width': data.size});
							centraliza(".popupText");
							
							$qr(".aviso_color").val(data.color);
							$qr(".aviso_larg").val(data.size);
							$qr("#sizepopup").html(data.size);
							$qr("#textoaviso").val(data.texto);
						}
						tinyMCE.activeEditor.setContent(data.texto);
					}
                	
                
                </script>
		</div>
	</form>
<?php } ?>