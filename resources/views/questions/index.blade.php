 @extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="d-flex align-items-center">
                        <h2>All Questions</h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.create') }}" class="btn btn-primary">Ask Question</a>
                        </div>
                    </div>
                </div>
                 <div class="panel-body">
                    @include ('layouts._messages')
                    @foreach ($questions as $question) 
                    <div class="media">
                        <div class="d-flex flex-column counters">
                            <div class="vote">
                                <strong>{{ $question->votes }} </strong>{{ str_plural('vote', $question->votes) }}
                            </div>
                             <div class="status {{ $question->status }}">
                                <strong>{{ $question->answers }}</strong>{{ str_plural('answer', $question->answers) }}
                            </div>
                             <div class="views">
                                {{ $question->views ." ". str_plural('view', $question->views) }}
                            </div>
                        </div>

                        <div class="media-body">
                            <div class="d-flex align-items-center">    
                                <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                                <div class="ml-auto">
                                    <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm  btn-primary">Edit</a>
                                    <form class="form-delete" action="{{ route('questions.destroy', $question->id) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                            <p class="lead">
                                Asked by
                                <a href="{{ $question->user->url }}"> {{ $question->user->name }}</a>
                                <small class="text-muted">{{ $question->created_date }}</small>
                            </p>
                            {{ str_limit($question->body, 250) }} 
                        </div>
                    </div> 
                    <hr>
                    @endforeach 
                    <div class="text-center"> 
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection