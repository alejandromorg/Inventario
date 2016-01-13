@extends("layout")

@section('title')
	{{trans($module.'.addTitle')}}
@stop
@section('js')
	{{ HTML::script('js/controllers/Proveedor.js') }}
@stop
@section("titleHeader")
    {{trans($module.'.addTitle')}}
@stop

@section("content")

	<?php 
		$field1 = $FieldsCreate['1'];
		$field2 = $FieldsCreate['2'];
		$field3 = $FieldsCreate['3'];
		$field4 = $FieldsCreate['4'];
				
	?>
			
	{{ Form::open([
		"route"        => $module."/add",
		"autocomplete" => "off"
	]) }}
	<div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">
					{{trans($module.'.addTitle')}}
					<label onclick="">+</label>
					{{--<label onclick="addrow()">+</label>--}}
            </h1>
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
						@if (allowed("nodisponible"))
							{{ Form::columnAdd([
								"type"	=> "label",
								"label" 	=> 	trans($field4['label'])			
							])}}
						@endif
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