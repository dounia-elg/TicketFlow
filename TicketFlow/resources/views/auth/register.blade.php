@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        <select name="role_id" required>
            <option value="2">Client</option>
            <option value="3">Developer</option>
        </select>
        <button type="submit">Register</button>
    </form>
@endsection