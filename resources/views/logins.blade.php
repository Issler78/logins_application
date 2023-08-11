@extends('master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/logins_table_style.css') }}">
@endsection

@section('content')

    @if(session()->has('message'))
        <div class="message">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="main">
        <div class="header">
            <h1>Logins Table</h1>
            <a href="{{ route('logins.create') }}"><button class="add-btn">Add User</button></a>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            @foreach($logins as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>
                    <a href="{{ route('logins.show', ['login' => $item->id]) }}">{{ $item->username }}</a>
                </td>
                <td>
                    <a href="{{ route('logins.edit', ['login' => $item->id]) }}">
                        <button class="edit-btn" title="Edit User"><i class="material-icons">edit</i></button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection