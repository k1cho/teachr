@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Trashed Posts</h2>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Edit</th>
                <th>Restore</th>
                <th>Delete</th>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr>
                    <td><img src="{{ $post->image_path }}" width="50px" height="50px"></td>
                    <td>{{ $post->title }}</td>
                    <td><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-outline-info">Edit</a></td>
                    <td>
                        <a href="{{ route('posts.restore', $post->id)}}" class="btn btn-sm btn-outline-success">Restore</a>
                    </td>
                    <td>
                        <a href="{{ route('posts.kill', $post->id)}}" class="btn btn-sm btn-outline-danger">Delete</a>
                        {{-- <form class="form-delete" method="POST" action="{{ route('posts.kill', $post->id)}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure to delete this forever?')">Delete</button>
                        </form> --}}
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
