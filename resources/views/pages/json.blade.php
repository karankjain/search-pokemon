@extends('layout.app')

@section('content')
    {!! Form::open(['action' => 'JsonController@jsonToDb', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('path','Enter JSON file Path')}}
            {{Form::text('path', '', ['class' => 'form-control', 'placeholder' => 'Path'])}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection