@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <th>Tag Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
                @forelse ($tags as $tag)
                <tr>
                    <td>{{ $tag->tag }}</td>
                    <td><a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-sm btn-outline-info">Edit</a></td>
                    <td>
                        <form class="form-delete" method="POST" action="{{ route('tags.destroy', $tag->id)}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center">
                        <strong>No data yet.</strong>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
