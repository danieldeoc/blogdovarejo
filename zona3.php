<div class="elementosEspeciaisListagem limite">
    <div class="linha" style="margin:0">
    
    	 <div class="col col_4 col_lg_4 col_md_6 col_sm_12" style="margin-left:0">
         	<div class="caixaLista">
            	<h3>As mais lidas do Blog do Varejo</h3>
                <ul>
                <?php 
				$popularpost = new WP_Query( array( 'posts_per_page' => 4, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
				$i = 0;
				while ( $popularpost->have_posts() ) : $popularpost->the_post();
				$i = $i + 1;
				echo '<li><a href="'.get_the_permalink().'"><span>'.$i.'</span>' . get_the_title() . '</a></li>';
				
				endwhile;
				?>
            	</ul>
            </div>
         </div>
         
         <div class="col col_4 col_lg_4 col_md_6 col_sm_12">
             	<div class="caixaLista recomendados">
                    <h3>Top Recomendadas</h3>
                    <ul>
                    <?php 
                    $popularpost = new WP_Query( array( 'posts_per_page' => 4, 'meta_key' => 'wpb_recomind_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
                    $i = 0;
                    while ( $popularpost->have_posts() ) : $popularpost->the_post();
                        $id = get_the_ID();
					   $votes = get_post_meta($id, "wpb_recomind_count", true);
                       $votes = ($votes == "") ? 0 : $votes;
                    echo '<li><a href="'.get_the_permalink().'"><span class="sprites">'.$votes.'</span>' . get_the_title() . '</a></li>';
                    
                    endwhile;
                    ?>
                    </ul>
                </div>
         </div>
         <div class="col col_4 col_lg_4 col_md_12 col_sm_12">
         	
            <div class="semnada">
                <div class=" text-center" data-adname="pos-video">
                	<table height="100%" width="100%">
                    	<tr>
                        	<td valign="middle" style="text-align:center">
                            	<?php
									$options = get_option( 'adSet' ); 
									echo '<div id="semid3"  data-param="desk"  class="adDesk">';
									if( isset( $options['stAdCb2']) ) {
										echo $options['ctAdCb2'];	
									};
									echo '</div><div id="semid4"  data-param="mob"  class="adMob">';
									if( isset( $options['adcb2_img']) ) {
										echo '<a href="'.$options['adCb2Lk'].'" target="_blank"><img src="'.$options['adcb2_img'].'" /></a>';	
									};
									echo '</div/>';
								?> 
                            </td>
                        </tr>
                    </table>      	
                  </div>
            </div>
         
         
         </div>
    
    
    
    </div>
    
    
    
    <div class="clear"></div>
 </div>