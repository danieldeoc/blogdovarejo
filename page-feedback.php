<?php
	//response generation function
	$response = "";
	
	//function to generate response
  	function my_contact_form_generate_response($type, $message){
 	    global $response;
 		if($type == "success") {
			$response = "<div class='alert-box success radius'>".$message."</div>";
		} else  {
			$response = "<div class='alert-box error radius'>".$message."</div>";
		}
	}
  
  	//response messages
	$not_human       = "Validação incorreta. Responda novamente: Qual é o dobro de 1?";
	$missing_content = "Por favor, preencha todas as informações requeridas.";
	$email_invalid   = "Endereço de e-mail inválido.";
	$message_unsent  = "Falha ao enviar a mensagem. Por favor, tente novamente mais tarde.";
	$message_sent    = "Obrigado! Sua mensagem foi enviada e nós responderemos em breve.";
	 
	//user posted variables	
	$name = strip_tags( $_POST['message_name'] );
	$email = strip_tags( $_POST['message_email'] );
	$telefone = strip_tags( $_POST['message_telefone'] );
	$assunto = strip_tags( $_POST['message_assunto'] );
	$text = strip_tags( $_POST['message_text'] );
	$human = strip_tags( $_POST['message_human'] );
		  	  
	if($human == "2"){
        
        $msgMail = " Nome: ".$name." <br/> E-mail: ".$email ." <br/> Telefone: ".$telefone." <br/><br/> Assunto: ".$assunto." <br/> Mensagem: ".$text."<br/> &nbsp;";
        $msgMailTitle = "Formulário de Contato";
		echo "<div style='display:none'>";
        $message = mailBuilder($msgMailTitle, $msgMail);
		echo "</div>";
        $options = get_option( 'dadosCartorio' ); 
        //php mailer variables
        $to = $options['emailcontato'];
        $subject = "Contato site: ".$assunto;
        $headers = "Content-type: text/html \n";
        $headers .= "Reply-To: ".$email." \n";
        $headers .= "Return-Path: ".get_bloginfo('name')." <".$email.">\n";
        
		if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
		else {
			//validate email
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
				my_contact_form_generate_response("email inválido", $email_invalid);
			else //email is valid
			{
			  //validate presence of name and message
				if(empty($name) || empty($message)){
				  	my_contact_form_generate_response("msg ou nome brancos", $missing_content);
				} else {
					$sent = wp_mail($to, $subject, $message, $headers);
					if($sent){
						my_contact_form_generate_response("success", $message_sent); //message sent!
						$titleEmail = "Confirmação de contato: ".get_bloginfo('name');
						$confTitle 	= $options['emailcontato_confTitle'];;
						$confMsg	= $options['emailcontato_confMsg'];;
						$sendTop	= $email;
						echo "<div style='display:none'>";
						confirmaEnvio($confTitle,$confMsg,$sendTop, $titleEmail );	
						echo "</div>";
					}
					else{
						my_contact_form_generate_response("falha mail", $message_unsent);
					}										
				}
			}
		}
	}
	else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);

	get_header(); ?>
    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/components/jquery.maskedinput.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
			 $(".maskfone").mask("(999) 99999-999?9");	
			 $(".valid").mask("9");	
		});
    </script>
	<div class="content">
    
    	<div class="row"> 
        	<div class="col col_8 col_sm_12">
            	
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <h2 class="titulo"><?php the_title(); ?></h2>
                    
                    <div class="entry">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; else: ?>
                    <p>Desculpe, não encontramos a página que procurava.</p>
                <?php endif; ?>  
            
            </div>
            <div class="col col_4 col_sm_12">
            	<br /><br /><br />

                <h3>Envie-nos um email</h3>
            	<div id="respond"> 
        	<?php echo $response; ?>       	
            <form class="formMeio" action="<?php the_permalink(); ?>" method="post">	   
	            <div class="row">                                
                    <label for="name">
                        Nome: <span>*</span> <br>
                        <input type="text" required name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>">
                    </label>                            
                    <label for="message_email">
                        Email: <span>*</span> <br>
                        <input type="text" required name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>">
                    </label>                               
	            </div>                    
                <div class="row">                    
                    <label for="name">
                        Telefone: <span>*</span> <br>
                        <input type="text" required class="maskfone" name="message_telefone" value="<?php echo esc_attr($_POST['message_telefone']); ?>">
                    </label>
                    <label for="message_email">
                        Assunto: <span>*</span> <br>
                        <input type="text" required name="message_assunto" value="<?php echo esc_attr($_POST['message_assunto']); ?>">
                    </label>
                </div>
                <div class="row">                        
                    <label for="message_text">
                        Message: <span>*</span> <br>
                        <textarea type="text" required style="height:150px" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea>
                    </label>                       
                </div>                
                <div class="row">                        
                    <label for="message_human">
                        Verificação: Qual é o dobro de 1? <span>*</span> <br>
                        <input type="text" class="valid" name="message_human">
                    </label>                        
                </div>
                <input type="hidden" name="submitted" value="1">
                <div class="row">                        
                    <button class="button right" type="submit">Enviar mensagem</button>
                    <br />
                    <br />
                    <br />
                </div>                        
            </form>
        </div>
            
            </div>
        </div>
		      
        
    </div>
            
<?php get_footer(); ?>
