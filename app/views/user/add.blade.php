@extends("layout")

@section('title')
	{{trans('addUser.title')}}
@stop
@section("titleHeader")
    {{trans('addUser.titleHeader')}}
@stop

@section("content")

<div class="row centered-form">
  <div class="col-xs-12 col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">{{trans('addUser.title')}}</small></h3>
      </div>
      <div class="panel-body">
			{{ Form::open([
				"route"        => "user/add",
				"autocomplete" => "off"
			]) }}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					{{ Form::field([
						"name"        => "username",
						"label"       => trans('addUser.username'),			
						"form"        => $form,
						"placeholder" => trans('addUser.usernameplaceholder')
					])}}
				</div>
            </div>
		</div>
		<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					{{ Form::field([
						"name"        => "email",
						"label"       => trans('addUser.email'),			
						"form"        => $form,
						"placeholder" => trans('addUser.emailplaceholder')
					])}}
				</div>
            </div>
		</div>
		<div class="row">	
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					{{ Form::field([
						"type"			=> "password",	
						"name"        	=> "password",
						"label"       	=> trans('addUser.pwd'),			
						"form"        	=> $form,
						"placeholder" 	=> trans('addUser.pwdplaceholder')
					])}}
				</div>
            </div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					{{ Form::field([
						"type"			=> "password",		
						"name" 		    => "password_confirmation",
						"label"       	=> trans('addUser.pwdconfirmation'),			
						"form"        	=> $form,
						"placeholder" 	=> trans('addUser.pwdconfirmationplaceholder')
					])}}
				</div>
            </div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					{{ HTML::image(Captcha::img(), trans('addUser.captchaAltText'))}}
				</div>
            </div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					
					{{ Form::field([
						"name"        => "captcha",
						"label"       => trans('addUser.captcha'),			
						"form"        => $form,
						"placeholder" => trans('addUser.captchaplaceholder')
					])}}
				</div>
            </div>
		</div>		
			{{ Form::submit("save") }}
			{{ Form::close() }}          
      </div>
    </div>
  </div>
</div>
@stop
@section("footer")
    @parent
    
@stop