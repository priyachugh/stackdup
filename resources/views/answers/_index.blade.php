@if($answerCount > 0)
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
                     @include('shared._vote', [
                                'model' => $answer,
                            ])
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
                                   @include('shared._author', [
                                     'model' => $answer,
                                     'label' => 'answered'
                                    ])
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
@endif

