
/* ITENS ADDCTION */
function addItem(table,array){
	$qr.post("../wp-content/themes/pvl2015/theme-options/sql/insert.php?table="+table, array).done(function(data) {
		$qr(".mensagelist").append(data);
		setTimeout(function(){ location.reload(); }, 1500);
		
	}).fail(function(data) {
		$qr(".mensagelist").append("<div class='error'>Erro de conexão. tente novamente.</div>");
	})
};

/* ITENS UPDATE */
function upItem(table,array,id){
	$qr.post("../wp-content/themes/pvl2015/theme-options/sql/update.php?table="+table+"&where="+id, array).done(function(data) {
		$qr(".mensagelist").append(data);
		setTimeout(function(){ location.reload(); }, 1500);
		
	}).fail(function(data) {
		$qr(".mensagelist").append("<div class='error'>Erro de conexão. tente novamente.</div>");
	})
};




/* ITENS DELETION */
function deletaItem(table,array,id){
	$qr.post("../wp-content/themes/pvl2015/theme-options/sql/delet.php?table="+table, array).done(function(data) {
		$qr(".mensagelist").append(data);
		$qr("#ln_"+id).fadeOut();
		setTimeout(function(){ $qr(".mensagelist").html("") }, 3000);
	}).fail(function(data) {
		$qr(".mensagelist").append("<div class='error'>Erro de conexão. tente novamente.</div>");
	})		
}


/* FORM POPULATION */
function populateForm(table,sql,ele){
	
	
	$qr.get( "../wp-content/themes/pvl2015/theme-options/sql/selectone.php?table="+table+"&id="+sql, function( data ) {
																													  
	}).done(function(data) {
		
		$qr(ele).parents(".listTable").eq(0).fadeOut();
		$qr(ele).parents(".listTable").eq(0).next(".cadastroBox").fadeIn();
		
		polpulateIt(data);
		
	}).fail(function(data) {
		$qr(".mensagelist").append("<div class='error'>Erro de conexão. tente novamente.</div>");
	})
		
}

/* ############################################################## */
/* CADASTRO DE POPUPS */

/* CENTRALIZA */
function centraliza(objeto){
	var ww = $qr(window).width();
	var wh = $qr(window).height();
	var w = $qr(objeto).width() / 2;
	var h = $qr(objeto).height() / 2;
	$qr(objeto).css("margin", "-"+h+"px 0 0 -"+w+"px" )
}


$qr(document).on('click', '.atualizaPopup', function(){
	var widt = $qr(".popupWidth").val();
	$qr(".popupText").css('width', widt )
	$qr(".popupText #ct").html( tinymce.activeEditor.getContent() )
	var val = $qr(".aviso_color").val();
	$qr(".popupText").css("background", val)
	centraliza(".popupText");
})


$qr(document).on('change', "input[name='avisos[type]']", function(){
	var val = $qr(this).val();
	if( val == "banner"){
		$qr("#popupimage").slideDown();
		$qr("#popuptext").slideUp();
		centraliza(".popupImg");
	} else if( val == "texto"){
		$qr("#popuptext").slideDown();
		$qr("#popupimage").slideUp();
		centraliza(".popupText");
		
	}
});



$qr(document).ready(function(){


	/* EXP - COMANDO EXPANSORES */
	$qr(".expandTitle").click(function(){		
		var statusOpen = $qr(this).attr('data-status');		
		if( statusOpen == 'open'){
			$qr(this).removeAttr('data-status').next('.contentExpand').slideUp();
		} else {
			$qr(this).attr('data-status','open').next('.contentExpand').slideDown();
		}		
	});
	
	/*GALL - ABRE E SELECIONA A GALERIA */
	var _custom_media = true,
	_orig_send_attachment = wp.media.editor.send.attachment; 
	$qr('.buttonFile').click(function(e) {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $qr(this);		
		var field = $qr(this).parents('.selecMedia').eq(0).find('input[type=text]');
		var preview = "#"+$qr(this).attr("data-visualizar");
		_custom_media = true;
		wp.media.editor.send.attachment = function(props, attachment){
			if ( _custom_media ) {
				var linkFile = attachment.url; 
				field.val(linkFile);				
				$qr(preview).attr("src",linkFile);
			} else {
				return _orig_send_attachment.apply( this, [props, attachment] );
			};
		} 
		wp.media.editor.open(button);
		return false;
	}); 
	$qr('.add_media').on('click', function(){
		_custom_media = false;
	});

	/*GALL - AJUSTA TAMANHO DE IMAGEM PREVIEW */
	$qr(".previewAdjust").change(function(){
		var sized = $qr(this).val();
		$qr("#"+$qr(this).attr("data-visualizar")).css('width',sized)
		$qr('#sizePx').html(sized)
		centraliza(".popupImg");
	});
	
	/* POP - AJUSTA TAMANHO DE POPUP */
	$qr(".previewAdjust").change(function(){
		var sized = $qr(this).val();
		$qr(this).parent().parent().find('img').css('width',sized)
		$qr('#sizePx').html(sized)
	});
	
	$qr("#popupavisolarg").change(function(){
		var sized = $qr(this).val();
		$qr(".popupText").css('width',sized)
		$qr('#sizepopup').html(sized)
		centraliza(".popupText");
	});
	
	
	/* ADDNEW */
	$qr(".addNew").click(function(){		
		$qr(this).parents(".listTable").eq(0).fadeOut();
		$qr(this).parents(".listTable").eq(0).next(".cadastroBox").fadeIn();
		
		$qr("#submitCadastra").show();
		$qr("#submitAltera").hide();
	});
	$qr("#exibaAvancadas").click(function(){		
		$qr("#advanced").toggle();
	});
	
	
	
	
	
	
	
	
	
	
});