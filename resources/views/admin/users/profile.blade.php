@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        
        <div class="row">
            <div class="col-md-4">
                <img src="{{ $user->avatar }}" class="img-thumbnail" width="100px" height="100px">
            </div>
            <div class="col-md-8 mt-5">
                <h2>Edit your Profile</h2>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('users.profile.update') }}" method="POST" enctype="multipart/form-data" files="true">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
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
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}">
                @if ($errors->has('password'))
                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" value="{{ old('avatar', $user->profile->avatar) }}" id="avatar" class="form-control {{ $errors->has('avatar') ? 'is-invalid' : ''}}">
                @if ($errors->has('avatar'))
                <div class="invalid-feedback">{{ $errors->first('avatar') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="facebook">Facebook Profile</label>
                <input type="text" name="facebook" value="{{ old('facebook', $user->profile->facebook) }}" id="facebook" class="form-control {{ $errors->has('facebook') ? 'is-invalid' : ''}}">
                @if ($errors->has('facebook'))
                <div class="invalid-feedback">{{ $errors->first('facebook') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="youtube">Youtube Profile</label>
                <input type="text" name="youtube" value="{{ old('youtube', $user->profile->youtube) }}" id="youtube" class="form-control {{ $errors->has('youtube') ? 'is-invalid' : ''}}">
                @if ($errors->has('youtube'))
                <div class="invalid-feedback">{{ $errors->first('youtube') }}</div>
                @endif
            </div>
            <div class="form-group">
                    <label for="about">About</label>
                    <textarea class="form-control {{ $errors->has('about') ? 'is-invalid' : ''}}" name="about" id="about" cols="5" rows="10">{{ old('about', $user->profile->about) }}</textarea>
                    @if ($errors->has('about'))
                    <div class="invalid-feedback">{{ $errors->first('about') }}</div>
                    @endif
                </div>
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Edit</button>
            </div>
        </form>
    </div>
</div>

@endsection
