@extends('main')

@section('title', '| Login')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-mid-12">
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