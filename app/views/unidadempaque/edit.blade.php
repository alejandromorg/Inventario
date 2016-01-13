@extends("layout")

@section('title')
	{{trans('editproducto.title')}}
@stop
@section("titleHeader")
    {{trans('editproducto.titleHeader')}}
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
			<div class="form-group @if ($form->getErrors()->has('id_inventario_txt')) has-error @endif" >
				{{ Form::label('id_inventario_lbl', trans('editproducto.idinventario'), array('class' => 'control-label col-xs-3')) }}
				<div class="col-xs-9">
					{{ Form::text('id_inventario_txt', $producto->ID_INVENTARIO, array('class' => 'form-control','id'=>'id_inventario_txt','placeholder' => trans('editproducto.idinventarioplaceholder'))) }}
				</div>
				@if ($errors->has('id_inventario_txt'))
					@foreach ($errors->get('id_inventario_txt') as $message)
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
	</div>	
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group @if ($form->getErrors()->has('id_venta_txt')) has-error @endif" >
				{{ Form::label('id_venta_lbl', trans('editproducto.idventa'), array('class' => 'control-label col-xs-3')) }}
				<div class="col-xs-9">
					{{ Form::text('id_venta_txt', $producto->ID_VENTA, array('class' => 'form-control','id'=>'id_venta_txt','placeholder' => trans('editproducto.idventaplaceholder'))) }}
				</div>
				@if ($errors->has('id_venta_txt'))
					@foreach ($errors->get('id_venta_txt') as $message)
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
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group @if ($form->getErrors()->has('id_producto_txt')) has-error @endif" >
				{{ Form::label('id_producto_lbl', trans('editproducto.idproducto'), array('class' => 'control-label col-xs-3')) }}
				<div class="col-xs-9">
					{{ Form::text('id_producto_txt', $producto->ID_PRODUCTO, array('class' => 'form-control','id'=>'id_producto_txt','placeholder' => trans('editproducto.idproductoholder'))) }}
				</div>
				@if ($errors->has('id_producto_txt'))
					@foreach ($errors->get('id_producto_txt') as $message)
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
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group @if ($form->getErrors()->has('id_ruta_txt')) has-error @endif" >
				{{ Form::label('id_ruta_lbl', trans('editproducto.idruta'), array('class' => 'control-label col-xs-3')) }}
				<div class="col-xs-9">
					{{ Form::select('id_ruta_txt',$rutasValidas,0,['class'=>'form-control']) }}
				</div>
				@if ($errors->has('id_ruta_txt'))
					@foreach ($errors->get('id_ruta_txt') as $message)
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
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group @if ($form->getErrors()->has('nombre_producto_txt')) has-error @endif" >
				{{ Form::label('nombre_producto_lbl', trans('editproducto.nombreproducto'), array('class' => 'control-label col-xs-3')) }}
				<div class="col-xs-9">
					{{ Form::text('nombre_producto_txt', $producto->NOMBRE_PRODUCTO, array('class' => 'form-control','id'=>'nombre_producto_txt','placeholder' => trans('editproducto.nombreproductoplaceholder'))) }}
				</div>
				@if ($errors->has('nombre_producto_txt'))
					@foreach ($errors->get('nombre_producto_txt') as $message)
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
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group @if ($form->getErrors()->has('disponible_txt')) has-error @endif" >
				{{ Form::label('disponible_lbl', trans('editproducto.disponible'), array('class' => 'control-label col-xs-3')) }}
				<div class="col-xs-9">
					{{ Form::text('disponible_txt', $producto->DISPONIBLE, array('class' => 'form-control','id'=>'disponible_txt','placeholder' => trans('editproducto.disponibleplaceholder'))) }}
				</div>
				@if ($errors->has('disponible'))
					@foreach ($errors->get('disponible') as $message)
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