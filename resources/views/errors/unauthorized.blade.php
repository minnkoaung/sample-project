@extends('layouts.master')

@section('content')

    <div class="jumbotron text-center">
   		<i class="pe-7s-shield text-danger animated zoomInDown" style="font-size: 10em;padding-bottom: 10px;"></i>
	    <div class="alert alert-danger alert-dismissible alert-important animated fadeIn" role="alert">
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span></button>

	        <strong>Oh Snap!</strong> {{ $exception->getMessage() }} You are not authorized to do this.

	    </div>
	    <a href="">Contact your Administrator</a>
    </div>

@endsection