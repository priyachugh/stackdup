@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-body justify-center">
                        <div class="panel-heading">
                            <div class="d-flex align-items-center">
                                <h1>Editing answer for question: <strong>{{ $question->title }}</strong></h1>
                            </div>
                        </div>
                        <hr>
                        <form method="post" action="{{ route('questions.answers.update', [$question->id, $answer->id]) }}">
                           {{ csrf_field() }}
                           {{ @method_field('PATCH') }}
                            <div class="form-group">
                                <textarea rows="7" name="body" class="form-control" rows="7" {{ $errors->has('body') ? 'is-invalid' : '' }}">{{ old('body', $answer->body) }}</textarea>
                                @if($errors->has('body'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </div>

                                @endif
                            </div>  
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-outline-primary">Update</button>
                            </div> 
                        </form>               
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
