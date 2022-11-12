<?php 
$signUpSucess = false;
$totalerros = "";
if(isset($_GET["red"])) {
    $ref = sanitize_text_field($_GET["red"]);
} else {
	$ref = "http://blog.gazinatacado.com.br/category/intensivo-natal-gazin-atacado/";	
}

if (isset($_POST['postado']) ){ 
    $posttrue = sanitize_text_field($_POST['postado']);
    $username = sanitize_user($_POST['username']);
    $name = sanitize_text_field($_POST['nome']);
    $cod = sanitize_text_field($_POST['cpfcnpj']);
    $email = sanitize_email($_POST['email']);
    $pass = sanitize_text_field($_POST['pass']);
    //$sex = sanitize_text_field($_POST['sex']);
    //$varejista = sanitize_text_field($_POST['varejista']);
    $segmento = sanitize_text_field($_POST['segmento']);
    $estrutura = sanitize_text_field($_POST['estrutura']);
    $facebook = sanitize_text_field($_POST['facebook']);
    

    $erros = array();
    if($posttrue != "posttrue"){
        array_push($erros, "Há algo errado com sua tentativa de cadastro, por favor, tente novamente!");
    };
    if($username == ""){
        array_push($erros, "Preencha seu nome de usuário.");
    };
    if ( username_exists( $username ) ){
       array_push($erros, "Nome de usuário já cadastrado, por favor, tente outro nome.");
    };
    $namevalid = strlen($name);
    if($namevalid < 4 && $namevalid > 60){
        array_push($erros, "Revise sue nome, ele possui muitos ou poucos caracteres.");
    };
    if ( !is_email( $email ) ){
       array_push($erros, "Por favor, informe um e-mail válido.");
    };
    if( email_exists( $email )) {
        array_push($erros, "Este endereço de email já está cadastrado, tente efetuar login.");
    }
    $passvalid = strlen($pass);
    if($passvalid < 4 && $passvalid > 8){
        array_push($erros, "Por favor, cadastre uma senha entre 4 e 8 caracteres, com letras e/ou números.");
    };

    if($cod == ""){
        array_push($erros, "Preencha seu cpf ou cnpj.");
    };

    if(!is_numeric($cod)){
        array_push($erros, "Preencha um cpf ou cnpj válido.");
    }
    if($cod < 11 && $cod > 14){
        array_push($erros, "Preencha um cpf ou cnpj válido.");
    };
   
    

    /* if($sex != "Masc" && $sex != "Fem" || $sex == ""){
        array_push($erros, "Por favor, informe o seu sexo.");
    }
    if($varejista != "Sim" && $varejista != "Não"){
        array_push($erros, "Por favor, informe se você é varejista.");
    } */
    if($segmento != "Eletrônicos" && $segmento != "Eletrodomésticos" && $segmento != "Móveis" && $segmento != "Hotelaria"  && $segmento != "Outros"){
        array_push($erros, "Por favor, informe um segmento válido.");
    }
    if($estrutura != "Negócio de bairro" && $estrutura != "Loja física e e-commerce" && $estrutura != "Apenas e-commerce" && $estrutura != "Rede presente em uma cidade" && $estrutura != "Rede presente em várias cidades" && $estrutura != "Rede presente em mais de um estado" && $estrutura != "Outros"){
        array_push($erros, "Por favor, informe uma estrutura válida.");
    }
    /* if( $facebook != ""){
        if(strpos($facebook, 'facebook.com') == false ){
            array_push($erros, "Por favor, informe uma url do facebook válida.");
        }
    } else {
        $facebook == "Sem página";
    }; */
    $totalerros = count($erros);
    
    if($totalerros == 0){

        $uniqid = uniqid();
        $rand_start = rand(1,5);
        $rand_8_char = substr($uniqid,$rand_start,8);
        $hash = $rand_8_char;

        $user_id = wp_create_user( $username, $pass, $email );
        //add_user_meta( $user_id, "Sexo", $sex );
        //add_user_meta( $user_id, "Varejista", $varejista );
        add_user_meta( $user_id, "Cod", $cod );
        add_user_meta( $user_id, "Segmento", $segmento );
        add_user_meta( $user_id, "Estrutura", $estrutura );
        //add_user_meta( $user_id, "Facebook", $facebook );
        add_user_meta( $user_id, "Hash", $hash );
        add_user_meta( $user_id, "datacadastro", date("d-m-y") );
        add_user_meta( $user_id, "Ativacao", "false" );
        wp_update_user( array( 'ID' => $user_id, 'role' => "Varejista", 'first_name' => $name ) );
        $signUpSucess = true;

        $creds = array();
        $creds['user_login'] = $username;
        $creds['user_password'] = $pass;
        $creds['remember'] = true;
        $user = wp_signon( $creds, false );
        $title = "Bem vindo ao Blog do varejo";

        $msg = "Obrigado por se cadastrar no blog do Varejo, agora você tem acesso a um conteúdo exclussivo para você! <a href='".home_url()."/cadastro-ativar?hash=".$hash."&ref=".$ref."'>Clique aqui para ativar sua conta.</a>.";

        mailBuilder($title, $msg);
        confirmaEnvio("Bem vindo ao Blog do Varejo",$msg,$email,"Bem vindo ao Blog do Varejo");

        $creds = array();
        $creds['user_login'] = $name;
        $creds['user_password'] = $pass;
        $creds['remember'] = true;
        $user = wp_signon( $creds, false );
        
        if ( is_wp_error($user) )
            $msgerros = $user->get_error_message();
    } 

}
get_header();
/* Template name: página de cadastro */?>
<div class="siteContent">               
    <div class="siteCorpo limite"> 
    <?php 

    if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
        <h1 class="titulo"><?php the_title(); ?></h1>
    </div>
        
    <div class="linha limite">
        <div class="col col_12 col_lg_12 col_md_12 col_sm_12 pageContent">
            
            <div class="entry" style="padding-top:0">
                <?php the_content(); ?> 
            </div>
            <?php 
            
            if($signUpSucess == false){
                for ($x = 0; $x < $totalerros; $x++) {
                    echo "<div class='erroMsgcad'>";
                    echo $erros[$x];
                    echo "</div>";
                } 

            ?>
            <div class="form-cadastro">
                <form class="signUpForm" method="post">
                    <div class="linha limite">
                        <div class="col col_12 col_lg_12 col_md_12 col_sm_12">

                            <label>Nome de usuário:
                                <input type="text" name="username" required="required" maxlength="20" <?php if (isset($_POST['username']) ){ echo "value='".sanitize_user($_POST['username'])."'"; }; ?> />

                            </label>

                            <label>E-mail:
                                <input type="email" name="email" required="required" <?php if (isset($_POST['email']) ){ echo "value='".sanitize_email($_POST['email'])."'"; }; ?> />
                            </label>

                            <label>Senha (apenas letras ou números - entre 4 e 8 letras):
                                <input id="pass" type="password" name="pass" required="required" minlength="4" maxlength="8" />
                                    <span id="versenha" style=" text-decoration:underline">Ver senha</span>
                                    <span id="hidesenha" style="display:none; text-decoration:underline">Ocultar senha</span>
                            </label>

                            <label>Seu Nome:
                                <input type="text" name="nome" required="required" minlength="4" maxlength="60" <?php if (isset($_POST['nome']) ){ echo "value='".sanitize_text_field($_POST['nome'])."'"; }; ?> />

                            </label>

                            <label>CPF/CNPJ (somente números):
                                <input type="text" id="cod" name="cpfcnpj" required="required" minlength="4" maxlength="14" <?php if (isset($_POST['cpfcnpj']) ){ echo "value='".sanitize_text_field($_POST['cpfcnpj'])."'"; }; ?> />

                            </label>

                            <?php /* label>Sexo:
                                <select id="sexs" name="sex" required="required">
                                    <option value="Masc" selected="selected">Masculino</option>
                                    <option value="Fem">Feminino</option>
                                </select>
                            </label>

                            <label>
                                Você é varejista?
                                <select name="varejista" id="varejos" required="required">
                                    <option value="Sim" selected="selected">Sim</option>
                                    <option value="Não">Não</option>
                                </select>
                            </label*/ ?>


                            <label>
                                Segmento:
                                <select id="segmentos" name="segmento" required="required">
                                    <option selected placeholder="Selecione uma opção"></option>
                                    <option value="Eletrônicos">Eletrônicos</option>
                                    <option value="Eletrodomésticos">Eletrodomésticos</option>
                                    <option value="Móveis">Móveis</option>
                                    <option value="Hotelaria">Hotelaria</option>
                                    <option value="Outros">Outro Segmento</option>
                                </select>
                            </label>

                            <label>
                                Estrutura:
                                <select id="estruturas" name="estrutura" required="required">
                                    <option selected placeholder="Selecione uma opção"></option>
                                    <option value="Negócio de bairro">Negócio de bairro</option>
                                    <option value="Loja física e e-commerce">Loja física e e-commerce</option>
                                    <option value="Apenas e-commerce">Apenas e-commerce</option>
                                    <option value="Rede presente em uma cidade">Rede presente em uma cidade</option>
                                    <option value="Rede presente em várias cidades">Rede presente em várias cidades</option>
                                    <option value="Rede presente em mais de um estado">Rede presente em mais de um estado</option>
                                    <option value="Outros">Outro</option>
                                </select>
                            </label>
                            <?php 
                                if (isset($_POST['estrutura'])){ 
                                    $estrutura = sanitize_text_field($_POST['estrutura']);
                                    echo '<script>document.getElementById("estruturas").value="'.$estrutura.'";</script>';
                                };

                                if (isset($_POST['segmento'])){ 
                                    $segmento = sanitize_text_field($_POST['segmento']);
                                    echo '<script>document.getElementById("segmentos").value="'.$segmento.'";</script>';
                                };

                                if (isset($_POST['varejista'])){ 
                                    $varejista = sanitize_text_field($_POST['varejista']);
                                    echo '<script>document.getElementById("varejos").value="'.$varejista.'";</script>';
                                };
                                if (isset($_POST['sex'])){ 
                                    $sex = sanitize_text_field($_POST['sex']);
                                    echo '<script>document.getElementById("sexs").value="'.$sex.'";</script>';
                                };


                            ?>


                            <?php /* label>
                                Facebook - página da sua empresa ou seu perfil pessoal (opcional)
                                <input type="text" name="facebook" <?php if (isset($_POST['facebook']) ){ echo "value='".sanitize_text_field($_POST['facebook'])."'"; } else { echo "value='http://www.facebook.com/'"; }; ?> />
                            </label */ ?>
                            <input type="hidden" name="postado" value="posttrue" />
                            <button id="submita" type="submit">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php } else { ?>
                <script type="text/javascript">
                    window.location="<?php echo home_url().'/cadastro-ativar'?>"; 
                </script>
            <?php }; ?>
        </div>
        
        <div class="clear"></div>
        
       
        <br><br><br>
 
        
    <?php endwhile; else: ?>
    
    
    
    
    
        <p>Desculpe, não encontramos a página que procurava.</p>
    <?php endif; ?>
    
                       
        
            
            
            
<?php get_footer(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){


           
                jQuery("#cod").mask("99999999999?999");   

                jQuery("#versenha").click(function(){
                    jQuery("#pass").attr("type","text");
                    jQuery(this).hide();
                    jQuery("#hidesenha").show();
                });  
                jQuery("#hidesenha, #submita").click(function(){
                    jQuery("#pass").attr("type","password");
                    jQuery("#hidesenha").hide();
                    jQuery("#versenha").show();
                });             
        
        
    })

</script>