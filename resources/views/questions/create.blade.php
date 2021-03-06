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
                            <a href="{{ route('questions.index') }}" class="btn btn-primary">Back to All Question</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('questions.store') }}" method="post">
                         @include ("questions._form", ['btnText' => "Ask question"])
                    </form>
                </div>       
            </div>
        </div>
    </div>
</div>
@endsection
