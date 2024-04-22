@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Threads</div>

                    <div class="card-body">
                        @foreach($threads as $thread)
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <h4><a href="{{$thread->path()}}">{{ $thread->title }}</a></h4>
                                    <p>{{ $thread->body }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
