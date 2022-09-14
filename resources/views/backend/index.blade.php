@extends('layouts.backend.base')
@section('title', 'Dashboard Admin')

@section('content')
    <div class="card bg-primary">
        <div class="card-body">
            <h4 class="text-white">Welcome back {{ Auth::user()->name }}</h4>
        </div>
    </div>
@endsection
