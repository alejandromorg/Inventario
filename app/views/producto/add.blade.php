@extends("layout")

@section('title')
	{{trans($module.'.addTitle')}}
@stop
@section('js')
	{{ HTML::script('js/controllers/Producto/Add.js') }}
@stop

@section("content")

	<?php 
			$field1 = $FieldsCreate['1'];
			$field2 = $FieldsCreate['2'];
			$field3 = $FieldsCreate['3'];
			$field4 = $FieldsCreate['4'];	
			$field5 = $FieldsCreate['5'];	
			$field6 = $FieldsCreate['6'];	

	?>
	
	{{ Form::open([
		"route"        => $module."/add",
		"autocomplete" => "off"
	]) }}
	<div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">
					{{trans($module.'.addTitle')}}
					<label onclick="addrow()">+</label>

            </h1>
        </div>

		<div class="col-sm-12" id="errorLBLdiv" >
		 
			{{ Form::label('errorLBL',' ', array('id' => 'errorLBL')) }}
		</div>

        <div id="no-more-tables">

			
		    <table id="addTable" class="col-sm-12 table-bordered table-striped table-condensed cf tbl" name="addTable">
        		<thead class="cf">

        			<tr>
						{{ Form::columnAdd([
							"type"	=> "label",
							"label" 	=> 	trans($field1['label'])			
						])}}
						{{ Form::columnAdd([
							"type"	=> "label",
							"label" 	=> 	trans($field2['label'])			
						])}}
						{{ Form::columnAdd([
							"type"	=> "label",
							"label" 	=> 	trans($field3['label'])			
						])}}
						{{ Form::columnAdd([
							"type"	=> "label",
							"label" 	=> 	trans($field4['label'])			
						])}}
						{{ Form::columnAdd([
							"type"	=> "label",
							"label" 	=> 	trans($field5['label'])			
						])}}
						{{ Form::columnAdd([
							"type"	=> "label",
							"label" 	=> 	trans($field6['label'])			
						])}}

					</tr>
        		</thead>	
				<tbody id="TableBody">				
					
						{{$row}}
						
					
				</tbody>
         	</table> 
        </div>

    </div>       	
	{{ Form::submit("save") }}
	{{ Form::close() }}	
 @stop
@section("footer")
    @parent
 @stop