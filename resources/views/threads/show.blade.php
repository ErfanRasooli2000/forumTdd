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
            @if(auth()->check())
                <div class="col-md-8">
                    <div class="card mb-5 mt-5">
                        <div class="card-header">Create A Reply</div>

                        <div class="card-body">
                            <form action="{{"/threads/".$thread->id."/replies"}}" method="post">
                                @csrf
                                <textarea name="body" rows="5" class="form-control" placeholder="Write Some Reply"></textarea>
                                <button type="submit" class="btn btn-primary mt-3">submit reply</button>
                            </form>
                        </div>
                    </div>
            @else
                <div class="col-md-8">
                    <p class="text-center mt-5">You Have to Login First To Add A reply</p>
                </div>
            @endif
            </div>
        </div>
    </div>
@endsection
