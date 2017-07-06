@extends ('layouts.master')
@section('title')
	<title>Test Page2</title>
@endsection
@section('content')
	<h1>This is Test Page</h1>

	@if(count($beatles)>0)

		@foreach($beatles as $beatle)
			<li> {{ $beatle }} </li>
		@endforeach
	@else
		<h1 class="text-danger">Sorry, You don't have any records.</h1>
	@endif
@endsection

