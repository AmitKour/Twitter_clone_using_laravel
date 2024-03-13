@extends('layout.layout')
@section('title',$user->name)
@section('content')
    <div class="container m">
        <div class="row">
            <div class="col-4 mt-3">
                @include('shared.left-sidebar')
            </div>
            <div class="col-8 mt-3">
                @include('shared.success-message')
                @include('users.shared.user-card')
            </div>

        </div>
    </div>
@endsection
