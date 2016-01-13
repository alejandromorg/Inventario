@extends("layout")

@section('title')
	{{trans($module.'.editTitle')}}
@stop


@section("content")

    {{ Form::open([
		"url"          		=> URL::full(),
		"autocomplete" 	=> "off",
		'class'				=>'form-horizontal'
	]) }}

	<?php 
		$field1 = $FieldsEdit['1'];
		$field2 = $FieldsEdit['2'];
		$field3 = $FieldsEdit['3'];
		$field4 = $FieldsEdit['4'];

	?>
	
		<div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">
					{{trans($module.'.editTitle')}}
					<label onclick="">+</label>
					{{--<label onclick="addrow()">+</label>--}}
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
						@if (allowed("nodisponible"))
							{{ Form::columnEdit([
								"type"	=> "label",
								"label" 	=> 	trans($field4['label'])			
							])}}
						@endif
					</tr>
        		</thead>	
				<tbody id="TableBody">				
				<tr>
				<?php  $linenumber =0; ?>

				{{Form::columnEdit([
						"type"				=>	$field1['type'],
						"name"        		=> 	$field1['name'].$linenumber,
						"form"        		=> 	$form,
						"placeholder" 	=> 	trans($field1['placeholder']),
						"size"				=> 	$field1['size'],		
						"value" 				=> 	 $object->$field1['field']	
					])}}
					{{ 	Form::columnEdit([
						"type"				=>	$field2['type'],
						"name"        		=> 	$field2['name'].$linenumber,
						"form"        		=> 	$form,
						"placeholder" 	=> 	trans($field2['placeholder']),
						"size"				=> 	$field2['size'],		
						"value" 				=> 	 $object->$field2['field']
					])}}
					{{ Form::columnEdit([
						"type"				=>	$field3['type'],
						"name"        		=> 	$field3['name'].$linenumber,
						"form"        		=> 	$form,
						"placeholder" 	=> 	trans($field3['placeholder']),
						"size"				=> 	$field3['size'],		
						"value" 				=> 	 $object->$field3['field']					
					])}}
					{{ Form::columnEdit([
						"type"				=>	$field4['type'],
						"name"        		=> 	$field4['name'].$linenumber,
						"form"        		=> 	$form,
						"placeholder" 	=> 	trans($field4['placeholder']),
						"size"				=> 	$field4['size'],		
						"value" 				=> 	 $object->$field4['field']
					])}}
						
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