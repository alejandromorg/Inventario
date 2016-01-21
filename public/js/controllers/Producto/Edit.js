$(document).ready(function(){
	
	var errorStr = "Error Row: ";
	$('form').submit(function(e){
		
		e.preventDefault();
		errorStr = "";

		var tr = $( '#EditTable tbody' ).children();
		
		$.each( tr, function( index, value ) {
			
			var index = value.id.slice(-1);

			
			var formData = new FormData();
			
			formData.append( "key", $("#field1_txt_1").val()); //key is always field 1 hidden or not
			
			var $cell = $("#tr_"+index).children();
			var emptycell = true;
			$cell.each(function( ) {
				
				
				var $field = $( this ).children().eq(0);
				//alert( $("#"+ $field.attr('name')).val());
				formData.append( $field.attr('name'), $("#"+ $field.attr('name')).val());

			});	
			if( $("#field2_txt_"+index).val() || $("#field3_txt_"+index).val() || $("#field5_txt_"+index).val()){
				emptycell = false;

			}
			
			formData.append('index', index);
			
			
			$.ajax({
				url:'edit?ID_INVENTARIO='+$("#field1_txt_"+index).val(),
				method:'post',
				processData: false,
				contentType: false,
				cache: false,
				dataType: 'json',
				data:formData,
				success:function(data){
					
					errorStr = errorStr+data.iddelrow+" ";
					
					
					if(!data.fehler){
						
						
						if (data != null && data.success) {
						
							$('#errorLBL').text("");
							$('#errorLBLdiv').removeClass( "alert alert-danger" );
							
							$(location).attr('href','/producto');
							/*if($('#tr_'+data.iddelrow).siblings().length == 0){
								addrow();
							}*/
							//$('#tr_'+data.iddelrow).remove();

						}else{

								if(emptycell){
									//alert (emptycell);
									//$('#tr_'+data.iddelrow).remove();
								}else{
									$('#tr_'+data.iddelrow).children().removeClass( "has-error" );
									$.each( data.error, function( ind, value ) {

										$( '#'+ind).parent().addClass( "has-error" );
										errorStr = errorStr +" "+ value +" ";

									});
									$('#errorLBL').text(errorStr);
									$('#errorLBLdiv').addClass( "alert alert-danger" );
								}							
								
						}
						
					}else{
						
							if(emptycell){
								
							/*	if($('#tr_'+data.iddelrow).siblings().length == 0){
									addrow();
								}
								$('#tr_'+data.iddelrow).remove();*/

							}else{
								$('#tr_'+data.iddelrow).children().removeClass( "has-error" );
								
								$.each( data.error, function( ind, value ) {

										errorStr = errorStr +" "+ value +" ";
										$( '#'+ind).parent().addClass( "has-error" );					

								});
								$('#errorLBL').text(errorStr);
								$('#errorLBLdiv').addClass( "alert alert-danger" );
							}
						}
					
				},
				complete:function(data){

				},
				error:function(){
					alert("error");
				}

			});
		});//for
	});
});	