@extends('layout.app')

@section('content')

    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm">
            {!! Form::open() !!}
                <div class="form-group">
                    {{Form::text('search', '', ['class' => 'form-control', 'id' => 'search-term', 'placeholder' => 'Search'])}}
                </div>
            {!! Form::close() !!}
            <div class="col-sm" id="data">
            </div>
        </div>
        
        <div class="col-sm">
        </div>
    </div>

@endsection