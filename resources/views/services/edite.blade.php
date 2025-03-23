@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Your Service</h1>
    <form action="{{ route('services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Service Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $service->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Service Description</label>
            <textarea class="form-control" name="description" id="description" required>{{ $service->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" id="price" value="{{ $service->price }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Service</button>
    </form>
</div>
@endsection
