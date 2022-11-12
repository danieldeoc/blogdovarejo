						
					</div><!-- FECHA LINHA COLUNAS BLOG -->
                <div class="clear"></div>                    
            </div><!-- fim site corpo -->
        </div><!-- fim site content -->
	</div><!-- fim site content - header -->
    <footer>            
    	<?php $options = get_option( 'rodSet' ); ?>
        <div class="footerContainer limite">
        	<div class="fraseFinal"><?php echo $options['copyFr1'];	?></div>  
            <div class="finalFooterMenu"> 
            	<?php wp_nav_menu( array( 'theme_location' => 'menufooter' ) ); ?>                 
            </div>
            <div class="redesSociais-footer">
            	<?php 							
					if( isset( $options['stFace']) ) {
						echo '<a href="'.$options['lkFace'].'" title="Nossa Página no Facebook" class="facebooklink sprites" target="_blank"></a>';	
					};
					if( isset( $options['stTwitter']) ) {
						echo '<a href="'.$options['lkTwitter'].'" title="Nossa Página no Twitter" class="twitterlink sprites" target="_blank"></a>';	
					};
					if( isset( $options['stPlus']) ) {
						echo '<a href="'.$options['lkPlus'].'" title="Nossa Página no Google Plus" class="pluslink sprites" target="_blank"></a>';	
					};
					if( isset( $options['stTube']) ) {
						echo '<a href="'.$options['lkTube'].'" title="Nossa Página no Youtube" class="tubelink sprites" target="_blank"></a>';	
					};
					if( isset( $options['stLinked']) ) {
						echo '<a href="'.$options['lkLinked'].'" title="Nossa Página no LinkedIn" class="linkedlink sprites" target="_blank"></a>';	
					};
					if( isset( $options['stRss']) ) {
						echo '<a href="'.$options['lkRss'].'" title="Nosso RSS" class="rsslink sprites" target="_blank"></a>';	
					};							
				?>
            </div>
            <div class="partiuTopo sprites"></div>
        </div>
    </footer>
</div><!-- fim site -->
    <?php 
		wp_footer();
		$options = get_option( 'dadosThema' );
	?>
	<script type="text/javascript">
  		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		ga('create', '<?php echo $options['analytics'] ?>', 'auto');
		ga('require', 'displayfeatures');
		ga('send', 'pageview');	
	</script>