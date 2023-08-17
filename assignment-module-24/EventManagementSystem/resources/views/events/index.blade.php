@extends('layouts.app')

@section('content')
    <h1>Event List</h1>
    <a href="{{ route('events.create') }}" class="btn btn-primary">Create Event</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Date & Time</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->date_time->format('F j, Y - g:i A') }}</td>
                    <td>{{ $event->location }}</td>
                    <td>
                        <a href="{{ route('events.show', $event) }}" class="btn btn-info">View</a>
                        <a href="{{ route('events.edit', $event) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('events.destroy', $event) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
