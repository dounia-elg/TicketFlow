@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tickets</h1>
    <a href="{{ route('tickets.create') }}" class="btn btn-primary">Create Ticket</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Operating System</th>
                <th>Software</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
            <tr>
                <td>{{ $ticket->title }}</td>
                <td>{{ $ticket->description }}</td>
                <td>{{ $ticket->priority }}</td>
                <td>{{ $ticket->operatingSystem->name }}</td>
                <td>{{ $ticket->software->name }}</td>
                <td>{{ $ticket->status }}</td>
                <td>
                    <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection