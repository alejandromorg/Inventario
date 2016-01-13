$(document).ready(function(){
	$('form').submit(function(e){
		
		e.preventDefault();
		

		var tr = $( '#addTable tbody' ).children();
		
		$.each( tr, function( index, value ) {

			var index = value.id.slice(-1);

			
			var formData = new FormData();
			formData.append('field1_txt_'+index, $("#field1_txt_"+index).val());
			formData.append('field2_txt_'+index, $("#field2_txt_"+index).val());
			formData.append('field3_txt_'+index, $("#field3_txt_"+index).val());
	
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

					if (data != null && data.success) {

						$('#tr_'+data.iddelrow).remove();

					}else{
							
							$('#tr_'+data.iddelrow).children().removeClass( "has-error" );
							$.each( data.error, function( ind, value ) {

								$( '#'+ind).parent().addClass( "has-error" );
								

							});
							
							//has-error
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

function addrow($row) {

	var rowCount = $('#addTable tbody tr').length;

	$.post("addrow",
    {
        linenumber: rowCount
    },
    function(data, status){
		$("#TableBody").append(  data  );
    });
}