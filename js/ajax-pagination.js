
	
	
(function(jQuery) {
	if( jQuery(".carregaMaisPosts").length > 0 ){
	
 	page = 1;
	
	wwHe = jQuery(window).height();
	wwSc = jQuery(window).scrollTop();
	
		
	function goToByScroll(id){
		  // Remove "link" from the ID
		id = id.replace("link", "");
		  // Scroll
		jQuery('html,body').animate({
			scrollTop: jQuery(id).offset().top},
			'slow');
	}

	pagina = window.location.href;
	deep = 1;

	jQuery(document).ready(function(){
		ga('send', 'event', 'ScrollDeep', 'Scroll', pagina +": "+ deep, 1);
	});

	executeOnce = false;
	deep = 0;
	jQuery(window).on('scroll', function(event){
		
		
		var wwHe = jQuery(window).height();
		var wwSc = jQuery(window).scrollTop();
		var wwEleLM = jQuery(".carregaMaisPosts").offset();
		var wwLm = wwEleLM.top;
		var loadMore = wwHe + wwSc;
	
		if(loadMore > (wwLm + 180) && executeOnce == false ){

			executeOnce = true;

			type = jQuery('.listagem-posts').attr('data-type');
			id = jQuery('.listagem-posts').attr('data-id');
			page = jQuery('.listagem-posts').attr('data-page');
			color = jQuery('.listagem-posts').attr('data-color');
			name = jQuery('.listagem-posts').attr('data-name');
			tipoPost = jQuery('.controlerLoadMore').last().attr('data-tipoPost');
			postNum = jQuery('.controlerLoadMore').last().attr('data-postNum');

			if( jQuery(".sem-posts").length == 0 ){

			    jQuery.ajax({
			        url: "http://blog.gazinatacado.com.br/wp-admin/admin-ajax.php",
			        type:'POST',
			        data: "action=infinite_scroll&page_no="+ page + "&loop_file=loop&id="+ id + "&color="+ color + "&name= "+name+"&type="+type+"&tipopost="+tipoPost+"&postNum="+postNum, 
			        success: function(html){
			            jQuery('.listagem-posts').append(html);
			            newPage = parseInt(page);
			            newPage = newPage + 1;
			            jQuery('.listagem-posts').attr('data-page', newPage);    // This will be the div where our content will be loaded
			            executeOnce = false;
			            jQuery('.waitingroom').slideUp();
			            calcPostTop();
						scrollloaded();
						jQuery('.waitingroom').remove(); 

						deep = deep + 1;
						ga('send', 'event', 'ScrollDeep', 'Scroll', pagina +": "+ deep, 1);


						setTimeout(function(){			
							jQuery('.intop').remove();
							executeOnce = false;
						}, 500);	
			        }
			    });

			};


			/*
			
			
			jQuery('.intop').remove();	
			jQuery('.listagem-posts').append("<li class='intop'>&nbsp;</li>");
			
			
			
			
			
			postNum = jQuery('.controlerLoadMore').last().attr('data-postNum');
			tipoPost = jQuery('.controlerLoadMore').last().attr('data-tipoPost')
			
			
			if( jQuery(".sem-posts").length == 0 ){
			page = find_page_number( jQuery(".hidemPageNumber").clone() ); 
			jQuery.ajax({
				url: ajaxpagination.ajaxurl,
				type: 'post',
				data: {
					action: 'ajax_pagination',
					query_vars: ajaxpagination.query_vars,
					page: page,
					tipoPost: tipoPost,
					postNum: postNum,
					category: category,
					categoryColor: categoryColor,
					categoryName: categoryName
					
				},
				success: function( html ) {
					
						jQuery('.waitingroom').slideUp();		
						jQuery('.listagem-posts').append( html );
						calcPostTop();
						scrollloaded();
						jQuery('.waitingroom').remove(); 
						
						setTimeout(function(){			
							jQuery('.intop').remove();
							executeOnce = false;
						}, 500);
					
				}
			});
			}; */
		};
	});	
		
	};
})(jQuery);