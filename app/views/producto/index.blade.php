@extends("layout")

@section('title')
	{{trans($module.'.indextitle')}}
@stop
@section('js')
	<script src="/js/jquery.js"></script>
    <script src="/js/layout.js"></script>	
@stop
@section("content")


@if (count($records))


	<?php 
		$field1 = $FieldsIndex['1'];
		$field2 = $FieldsIndex['2'];
		$field4 = $FieldsIndex['4'];
		$field5 = $FieldsIndex['5'];

		
	?>	
	<div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">
					{{trans($module.'.indextitle')}}
            </h1>
        </div>
        <div id="no-more-tables">
            <table class="col-sm-12 table-bordered table-striped table-condensed cf tbl">
        		<thead class="cf">
        			<tr>
						<th class="cell ">&nbsp;</th>
						
						{{ Form::columnIndex([
							"label" 	=> 	trans($field1['label'])			
						])}}
						{{ Form::columnIndex([
							"label" 	=> 	trans($field2['label'])			
						])}}
						{{ Form::columnIndex([
							"label" 	=> 	trans($field4['label'])			
						])}}
	
        				
					@if (allowed("nodisponible"))
						{{ Form::columnIndex([
							"label" 	=> 	trans($field5['label'])			
						])}}	
					@endif
					</tr>
        		</thead>	
        		<tbody>				

				@foreach ($records as $record)
					@if (allowed("nodisponible"))
							<tr>
								<td class="cell col-sm-1" data-title="buttons">
								@if (allowed($module."/edit"))
									<a href="{{ URL::route($module.'/edit') }}?{{$key}}={{ $record->$key}}">edit</a>
								@endif
								@if (allowed($module."/delete"))
									<a href="{{ URL::route($module.'/delete') }}?{{$key}}={{ $record->$key}}" class="confirm" data-confirm="Are you sure you want to delete this record?">delete</a>
								@endif
								</td>
								{{ Form::columnIndex([
									"labelxs" 	=> 	trans($field1['label'])			
								])}}								
								{{ Form::columnIndex([
									"content" 	=> 	 $record->$field1['field'],
									"size" 		=> 	  $field1['size']
								])}}
								
								{{ Form::columnIndex([
									"labelxs" 	=> 	trans($field2['label'])			
								])}}								
								{{ Form::columnIndex([
									"content" 	=> 	 $record->$field2['field'],
									"size" 		=> 	 $field2['size']	
								])}}
								
								{{ Form::columnIndex([
									"labelxs" 	=> 	trans($field4['label'])			
								])}}								
								{{ Form::columnIndex([
									"content" 	=> 	 $record->$field4['field'],
									"size" 		=> 	  $field4['size']	
								])}}
								
								{{ Form::columnIndex([
									"labelxs" 	=> 	trans($field5['label'])			
								])}}								
								{{ Form::columnIndex([
									"content" 	=> 	 $record->$field5['field'],
									"size" 		=> 	  $field5['size']	
								])}}
								


							</tr>
					@else
						@if ($record->DISPONIBLE)
						<tr> 
							<td class="cell col-sm-1" data-title="buttons">
								@if (allowed($module."/edit"))
									<a href="{{ URL::route($module.'/edit') }}?{{$field1['field']}}={{ $record->$key}}">edit</a>
								@endif
								@if (allowed($module."/delete"))
									<a href="{{ URL::route($module.'/delete') }}?{{$field1['field']}}={{ $record->$key}}" class="confirm" data-confirm="Are you sure you want to delete this record?">delete</a>
								@endif
								</td>
								{{ Form::columnIndex([
									"labelxs" 	=> 	trans($field1['label'])			
								])}}								
								{{ Form::columnIndex([
									"content" 	=> 	 $record->$field1['field'],
									"size" 		=> 	 $field1['size']
								])}}
								
								{{ Form::columnIndex([
									"labelxs" 	=> 	trans($field2['label'])			
								])}}								
								{{ Form::columnIndex([
									"content" 	=> 	 	$record->$field2['field'],
									"size" 		=> 		$field2['size']	
								])}}
								
								{{ Form::columnIndex([
									"labelxs" 	=> 	trans($field4['label'])			
								])}}								
								{{ Form::columnIndex([
									"content" 	=> 		$record->$field4['field'],
									"size" 		=> 		$field4['size']	 
								])}}
								{{ Form::columnIndex([
									"labelxs" 	=> 	trans($field5['label'])			
								])}}								
								{{ Form::columnIndex([
									"content" 	=> 		$record->$field5['field'],
									"size" 		=> 		$field5['sizend']	 
								])}}	
						</tr>
							@endif
					@endif
				@endforeach      

    @else
        <p>There are no Records.</p>
    @endif
	
        		</tbody>
        	</table>
        </div>
    </div>

    <script src="/js/layout.js"></script> 
@stop