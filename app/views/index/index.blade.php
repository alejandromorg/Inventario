@extends("layout")
@section("content")
     {{ Form::open([
        "route" => "index/index",
        "autocomplete" => "on"
    ]) }}
		{{ Form::label("search", trans('index.search'))}}
        {{ Form::text("search", Input::get("search"), [
            "placeholder" => trans('index.searchplaceholder'),
			"size" => 30
        ]) }}        
		{{ Form::submit("index") }}
    {{ Form::close() }}	
@stop