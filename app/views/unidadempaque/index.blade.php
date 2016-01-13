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

					</tr>
        		</thead>	
        		<tbody>				

				@foreach ($records as $record)
					@if (allowed("nodisponible"))
							<tr>
								<td class="cell col-sm-1" data-title="buttons">
								@if (allowed($module."/edit"))
									<a href="{{ URL::route($module.'/edit') }}?ID={{ $record->$key}}">edit</a>
								@endif
								@if (allowed($module."/delete"))
									<a href="{{ URL::route($module.'/delete') }}?ID={{ $record->$key}}" class="confirm" data-confirm="Are you sure you want to delete this record?">delete</a>
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

							</tr>
					
				@endforeach      

    @else
        <p>There are no Records.</p>
    @endif
	
        		</tbody>
        	</table>
        </div>
    </div>


@stop