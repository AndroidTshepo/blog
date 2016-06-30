@extends('main')
@section('title','| Register')
@section('content')

    <div class="row">
        <div class="col-mid-12">
            <h1>Sign Up</h1>
            <hr>
            <form action="{{route('register')}}" method="post">
                <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                    <label name="email">Your E-mail</label>
                    <input id="email" name="email" type="text" class="form-control" value="{{Request::old('email')}}">
                </div>

                <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                    <label name="name">Your First Name</label>
                    <input id="name" name="name" type="name" class="form-control" value="{{Request::old('name')}}">
                </div>
                <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                    <label name="password">Your Password</label>
                    <input id="password" name="password" type="password" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Sign up</button>
                {{--Setting up a session here --}}
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>

        </div>

    </div>
@endsection
