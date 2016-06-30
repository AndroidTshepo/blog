@extends('main')

@section('title','Create Post')

@section('stylesheets')
    {{--Injecting the parsley css library to the form--}}
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>
            {!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '')) !!}
            {{ Form::label('title', 'Title:') }}
            {{--Form class is a bootstrap file --}}
            {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

            {{--Form class is a bootstrap file --}}
            {{ Form::label('body', 'Post Body:') }}
            {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}
            {{--Creating a submit button --}}
            {{ Form::submit('Create New Blog', array('class' => 'btn btn-success btn-lg btn-block', 'style' =>'margin-top: 20px;')) }}

            {!! Form::close() !!}
        </div>

    </div>
@endsection

@section('script')
    {{--Injecting the parsley css library to the form--}}
    {!! Html::script('js/parsley.min.js') !!}

@endsection