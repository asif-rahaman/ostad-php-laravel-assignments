@extends('layouts.app')

@section('content')
    <h1>{{ $event->title }}</h1>
    <p><strong>Date & Time:</strong> {{ $event->date_time->format('F j, Y - g:i A') }}</p>
    <p><strong>Location:</strong> {{ $event->location }}</p>
    <p><strong>Description:</strong> {{ $event->description }}</p>
    <a href="{{ route('events.edit', $event) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('events.destroy', $event) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
