@extends("layout")

@section('title')
	{{trans('addData.title')}}
@stop
@section("titleHeader")
    {{trans('addData.titleHeader')}}
@stop

@section("content")

    {{ Form::open([
		"url"          => URL::full(),
		"autocomplete" => "off",
		'class'=>'form-horizontal'
	]) }}

	 {{--*/ $errors = $form->getErrors(); /*--}}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group @if ($form->getErrors()->has('name')) has-error @endif" >
				{{ Form::label('name', trans('addData.name'), array('class' => 'control-label col-xs-3')) }}
				<div class="col-xs-9">
					{{ Form::text('name', $data->name, array('class' => 'form-control','id'=>'name','placeholder' => trans('addData.nameplaceholder'))) }}
				</div>
				@if ($errors->has('name'))
					@foreach ($errors->get('name') as $message)
						<div class="help-block col-xs-12">
							<div class="col-xs-3">
							
							</div>						
							<div class="col-xs-9">
								{{$message}}
							</div>
						</div>
					@endforeach 
				@endif

			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group @if ($form->getErrors()->has('description')) has-error @endif" >
			    {{ Form::label('description',trans('addData.description'),array('class'=>'control-label col-xs-3')) }}
				<div class="col-xs-9">
					{{ Form::textarea('description',$data->description, array('rows'=>'3','class'=>'form-control','id'=>'description','placeholder' => trans('addData.descriptionplaceholder'),'value'=>$data->description)) }}
				</div>
				@if ($errors->has('description'))
					@foreach ($errors->get('description') as $message)
						<div class="help-block col-xs-12">
							<div class="col-xs-3">
							
							</div>						
							<div class="col-xs-9">
								{{$message}}
							</div>
						</div>
					@endforeach 
				@endif
			</div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group @if ($form->getErrors()->has('email')) has-error @endif" >
				{{ Form::label('email',trans('addData.email'),array('class'=>'control-label col-xs-3')) }}
				<div class="col-xs-9">
					{{ Form::text('email', $data->email, array('class' => 'form-control','id'=>'email','placeholder' => trans('addData.emailplaceholder'),'value'=>$data->email)) }}
				</div>
				@if ($errors->has('email'))
					@foreach ($errors->get('email') as $message)
						<div class="help-block col-xs-12">
							<div class="col-xs-3">
							
							</div>						
							<div class="col-xs-9">
							{{$message}}
							</div>
						</div>
					@endforeach 
				@endif
			</div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group @if ($form->getErrors()->has('mobile')) has-error @endif" >
				{{ Form::label('mobile',trans('addData.mobile'),array('class'=>'control-label col-xs-3')) }}
				<div class="col-xs-9">
					{{ Form::text('mobile', $data->mobile, array('class' => 'form-control','id'=>'mobile','placeholder' => trans('addData.mobile'),'value'=>$data->mobile)) }}
				</div>
				@if ($errors->has('mobile'))
				@foreach ($errors->get('mobile') as $message)
						<div class="help-block col-xs-12">
							<div class="col-xs-3">
							
							</div>						
							<div class="col-xs-9">
							{{$message}}
							</div>
						</div>
					@endforeach 
				@endif				
			</div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group @if ($form->getErrors()->has('web')) has-error @endif" >	
				{{ Form::label('web',trans('addData.web'),array('class'=>'control-label col-xs-3')) }}
				<div class="col-xs-9">
					{{ Form::text('web', $data->web, array('class' => 'form-control','id'=>'web','placeholder' => trans('addData.web'),'value'=>$data->web)) }}
				</div>
				@if ($errors->has('web'))
				@foreach ($errors->get('web') as $message)
						<div class="help-block col-xs-12">
							<div class="col-xs-3">
							
							</div>						
							<div class="col-xs-9">
							{{$message}}
							</div>
						</div>
					@endforeach 
				@endif	
			</div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group @if ($errors->has('address')) has-error @endif" >	
				{{ Form::label('address',trans('addData.address'),array('class'=>'control-label col-xs-3')) }}
				<div class="col-xs-9">
					{{ Form::text('address', $data->address, array('class' => 'form-control','id'=>'address','placeholder' => trans('addData.address'),'value'=>$data->address)) }}
				</div>
				@if ($errors->has('address'))
					@foreach ($errors->get('address') as $message)
						<div class="help-block col-xs-12">
							<div class="col-xs-3">
							
							</div>						
							<div class="col-xs-9">
							{{$message}}
							</div>
						</div>
					@endforeach 				
				@endif
			</div>
        </div>	
		<div class="col-xs-12 col-sm-12 col-md-12">	
			<div class="col-xs-2 col-xs-offset-5">	
				{{ Form::submit("save")}} 
			</div>
		</div>	
			{{ Form::close() }}          
    </div>
    
  

@stop
@section("footer")
    @parent
    
@stop