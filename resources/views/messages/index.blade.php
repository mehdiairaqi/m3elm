<!-- Display the user's name or other details -->
<h1>Messages with {{ $user->name }}</h1>

<!-- Messages section -->
@foreach ($messages as $message)
    <div class="message">
        <p>{{ $message->message }}</p>
        <small>Sent by: {{ $message->sender_id == auth()->user()->id ? 'You' : $user->name }}</small>
    </div>
@endforeach

<!-- Message sending form -->
@if(auth()->user()->id == $user->id || auth()->user()->role == 'buyer' || auth()->user()->role == 'expert') 
    <!-- Show the form only for authenticated users and roles involved in the conversation -->
    <form action="{{ route('messages.store') }}" method="POST">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $user->id }}"> <!-- Use the user ID -->
        <textarea name="message" class="form-control" rows="4" placeholder="Type your message..."></textarea>
        <button type="submit" class="btn btn-primary mt-2">Send</button>
    </form>
@endif
