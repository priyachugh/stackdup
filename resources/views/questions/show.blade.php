@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-body justify-center">
                    <div class="panel-heading">
                        <div class="d-flex align-items-center">
                            <h1>{{ $question->title }}</h1>
                            <div class="ml-auto text-right">
                                <a href="{{ route('questions.index') }}" class="btn btn-default">Back to All Question</a>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a title="this question is useful" class="vote-up">
                                <i class="fas fa-caret-up fa-2x"></i>
                            </a>
                            <span class="votes-count">1230</span>
                            <a title="this question is not useful" class="vote-down off">
                                <i class="fas fa-caret-down fa-2x"></i>
                            </a>
                            <a title="Click to mark as favorite question(click again to undo)" class="favorite mt-2 {{ Auth::guest() ? 'off' : ($question->is_favorited ? 'favorited': '') }} "  onclick="event.preventDefault(); document.getElementById('favorite-question-{{ $question->id }}').submit();">
                                <i class="fas fa-star fa-lg"></i>
                            </a>
                            <form id="favorite-question-{{ $question->id }}" method="POST" action="/questions/{{ $question->id}}/favorites" style="display: none;">
                                {{ csrf_field() }}
                                @if($question->is_favorited)
                                    {{ method_field('DELETE') }}
                                @endif
                            </form>
                            <span class="favorites-count ">{{ $question->favorites_count }}</span>
                        </div>
                        <div class="media-body">
                            {{ $question->body }}
                            <div class="text-right"> 
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
        </div>
    </div>
  @include('answers._index', [
    'answers' => $question->answers,
    'answerCount' => $question->answers_count,
  ])
  @include('answers._create')
</div>
@endsection
