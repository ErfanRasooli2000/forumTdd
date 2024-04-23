@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if(auth()->check())
                <div class="col-md-8">
                    <div class="card mb-5 mt-5">
                        <div class="card-header">Create A Thread</div>

                        <div class="card-body">
                            <form action="{{"/threads/create"}}" method="post">
                                @csrf
                                <input type="text" class="form-control" name="title" required placeholder="Title Of Thread">
                                <textarea name="body" rows="5" class="form-control mt-3" placeholder="Write Some Reply"></textarea>
                                <button type="submit" class="btn btn-primary mt-3">submit reply</button>
                            </form>
                        </div>
                    </div>
                    @else
                        <div class="col-md-8">
                            <p class="text-center mt-5">You Have to Login First To Add A reply</p>
                        </div>
                    @endif
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
