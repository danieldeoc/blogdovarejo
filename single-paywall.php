<?php 
get_header();
/*
Single Post Template: Paywall Template - Varejista
Description: Template apenas para usuários cadastrados com o Cargo: Varejista.
*/
	wpb_set_post_views(get_the_ID()); ?>
<style type="text/css">.intensivoChamada{ display: none; }</style>
   
<div class="siteContent">             	
    <div class="siteCorpo limite"> 
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    	<h1 class="titulo"><?php the_title(); ?></h1>
    	<div class="about">Por <?php echo get_the_author(); ?> &bull; <?php the_time('j/m/y') ?></div>
        <div class="postBread text-center">
	        <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
    	</div>
    	<?php 

    		$video = get_post_meta($post->ID, "youtube", true);
    		if($video != ""){ ?>
	    		<div class="caixaYoutube">
	    			<iframe width="100%" height="400" src="https://www.youtube.com/embed/<?php echo $video;?>" frameborder="0" allowfullscreen></iframe>
	    		</div>

    		<?php 
    	} else {
    		$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
			if( $feat_image != "" ){?>	
	        	<img src="<?php echo $feat_image; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="featureImg" />
			<?php
			};
		 }; ?>




	</div>
    	
    <div class="linha limite">
    	<div class="col col_12 col_lg_12 col_md_12 col_sm_12 pageContent">
        
        	<div class="entry">
				<?php 

				if( is_user_logged_in() ){
                     $current_user = wp_get_current_user();
                     if($current_user->roles[0] == "Varejista" || $current_user->roles[0] == "administrator" || $current_user->roles[0] == "contributor" || $current_user->roles[0] == "editor" || $current_user->roles[0] == "author"){
                        the_content();
                     } else {
                        the_excerpt();
                        echo '<div class="naoAlocado">Você não tem permisão para ver este post.</div>';
                     }
                } else {
                    the_excerpt();
                    echo '<p style="font-size:11px; text-align:center">caso você já tenha se cadastrado e logado, tente recarregar a página.</p>';
                    echo "<h3 class='logcall'>Efetue login para ler este artigo! É rápido e gratuito.</h3>";

                    $args = array(
                        'remember'       => true,
                        'label_username' => __( 'Username' ),
                        'label_password' => __( 'Password' ),
                        'label_remember' => __( 'Permanecer Logado' ),
                        'label_log_in'   => __( 'Acessar' )
                    );              
                    wp_login_form($args);
                    echo "<h3 class='logcall' style='text-align:center'>Não tem cadastro?</h3>";
                    echo '<a href="'.home_url().'/cadastro/?red='.get_permalink().'"  class="button buttonintext">Cadastre-se grátis</a>';
                }

                

				?>
