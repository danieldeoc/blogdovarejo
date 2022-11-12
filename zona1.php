<div class="elementosEspeciaisListagem limite">

	<div class="linha" style="margin:0">
		<div class="col col_8 col_lg_8 col_md_6 col_sm_12" style="margin-left:0">
			<div class="newsBows">
				<h4>Estar atualizado com o mercado é o básico para vencer a concorrência, melhorar a gestão e aumentar as vendas</h4>
				<p>Por isso, nós fornecemos constantemente dicas e conteúdo de qualidade para que você melhore a gestão de sua empresa.<br>
				Fique por dentro!</p>


				

				<p class="sucesso" style="display:none; color:#fff">Obrigado! Seu cadastro foi efetuado!</p>
				<form class="formNewsBox" class="validate" target="_blank" novalidate>
					<input id="newsName" type="text" value="" name="FNAME" class="required" placeholder="Seu nome" />
					<input id="newsEmail" type="email" value="" name="EMAIL" class="required email" placeholder="Seu e-mail" />
                    <select id="categoria" name="TIPO" class="required">
                    	<option value="Blog_do_Varejo" selected="selected">Sou Varejista</option>
                        <option value="Blog_da_Hotelaria">Sou Hoteleiro</option>
                    </select>
					<button type="button" onclick="newsAdd()">Cadastre-se</button>
					<span class="textoApoio">Não se preocupe, não divulgamos seus dados e não vamos encher sua caixa de entrada.</span>
				</form>
				<div class="canais">
					<h5>Outros Canais</h5>
					<?php 	
						$options = get_option( 'rodSet' );						
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
					?>
				</div>        
			</div>
		
		</div>
		<div class="col col_4 col_lg_4 col_md_6 col_sm_12">
			<div class="semclass">
				<div class="text-center" data-adname="topo-menu">
					<table height="100%" width="100%">
						<tr>
							<td valign="middle" style="text-align:center">
								<?php
									$options = get_option( 'adSet' ); 
									echo '<div id="semid"  data-param="desk" class="adDesk">';
									if( isset( $options['stAdCb1']) ) {
										echo $options['ctAdCb1'];	
									};
									echo '</div><div id="semid2" data-param="mob" class="adMob">';
									if( isset( $options['adcb1_img']) ) {
										echo '<a href="'.$options['adCb1Lk'].'" target="_blank"><img src="'.$options['adcb1_img'].'" /></a>';	
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