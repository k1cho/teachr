@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        Create a new Tag
    </div>
    <div class="card-body">
        <form action="{{ route('tags.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="tag">Tag name</label>
                <input type="text" name="tag" value="{{ old('tag', $tag->tag) }}" id="tag" class="form-control {{ $errors->has('tag') ? 'is-invalid' : ''}}">
                @if ($errors->has('tag'))
                <div class="invalid-feedback">{{ $errors->first('tag') }}</div>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection
