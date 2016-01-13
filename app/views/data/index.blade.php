@extends("layout")
@section("content")

@if (count($records))
		
	<div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">
					{{trans('data.ttlRecords')}}
            </h1>
        </div>
        <div id="no-more-tables">
            <table class="col-sm-12 table-bordered table-striped table-condensed cf tbl">
        		<thead class="cf">
        			<tr>
						<th class="cell ">&nbsp;</th>
        				<th class="cell ">{{trans('data.lbName')}}</th>
        				<th class="cell ">{{trans('data.lbDescription')}}</th>
        				<th class="cell ">{{trans('data.lbMobile')}}</th>
						<th class="cell ">{{trans('data.lbEmail')}}</th>
						<th class="cell ">{{trans('data.lbWeb')}}</th>
        				<th class="cell ">{{trans('data.lbAddress')}}</th>
        				
        			</tr>
        		</thead>	
        		<tbody>				

		@foreach ($records as $record)
		
					<tr>
						<td class="cell ctitle visible-xs hidden-md">{{trans('data.lbName')}}</td>
						<td class="cell col-sm-1" data-title="buttons">
					    @if (allowed("data/edit"))
                            <a href="{{ URL::route('data/edit') }}?id={{ $record->id }}">edit</a>
                        @endif
                        @if (allowed("data/delete"))
                            <a href="{{ URL::route('data/delete') }}?id={{ $record->id }}" class="confirm" data-confirm="Are you sure you want to delete this record?">delete</a>
                        @endif
						</td>
						<td class="cell ctitle visible-xs hidden-md">{{trans('data.lbName')}}</td>
        				<td class="cell col-sm-1" data-title="Name">{{ $record->name }}</td>
						<td class="cell ctitle visible-xs hidden-md">{{trans('data.lbDescription')}}</td>
        				<td class="cell col-sm-4" data-title="Description">{{ $record->description }}</td>
						<td class="cell ctitle visible-xs hidden-md">{{trans('data.lbMobile')}}</td>
        				<td class="cell col-sm-2" data-title="Mobile" >{{ $record->mobile }}</td>
						<td class="cell ctitle visible-xs hidden-md">{{trans('data.lbEmail')}}</td>
						<td class="cell col-sm-2" data-title="email" >{{ $record->email }}</td>
						<td class="cell ctitle visible-xs hidden-md">{{trans('data.lbWeb')}}</td>
						<td class="cell col-sm-1" data-title="Web" >{{ $record->web }}</td>
						<td class="cell ctitle visible-xs hidden-md">{{trans('data.lbAddress')}}</td>
        				<td class="cell col-sm-1" data-title="Address" >{{ $record->address }}</td>
					</tr>
        			
		@endforeach      

    @else
        <p>There are no Records.</p>
    @endif
	
        		</tbody>
        	</table>
        </div>
    </div>

	
    <script src="/js/jquery.js"></script>
    <script src="/js/layout.js"></script>	
@stop