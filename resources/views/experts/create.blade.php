<form action="{{ route('experts.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label for="service_id">Service:</label>
        <select name="service_id" required>
            @foreach($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="bio">Bio:</label>
        <textarea name="bio" required></textarea>
    </div>
    <button type="submit">Submit Expert</button>
</form>
