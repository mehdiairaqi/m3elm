@foreach ($experts as $expert)
    <div>
        <h3>{{ $expert->name }} - Service: {{ $expert->service->name }}</h3>
        <p>{{ $expert->bio }}</p>
        <form action="{{ route('experts.review', $expert->id) }}" method="POST">
            @csrf
            <div>
                <label for="status">Status:</label>
                <select name="status">
                    <option value="approved">Approve</option>
                    <option value="rejected">Reject</option>
                </select>
            </div>
            <div>
                <label for="review">Review:</label>
                <textarea name="review" required></textarea>
            </div>
            <div>
                <label for="rating">Rating:</label>
                <input type="number" name="rating" min="1" max="5" required>
            </div>
            <button type="submit">Submit Review</button>
        </form>
    </div>
@endforeach
