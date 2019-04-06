<div class="row">
    <div class="col-md-12 ">
        <div class="panel panel-default">
            <div class="panel-body justify-center">
                <div class="panel-heading">
                    <div class="d-flex align-items-center">
                        <h2>{{ $answerCount ." ". str_plural('Answer', $answerCount) }}</h2>
                    </div>
                </div>
                <hr>
                @include ('layouts._messages')
                <div class="media">
                     @foreach($answers as $answer)
                        <div class="d-flex flex-column vote-controls">
                            <a title="this answer is useful" 
                            class="vote-up {{ Auth::guest() ? 'off' : '' }}"
                            onclick="event.preventDefault(); document.getElementById('up-vote-answer-{{ $answer->id }}').submit();">
                                <i class="fas fa-caret-up fa-2x"></i>
                            </a> 
                            <form id="up-vote-answer-{{ $answer->id }}" method="POST" action="/answers/{{ $answer->id}}/vote" style="display: none;">
                                {{ csrf_field() }}
                                <input type="hidden" name="vote" value="1">
                            </form>
                            <span class="votes-count">{{ $answer->votes_count }}</span>
                            <a title="this answer is not useful" 
                            class="vote-down {{ Auth::guest() ? 'off' : ''}}"
                            onclick="event.preventDefault(); document.getElementById('down-vote-answer-{{ $answer->id }}').submit();">
                                <i class="fas fa-caret-down fa-2x"></i>
                            </a>
                            <form id="down-vote-answer-{{ $answer->id }}" method="POST" action="/answers/{{ $answer->id}}/vote" style="display: none;">
                                {{ csrf_field() }}
                                <input type="hidden" name="vote" value="-1">
                            </form>
                             @can('accept', $answer)
                                <a title="mark this answer as favorite answer" 
                                    class="{{ $answer->status }} mt-2"
                                    onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $answer->id }}').submit();">
                                    <i class="fas fa-check fa-lg"></i>
                                </a>
                                <form id="accept-answer-{{ $answer->id }}" method="POST" action="{{ route('answers.accept', $answer->id) }}" style="display: none;">
                                {{ csrf_field() }}
                                </form>
                               @else
                                @if($answer->is_best)
                                    <a title="Owner of the question accepted this answer as favorite answer" 
                                        class="{{ $answer->status }} mt-2">
                                        <i class="fas fa-check fa-lg"></i>
                                    </a>
                                @endif 
                            @endcan
                        </div>
                            <div class="media-body">
                                {{ $answer->body }} 
                            <div class="row">
                                <div class="col-4">
                                    <div class="ml-auto">
                                        @can('update', $answer)
                                            <a href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}" class="btn btn-sm  btn-primary">Edit</a>
                                        @endcan
                                        @can('delete', $answer)
                                            <form class="form-delete" action="{{ route('questions.answers.destroy', [$question->id, $answer->id]) }}" method="post">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        @endcan
                                    </div> 
                                </div>
                                <div class="col-4">
                                </div>
                                <div class="text-right"> 
                                    <span class="text-muted">Answered: {{ $answer->created_date }}</span>
                                    <div class="media mt-2">
                                        <a href="{{ $answer->user->url }}" class="pr-2">
                                            <img src="{{ $answer->user->avatar }}">
                                        </a>
                                    </div>
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
</div>
