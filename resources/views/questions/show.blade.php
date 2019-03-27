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
                </div>       
            </div>
        </div>
    </div>
</div>
@endsection
