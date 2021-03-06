@extends('main')

@section('title','| View Post')

@section('content')
    <div class="row">
        <div class="col-md-8">

            <h1>{{$post->title}}</h1>

            <p class="lead">{{ $post->body }}</p>
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
                        {!! Html::linkRoute('posts.edit', 'Edit',array($post->id), array('class' => 'btn btn-primary
                        btn-block'))!!}
                        {{--<a href="" class="btn btn-primary btn-block">Edit</a>--}}
                    </div>
                    <div class="col-sm-6">
                        {{--Allowing user to delete post--}}
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}


                        {!! Form::submit('Delete', ['class'=> 'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                        {{--<a href="" class="btn btn-danger btn-block">Delete</a>--}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div style="margin-top:10px">
                        {{ Html::linkRoute('posts.index', '<< See All Posts' ,array(),['class'=> 'btn btn-default btn-block btn-h1-spacing']) }}
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>

@endsection
