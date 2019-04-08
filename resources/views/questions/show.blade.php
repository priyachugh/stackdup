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
                        @include('shared._vote', [
                                    'model' => $question,
                                ])
                        <div class="media-body">
                            {{ $question->body }}
                            <div class="text-right"> 
                                @include('shared._author', [
                                    'model' => $question,
                                    'label' => 'asked'
                                ])
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
