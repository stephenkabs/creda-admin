@extends('layouts.app')

@section('content')

<h4 class="fw-bold mb-3">Edit Package</h4>

<form method="POST" action="{{ route('admin.packages.update', $package) }}">
@csrf
@method('PUT')

@include('admin.packages.form', ['package' => $package])

<button class="btn btn-dark rounded-pill px-4">
    Update Package
</button>

@endsection
