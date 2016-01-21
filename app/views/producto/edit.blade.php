@extends("layout")

@section('title')
	{{trans($module.'.editTitle')}}
@stop
@section('js')
	{{ HTML::script('js/controllers/Producto/Edit.js') }}
@stop

@section("content")

		<?php 
			$field1 = $FieldsEdit['1'];
			$field2 = $FieldsEdit['2'];
			$field3 = $FieldsEdit['3'];
			$field4 = $FieldsEdit['4'];	
			$field5 = $FieldsEdit['5'];	
			$field6 = $FieldsEdit['6'];	
			
		?>

	{{ Form::open([
		"url"          		=> URL::full(),
		"autocomplete" 	=> "off",
		'class'				=>'form-horizontal'
	]) }}

<div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">
					{{trans($module.'.editTitle')}}


            </h1>
        </div>

        <div id="no-more-tables">
		    <table id="EditTable" class="col-sm-12 table-bordered table-striped table-condensed cf tbl" name="EditTable">
        		<thead class="cf">
				
        			<tr>
					
						{{ Form::columnEdit([
							"type"	=> "label",
							"label" 	=> 	trans($field1['label'])			
						])}}
						{{ Form::columnEdit([
							"type"	=> "label",
							"label" 	=> 	trans($field2['label'])			
						])}}
						{{ Form::columnEdit([
							"type"	=> "label",
							"label" 	=> 	trans($field3['label'])			
						])}}
						{{ Form::columnEdit([
							"type"	=> "label",
							"label" 	=> 	trans($field4['label'])			
						])}}
						{{ Form::columnEdit([
							"type"	=> "label",
							"label" 	=> 	trans($field5['label'])			
						])}}

						@if (allowed("nodisponible"))
							{{ Form::columnEdit([
								"type"	=> "label",
								"label" 	=> 	trans($field6['label'])			
							])}}
						@endif
					</tr>
        		</thead>	
				<tbody id="TableBody">				
				<tr id='tr_0'>
					<?php  $linenumber =0; ?>
							{{Form::columnEdit([
								"type"				=>	$field1['type'],
								"name"        		=> 	$field1['name'].$linenumber,
								"id"        		=> 	$field1['id'].$linenumber,
								"placeholder" 	=> 	trans($field1['placeholder']),
								"size"				=> 	$field1['size'],
								"value" 				=> 	 $object->$field1['field']	
							])}}
							{{Form::columnEdit([
								"type"				=>	$field2['type'],
								"name"        		=> 	$field2['name'].$linenumber,
								"id"        		=> 	$field2['id'].$linenumber,
								"placeholder" 	=> 	trans($field2['placeholder']),
								"size"				=> 	$field2['size'],
								"value" 				=> 	 $object->$field2['field']				
							])}}
							{{Form::columnEdit([
								"type"				=>	$field3['type'],
								"name"        		=> 	$field3['name'].$linenumber,
								"id"        			=> 	$field3['id'].$linenumber,
								"placeholder" 	=> 	trans($field3['placeholder']),
								"size"				=> 	$field3['size'],
								"value" 				=> 	 $object->$field3['field']
								
							])}}
							{{Form::columnEdit([
								"type"				=>	$field4['type'],
								"name"        		=> 	$field4['name'].$linenumber,
								"id"        			=> 	$field4['id'].$linenumber,
								"placeholder" 	=> 	trans($field4['placeholder']),
								"size"				=> 	$field4['size'],
								"routes"			=> 	$routes,
								"value" 				=> 	 $object->$field4['field']									
							])}}	
							{{Form::columnEdit([
								"type"				=>	$field5['type'],
								"name"        		=> 	$field5['name'].$linenumber,
								"id"        			=> 	$field5['id'].$linenumber,
								"placeholder" 	=> 	trans($field5['placeholder']),
								"size"				=> 	$field5['size'],
								"value" 				=> 	 $object->$field5['field']			
							])}}	
						@if (allowed("nodisponible"))
							{{Form::columnEdit([
								"type"				=>	$field6['type'],
								"name"        		=> 	$field6['name'].$linenumber,
								"id"        			=> 	$field6['id'].$linenumber,
								"placeholder" 	=> 	trans($field6['placeholder']),
								"size"				=> 	$field6['size'],
								"value" 				=> 	 $object->$field6['field']			
							])}}	
						@endif										
				</tr>
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