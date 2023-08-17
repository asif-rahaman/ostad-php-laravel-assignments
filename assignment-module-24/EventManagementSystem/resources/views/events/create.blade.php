@extends('layouts.app')

@section('content')
    <h1>Create Event</h1>
    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label for="date_time">Date & Time</label>
            <input type="datetime-local" name="date_time" id="date_time" class="form-control">
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
