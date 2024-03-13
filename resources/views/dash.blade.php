@extends('layout.layout')

@section('title')
 Dashboard
@endsection

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('shared.left-sidebar')
            </div>
            <div class="col-6">

                @include('shared.success-message')
                @include('ideas.shared.submit-idea')

                <hr>
                @if(count($ideas)>0)
                @foreach($ideas as $idea)
                <div class="mt-3">
                   @include('ideas.shared.idea-card')
                </div>
                @endforeach
                @else
                    No results found
                @endif
                <div class="mt-5">
                {{$ideas->withQueryString()->links()}}
                 </div>
            </div>



            <div class="col-3">

                @include('shared.search-bar')
                @include('shared.follow-box')
            </div>
        </div>
    </div>
@endsection
