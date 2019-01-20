@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        Edit this Category
    </div>
    <div class="card-body">
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH')}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}">
                @if ($errors->has('name'))
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection
