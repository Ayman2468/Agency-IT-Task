@extends('layouts.app')

@section('content')
<div class="mt-5 pt-5 text-center">
    <p class="h2 align-middle">Welcome To The Task {{auth('sanctum')->user()->user_name}}</p>
</div>
@endsection