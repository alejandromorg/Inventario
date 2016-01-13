@extends("layout")

@section('title')
	{{trans($module.'.addTitle')}}
@stop
@section('js')
	{{ HTML::script('js/controllers/Compra.js') }}
@stop

@section("content")

	<?php 
			$field1 = $FieldsCreate['1'];
			$field2 = $FieldsCreate['2'];
			$field3 = $FieldsCreate['3'];
			$field4 = $FieldsCreate['4'];	
			$field5 = $FieldsCreate['5'];	
			$field6 = $FieldsCreate['6'];	
			$field7 = $FieldsCreate['7'];	

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

        <div id="no-more-tables">
		
						{{	Form::columnAdd([
								"type"				=>	$field7['type'],
								"name"        		=> 	$field7['name']."0",
								"id"        			=> 	$field7['id']."0",
								"placeholder" 	=> 	trans($field7['placeholder']),
								"size"				=> 	$field7['size']								
							])
						}}
						{{	Form::columnAdd([
								"type"				=>	$field1['type'],
								"name"        		=> 	$field1['name']."0",
								"id"        			=> 	$field1['id']."0",
								"placeholder" 	=> 	trans($field1['placeholder']),
								"size"				=> 	$field1['size']								
							])
						}}

		    <table id="addTable" class="col-sm-12 table-bordered table-striped table-condensed cf tbl" name="addTable">
        		<thead class="cf">

        			<tr>

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