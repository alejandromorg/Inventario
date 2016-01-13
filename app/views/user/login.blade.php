@extends("layout")

@section("content")

    {{ Form::open([
        "route" => "user/login",
        "autocomplete" => "off"
    ]) }}
		{{ Form::label("email", trans('login.email'))}}
        {{ Form::text("email", Input::get("email"), [
            "placeholder" => trans('login.emailplaceholder'),
			"size" => 30
        ]) }}
        
        {{ Form::label("password", trans('login.password'))}}
        {{ Form::password("password", [
            "placeholder" => trans('login.passwordplaceholder'),
			"size" => 30
        ]) }}
        @if ($error = $errors->first("password"))
            <div class="error">
                {{ $error }}
            </div>
        @endif
        {{ Form::submit("login") }}
    {{ Form::close() }}
@stop
@section("footer")
    @parent

@stop