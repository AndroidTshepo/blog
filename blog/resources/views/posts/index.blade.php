@extends('main')

@section('title','| All Blog Posts')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>

        <div class="col-md-2">
            <a href="{{route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-spacer">Create New Post</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>#</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created At</th>
                <th></th>

                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th>{{ $post->id}}</th>
                        <td>{{ $post->title}}</td>
                        <td>{{ substr($post->body, 0,50)}}{{strlen($post->body)> 50? "...":""}}</td>
                        <td>{{ date('M j, Y ',strtotime($post-> created_at))}}</td>
                        <td></td>
                        <td>
                            <a href="{{ route('posts.show',$post->id) }}" class="btn btn-success btn-sm">View</a>
                            <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
<div class="text-center">
    {{--Applying inpigination to limit the number  data to be displayed on the index page --}}
    {!! $posts->links() !!}
</div>
        </div>
    </div>

@endsection
