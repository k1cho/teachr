@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Users</h2>
    </div>
    <div class="card-body">
        <table class="table table-hover text-center">
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Permission</th>
                <th>Delete</th>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td><img src="{{ $user->avatar }}" width="50px" height="50px"></td>
                    <td>{{ $user->name }}</td>
                    <td>
                        @if ($user->role == 'Admin')
                        <small>
                            <form class="form-delete" method="post" action="{{ route('users.not_admin', $user->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <small><button type="submit" class="btn btn-sm btn-danger">Remove Admin</button></small>
                            </form>
                        </small>
                        @else
                        <small>
                            <form class="form-delete" method="post" action="{{ route('users.admin', $user->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <small><button type="submit" class="btn btn-sm btn-dark">Make Admin</button></small>
                            </form>
                        </small>
                        @endif
                    </td>
                    <td>
                        @if (auth()->id() !== $user->id)
                        <form class="form-delete" method="POST" action="{{ route('users.destroy', $user->id)}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td>
                        <strong>No data yet.</strong>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
