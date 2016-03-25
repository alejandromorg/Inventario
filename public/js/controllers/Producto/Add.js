$(document).ready(function(){
	var errorStr = "Error Row: ";
	//Se ejecuta cuando se salva el registro.
	$('form').submit(function(e){
		
		e.preventDefault();
		errorStr = "";

		var tr = $( '#addTable tbody' ).children();
		
		$.each( tr, function( index, value ) {

			var index = value.id.slice(-1);

			
			var formData = new FormData();
			

			var $cell = $("#tr_"+index).children();
			var emptycell = true;
			$cell.each(function( ) {
				

				var $field = $( this ).children().eq(0);
				formData.append( $field.attr('name'), $("#"+ $field.attr('name')).val());
				
			});	
			if( $("#field2_txt_"+index).val() || $("#field3_txt_"+index).val() || $("#field5_txt_"+index).val()){
				emptycell = false;
			}
							
			formData.append('index', index);
			
			$.ajax({
				url:'add',
				method:'post',
				processData: false,
				contentType: false,
				cache: false,
				dataType: 'json',
				data:formData,
				success:function(data){
					
					errorStr = errorStr+data.iddelrow+" ";
					console.log(data);
					if(!data.fehler){						
						
						if (data != null && data.success) {
						
							$('#errorLBL').text("");
							$('#errorLBLdiv').removeClass( "alert alert-danger" );
							
							if($('#tr_'+data.iddelrow).siblings().length == 0){
								addrow();
							}
							$('#tr_'+data.iddelrow).remove();

						}else{
							
								if(emptycell){
	
									$('#tr_'+data.iddelrow).remove();
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
						//alert("eroor id:"+data.iddelrow);
						//console.log(data.error);
							if(emptycell){
								
								if($('#tr_'+data.iddelrow).siblings().length == 0){
									addrow();
								}
								$('#tr_'+data.iddelrow).remove();

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
var row = 0;
function addrow($row) {

	//var rowCount = $('#addTable tbody tr').length;
	row ++;
	var rowCount = row;

	$.post("addrow",
    {
        linenumber: rowCount
    },
    function(data, status){
		$("#TableBody").append(  data  );
    });
}