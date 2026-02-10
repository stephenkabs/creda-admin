@extends('layouts.app')

@section('content')

<h4 class="fw-bold mb-3">Create Package</h4>

<form method="POST" action="{{ route('admin.packages.store') }}">
@csrf

@include('admin.packages.form', ['package' => null])

<button class="btn btn-dark rounded-pill px-4">
    Save Package
</button>

@endsection
