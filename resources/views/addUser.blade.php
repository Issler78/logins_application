@extends('master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/add_login_style.css') }}">
@endsection

@if(session()->has('message'))
    <span class="error-message">{{ session()->get('message') }}</span>
@endif

@section('content')
    <div class="title">Add Login</div>
    <form action="{{ route('logins.store') }}" method="post" novalidate>
        @csrf
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Minimum 4 characters" @if($errors->any()) value="{{ old('username') }}" @endif>
            @error('username')
                <span class="error-message-input">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="example@example.com" @if($errors->any()) value="{{ old('email') }}" @endif>
            @error('email')
                <span class="error-message-input">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Minimum 6 characters">
            @error('password')
                <span class="error-message-input">{{ $message }}</span>
            @enderror
        </div>
        <div class="btn-container">
            <a href="{{ route('logins.index') }}"><button class="btn btn-cancel" type="button">Back</button></a>
            <button class="btn btn-save" type="submit">Save</button>
        </div>
    </form>
@endsection