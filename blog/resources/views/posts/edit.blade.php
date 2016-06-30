@extends('main')

@section('title', '| Post Edit')

@section('content')

    <div class="row">
        {{--The form modal binding --}}
        {!! Form::model($post, ['route' =>['posts.update', $post->id], 'method' => 'PUT'])!!}
        <div class="col-md-8">
            {{Form::label('title', 'Title:')}}
            {{ Form::text('title', null,['class' => 'form-control input-lg']) }}

            {{Form::label('body', 'Post Body:',['class'=>'form-spacing-top'])}}
            {{ Form::textarea('body', null,['class' => 'form-control']) }}

        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Date created</dt>
                    {{--Converting the database time to a unix time with a php function--}}
                    <dd>{{ date('M j, Y  H:ia',strtotime($post-> created_at))}}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last updated</dt>
                    <dd>{{ date('M j, Y H:ia',strtotime($post-> updated_at))}}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {{--Allowing user to edit post--}}
                        {!! Html::linkRoute('posts.show', 'Cancel',array($post->id), array('class' => 'btn btn-danger
                        btn-block'))!!}
                        {{--<a href="" class="btn btn-primary btn-block">Edit</a>--}}
                    </div>
                    <div class="col-sm-6">
                        {{--Allowing user to delete post--}}
                        {{Form::submit('Save Changes', ['class' => 'btn btn-success btn-block'])}}
                        {{--{!! Html::linkRoute('posts.update', 'Save Changes',array($post->id), array('class' => 'btn--}}
                        {{--btn-success--}}
                        {{--btn-block'))!!}--}}
                        {{--<a href="" class="btn btn-danger btn-block">Delete</a>--}}
                    </div>
                </div>
            </div>

        </div>
        {!! Form::close()!!}
    </div>

@endsection