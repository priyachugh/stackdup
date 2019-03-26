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
                         {{ csrf_field() }}
                        <div class="form-group">
                            <label for="question-title">Question Title</label>
                            <input type="text" name="title" id="question-title" class="form-control {{ $errors->has('title') ? is-invalid : ''}}" >
                            @if ($errors->has('title'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('title') }}</strong>
                            </div>
                            @endif
                        </div>
                         <div class="form-group">
                            <label for="question-body">Describe your Question</label>
                            <textarea name="body" id="question-body" row="10" class="form-control {{ $errors->has('title') ? is-invalid : ''}}" ></textarea>
                             @if ($errors->has('body'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('body') }}</strong>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg">Ask this Question </button>
                        </div>

                </div>       
            </div>
        </div>
    </div>
</div>
@endsection
