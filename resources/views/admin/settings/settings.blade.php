@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        Edit Site Settings
    </div>
    <div class="card-body">
        <form action="{{ route('settings.update') }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="site_name">Site Name</label>
                <input type="text" name="site_name" value="{{ old('site_name', $settings->site_name) }}" id="site_name" class="form-control {{ $errors->has('site_name') ? 'is-invalid' : ''}}">
                @if ($errors->has('site_name'))
                <div class="invalid-feedback">{{ $errors->first('site_name') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input name="address" value="{{ old('address', $settings->address) }}" id="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : ''}}">
                @if ($errors->has('address'))
                <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input name="contact_number" value="{{ old('contact_number', $settings->contact_number) }}" id="contact_number" class="form-control {{ $errors->has('contact_number') ? 'is-invalid' : ''}}">
                @if ($errors->has('contact_number'))
                <div class="invalid-feedback">{{ $errors->first('contact_number') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="contact_email">Contact Email</label>
                <input type="email" name="contact_email" value="{{ old('contact_email', $settings->contact_email) }}" id="contact_email" class="form-control {{ $errors->has('contact_email') ? 'is-invalid' : ''}}">
                @if ($errors->has('contact_email'))
                <div class="invalid-feedback">{{ $errors->first('contact_email') }}</div>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Update Site Settings</button>
            </div>
        </form>
    </div>
</div>

@endsection