<br/><br/><br/>


                
                
            
            
                
            </div>
            <br clear="all" />
            <?php if( is_user_logged_in() ){
                	if($current_user->roles[0] == "Varejista"){?>
        	<div class="barradeFerramentas">
                    <div class="progessBar"></div>
                    
                    
                    <div class="commente">
                        <span class="sprites comentsBall"><?php comments_number( "0", "1", "%" ); ?></span> <span class="commentsText">| Deixe seu comentário</span> 
                    </div>
                    
                    <div id="recomind" class="recomind" data-id="<?php  echo get_the_ID() ?>">
                    	<?php
						   $votes = get_post_meta($post->ID, "wpb_recomind_count", true);
						   $votes = ($votes == "") ? 0 : $votes;
						?>                    
                        <span class="votesText">Recomende este post:</span> <span class="votes sprites"> <?php echo $votes ?></span>
                    </div>
                    
                    <div class="compartilhe">
                    	<span> Compartilhe:</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" title="Compartilhe no Facebook" class="facebooklink shareFace sprites" target="_blank"></a>	
                        <a href="https://twitter.com/home?status=<?php the_title(); ?>: <?php the_permalink() ?>" title="Compartilhar no Twitter" class="twitterklink shareTwitter sprites" target="_blank"></a>	
                        <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php the_title(); ?>&source=Blog do Varejo" title="Compartilhar no LinkedIn" class="linkedlink shareLink shareLinkedin sprites" target="_blank"></a>	
                        <a href="https://plus.google.com/share?url=<?php the_permalink() ?>" title="Compartilhar no Google PLus" class="pluslink sharePlus sprites" target="_blank"></a>
                        <a href="whatsapp://send?text=Veja no Blog do Varejo:<?php the_title(); ?> | <?php the_permalink() ?> " data-action="share/whatsapp/share" title="Compartilhar pelo WhatsApp" class="pluslink shareWhats sprites" target="_blank"></a>
                    
                    </div>
                    
                    
                
                </div>
                <?php }; };?>
            	
                
            
        </div>
        <br clear="all" />
        
        
        
        <span class="relatedThemes">Temas relacionados</span>
        <div class="tagCloud">
            <?php echo the_tags("","",""); ?>
        </div>
        
        
        <h4 class="relatedTitle">Post Relacionados</h4>
        <ul class="listagem-posts linha" id="content">
        <?php
		//for use in the loop, list 5 post titles related to first tag on current post
		$tags = wp_get_post_tags($post->ID);
		if ($tags) {
			
			$first_tag = $tags[0]->term_id;
			$args=array(
			'tag__in' => array($first_tag),
			'post__not_in' => array($post->ID),
			'posts_per_page'=>4,
			'ignore_sticky_posts'=>1
		);
		
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) {
			
			$options = get_option( 'bnCats' );
			$i = 0;
			
			while ($my_query->have_posts()) : $my_query->the_post(); 
				$categoria = get_the_category();
				$nomeCategoria = $categoria[0]->cat_name;
				$idCategoria = $categoria[0]->term_id;
				$i = $i + 1;
				$title = get_the_title();
				$limit = "75";
				$votes = get_post_meta($post->ID, "wpb_recomind_count", true);
				$votes = ($votes == "") ? 0 : $votes;
				$video = get_post_meta($post->ID, "youtube", true);
						
				if( strlen($title) < 65 ){
					$pad=" ";
				} else {
					$pad="...";	
				}
				?>
                
                <?php  if( $i == 3){ ?>
					<li class="col col_3 col_lg_3 col_md_6 col_sm_12 zera800" style="border-bottom-color:<?php echo $options['colorCat'.$idCategoria]; ?>">
				 <?php  } else { ?>
					<li class="col col_3 col_lg_3 col_md_6 col_sm_12" style="border-bottom-color:<?php echo $options['colorCat'.$idCategoria]; ?>">
				<?php }; ?>
						
						
                    <div class="mainCategoryMarkup" style="background:<?php echo $options['colorCat'.$idCategoria]; ?>">
                        <?php 
                        echo $nomeCategoria; ?>
                    </div>
							
							<?php if ($video != "" ) { 
								 ?>
								<div class="featureImage preLoadImage"  data-image="http://img.youtube.com/vi/<?php echo $video; ?>/0.jpg">
									<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"></a>
								</div>
								<h3 class="text-left">
									<a href="<?php the_permalink() ?>">
										<?php
											$title = substr($title, 0, $limit) . $pad;
											echo $title;
										?>
									</a>
								</h3> 
								<div class="data-post">
									Por <?php echo get_the_author(); ?> | <?php the_time('j/m/y') ?></span>
								</div>

								
							<?php }  else if(has_post_thumbnail() ) { 
								$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );                    
							?>
								<div class="featureImage preLoadImage"  data-image="<?php echo $feat_image; ?>">
									<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"></a>
								</div>
								<h3 class="text-left">
									<a href="<?php the_permalink() ?>">
										<?php
											$title = substr($title, 0, $limit) . $pad;
											echo $title;
										?>
									</a>
								</h3> 
								<div class="data-post">
									Por <?php echo get_the_author(); ?> | <?php the_time('j/m/y') ?></span>
								</div>
								
							<?php } else { ?>
								<br>
								<h3 class="text-left">
									<a href="<?php the_permalink() ?>">
										<?php
											$title = substr($title, 0, $limit) . $pad;
											echo $title;
										?>
									</a>
								</h3>  
								<div class="data-post">
									Por <?php echo get_the_author(); ?> | <strong><?php the_time('j/m/y') ?></strong>
								</div>
							<?php } ?>
							
							<?php if (  !has_post_thumbnail() ) { ?>
								<div class="excerptBox">
                                	<a href="<?php the_permalink() ?>">
                                     <?php 
									 $excerpt = get_the_excerpt();
									 echo substr($excerpt, 0, 225);
									 if( strlen($excerpt) > 225 ){
										echo '... &raquo; <i>continue lendo</i>';	 
									}
									?>
                                    </a>
								</div>                       
							<?php } ?>
							<div class="postSocialData">                    	
								<div class="postRecomendation sprites">
									<?php echo $votes; ?>
								</div>
								<div class="postComments sprites">
									<?php comments_number( "0", "1", "%" ); ?>
								</div>
							</div>
							<div class="triangulo" style="border-bottom-color:<?php echo $options['colorCat'.$idCategoria]; ?>"></div>
							<div class="clear"></div>
						</li>
		
		<?php
			endwhile;
			} else{ ?>
                    <div class="sem-related">No momento não temos conteúdo relacionado.</div>
                <?php }; 
		wp_reset_query();
		}
		?>    
        </ul>
        
        
        
                                   
            	
                <div class="clear"></div> 
              
            
                
             <?php if( is_user_logged_in() ){
                	if($current_user->roles[0] == "Varejista"){?>
            	<div id="comentarios" class="comments">
                    <h3 class="calledText"><?php comments_number( "0", "1", "%" ); ?></h3>
                	<span class="commentCall">
                    	comentários em
                        <span>"<?php the_title(); ?>"</span>
                    </span>
                    <?php if ( comments_open() || get_comments_number() ) :
						
					?>
                    <div id="respond" class="comment-respond">
                        <form method="post" id="commentform" class="comment-form">
                            <div class="meetTheAutor linha">
                            	<div class="col col_12 col_md_12 col_sm_12">                                	
                                    <p class="comment-form-comment">
                                        <textarea id="comment" required name="comment" cols="45" rows="8" aria-describedby="form-allowed-tags" aria-required="true" placeholder="Seu comentário [obrigatório]"></textarea>
                                    </p>                                    
                                </div>
                           	</div>
                            <div class="linha">
                                <div class="col col_6 col_md_12 col_sm_12">
                                	<p class="comment-form-author">
                                        <input id="author" name="author" required="required" type="text" value="" size="30" aria-required="true" placeholder="Seu nome [obrigatório]">
                                    </p>
                                </div>
                                <div class="col col_6 col_md_12 col_sm_12">
                                    <p class="comment-form-email">
                                        <input id="email" name="email" required="required" type="text" value="" size="30" aria-describedby="email-notes" aria-required="true" placeholder="Seu e-mail [obrigatório]">
                                    </p>
                                </div>
                           </div>
                            <div class="linha">
                                <div class="col col_6 col_md_12 col_sm_12">
                                    <p class="comment-form-url">
                                        <input id="url" name="url" type="text" value="" size="30" placeholder="Seu site">
                                    </p>
                                </div>
                                <div class="col col_6 col_md_12 col_sm_12">
                                	<p class="comment-form-url">
                                        <input id="oqueeisso" name="oqueeisso" required="required" type="number" value="" size="1" maxlength="1" placeholder="Validação: O Dobro de 1 é?">
                                    </p>
                                
                                </div>
                            </div>
                            <div class="linha">
                                <div class="col col_12 col_md_12 col_sm_12"> 
                                	<div class="erroMsg"></div>
                                	<p class="form-submit text-right">
                                    	
                                        <?php $postid = get_the_ID(); ?> 
                                        <a class="button larg comentaCount terciario"  onClick="submitaComment()">Comentar</span></a>
                                        <script type="text/javascript">
                                        	function submitaComment(){
												if( jQuery("#comment").val() == "" ){
													jQuery("#comment").focus()
													jQuery(".erroMsg").show().html("preencha seu comentário")
												} else if( jQuery("#author").val() == "" ){
													jQuery("#author").focus()
													jQuery(".erroMsg").show().html("Informe seu nome")
												} else if( jQuery("#email").val() == "" ){
													jQuery("#email").focus()
													jQuery(".erroMsg").show().html("informe seu e-mail")
												} else if( jQuery("#oqueeisso").val() == 2 ){
													jQuery("#commentform").attr('action', '<?php echo home_url(); ?>/wp-comments-post.php');
													jQuery("#commentform").submit();													
													ga('send', 'event','Comentários', 'Click', '<?php the_title(); ?>', 1);													
												} else {
													jQuery(".erroMsg").show().html("Preencha o campo de validação: Qual é o dobro de 1?")
													jQuery("#oqueeisso").focus();
												}
											}
                                        </script>
                                        <!-- input name="submit" type="submit" id="submit" class="submit" value="Publicar comentário" -->
                                        <input type="hidden" name="comment_post_ID" value="<?php echo $postid ?>" id="comment_post_ID">
                                        <?php 
											if(isset($_GET['replytocom'])) {
												$replto = $_GET["replytocom"];
											} else {
												$replto = "0";
											} ?>
                                        <input type="hidden" name="comment_parent" id="comment_parent" value="<?php echo $replto; ?>">
                                    </p>
                                </div>
                            </div>                    
                        </div>			
                    </form>
                </div>
                <?php 
				
				comments_template();
				endif;
				};
				};
				 ?>
            
            </div>
        
        
        </div>
            
        <div class="limite">    
        <h4 class="relatedTitle">Em destaque no Blog do Varejo</h4>
        <ul class="listagem-posts linha" id="content">
        <?php
		
		
		$my_query = new WP_Query("post_type=post&posts_per_page=4&orderby=date&order=DESC");;
		if( $my_query->have_posts() ) {
			
			$options = get_option( 'bnCats' );
			$i = 0;
			
			while ($my_query->have_posts()) : $my_query->the_post(); 
				$categoria = get_the_category();
				$nomeCategoria = $categoria[0]->cat_name;
				$idCategoria = $categoria[0]->term_id;
				$i = $i + 1;
				$title = get_the_title();
				$limit = "75";
				$votes = get_post_meta($post->ID, "wpb_recomind_count", true);
				$votes = ($votes == "") ? 0 : $votes;
				if( strlen($title) < 65 ){
					$pad=" ";
				} else {
					$pad="...";	
				}
				?>
                
                <?php  if( $i == 3){ ?>
					<li class="col col_3 col_lg_3 col_md_6 col_sm_12 zera800" style="border-bottom-color:<?php echo $options['colorCat'.$idCategoria]; ?>">
				 <?php  } else { ?>
					<li class="col col_3 col_lg_3 col_md_6 col_sm_12" style="border-bottom-color:<?php echo $options['colorCat'.$idCategoria]; ?>">
				<?php }; ?>
						
						
                    <div class="mainCategoryMarkup" style="background:<?php echo $options['colorCat'.$idCategoria]; ?>">
                        <?php 
                        echo $nomeCategoria; ?>
                    </div>
							
							<?php if ($video != "" ) { 
								 ?>
								<div class="featureImage preLoadImage"  data-image="http://img.youtube.com/vi/<?php echo $video; ?>/0.jpg">
									<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"></a>
								</div>
								<h3 class="text-left">
									<a href="<?php the_permalink() ?>">
										<?php
											$title = substr($title, 0, $limit) . $pad;
											echo $title;
										?>
									</a>
								</h3> 
								<div class="data-post">
									Por <?php echo get_the_author(); ?> | <?php the_time('j/m/y') ?></span>
								</div>

								
							<?php }  else if(has_post_thumbnail() ) { 
								$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );                    
							?>
								<div class="featureImage preLoadImage"  data-image="<?php echo $feat_image; ?>">
									<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"></a>
								</div>
								<h3 class="text-left">
									<a href="<?php the_permalink() ?>">
										<?php
											$title = substr($title, 0, $limit) . $pad;
											echo $title;
										?>
									</a>
								</h3> 
								<div class="data-post">
									Por <?php echo get_the_author(); ?> | <?php the_time('j/m/y') ?></span>
								</div>
								
							<?php } else { ?>
								<br>
								<h3 class="text-left">
									<a href="<?php the_permalink() ?>">
										<?php
											$title = substr($title, 0, $limit) . $pad;
											echo $title;
										?>
									</a>
								</h3>  
								<div class="data-post">
									Por <?php echo get_the_author(); ?> | <strong><?php the_time('j/m/y') ?></strong>
								</div>
							<?php } ?>
							
							<?php if (  !has_post_thumbnail() ) { ?>
								<div class="excerptBox">
                                	<a href="<?php the_permalink() ?>">
                                     <?php 
									 $excerpt = get_the_excerpt();
									 echo substr($excerpt, 0, 225);
									 if( strlen($excerpt) > 225 ){
										echo '... &raquo; <i>continue lendo</i>';	 
									}
									?>
                                    </a>
								</div>                       
							<?php } ?>
							<div class="postSocialData">                    	
								<div class="postRecomendation sprites">
									<?php echo $votes; ?>
								</div>
								<div class="postComments sprites">
									<?php comments_number( "0", "1", "%" ); ?>
								</div>
							</div>
							<div class="triangulo" style="border-bottom-color:<?php echo $options['colorCat'.$idCategoria]; ?>"></div>
							<div class="clear"></div>
						</li>
		
		<?php
			endwhile;
			}
		wp_reset_query();
		
		?>    
        </ul>
        </div> 
        
        <div class="text-center">
        <a class="megaButton" href="<?php echo home_url(); ?>">Veja mais conteúdo do <strong>Blog do Varejo</strong></a>
        </div>
        <br><br><br>
 
        
    <?php endwhile; else: ?>
    
    
    
    
    
        <p>Desculpe, não encontramos a página que procurava.</p>
    <?php endif; ?>
    
    	               
        
            
            
            
<?php get_footer(); ?>