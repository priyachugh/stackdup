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
                        <div class="d-flex flex-column vote-controls">
                            <a title="this answer is useful" class="vote-up">
                                <i class="fas fa-caret-up fa-2x"></i>
                            </a>
                            <span class="votes-count">1230</span>
                            <a title="this answer is not useful" class="vote-down off">
                                <i class="fas fa-caret-down fa-2x"></i>
                            </a>
                            <a title="mark this answer as favorite answer" class="vote-accepted mt-2">
                                <i class="fas fa-check fa-lg"></i>
                            </a>
                            <span class="favorites-count ">123</span>
                        </div>
                        <div class="media-body">
                            @foreach($answers as $answer)
                              {{ $answer->body }} 
                            <div class="text-right"> 
                                <span class="text-muted">Answered: {{ $answer->created_date }}</span>
                                <div class="media mt-2">
                                    <a href="{{ $answer->user->url }}" class="pr-2">
                                        <img src="{{ $answer->user->avatar }}">
                                    </a>
                                    <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
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