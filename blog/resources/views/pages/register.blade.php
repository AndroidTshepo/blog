@extends('main')
@section('title','| Register')
@section('content')
    <div class="row">
        <div class="col-mid-12">
            <h1>Contact MoreCorp</h1>
            <hr>
            <form>
                <div class="form-group">
                    <label name="email">Email</label>
                    <input id="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label name="email">Title</label>
                    <input id="title" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label name="email">Message</label>
                    <textarea id="message" name="message" class="form-control" placeholder="Please enter your message here"></textarea>
                </div>

                <div  value="send_message" class="btn btn-success">Send Message</div>
            </form>

        </div>

    </div>
@endsection
