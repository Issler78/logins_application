@extends('master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/login_edit.css') }}">
@endsection

@section('content')

@if(session()->has('message'))
    <div class="message">
        {{ session()->get('message') }}
    </div>
@endif

<a href="{{ route('logins.index') }}" class="back-link">
    <button class="back-button" title="Back to table" type="button">
        <i class="material-icons button-icon">arrow_back</i> Voltar
    </button>
</a>

<div class="edit-user-container">
    <h1>Edit User</h1>

    <form class="edit-form" action="{{ route('logins.update', ['login' => $login->id]) }}" method="post">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label class="form-label" for="username">Username:</label>
            <input type="text" class="form-input" name="username" value="{{ $login->username }}">
            @error('username')
                <span class="error-message-input">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label class="form-label" for="email">Email:</label>
            <input type="text" class="form-input" name="email" value="{{ $login->email }}">
            @error('email')
                <span class="error-message-input">{{ $message }}</span>
            @enderror
        </div>
        

        <button type="submit" class="update-button">Update</button>
    </form>
</div>
@endsection
