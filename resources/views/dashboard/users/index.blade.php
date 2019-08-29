@extends('layouts.app')

@section('content')
    @component('components.dashboard')
        @slot('title')
            Users
        @endslot

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Job Title</th>
              <th scope="col">Email</th>
              <th scope="col">Reports To</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->job_title }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->supervisor ? $user->supervisor->name : 'Nobody' }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
    @endcomponent
@endsection
