 <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-body justify-center">
                    <div class="panel-heading">
                        <div class="d-flex align-items-center">
                            <h3>Your Answer</h3>
                        </div>
                    </div>
                    <hr>
                    <form method="post" action="{{ route('questions.answers.store', $question->id) }}">
                       {{ csrf_field() }}
                        <div class="form-group">
                            <textarea rows="7" name="body" class="form-control" {{ $errors->has('body') ? 'is-invalid' : '' }}"></textarea>
                            @if($errors->has('body'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('body') }}</strong>
                            </div>

                            @endif
                        </div>  
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-outline-primary">Submit</button>
                        </div>                
                </div>
            </div>
        </div>
    </div>