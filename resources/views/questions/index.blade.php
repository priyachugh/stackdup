 @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Questions</div>

                <div class="panel-body">
                    @foreach ($questions as $question) 
                 <div class="media">
                    <div class="media-body">    
                        <h3 class="mt-0">{{ $question->title }}</h3>
                        {{ str_limit($question->body, 250) }}
                    </div>
                </div> 
                <hr>
                @endforeach 
                
                    {{ $questions->links() }}
                    
               
                </div>
                    }
            </div>
        </div>
    </div>
</div>
@endsection
