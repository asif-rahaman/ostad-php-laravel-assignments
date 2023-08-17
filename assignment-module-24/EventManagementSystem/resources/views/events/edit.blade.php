@extends('layouts.app')

@section('content')
    <h1>Edit Event</h1>
    <form action="{{ route('events.update', $event) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ $event->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="date_time">Date & Time</label>
            <input type="datetime-local" name="date_time" id="date_time" class="form-control" value="{{ $event->date_time->format('Y-m-d\TH:i') }}">
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $event->location }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
