@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-5">
                    <div class="card-header">{{$thread->title}}</div>

                    <div class="card-body">
                        <p>{{ $thread->body }}</p>
                    </div>
                </div>

                @foreach($thread->replies as $reply)
                    <div class="card mt-2">
                        <div class="card-header">{{$reply->owner->name . " Said " . $reply->created_at->diffForHumans()}}</div>

                        <div class="card-body">
                            <p>{{ $reply->body }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
