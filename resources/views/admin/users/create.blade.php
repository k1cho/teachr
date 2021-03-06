@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        Create a new User
    </div>
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}">
                @if ($errors->has('name'))
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}">
                @if ($errors->has('email'))
                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection
