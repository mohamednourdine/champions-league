@extends('layout')

@section('content')
<div class="container">
    <fixture-component weeks="{{ $weeks }}" standings="{{ $standing }}" matches="{{ $matches }}"/>
</div>
@endsection

@section('footer')

@endsection
