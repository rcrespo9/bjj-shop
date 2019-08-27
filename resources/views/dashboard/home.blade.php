@extends('layouts.app')

@section('content')
    @component('components.dashboard')
        @slot('title')
            Dashboard
        @endslot
        <div class="jumbotron">
            <h2 class="display-4">Welcome to the Kimura BJJ Shop Dashboard!</h1>
            <p class="lead">Given your permissions, you are able to:</p>
            <ul>
                @foreach ($formatted_perms as $perm)
                    <li>{{ $perm }}</li>
                @endforeach
            </ul>
        </div>
    @endcomponent
@endsection
