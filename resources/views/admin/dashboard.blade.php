@extends('layouts.app')

@section('content')

<div class="row">
<div class="col-md-4 mb-4">
    <div class="card text-center">
        <div class="card-header">
            Posts
        </div>
        <div class="card-body">
            <h1>{{ $posts_count }}</h1>
        </div>
    </div>
</div>

<div class="col-md-4 mb-4">
    <div class="card text-center">
        <div class="card-header">
            Trashed Posts
        </div>
        <div class="card-body">
            <h1>{{ $trashed_count }}</h1>
        </div>
    </div>
</div>

<div class="col-md-4 mb-4">
    <div class="card text-center">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            <h1>{{ $users_count }}</h1>
        </div>
    </div>
</div>
<div class="col-md-4 mb-4">
    <div class="card text-center">
        <div class="card-header">
            Categories
        </div>
        <div class="card-body">
            <h1>{{ $categories_count }}</h1>
        </div>
    </div>
</div>
<div class="col-md-4 mb-4">
    <div class="card text-center">
        <div class="card-header">
            Tags
        </div>
        <div class="card-body">
            <h1>{{ $tags_count }}</h1>
        </div>
    </div>
</div>
</div>
@endsection
