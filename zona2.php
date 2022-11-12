<div class="elementosEspeciaisListagem limite">
    
    <div class="videosFrame">
    	<h2>Vídeos <a class="button right small" style="margin:-1px 0 0 " href="<?php echo home_url(); ?>/videos-gazin-atacado/">+ vídeos</a></h2>
    	<div class="linha">
        	<div class="col col_7 col_lg_6 col_md_12 col_sm_12">
                <?php $options = get_option( 'dadosThema' ); ?>
            	<h3 class="nomeVideoFeature"><?php echo $options['nomevideo']; ?></h3>
            	<div class="boxVideo">
                    
                	<iframe width="100%" height="400" src="https://www.youtube.com/embed/<?php echo $options['homevideo']; ?>" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        	<div class="col col_5 col_lg_6 col_md_12 col_sm_12">
            	<ul class="listaSugestaoVideos">
                	<?php
						// The Query
						$the_query =  new WP_Query( array( 'cat' => 1105, 'posts_per_page' => 5 ) );
						
						// The Loop
						if ( $the_query->have_posts() ) {
							echo '<ul>';
							while ( $the_query->have_posts() ) {
								$the_query->the_post();
								echo '<li><a href="'.get_the_permalink().'">' . get_the_title() . '</a></li>';

							}
							echo '</ul>';
						} else {
							// no posts found
						}
						/* Restore original Post Data */
						wp_reset_postdata();
					?>
                	<li>
                    	
                    </li>
                
                </ul>
            
            </div>
        </div>
    
    
    </div>
    
    
    <div class="clear"></div>
 </div>