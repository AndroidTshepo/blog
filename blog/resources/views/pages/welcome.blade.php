@extends('main')
@section('title','| Home')
@section('content')
    <div class="row">
        <div class="col-mid-12">
            <div class="jumbotron">
                <h1>Welcome to the MoreCorp Blog </h1>

                <p class="lead">Welcome to the morecorp blog, where we blog without limits</p>

                <p><a class="btn btn-primary btn-lg" href="/register" role="button">Join Our Blog</a></p>
            </div>
        </div>
    </div>
    {{--End of heading now craeting rows--}}
    <div class="row">
        <div class="col-md-8">
            {{--Looping from the posts table --}}
            @foreach( $posts as $post)

                <div class="post">
                    <h3>{{ $post->title}}</h3>

                    <p>{{substr($post->body, 0, 400)}}{{strlen($post->body) > 400 ? "...": ""}}</p>
                    {{--<a href="#" class="btn btn-primary">Create Account</a>--}}
                </div>
                <hr>
            @endforeach

        </div>
        <div class="col-md-3 col-md-offset-1"><h2>Login</h2>

            <form action="{{route('login')}}" method="post">
                <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                    <label for="email">Your E-mail</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}">
                </div>

                <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                    <label for="email">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>


        </div>

    </div>

@endsection


