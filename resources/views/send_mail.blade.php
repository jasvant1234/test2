@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thanks Mail </h1>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Thanks Mail</a></li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <form method="post" action="{{route('store_mail_thanks',$all_send->id)}}">

        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1"> Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter Name" value="{{$all_send->name}}">
                    <span style="color: red">@error('name'){{$message}}@enderror</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1"> Email</label>
                    <input type="text" name="email" class="form-control" id="exampleInputName" placeholder="Enter Email" value="{{$all_send->email}}">
                    <span style="color: red">@error('email'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1"> Subject</label>
                <textarea rows="4" type="text" name="subject" class="form-control" id="exampleInputName" placeholder="Enter Subject">{{$all_send->subject}}</textarea>
                <span style="color: red">@error('subject'){{$message}}@enderror</span>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1"> Subject</label>
                <textarea rows="4" type="text" name="message" class="form-control" id="exampleInputName" placeholder="Enter Message">{{$all_send->message}}</textarea>
                <span style="color: red">@error('message'){{$message}}@enderror</span>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1"> Reply</label>
                <textarea rows="4" type="text" name="reply" class="form-control" id="reply" placeholder="Enter Reply">{{$all_send->reply}}</textarea>
                <span style="color: red">@error('reply'){{$message}}@enderror</span>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn" style="background-color: #fd7e14">Submit</button>
            <a href=""><button type="button" class="btn btn" style="background-color: #fd7e14">Back</button></a>
        </div>
    </form>

@endsection
