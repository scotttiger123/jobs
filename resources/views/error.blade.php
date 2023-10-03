<!-- resources/views/error.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="alert alert-danger">
        <strong>Error:</strong> {{ $errorMessage }}
    </div>
</div>
@endsection
