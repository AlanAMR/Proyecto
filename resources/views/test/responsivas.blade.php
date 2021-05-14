@extends('test.template')

@section('test')

<div>
	@forelse($responsivas as $responsiva)
		<p>{{$responsiva}}</p> <br>
	@empty
		<p>No hay Responsivas</p>
	@endforelse
</div>

@endsection