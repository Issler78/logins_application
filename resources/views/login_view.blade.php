@extends('master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/logins_view_style.css') }}">
@endsection

@section('content')
<div class="main">
<table class="data-table">
        <thead>
            <tr class="threads">
                <th>Fields</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td  class="threads"><b>ID:</b></td>
                <td class="details">{{ $login->id }}</td>
            </tr>
            <tr>
                <td class="threads"><b>Username:</b></td>
                <td class="details">{{ $login->username }}</td>
            </tr>
            <tr>
                <td class="threads"><b>Email:</b></td>
                <td class="details">{{ $login->email }}</td>
            </tr>
            <tr>
                <td class="threads"><b>Password (hash):</b></td>
                <td class="details">{{ $login->password }}</td>
            </tr>
        </tbody>
    </table>
    
    <form action="{{ route('logins.destroy', ['login' => $login->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <div class="button-row">
            <div class="button-container">
                <a href="{{ route('logins.index') }}">
                    <button class="back-button" title="Back to table" type="button">
                        <i class="material-icons button-icon">arrow_back</i> Voltar
                    </button>
                </a>
            </div>

            <div class="button-container">
                <button class="delete-button" title="Delete user" type="submit">
                    <i class="material-icons button-icon">delete</i> Excluir
                </button>
            </div>
        </div>
    </form>
</div>
@endsection