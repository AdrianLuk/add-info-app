@extends('layouts.main')

@section('content')


    <table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Province</th>
            <th>Telephone</th>
            <th>Postal Code</th>
            <th>Salary</th>
            <th>Date Created</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>


    @foreach ($users as $user)
        <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->province }}</td>
        <td>{{$user->telephone}}</td>
        <td>{{$user->postal}}</td>
        <td>${{$user->salary}}</td>
        <td>{{ $user->created_at->format('F d, Y')}}</td>
        <td>
            <ul class="list-inline list-unstyled">
            <li class="list-inline-item"><a href="/listing/{{$user->id}}/edit" class="btn btn-link">Update</a></li>

            <li class="list-inline-item"><form action="/listing/{{$user->id}}" method="POST">

            {!! csrf_field() !!}

            <input type="hidden" name="_method" value="DELETE">

            <button type="submit" class="btn btn-link">Delete</button>
        </form></li>
            </ul>
        </td>
        </tr>
    @endforeach
    </tbody>
    </table>
@endsection
