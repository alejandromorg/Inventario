@extends("layout")
@section("content")
	@if (allowed("group/edit"))
		{{ Form::open([
			"url"          => URL::full(),
			"autocomplete" => "off"
		]) }}
			{{ Form::fieldCreate([
				"name"        => "name",
				"label"       => "Name",
				"form"        => $form,
				"placeholder" => "new group",
				"value"       => $group->name
			])}}
			@include("user/assign")
			@include("resource/assign")
			{{ Form::submit("save") }}
		{{ Form::close() }}
	@endif
@stop
@section("footer")
    @parent
    <script src="//polyfill.io"></script>
@stop