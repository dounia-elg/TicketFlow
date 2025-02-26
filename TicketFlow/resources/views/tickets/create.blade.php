@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Ticket</h1>
    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="priority">Priority</label>
            <select name="priority" id="priority" class="form-control" required>
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
            </select>
        </div>
        <div class="form-group">
            <label for="operating_system_id">Operating System</label>
            <select name="operating_system_id" id="operating_system_id" class="form-control" required>
                @foreach($operatingSystems as $os)
                <option value="{{ $os->id }}">{{ $os->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="software_id">Software</label>
            <select name="software_id" id="software_id" class="form-control" required>
                @foreach($softwares as $software)
                <option value="{{ $software->id }}">{{ $software->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection