<?php get_header(); ?>

    
<div class="siteContent">             	
    <div class="siteCorpo limite"> 
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    	<h1 class="titulo"><?php the_title(); ?></h1>
    	<div class="about">Por <?php echo get_the_author(); ?> &bull; <?php the_time('j/m/y') ?></div>
        <div class="postBread text-center">
	        <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
    	</div>
    	<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
		if( $feat_image != "" ){?>
        	<img src="<?php echo $feat_image; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="featureImg" />
		<?php } ?>
	</div>
    	
    <div class="linha limite">
    	<div class="col col_12 col_lg_12 col_md_12 col_sm_12 pageContent">
        
        	<div class="entry">
				<?php the_content(); ?>
                
                
                
            </div>
            
            
        </div>
        
        
        
        
        <div class="clear"></div>
       
            
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