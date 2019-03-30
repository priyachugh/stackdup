@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="d-flex align-items-center">
                        <h1>{{ $question->title }}</h1>
                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}" class="btn btn-primary">Back to All Question</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    {{ $question->body }}
                    <div class="float-right"> 
                            <span class="text-muted">Asked: {{ $question->created_date }}</span>
                            <div class="media mt-2">
                                <a href="{{ $question->user->url }}" class="pr-2">
                                    <img src="{{ $question->user->avatar }}">
                                </a>
                                <div class="media-body mt-1">
                                    <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                </div>
                            </div>
                        </div>
                </div>       
            </div>
        </div>
    </div>
    <div class="row mt-4 justify-content-center">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="d-flex align-items-center">
                        <h2>{{ $question->answers_count ." ". str_plural('Answer', $question->answers_count) }}</h2>
                    </div>
                </div>
                <div class="panel-body">
                    @foreach($question->answers as $answer)
                        {{ $answer->body }} 
                        <div class="float-right"> 
                            <span class="text-muted">Answered: {{ $answer->created_date }}</span>
                            <div class="media mt-2">
                                <a href="{{ $answer->user->url }}" class="pr-2">
                                    <img src="{{ $answer->user->avatar }}">
                                </a>
                                <div class="media-body mt-1">
                                    <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>        
            </div>
        </div>
    </div>
</div>
@endsection
 