@extends('layouts.app')

@section('content')
    @component('components.dashboard')
        @slot('title')
            Dashboard
        @endslot
        <div class="jumbotron">
            <h2 class="display-4">Welcome to the Fantastic Toys dashboard!</h1>
            <p class="lead">Given your permissions, you are able to:</p>
            <ul class="lead">
                @foreach ($formatted_perms as $perm)
                    <li>{{ $perm }}</li>
                @endforeach
            </ul>
        </div>
    @endcomponent
@endsection
