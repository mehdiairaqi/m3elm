@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Post Your Service</h1>
    <form action="{{ route('services.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Service Title</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </div>
        <div class="form-group">
            <label for="description">Service Description</label>
            <textarea class="form-control" name="description" id="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" id="price">
        </div>
        <button type="submit" class="btn btn-primary">Post Service</button>
    </form>
</div>
@endsection
