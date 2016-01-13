@extends("layout")

@section('title')
	{{trans($module.'.addTitle')}}
@stop
@section('js')
	{{ HTML::script('js/controllers/Stock.js') }}
@stop


@section("content")
	

	<?php 

// Define list of valid barcodes
// NOTE: This you might want to replace with a database query (or a file lookup) to look up if the given barcode is valid.
//       You might also want to register in your database or a file that the barcode was sent here to the server.
$valid_barcodes = array(
	'8576482874',
	'2475587348',
	'4203716559',
	'9184783714',
	'1486424882',
	'2845717594',
	'2118477499',
);


// Validate incoming data
if (!$_GET['data']) {
	system_error('No barcode sent to server.');
}
if (!$_GET['id']) {
	system_error('No scanner ID sent to server.');
}


// Check if barcode is valid
if (in_array($_GET['data'], $valid_barcodes)) {
	echo '{"status":"ok","result_msg":"Everything is good! Welcome to the show!"}';
} else {
	system_error('Barcode is invalid.');
}

// --------------------------------------------------------------
// Utility functions

function system_error($err_msg) {
	echo '{"status":"error","err_msg":"'. str_replace('"', '\\"', $err_msg) .'"}';
	exit;
}
?>

 @stop
@section("footer")
    @parent
 @stop