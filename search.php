<?php 
get_header();
$options = get_option( 'bnCats' );
$catCor = "#3898f4";
?>
<div class="titleBoxCategory limite">
	<h1 class="listageTitle" style="color:<?php echo $catCor?>; border-color:<?php echo $catCor?>">
		<?php printf( __( 'Resultado da busca: %s', 'scribe' ), '' . get_search_query() . '' ); ?>
        
	</h1>
    <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
</div>


<div class="siteContent">             	
    <div class="siteCorpo">      
    	<div class="linha limite">
            <div class="col col_12 col_lg_12 col_md_12 col_sm_12">
                <ul class="listagem-posts linha" id="content" 
                	data-type="search"
                	data-page="2"  
                	data-id="noid" 
                	data-color="#3898f4" 
                	data-name="<?php printf( __( '%s', 'scribe' ), '' . get_search_query() . '' ); ?>">
                <?php
                    $tipoPost = 0; 
					$postNum = 0;
					$zeraMargem = 4;
					$options = get_option( 'bnCats' );
							
                   	if (have_posts()) : while (have_posts()) : the_post(); 
						$tipoPost = $tipoPost + 1;
						$postNum = $postNum + 1;
						$zeraMargem = $zeraMargem + 1;
						
						
						if ( has_post_thumbnail() ) {
							$postThumbed = "postThumbed";
						} else {
							$postThumbed = "";
						}
						
						if( $tipoPost == 7) {
							$tipoPost = 1;
						}
						$video = get_post_meta($post->ID, "youtube", true);
						
						$title = get_the_title();
						$limit = "75";
						if( strlen($title) < 65 ){
							$pad=" ";
						} else {
							$pad="...";	
						}
						
						$categoria = get_the_category();
						$nomeCategoria = $categoria[0]->cat_name;
						$idCategoria = $categoria[0]->term_id;
						$catCor = $options['colorCat'.$idCategoria];
						?>
						
						<?php if( $tipoPost == 1) { ?>              
							<li class="col col_8 col_lg_8 col_md_6 col_sm_12 <?php echo $postThumbed ?> bigMateria" style="border-bottom-color:<?php echo $catCor ?>">
						<?php  } else if( $tipoPost == 2) { ?>
							<li class="col col_4 col_lg_4 col_md_6 col_sm_12" style="border-bottom-color:<?php echo $catCor ?>">
						<?php  } else { 
							if( $zeraMargem == 7){
								?>
									<li class="col col_3 col_lg_3 col_md_6 col_sm_12" style="margin-left:0; border-bottom-color:<?php echo $catCor ?>">
							<?php } else if( $zeraMargem == 9){
								?>
									<li class="col col_3 col_lg_3 col_md_6 col_sm_12 zera800" style="border-bottom-color:<?php echo $catCor ?>">
								
							 <?php  } else { ?>
									<li class="col col_3 col_lg_3 col_md_6 col_sm_12" style="border-bottom-color:<?php echo $catCor ?>">
							   
						 <?php 
						 		};
						}?>
						
						
							<div class="mainCategoryMarkup" style="background:<?php echo $catCor ?>">
								<?php echo $nomeCategoria; ?>
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
							
							<?php if ( $tipoPost == 1 || !has_post_thumbnail() ) { ?>
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
									<?php echo $postNum; ?>
								</div>
								<div class="postComments sprites">
									<?php comments_number( "0", "1", "%" ); ?>
								</div>
							</div>
							<div class="triangulo" style="border-bottom-color:<?php echo $catCor ?>"></div>
							<div class="clear controlerLoadMore" data-postNum="<?php echo $postNum; ?>" data-tipoPost="<?php echo $tipoPost; ?>"></div>
						</li>
					<?php	
					endwhile;
                else: ?>
                    <div class="sem-posts">Não encontramos nenhum resultado para sua busca: <?php printf( __( '%s', 'scribe' ), '' . get_search_query() . '' ); ?><br/>
                    <br/>
                    	Tente efetuar uma nova busca:</div>

                    	<form method="get" id="searchform" class="searchform pageSearch" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <input type="text" value="" name="s" id="s" placeholder="Procurar por..." />
                            <input type="submit" class="button" id="searchsubmit" value="Pesquisar" />
                        </form>
                    <div class="sem-posts">OU veja nosso conteúdo na <a href="<?php echo home_url(); ?>">Home Page</a>.</div>
        			<style type="text/css">.carregaMaisPosts { display:none !important}</style>
                <?php endif; ?>
                </ul>
           </div> 
            
     	</div>
     
     
     
     
     
     <div class="hidemPageNumber"></div>
     <div class="carregaMaisPosts"></div>
    
    
    
    
<?php get_footer(); ?>

