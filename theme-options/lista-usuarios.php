<?php 

	function listausuarios() {		
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
				settings_fields( 'opcoesThema' );
			?>
			<?php $options = get_option( 'opcoesThema' ); ?>

			<div class="wrap">
  				<h2>Usuários cadastrados</h2>
                <div class="tituloConteudo">usuários cadastrados na Gazin</div>

                
                <div class="caixaconteudo">                 
                    <label>
                        Como exportar para o excel:<br/>
                        Copie o código abaixo.<br/>
                       Anbra um arquivo novo do excel e cole<br/>
                        No excel procure a aba data<br/>
                        Nesta aba procure text to columns<br/>
                        Com todos os dados selecionados na planilha, nesta opção escolha Delimited e clique em next.<br/>
                        Na área delimiters selecione comma se for virgula ou other e digite o ponto e virgula caso tenha ponto e virgula.
                        <br/>
                        pronto.<br/>
                        <br/>
                        Usuários:
                        <textarea style="width: 100%; height: 450px"><?php 
                            $blogusers = get_users( 'role=varejista' );
                            // Array of WP_User objects.
                            foreach ( $blogusers as $user ) {
                                $idd = $user->ID;
                                $est = get_user_meta($idd, "Estrutura", true);
                                $seg = get_user_meta($idd, "Segmento", true);
                                $date = get_user_meta($idd, "datacadastro", true);
                                $cod = get_user_meta($idd, "Cod", true);
                                $name = $user->user_nicename;
                                echo $idd.', '.$name.', '.$user->user_email.', '.$cod.', '.$seg.', '.$est.', '.$date.',';
                                echo "\n";
                            }

                            /* $lista = array();

                                foreach ( $blogusers as $user ) {
                                    $idd = $user->ID;
                                    $est = get_user_meta($idd, "Estrutura", true);
                                    $seg = get_user_meta($idd, "Segmento", true);
                                    $date = get_user_meta($idd, "datacadastro", true);
                                    $name = $user->user_nicename;
                                    $newArray = array($idd, $name, $user->user_email, $seg, $est, $date);
                                    array_push($lista, $newArray);
                                };
                            

                            $fp = fopen('cadastrados-gaizn-varejista.csv', 'w');

                            foreach ($lista as $linha) {
                                fputcsv($fp, $linha);
                            }

                            fclose($fp); */
                            
                        ?></textarea>
                    </label>
                           
                </div>
			</div>
		</form>
	<?php } ?>
