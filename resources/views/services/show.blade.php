@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $service->title }}</h1>
    <p>{{ $service->description }}</p>
    <p>Price: ${{ $service->price }}</p>
    <p>Status: {{ ucfirst($service->status) }}</p>
    <p>Posted by: {{ $service->user->name }}</p>
    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary">Edit Service</a>
</div>
@endsection
